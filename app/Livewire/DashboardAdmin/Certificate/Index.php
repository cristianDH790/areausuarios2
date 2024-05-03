<?php

namespace App\Livewire\DashboardAdmin\Certificate;

use Livewire\Component;
use App\Models\certificate;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Storage;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Index extends Component
{
    use WithPagination;
    use LivewireAlert;
    public $search;

    public function delete($id)
    {
        $certificate = Certificate::find($id);
        Storage::delete('public/' . $certificate->photo_front);
        Storage::delete('public/' . $certificate->photo_back);
        $certificate->delete();
        $this->alert('success', 'certificate successfully deleted');
    }
    public function render()
    {
        $certificates = Certificate::whereHas('service', function ($query) {
            $query->where('name', 'like', '%' . $this->search . '%');
        })->orWhere('status', 'like', '%' . $this->search . '%')
            ->paginate(10);

        return view('livewire.dashboard-admin.certificate.index', compact('certificates'));
    }
}
