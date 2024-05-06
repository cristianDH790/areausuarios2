<?php

namespace App\Livewire\DashboardAdmin\Certificate\Module;

use App\Models\module;
use App\Models\service;
use Livewire\Component;
use App\Models\certificate;
use App\Models\sub_topic;
use App\Models\topic;
use App\Models\video;
use Illuminate\Http\Request;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Illuminate\Validation\ValidationException;
use PhpParser\Node\Expr\AssignOp\Mod;

class Edit extends Component
{

    use LivewireAlert;



    public certificate $certificate;
    public $modules;
    public $topics;
    public $sub_topics;

    public $title;
    public $order;
    public $title_topic;
    public $order_topic;
    public $title_subtopic;
    public $order_subtopic;

    public $title_video;
    public $url_video;
    public $description;





    public function mount($certificate)
    {
        $this->certificate = $certificate;
        $this->modules = Module::where('certificate_id', $certificate->id)
            ->with('topics.sub_topics') // Carga ansiosa de los temas y subtemas asociados a los módulos
            ->get();
    }
    public function add_module_video($id)
    {
        try {
            $this->validate([
                'title_video' => 'required',
                'url_video' => 'required',
                'description' => 'required',
            ]);

            $video = new video();
            $video->module_id = $id;
            $video->title = $this->title_video;
            $video->url = $this->url_video;
            $video->description = $this->description;
            $video->save();

            $this->flash('success', 'video added successfully!');
            return redirect()->route('certificate.module.edit', $this->certificate->id);
        } catch (ValidationException $e) {
            $validationErrors = $e->validator->errors()->all();
            $this->alert('error', implode('<br>', $validationErrors));
        }
    }
    public function delete_subtopic($id)
    {
        $subtopic = sub_topic::findOrFail($id);
        $subtopic->delete();
        $this->flash('success', 'sub Topic deleted successfully!');
        return redirect()->route('certificate.module.edit', $this->certificate->id);
    }
    public function delete_topic($id)
    {
        $topic = topic::findOrFail($id);
        $topic->delete();
        $this->flash('success', 'Topic deleted successfully!');
        return redirect()->route('certificate.module.edit', $this->certificate->id);
    }
    public function delete_module($id)
    {
        $module = Module::findOrFail($id);
        $module->delete();
        $this->flash('success', 'Module deleted successfully!');
        return redirect()->route('certificate.module.edit', $this->certificate->id);
    }
    public function edit_subtopic($id)
    {
        try {
            if (!empty($this->title_subtopic) || !empty($this->order_subtopic)) {
                // Si alguno de los campos no está vacío, validar y actualizar según corresponda


                // Crear una nueva instancia del módulo
                $subtopic = sub_topic::findOrFail($id);
                $bool1 = false;
                $bool2 = false;
                // Actualizar el título si no está vacío
                if (!empty($this->title_subtopic)) {

                    $subtopic->title = $this->title_subtopic;
                    $bool1 = true;
                }

                // Actualizar el orden si no está vacío
                if (!empty($this->order_subtopic)) {
                    $this->validate([
                        'order_subtopic' => 'integer',
                    ]);
                    $subtopic->order = $this->order_subtopic;
                    $bool2 = true;
                }
                if ($bool1 == true) {
                    $this->flash('success', 'sub Topic title updated successfully!');
                }
                if ($bool2 == true) {
                    $this->flash('success', 'sub Topic order updated successfully!');
                }
                if ($bool1 && $bool2) {
                    $this->flash('success', 'sub Topic updated successfully!');
                }

                //$subtopic->save();
            } else {
                // Si ambos campos están vacíos, mostrar mensaje de que no se editaron campos vacíos
                $this->flash('warning', 'sub Topic not updated, empty fields!');
            }


            return redirect()->route('certificate.module.edit', $this->certificate->id);
        } catch (ValidationException $e) {
            // Capturar errores de validación
            $validationErrors = $e->validator->errors()->all();
            $this->alert('error', implode('<br>', $validationErrors));
        }
    }
    public function edit_topic($id)
    {
        try {
            if (!empty($this->title_topic) || !empty($this->order_topic)) {
                // Si alguno de los campos no está vacío, validar y actualizar según corresponda


                // Crear una nueva instancia del módulo
                $topic = topic::findOrFail($id);
                $bool1 = false;
                $bool2 = false;
                // Actualizar el título si no está vacío
                if (!empty($this->title)) {

                    $topic->title = $this->title_topic;
                    $bool1 = true;
                }

                // Actualizar el orden si no está vacío
                if (!empty($this->order)) {
                    $this->validate([
                        'order_topic' => 'integer',
                    ]);
                    $topic->order = $this->order_topic;
                    $bool2 = true;
                }
                if ($bool1 == true) {
                    $this->flash('success', 'Topic title updated successfully!');
                }
                if ($bool2 == true) {
                    $this->flash('success', 'Topic order updated successfully!');
                }
                if ($bool1 && $bool2) {
                    $this->flash('success', 'Topic updated successfully!');
                }

                $topic->save();
            } else {
                // Si ambos campos están vacíos, mostrar mensaje de que no se editaron campos vacíos
                $this->flash('warning', 'Topic not updated, empty fields!');
            }


            return redirect()->route('certificate.module.edit', $this->certificate->id);
        } catch (ValidationException $e) {
            // Capturar errores de validación
            $validationErrors = $e->validator->errors()->all();
            $this->alert('error', implode('<br>', $validationErrors));
        }
    }
    public function edit_module($id)
    {
        try {
            if (!empty($this->title) || !empty($this->order)) {
                // Si alguno de los campos no está vacío, validar y actualizar según corresponda


                // Crear una nueva instancia del módulo
                $module = Module::findOrFail($id);
                $bool1 = false;
                $bool2 = false;
                // Actualizar el título si no está vacío
                if (!empty($this->title)) {

                    $module->title = $this->title;
                    $bool1 = true;
                }

                // Actualizar el orden si no está vacío
                if (!empty($this->order)) {
                    $this->validate([
                        'order' => 'integer',
                    ]);
                    $module->order = $this->order;
                    $bool2 = true;
                }
                if ($bool1 == true) {
                    $this->flash('success', 'Module title updated successfully!');
                }
                if ($bool2 == true) {
                    $this->flash('success', 'Module order updated successfully!');
                }
                if ($bool1 && $bool2) {
                    $this->flash('success', 'Module updated successfully!');
                }

                $module->save();
            } else {
                // Si ambos campos están vacíos, mostrar mensaje de que no se editaron campos vacíos
                $this->flash('warning', 'Module not updated, empty fields!');
            }


            return redirect()->route('certificate.module.edit', $this->certificate->id);
        } catch (ValidationException $e) {
            // Capturar errores de validación
            $validationErrors = $e->validator->errors()->all();
            $this->alert('error', implode('<br>', $validationErrors));
        }
    }

