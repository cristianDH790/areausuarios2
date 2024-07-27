<?php

namespace App\Livewire\DashboardAdmin\Banks;

use App\Models\bank;
use Livewire\Component;
use Livewire\WithPagination;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Index extends Component
{
    use LivewireAlert;
    use WithPagination;
    public $search = '';

    public $name;
    public $account_number;
    public $account_number_interbank;
    public $type_account;
    public $headline;
    public $document;

    public function delete($id)
    {
        $bank = bank::find($id);
        $bank->delete();
        $this->alert('success', 'Banco eliminado con exito');
    }

    public function save()
    {
        $this->validate([
            'name' => 'required',
            'account_number' => 'required',
            'account_number_interbank' => 'required',
            'type_account' => 'required',
            'headline' => 'required',
            'document' => 'required',
        ]);
        $bank = new bank();
        $bank->name = $this->name;
        $bank->account_number = $this->account_number;
        $bank->account_number_interbank = $this->account_number_interbank;
        $bank->type_account = $this->type_account;
        $bank->headline = $this->headline;
        $bank->document = $this->document;
        $bank->save();
        // Limpiar los campos
        $this->reset('name', 'account_number', 'account_number_interbank', 'type_account', 'headline', 'document');

        $this->flash('success', 'Banco creado con exito!');
        return redirect()->route('bank.index');
    }
    public function render()
    {
        $banks = bank::where(function ($query) {
            $query->where('name', 'like', '%' . $this->search . '%');
        })->paginate(10);
        return view('livewire.dashboard-admin.banks.index', compact('banks'));
    }
}
