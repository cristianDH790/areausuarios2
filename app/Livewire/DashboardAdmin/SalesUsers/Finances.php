<?php

namespace App\Livewire\DashboardAdmin\SalesUsers;

use App\Models\bank;
use App\Models\finance;
use App\Models\finance_details;
use App\Models\sale;
use App\Models\sale_detail;
use App\Models\User;
use App\Models\service;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use App\Models\shopping_carts;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Finances extends Component
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
    // public $date_pay;
    // public $bank_id;
    // public $num_transaction;
    // public $observations;
    // public $photo_voucher;
    public $document_user = null;


    public $num_pay;
    public $date_start;
    public $date_end;


    public $dates_pay_0;
    public $dates_pay_1;
    public $dates_pay_2;
    public $dates_pay_3;
    public $payment_amounts_0;
    public $payment_amounts_1;
    public $payment_amounts_2;
    public $payment_amounts_3;
    public $status_0;
    public $status_1;
    public $status_2;
    public $status_3;
    public $photo_voucher_0;
    public $photo_voucher_1;
    public $photo_voucher_2;
    public $photo_voucher_3;






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
        $service = service::find($serviceId);
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

            'num_pay' => 'required',
            'date_start' => 'required|date',
            'date_end' => 'required|date',
            // Validaciones dinámicas para las fechas de pago y los montos según el número de pagos ingresados
            'dates_pay_0' => $this->num_pay >= 1 ? 'required|date' : '',
            'dates_pay_1' => $this->num_pay >= 2 ? 'required|date' : '',
            'dates_pay_2' => $this->num_pay >= 3 ? 'required|date' : '',
            'dates_pay_3' => $this->num_pay >= 4 ? 'required|date' : '',
            'payment_amounts_0' => $this->num_pay >= 1 ? 'required|numeric' : '',
            'payment_amounts_1' => $this->num_pay >= 2 ? 'required|numeric' : '',
            'payment_amounts_2' => $this->num_pay >= 3 ? 'required|numeric' : '',
            'payment_amounts_3' => $this->num_pay >= 4 ? 'required|numeric' : '',
            'status_0' => $this->num_pay >= 1 ? 'required' : '',
            'status_1' => $this->num_pay >= 2 ? 'required' : '',
            'status_2' => $this->num_pay >= 3 ? 'required' : '',
            'status_3' => $this->num_pay >= 4 ? 'required' : '',
            // Validación de las fotos de comprobante solo si se proporcionan
            'photo_voucher_0' => $this->num_pay >= 1 && $this->photo_voucher_1 ? 'image|max:1024' : '',
            'photo_voucher_1' => $this->num_pay >= 2 && $this->photo_voucher_2 ? 'image|max:1024' : '',
            'photo_voucher_2' => $this->num_pay >= 3 && $this->photo_voucher_3 ? 'image|max:1024' : '',
            'photo_voucher_3' => $this->num_pay >= 4 && $this->photo_voucher_4 ? 'image|max:1024' : '',

        ]);
        $sale = new sale();

        $user_old = User::find($this->document_user->id);
        $user_old->assignRole('customer');
        //agregamos la venta
        $sale->user_id = $user_old->id;
        $sale->date_sale = Carbon::now();
        $sale->date_sale_pay = $this->date_end;
        $sale->total = $this->precio_view;
        $sale->status = 'validate';
        $sale->debt = 'si';
        $sale->num_transaction = null;
        $sale->bank_id = null;
        $sale->voucher = null;
        $sale->type_detail = 'boleta';
        $sale->sale_by = auth()->user()->name . ' ' . Auth::user()->last_name;
        $sale->description = 'esta venta se realizo con finacia de ' . $this->num_pay . ' cuotas';
        $sale->save();
        $carts = shopping_carts::all();
        foreach ($carts as $cart) {
            $sale_detail = new sale_detail();
            $sale_detail->service_id  = $cart->service_id;
            $sale_detail->sale_id = $sale->id;
            $sale_detail->price_service = $cart->price_service;
            $sale_detail->price_sale = $cart->price_end;
            $sale_detail->save();
        }
        //guardamos las finanzas
        $finances = new finance();
        $finances->sale_id = $sale->id;
        $finances->num_pays = $this->num_pay;
        $finances->date_start = $this->date_start;
        $finances->date_end = $this->date_end;
        $finances->save();
        //agregamos los details finances
        for ($i = 0; $i < $this->num_pay; $i++) {
            $finances_details = new finance_details();
            $finances_details->finance_id = $finances->id;
            $finances_details->date_pay = $this->{"dates_pay_" . ($i)};
            $finances_details->payment_amount = $this->{"payment_amounts_" . ($i)};
            $finances_details->status = $this->{"status_" . ($i)};
            if ($this->{"photo_voucher_" . ($i)}) {
                $finances_details->voucher = $this->{"photo_voucher_" . ($i)}->store('comprobantes_finacias', 'public');
            }

            $finances_details->save();
        }
        //eliminamos los servicios del carrito
        shopping_carts::truncate();
        //$this->reset('document', 'name_exist', 'last_name_exist', 'phone_exist', 'email_exist', 'date_pay', 'bank_id', 'num_transaction', 'observations', 'photo_voucher');

        $this->reset('document', 'name_exist', 'last_name_exist', 'phone_exist', 'email_exist',);
        $this->flash('success', 'Venta realizada con éxito');
        return redirect()->route('sale_user.index');
    }
    public function save_new()
    {
        $this->validate([
            // Validaciones para los campos básicos del usuario y la venta
            'document' => 'required',
            'name' => 'required',
            'last_name' => 'required',
            'phone' => 'required',
            'email' => 'required|email',


            'num_pay' => 'required',
            'date_start' => 'required|date',
            'date_end' => 'required|date',

            // Validaciones dinámicas para las fechas de pago y los montos según el número de pagos ingresados
            'dates_pay_0' => $this->num_pay >= 1 ? 'required|date' : '',
            'dates_pay_1' => $this->num_pay >= 2 ? 'required|date' : '',
            'dates_pay_2' => $this->num_pay >= 3 ? 'required|date' : '',
            'dates_pay_3' => $this->num_pay >= 4 ? 'required|date' : '',
            'payment_amounts_0' => $this->num_pay >= 1 ? 'required|numeric' : '',
            'payment_amounts_1' => $this->num_pay >= 2 ? 'required|numeric' : '',
            'payment_amounts_2' => $this->num_pay >= 3 ? 'required|numeric' : '',
            'payment_amounts_3' => $this->num_pay >= 4 ? 'required|numeric' : '',
            'status_0' => $this->num_pay >= 1 ? 'required' : '',
            'status_1' => $this->num_pay >= 2 ? 'required' : '',
            'status_2' => $this->num_pay >= 3 ? 'required' : '',
            'status_3' => $this->num_pay >= 4 ? 'required' : '',
            // Validación de las fotos de comprobante solo si se proporcionan
            'photo_voucher_0' => $this->num_pay >= 1 && $this->photo_voucher_1 ? 'image|max:1024' : '',
            'photo_voucher_1' => $this->num_pay >= 2 && $this->photo_voucher_2 ? 'image|max:1024' : '',
            'photo_voucher_2' => $this->num_pay >= 3 && $this->photo_voucher_3 ? 'image|max:1024' : '',
            'photo_voucher_3' => $this->num_pay >= 4 && $this->photo_voucher_4 ? 'image|max:1024' : '',
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
        $sale->date_sale_pay = $this->date_end;
        $sale->total = $this->precio_view;
        $sale->status = 'validate';
        $sale->debt = 'si';
        $sale->num_transaction = null;
        $sale->bank_id = null;
        $sale->voucher = null;
        $sale->type_detail = 'boleta';
        $sale->sale_by = auth()->user()->name . ' ' . Auth::user()->last_name;
        $sale->description = 'esta venta se realizo con finacia de ' . $this->num_pay . ' cuotas';
        $sale->save();
        //guardamos la detalle venta
        $carts = shopping_carts::all();
        foreach ($carts as $cart) {
            $sale_detail = new sale_detail();
            $sale_detail->service_id  = $cart->service_id;
            $sale_detail->sale_id = $sale->id;
            $sale_detail->price_service = $cart->price_service;
            $sale_detail->price_sale = $cart->price_end;

            $sale_detail->save();
        }


        //guardamos las finanzas
        $finances = new finance();
        $finances->sale_id = $sale->id;
        $finances->num_pays = $this->num_pay;
        $finances->date_start = $this->date_start;
        $finances->date_end = $this->date_end;
        $finances->save();
        //agregamos los details finances
        for ($i = 0; $i < $this->num_pay; $i++) {
            $finances_details = new finance_details();
            $finances_details->finance_id = $finances->id;
            $finances_details->date_pay = $this->{"dates_pay_" . ($i)};
            $finances_details->payment_amount = $this->{"payment_amounts_" . ($i)};
            $finances_details->status = $this->{"status_" . ($i)};
            if ($this->{"photo_voucher_" . ($i)}) {
                $finances_details->voucher = $this->{"photo_voucher_" . ($i)}->store('comprobantes_finacias', 'public');
            }
            $finances_details->save();
        }
        //viincular el usaurio con el certificado




        //eliminamos los servicios del carrito
        shopping_carts::truncate();

        $this->reset('document', 'name', 'last_name', 'phone', 'email');
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
        return view('livewire.dashboard-admin.sales-users.finances', compact('services', 'service_adds'));
    }
}
