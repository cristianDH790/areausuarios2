<?php

namespace App\Livewire\DashboardAdmin\Permissions;

use Livewire\Component;
use Spatie\Permission\Models\Permission;

class Index extends Component
{
    public $search;
    public function mount()
    {
    }

    public function render()
    {
        $permissions = Permission::where('name', 'like', '%' . $this->search . '%')
            ->orderBy('name')
            ->paginate(10);
        return view('livewire.dashboard-admin.permissions.index', compact('permissions'));
    }
}
