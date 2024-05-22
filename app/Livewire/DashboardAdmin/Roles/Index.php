<?php

namespace App\Livewire\DashboardAdmin\Roles;

use Livewire\Component;
use Spatie\Permission\Models\Role;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Illuminate\Validation\ValidationException;

class Index extends Component
{
    use LivewireAlert;
    public $search;
    public $name;

    protected $rules = [
        'name' => 'required|unique:roles,name',
    ];
    protected $messages = [
        'name.required' => 'El campo nombre es requerido.',
        'name.unique' => 'El rol ya existe.',
    ];
    public function delete($rolid)
    {
        $role = Role::find($rolid);
        if ($role->name == 'admin' ||  $role->name == 'customer') {
            $this->flash('error', 'No puedes eliminar este rol.');
            return redirect()->route('role.index');
        }
        $role->delete();
        $this->flash('success', 'Rol eliminado correctamente.');
        return redirect()->route('role.index');
    }
    public function save()
    {
        try {
            $this->validate();
            $role = Role::create(['name' => $this->name, 'guard_name' => 'web']);

            $this->reset(['name']);

            $this->flash('success', 'Rol creado correctamente.');

            return redirect()->route('role.index');
        } catch (ValidationException $e) {

            $validationErrors = $e->validator->errors()->all();

            $this->alert('error', implode('<br>', $validationErrors));
        }
    }
    public function render()
    {
        $roles = Role::where('name', 'like', '%' . $this->search . '%')
            ->orderBy('name')
            ->paginate(10);
        return view('livewire.dashboard-admin.roles.index', compact('roles'));
    }
}
