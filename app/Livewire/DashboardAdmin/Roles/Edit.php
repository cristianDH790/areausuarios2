<?php

namespace App\Livewire\DashboardAdmin\Roles;

use Livewire\Component;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Illuminate\Validation\ValidationException;

class Edit extends Component
{
    use LivewireAlert;
    public Role $role;
    public string $name;
    public $permissions;
    public $rolePermissions;

    protected $rules = [
        'name'              => 'required|string|max:255',
        'rolePermissions.*' => 'boolean'
    ];
    public $messages = [
        'name.required' => 'El campo nombre es obligatorio',
        'name.string'   => 'El campo nombre debe ser una cadena de texto',
        'name.max'      => 'El campo nombre no debe ser mayor a 255 caracteres',
    ];
    public function save()
    {
        try {
            $this->validate();
            $this->role->permissions()->sync(array_keys(array_filter($this->rolePermissions)));
            $this->role->name = $this->name;
            $this->role->update();
            $this->alert('success', 'Rol actualizado correctamente.');
        } catch (ValidationException $e) {

            $validationErrors = $e->validator->errors()->all();

            $this->alert('error', implode('<br>', $validationErrors));
        }
    }
    public function mount()
    {
        $this->name        = $this->role->name;
        $this->permissions = Permission::get();

        $currentRolePermission = $this->role->permissions->pluck('id')->toArray();
        foreach ($this->permissions as $permission) {
            $this->rolePermissions[$permission->id] = in_array($permission->id, $currentRolePermission);
        }
    }
    public function render()
    {
        return view('livewire.dashboard-admin.roles.edit');
    }
}