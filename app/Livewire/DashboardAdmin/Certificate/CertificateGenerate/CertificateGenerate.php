<?php

namespace App\Livewire\DashboardAdmin\Certificate\CertificateGenerate;

use Livewire\Component;
use App\Models\certificate;
use Intervention\Image\ImageManager;
use App\Models\DatosConfigCertificate;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class CertificateGenerate extends Component
{

    use LivewireAlert;
    public $key = 'Encabezado_F';
    public $value_A_1;
    public $x_A_1;
    public $y_A_1;
    public $align_A_1;
    public $type_typography_A_1;
    public $font_size_A_1;
    public $painting_A_1 = false;

    public $texto;

    public $certificate_front;
    public certificate $certificate;
    protected $rules = [
        'value_A_1' => 'nullable',
        'x_A_1' => 'nullable',
        'y_A_1' => 'nullable',
        'align_A_1' => 'nullable',
        'type_typography_A_1' => 'nullable',
        'font_size_A_1' => 'nullable|numeric|',
    ];
    public function mount()
    {
    }

    public function GenerarCertificado()
    {

        // create new image instance
        $image = ImageManager::gd()->read('storage/certificates/' . $this->certificate->photo_front);

        $image->text($this->texto, 500, 500, function ($font) {
            $font->file('path/to/font.ttf');
            $font->size(500);
            $font->color('#0000ff');
            $font->align('center');
        });

        $path = 'storage/prueba/' . $this->certificate->photo_front;
        $image->save($path);
        $this->certificate_front = $path;
    }
    public function save_Encabezado_F()
    {/*
        $encabezadoExistente = DatosConfigCertificate::where('certificate_id', $this->certificate->id)->first();
        $this->validate();

        $encabezado = new DatosConfigCertificate();
        $encabezado->certificate_id = $this->certificate->id;
        $encabezado->key = $this->key;
        $encabezado->value = $this->value_A_1;
        $encabezado->x = $this->x_A_1;
        $encabezado->y = $this->y_A_1;
        $encabezado->align = $this->align_A_1;
        $encabezado->type_typography = $this->type_typography_A_1;
        $encabezado->font_size = $this->font_size_A_1;
        $encabezado->painting = $this->painting_A_1;
        $encabezado->save();
        $this->alert('success', 'Encabezado saved successfully');
        $this->GenerarCertificado($encabezado);*/
    }

    public function render()
    {
        return view('livewire.dashboard-admin.certificate.certificate-generate.certificate-generate');
    }
}