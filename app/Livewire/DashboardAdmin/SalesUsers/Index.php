<?php

namespace App\Livewire\DashboardAdmin\SalesUsers;

use App\Models\bank;
use App\Models\sale;
use App\Models\User;
use App\Models\service;
use Livewire\Component;
use App\Models\sale_detail;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use App\Models\shopping_carts;
use Carbon\Carbon;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Ramsey\Uuid\Type\Integer;

class Index extends Component
{
    use WithFileUploads;
    use LivewireAlert;

    use WithPagination;
    public $search_services = "";
    public $price_end;
    public  $precio_view = 0.0; //precio que se vera abajo de la tabla


    public $banks;

    public $document;
    public $name;
    public $last_name;
    public $phone;
    public $email;
    public $name_exist;
    public $last_name_exist;
    public $phone_exist;
    public $email_exist;
    public $date_pay;
    public $bank_id;
    public $num_transaction;
    public $observations;
    public $photo_voucher;
    public $document_user = null;

    public function updatedDocument()
    {
        $this->document_user = User::where('document', $this->document)
            ->where('code', 'like', 'CL%')
            ->first();
        if ($this->document_user) {
            $this->name_exist = $this->document_user->name;
            $this->last_name_exist = $this->document_user->last_name;
            $this->phone_exist = $this->document_user->phone;
            $this->email_exist = $this->document_user->email;
            $this->alert('success', 'Usuario encontrado');
        }
    }

    public function mount()
    {
        $this->banks = bank::all();
    }
    public function preciofinal()
    {
        $service_adds = shopping_carts::all();
        $total = 0;
        foreach ($service_adds as $service_add) {
            $total += $service_add->price_end;
        }
        $this->precio_view = $total;
    }
    public function addservice($serviceId)
    {
        $service = Service::find($serviceId);
        $service_add = new shopping_carts();
        $service_add->service_id = $service->id;
        $service_add->name_service =    $service->name;
        $service_add->price_service =   $service->price;
        $service_add->price_discount_service =  $service->price_discount;
        $service_add->price_end =  $service->price;
        $service_add->save();
    }
    public function removeService($serviceId)
    {
        $service_add = shopping_carts::where('service_id', $serviceId)->first();
        $service_add->delete();
    }
    public function editPrice($serviceId)
    {
        try {
            $this->validate(
                [
                    'price_end' => 'required'
                ],
                [
                    'price_end.required' => 'El campo Precio Total es obligatorio.'
                ]
            );
            $service_add = shopping_carts::where('service_id', $serviceId)->first();
            $service_add->price_end = $this->price_end;
            $service_add->update();
        } catch (\Exception $e) {
            $this->alert('error', $e->getMessage());
        }
    }
    public function save_exists()
    {
        $this->validate([
            'document' => 'required',
            'name_exist' => 'required',
            'last_name_exist' => 'required',
            'phone_exist' => 'required',
            'email_exist' => 'required|email',
            'date_pay' => 'required',
            'bank_id' => 'required',
            'num_transaction' => 'required|unique:sales,num_transaction',
            'photo_voucher' => 'required|image|max:1024',
        ]);
        $sale = new sale();

        $user_old = User::find($this->document_user->id);
        $user_old->assignRole('customer');
        //agregamos la venta
        $sale->user_id = $user_old->id;
        $sale->date_sale = Carbon::now();
        $sale->date_sale_pay = $this->date_pay;
        $sale->total = $this->precio_view;
        $sale->status = 'validate';
        $sale->num_transaction = $this->num_transaction;
        $sale->bank_id = $this->bank_id;
        $sale->voucher = $this->photo_voucher->store('comprobantes', 'public');
        $sale->type_detail = 'boleta';
        $sale->sale_by = auth()->user()->name;
        $sale->description = $this->observations;
        $sale->save();
        $carts = shopping_carts::all();
        foreach ($carts as $cart) {
            $sale_detail = new sale_detail();
            $sale_detail->service_id  = $cart->service_id;
            $sale_detail->sale_id = $sale->id;
            $sale_detail->price_service = $cart->price_service;
            $sale_detail->price_sale = $cart->price_end;
            $sale_detail->price_sale = $cart->price_end;
            $sale_detail->save();
        }
        //eliminamos los servicios del carrito
        shopping_carts::truncate();
        $this->reset('document', 'name_exist', 'last_name_exist', 'phone_exist', 'email_exist', 'date_pay', 'bank_id', 'num_transaction', 'observations', 'photo_voucher');

        $this->flash('success', 'Venta realizada con éxito');
        return redirect()->route('sale_user.index');
    }
    public function save_new()
    {
        $this->validate([
            'document' => 'required',
            'name' => 'required',
            'last_name' => 'required',
            'phone' => 'required',
            'email' => 'required|email',
            'date_pay' => 'required',
            'bank_id' => 'required',
            'num_transaction' => 'required|unique:sales,num_transaction',
            'photo_voucher' => 'required|image|max:1024',
        ]);
        $new_user = new User();
        $sale = new sale();

        //agregamos el ususario nuevo
        $new_user->document = $this->document;
        $new_user->name = $this->name;
        $new_user->last_name = $this->last_name;
        $new_user->phone = $this->phone;
        $new_user->email = $this->email;
        $new_user->password = bcrypt($this->document);
        $new_user->code = "CL-" . $this->document;
        $new_user->assignRole('customer');
        $new_user->save();

        //agregamos la venta
        $sale->user_id = $new_user->id;
        $sale->date_sale = Carbon::now();
        $sale->date_sale_pay = $this->date_pay;
        $sale->total = $this->precio_view;
        $sale->status = 'validate';
        $sale->num_transaction = $this->num_transaction;
        $sale->bank_id = $this->bank_id;
        $sale->voucher = $this->photo_voucher->store('comprobantes', 'public');
        $sale->type_detail = 'boleta';
        $sale->sale_by = auth()->user()->name;
        $sale->description = $this->observations;
        $sale->save();
        //guardamos la detalle venta
        $carts = shopping_carts::all();
        foreach ($carts as $cart) {
            $sale_detail = new sale_detail();
            $sale_detail->service_id  = $cart->service_id;
            $sale_detail->sale_id = $sale->id;
            $sale_detail->price_service = $cart->price_service;
            $sale_detail->price_sale = $cart->price_end;
            $sale_detail->price_sale = $cart->price_end;
            $sale_detail->save();
        }
        //viincular el usaurio con el certificado




        //eliminamos los servicios del carrito
        shopping_carts::truncate();

        $this->reset('document', 'name', 'last_name', 'phone', 'email', 'date_pay', 'bank_id', 'num_transaction', 'observations', 'photo_voucher');
        $this->flash('success', 'Venta realizada con éxito');
        return redirect()->route('sale_user.index');
    }
    public function save_new_client()
    {
        $count = shopping_carts::count();
        if ($count > 0) {
            if ($this->document_user) {
                $this->save_exists();
            } else {
                $this->save_new();
            }
        } else {
            $this->alert('error', 'Servicios agregados 0');
        }
    }

    public function render()
    {

        $this->preciofinal();
        $service_adds = shopping_carts::all();
        $services = service::where('name', 'like', '%' . $this->search_services . '%')
            ->orWhere('code_service', 'like', '%' . $this->search_services . '%')
            ->paginate(5);
        return view('livewire.dashboard-admin.sales-users.index', compact('services', 'service_adds'));
    }
}