<?php

namespace App\Livewire\DashboardAdmin\Users;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Role;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Illuminate\Validation\ValidationException;

class Index extends Component
{
    use LivewireAlert;
    use WithPagination;
    public $search = "";
    public $name;
    public $document = "";
    public $email;
    public $last_name;
    public $phone;
    public $password;


    protected $rules = [
        'search' => '',
        'name' => 'required',
        'document' => 'required',
        'email' => 'required|email',
        'last_name' => 'required',
        'phone' => '',
        'password' => 'required',
    ];

    protected $messages = [
        'name.required' => 'The name field is required.',
        'document.required' => 'The document field is required.',
        'email.required' => 'The email field is required.',
        'email.email' => 'email field must be a valid email.',
        'lastname.required' => 'The lastname field is required.',
        'password.required' => 'The password field is required.',
    ];


    public function update_status($userId, $status)
    {
        // Cargar el usuario existente que deseas actualizar
        $user = User::findOrFail($userId);

        // Modificar el campo 'status' al valor contrario al actual
        $user->status = ($status === 'active') ? 'inactive' : 'active';

        // Guardar los cambios en la base de datos
        $user->save();

        // Mostrar un mensaje de alerta
        $this->flash('success', 'Status edited successfully!');
        return redirect()->route('user.index');
    }


    public function delete($user_id)
    {
        // Cargar el usuario existente que deseas eliminar
        $user = User::findOrFail($user_id);

        // Eliminar el usuario de la base de datos
        $user->delete();

        // Mostrar un mensaje de alerta
        $this->flash('success', 'User deleted successfully!');
        return redirect()->route('user.index');
    }

    public function mount()
    {
    }

    public function save()
    {
        try {
            $this->validate();
            $user = new User();
            $user->name = $this->name;
            $user->document = $this->document;
            $user->email = $this->email;
            $user->last_name = $this->last_name;
            $user->phone = $this->phone;
            $user->status = "inactive";
            $user->code = "AD-" . $this->document;
            $user->password = bcrypt($this->password);
            $user->save();
            $user->assignRole('admin');

            $this->reset(['name', 'document', 'email', 'last_name', 'phone', 'password']);

            $this->flash('success',  'User added successfully!');
            return redirect()->route('user.index');
        } catch (ValidationException $e) {

            $validationErrors = $e->validator->errors()->all();

            $this->alert('error', implode('<br>', $validationErrors));
        }
    }



    public function render()
    {


        // Dentro de tu método donde estás obteniendo la lista de usuarios
        $adminRole = Role::where('name', 'admin')->first();

        $users = User::whereHas('roles', function ($query) use ($adminRole) {
            $query->where('role_id', $adminRole->id);
        })
            ->where(function ($query) {
                $query->where('name', 'like', '%' . $this->search . '%')
                    ->orWhere('document', 'like', '%' . $this->search . '%')
                    ->orWhere('email', 'like', '%' . $this->search . '%')
                    ->orWhere('status', 'like', '' . $this->search . '%');
            })
            ->with('roles') // Cargar la relación roles de cada usuario
            ->paginate(10);

        return view('livewire.dashboard-admin.users.index', compact('users'));
    }
}