    public function save_subtopic($topic_id)
    {
        try {
            $this->validate([
                'order_subtopic' => 'required|integer',
                'title_subtopic' => 'required',
            ]);

            $subtopic = new sub_topic();
            $subtopic->title = $this->title_subtopic;
            $subtopic->order = $this->order_subtopic;
            $subtopic->topic_id = $topic_id;
            $subtopic->save();

            $this->flash('success', 'sub topic added successfully!');
            return redirect()->route('certificate.module.edit', $this->certificate->id);
        } catch (ValidationException $e) {
            $validationErrors = $e->validator->errors()->all();
            $this->alert('error', implode('<br>', $validationErrors));
        }
    }
    public function save_topic($module_id)
    {
        try {
            $this->validate([
                'order_topic' => 'required|integer',
                'title_topic' => 'required',
            ]);

            $topic = new topic();
            $topic->title = $this->title_topic;
            $topic->order = $this->order_topic;
            $topic->module_id = $module_id;
            $topic->save();

            $this->flash('success', 'Topic added successfully!');
            return redirect()->route('certificate.module.edit', $this->certificate->id);
        } catch (ValidationException $e) {
            $validationErrors = $e->validator->errors()->all();
            $this->alert('error', implode('<br>', $validationErrors));
        }
    }

    public function save_module()
    {
        try {
            $this->validate([
                'title' => 'required',
                'order' => 'required|integer',
            ]);

            $module = new module();
            $module->title = $this->title;
            $module->order = $this->order;
            $module->certificate_id = $this->certificate->id;
            $module->save();

            $this->flash('success', 'Module added successfully!');
            return redirect()->route('certificate.module.edit', $this->certificate->id);
        } catch (ValidationException $e) {
            $validationErrors = $e->validator->errors()->all();
            $this->alert('error', implode('<br>', $validationErrors));
        }
    }

    public function render()
    {
        return view('livewire.dashboard-admin.certificate.module.edit');
    }
}
