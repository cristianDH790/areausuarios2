<?php

namespace App\Livewire\DashboardAdmin\Certificate\Module;

use App\Models\module;
use Livewire\Component;
use App\Models\certificate;
use App\Models\material;
use App\Models\video;
use Illuminate\Validation\ValidationException;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Edit extends Component
{
    use LivewireAlert;
    public $certificate;
    public $module;
    public $order;
    public $title;
    public $materials;

    public $title_material;
    public $url_material;
    public $description_material;

    public $title_video;
    public $url_video;
    public $description_video;

    public $audio;


    public $video;


    public function mount($certificate, $module)
    {
        $this->certificate = $certificate;
        $this->module = $module;
        $this->materials = material::where('module_id', $module->id)->get();
        $this->order = $module->order;
        $this->title = $module->title;

        $this->video = video::where('module_id', $this->module->id)->first();
        if ($this->video == null) {
            $this->title_video = '';
            $this->url_video = '';
            $this->description_video = '';

            $this->audio = '';

        } else {
            $this->title_video = $this->video->title;
            $this->url_video = $this->video->url;
            $this->description_video = $this->video->description;

            $this->audio = $this->video->audio;

        }
    }
    public function edit_module_video()
    {
        $this->validate([
            'title_video' => 'required|string',
            'url_video' => 'required',
            'description_video' => 'max:255',
        ]);
        $this->video = video::where('module_id', $this->module->id)->first();
        if ($this->video == null) {
            $new_video = new video();
            $new_video->module_id = $this->module->id;
            $new_video->title = $this->title_video;
            $new_video->url = $this->url_video;

            $new_video->audio = $this->audio;


            $new_video->description = $this->description_video;
            $new_video->save();
        } else {
            $this->video->title = $this->title_video;
            $this->video->url = $this->url_video;
            $this->video->description = $this->description_video;
            $this->video->audio = $this->audio;

            $this->video->update();
        }
        $this->reset('title_video', 'url_video', 'description_video');

        $this->flash('success', 'Video guardado correctamente');

        return redirect()->route('certificate.module.edit', [$this->certificate, $this->module]);
    }
    public function edit_module()
    {
        $this->validate([
            'order' => 'required|integer',
            'title' => 'required|string',
        ]);

        $this->module->order = $this->order;
        $this->module->title = $this->title;
        $this->module->update();
        $this->alert('success', 'Module updated successfully');
    }
    public function save_materials()
    {
        $this->validate([
            'title_material' => 'required|string',
            'url_material' => 'required|string',
            'description_material' => 'required|string',
        ]);

        $material = new material();
        $material->module_id = $this->module->id;
        $material->title = $this->title_material;
        $material->url = $this->url_material;
        $material->description = $this->description_material;

        $material->save();
        $this->reset('title_material', 'url_material', 'description_material');

        $this->flash('success', 'Materials saved successfully');

        return redirect()->route('certificate.module.edit', [$this->certificate, $this->module]);
    }
    public function delete_material($id)
    {
        $materiald = material::where('id', $id)->firstOrFail();
        $materiald->delete();
        $this->flash('success', 'Material deleted successfully');

        return redirect()->route('certificate.module.edit', [$this->certificate, $this->module]);
    }

    public function render()
    {
        return view('livewire.dashboard-admin.certificate.module.edit');
    }
}