<?php

namespace App\Livewire\DashboardAdmin\Customers;

use App\Models\User;
use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Edit extends Component
{
    use LivewireAlert;
    public $user;
    public $name;
    public $last_name;
    public $email;
    public $phone;
    public $document;
    public $password;
    public $updated_at;
    public $created_at;

    protected $rules = [
        'name' => 'required',
        'last_name' => 'required',
        'email' => 'required|email',
        'phone' => '',
        'document' => 'required',
        'password' => 'nullable',
    ];
    protected $messages = [
        'name.required' => 'The name field is required.',
        'last_name.required' => 'The last name field is required.',
        'email.required' => 'The email field is required.',
        'email.email' => 'The email field must be a valid email.',
        'phone.required' => 'The phone field is required.',
        'document.required' => 'The document field is required.',
    ];

    public function mount(User $user)
    {
        $this->name = $user->name;
        $this->last_name = $user->last_name;
        $this->email = $user->email;
        $this->phone = $user->phone;
        $this->document = $user->document;
        $this->updated_at = $user->updated_at;
        $this->created_at = $user->created_at;
    }


    public function update($id)
    {
        $this->validate();
        // Cargar el usuario existente que deseas actualizar
        $user = User::findOrFail($id);

        // Actualizar los campos de usuario con los nuevos valores
        $user->name = $this->name;
        $user->last_name = $this->last_name;
        $user->email = $this->email;
        $user->phone = $this->phone;
        $user->document = $this->document;

        // Verificar si se proporcionó una nueva contraseña
        if ($this->password !== null) {
            // Si se proporcionó una nueva contraseña, hashearla y actualizarla
            $user->password = bcrypt($this->password);
        }

        $user->update();

        $this->flash('success', 'Customer updated successfully!');
        return redirect()->route('customer.edit');
    }

    public function render()
    {
        return view('livewire.dashboard-admin.customers.edit');
    }
}
