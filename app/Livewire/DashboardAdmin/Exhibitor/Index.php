<?php

namespace App\Livewire\DashboardAdmin\Exhibitor;

use Livewire\Component;
use App\Models\exhibitor;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Storage;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Features\SupportFileUploads\WithFileUploads;
use App\Http\Controllers\DashboardAdmin\ExhibitorsController;
use PhpParser\Node\Stmt\TryCatch;
use Illuminate\Validation\ValidationException;

class Index extends Component
{
    use LivewireAlert;
    use WithPagination;
    use WithFileUploads;
    public $open = true;
    public $search = "";
    public $file;
    public $pathfile;

    public $name;
    public $last_name;
    public $prefix;
    public $phone;
    public $document;
    public $review;


    protected $rules = [
        'name' => 'required|min:2',
        'last_name' => 'required|min:2',
        'prefix' => 'required',
        'phone' => 'required|min:6',
        'review' => 'required|max:255',
        'document' => 'required|unique:exhibitors,document',

    ];
    protected $message = [
        'name.required' => 'The name field is required',

        'name.min' => 'The name field must be at least 2 characters',
        'last_name.required' => 'The last name field is required',
        'last_name.min' => 'The last name field must be at least 2 characters',
        'prefix.required' => 'The prefix field is required',
        'phone.required' => 'The phone field is required',
        'phone.min' => 'The phone field must be at least 6 characters',
        'document.required' => 'The document field is required',
        'document.unique' => 'The document field already exists',
        'file.required' => 'The file field is required',
        'file.mimes' => 'The file must be an image',
        'file.max' => 'The file must not weigh more than 25MB',
    ];


    public function save()
    {
        try {
            $this->validate();
            $exhibitor = new exhibitor();
            $exhibitor->name = $this->name;
            $exhibitor->last_name = $this->last_name;
            $exhibitor->prefix = $this->prefix;
            $exhibitor->phone = $this->phone;
            $exhibitor->document = $this->document;
            $exhibitor->review = $this->review;

            if ($this->file && $this->file->isValid()) {

                $this->file->storeAs('public/exhibitor', $this->document . '.' . $this->file->extension());
                $exhibitor->photo = 'exhibitor/' . $this->document . '.' . $this->file->extension();
            }

            $exhibitor->save();
            $this->reset('name', 'last_name', 'prefix', 'phone', 'document', 'review',  'file', 'pathfile');


            $this->flash('success', 'Exhibitor successfully created');
            return redirect()->route('exhibitor.index');
        } catch (ValidationException $e) {

            $validationErrors = $e->validator->errors()->all();

            $this->alert('error', implode('<br>', $validationErrors));
        }
    }

    public function render()
    {
        $exhibitors = exhibitor::where(function ($query) {
            $query->where('name', 'like', '%' . $this->search . '%')
                ->orWhere('last_name', 'like', '%' . $this->search . '%')
                ->orWhere('prefix', 'like', '%' . $this->search . '%');
        })->paginate(10);

        return view('livewire.dashboard-admin.exhibitor.index', compact('exhibitors'));
    }
}
