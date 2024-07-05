<?php

namespace App\Livewire\DashboardAdmin\Certificate\CertificateGenerate;

use Parsedown;
use Carbon\Carbon;
use Livewire\Component;
use Barryvdh\DomPDF\Facade\Pdf;

use App\Models\certificate;

use Intervention\Image\Facades\Image;
use App\Models\DatosConfigCertificate;
use Jantinnerezo\LivewireAlert\LivewireAlert;



class CertificateGenerate extends Component
{

    use LivewireAlert;

    public $value_A_1;
    public $x_A_1;
    public $y_A_1;
    public $align_A_1;
    public $type_typography_A_1;

    public $font_size_A_1;
    public $painting_A_1 = false;

    public $value_A_2;
    public $x_A_2;
    public $y_A_2;
    public $align_A_2;
    public $type_typography_A_2;
    public $font_size_A_2;
    public $painting_A_2 = false;

    public $value_A_3;
    public $x_A_3;
    public $y_A_3;
    public $align_A_3;
    public $type_typography_A_3;
    public $font_size_A_3;
    public $painting_A_3 = false;

    public $value_A_4;
    public $x_A_4;
    public $y_A_4;
    public $align_A_4;
    public $type_typography_A_4;
    public $type_typography2_A_4;
    public $font_size_A_4;
    public $painting_A_4 = false;

    public $value_A_5;
    public $x_A_5;
    public $y_A_5;
    public $align_A_5;
    public $type_typography_A_5;
    public $font_size_A_5;
    public $painting_A_5 = false;

    public $value_A_6;
    public $x_A_6;
    public $y_A_6;
    public $align_A_6;
    public $type_typography_A_6;
    public $font_size_A_6;
    public $painting_A_6 = false;


    public $value_A_7;
    public $x_A_7;
    public $y_A_7;
    public $align_A_7;
    public $type_typography_A_7;
    public $font_size_A_7;
    public $painting_A_7 = false;

    public $texto;

    public $certificate_front;
    public certificate $certificate;

    public function GenerarCertificado2()
    {
    }
    public  function GenerarCertificado()
    {

        $img = Image::make('storage/' . $this->certificate->photo_front);
        $img2 = Image::make('storage/' . $this->certificate->photo_back);
        $value_A_1 = DatosConfigCertificate::where('certificate_id', $this->certificate->id)->where('key', 'A_1')->first();

        // Obtener el texto y configuración A_1
        $tipoletra = $value_A_1->type_typography;
        $text = $value_A_1->value;
        $align = $value_A_1->align;
        $fontPath = public_path('fonts/' . $tipoletra . '.ttf'); // Ruta de la fuente
        $fontSize = $value_A_1->font_size; // Tamaño del texto
        if ($value_A_1->painting) {
            $textColor = '#FC8787'; // Color del texto
        } else {
            $textColor = '#202020'; // Color del texto
        }


        // Coordenadas iniciales para el rectángulo
        $x = $value_A_1->x; // Coordenada X del rectángulo
        $y = $value_A_1->y; // Coordenada Y del rectángulo

        // Añadir el texto con ajuste de línea automático
        $wrappedText = wordwrap($text, 100, "\n", true);


        // Añadir texto a la imagen
        $img->text($wrappedText, $x, $y + 50, function ($font) use ($fontPath, $fontSize, $textColor, $align) {
            $font->file($fontPath);
            $font->size($fontSize);
            $font->color($textColor);
            $font->align($align);
            $font->valign('middle');
        });




        // Certificado
        $value_A_2 = DatosConfigCertificate::where('certificate_id', $this->certificate->id)->where('key', 'A_2')->first();

        // Obtener el texto y configuración A_2
        $tipoletra = $value_A_2->type_typography;
        $text = $value_A_2->value;
        $align = $value_A_2->align;
        $fontPath = public_path('fonts/' . $tipoletra . '.ttf'); // Ruta de la fuente
        $fontSize = $value_A_2->font_size; // Tamaño del texto
        if ($value_A_2->painting) {
            $textColor = '#B7FC87'; // Color del texto
        } else {
            $textColor = '#202020'; // Color del texto
        }


        // Coordenadas iniciales para el rectángulo
        $x = $value_A_2->x; // Coordenada X del rectángulo
        $y = $value_A_2->y; // Coordenada Y del rectángulo

        // Añadir el texto con ajuste de línea automático
        $wrappedText = wordwrap($text, 100, "\n", true);


        // Añadir texto a la imagen
        $img->text($wrappedText, $x, $y + 50, function ($font) use ($fontPath, $fontSize, $textColor, $align) {
            $font->file($fontPath);
            $font->size($fontSize);
            $font->color($textColor);
            $font->align($align);
            $font->valign('middle');
        });

        //Reconocimiento para:
        $value_A_3 = DatosConfigCertificate::where('certificate_id', $this->certificate->id)->where('key', 'A_3')->first();

        // Obtener el texto y configuración A_2
        $tipoletra = $value_A_3->type_typography;
        $text = $value_A_3->value;
        $align = $value_A_3->align;
        $fontPath = public_path('fonts/' . $tipoletra . '.ttf'); // Ruta de la fuente
        $fontSize = $value_A_3->font_size; // Tamaño del texto
        if ($value_A_3->painting) {
            $textColor = '#87EAFC'; // Color del texto
        } else {
            $textColor = '#202020'; // Color del texto
        }


        // Coordenadas iniciales para el rectángulo
        $x = $value_A_3->x; // Coordenada X del rectángulo
        $y = $value_A_3->y; // Coordenada Y del rectángulo

        // Añadir el texto con ajuste de línea automático
        $wrappedText = wordwrap($text, 100, "\n", true);


        // Añadir texto a la imagen
        $img->text($wrappedText, $x, $y + 50, function ($font) use ($fontPath, $fontSize, $textColor, $align) {
            $font->file($fontPath);
            $font->size($fontSize);
            $font->color($textColor);
            $font->align($align);
            $font->valign('middle');
        });

        //NOMBRE CURSO
        $value_A_7 = DatosConfigCertificate::where('certificate_id', $this->certificate->id)->where('key', 'A_7')->first();

        // Obtener el texto y configuración A_7
        $tipoletra = $value_A_7->type_typography;
        $text = $value_A_7->value;
        $align = $value_A_7->align;
        $fontPath = public_path('fonts/' . $tipoletra . '.ttf'); // Ruta de la fuente
        $fontSize = $value_A_7->font_size; // Tamaño del texto
        if ($value_A_7->painting) {
            $textColor = '#87EAFC'; // Color del texto
        } else {
            $textColor = '#202020'; // Color del texto
        }


        // Coordenadas iniciales para el rectángulo
        $x = $value_A_7->x; // Coordenada X del rectángulo
        $y = $value_A_7->y; // Coordenada Y del rectángulo

        // Añadir el texto con ajuste de línea automático
        $wrappedText = wordwrap($text, 100, "\n", true);
        //linea 1
        // Obtener dimensiones del texto
        $textBoundingBox = imagettfbbox($fontSize, 0, $fontPath, $wrappedText);
        $textWidth = $textBoundingBox[2] - $textBoundingBox[0];
        $textHeight = $textBoundingBox[1] - $textBoundingBox[7];

        // Calcular la posición del texto centrado horizontalmente
        $textX = $x;
        if ($align === 'center') {
            $textX = $x - ($textWidth / 2);
        } elseif ($align === 'right') {
            $textX = $x - $textWidth;
        }
        $textY = $y + ($textHeight / 2); // Ajusta según lo necesites


        // Añadir texto a la imagen
        $img->text($wrappedText, $x, $y + 50, function ($font) use ($fontPath, $fontSize, $textColor, $align) {
            $font->file($fontPath);
            $font->size($fontSize);
            $font->color($textColor);
            $font->align($align);
            $font->valign('middle');
        });


        // Dibujar el rectángulo debajo del texto
        $rectangleX1 = $textX;
        $rectangleY1 = $textY + $textHeight + 5; // 5 píxeles de margen debajo del texto
        $rectangleX2 = $rectangleX1 + $textWidth;
        $rectangleY2 = $rectangleY1 + 1; // Grosor de la línea del rectángulo

        $img->rectangle($rectangleX1, $rectangleY1, $rectangleX2, $rectangleY2, function ($draw) {
            $draw->background('#202020'); // Color de fondo del rectángulo
        });

        //Descripcion del curso
        $value_A_4 = DatosConfigCertificate::where('certificate_id', $this->certificate->id)->where('key', 'A_4')->first();

        // Obtener el texto y configuración A_2
        $tipoletra = $value_A_4->type_typography;
        $text = $value_A_4->value;
        $align = $value_A_4->align;
        $fontPath = public_path('fonts/' . $tipoletra . '.ttf'); // Ruta de la fuente
        $fontSize = $value_A_4->font_size; // Tamaño del texto
        if ($value_A_4->painting) {
            $textColor = '#87EAFC'; // Color del texto
        } else {
            $textColor = '#202020'; // Color del texto
        }


        // Coordenadas iniciales para el rectángulo
        $x = $value_A_4->x; // Coordenada X del rectángulo
        $y = $value_A_4->y; // Coordenada Y del rectángulo

        // Añadir el texto con ajuste de línea automático
        $wrappedText = wordwrap($text, 100, "\n", true);


        // Añadir texto a la imagen
        $img->text($wrappedText, $x, $y + 50, function ($font) use ($fontPath, $fontSize, $textColor, $align) {
            $font->file($fontPath);
            $font->size($fontSize);
            $font->color($textColor);
            $font->align($align);
            $font->valign('middle');
        });






        $img->save('storage/prueba/certificate_front2.png');
        $this->alert('success', 'Certificado Generado Correctamente');
    }
    public function mount()
    {
        $A_1 = DatosConfigCertificate::where('certificate_id', $this->certificate->id)->where('key', 'A_1')->first();
        $A_2 = DatosConfigCertificate::where('certificate_id', $this->certificate->id)->where('key', 'A_2')->first();
        $A_3 = DatosConfigCertificate::where('certificate_id', $this->certificate->id)->where('key', 'A_3')->first();
        $A_4 = DatosConfigCertificate::where('certificate_id', $this->certificate->id)->where('key', 'A_4')->first();
        $A_5 = DatosConfigCertificate::where('certificate_id', $this->certificate->id)->where('key', 'A_5')->first();
        $A_6 = DatosConfigCertificate::where('certificate_id', $this->certificate->id)->where('key', 'A_6')->first();
        $A_7 = DatosConfigCertificate::where('certificate_id', $this->certificate->id)->where('key', 'A_7')->first();

        $this->value_A_1 = $A_1->value ?? 'EL CENTRO DE CAPACITACIONES OBSTETRICA Y CAPACITACIONES 
        PROFESIONALES AL DIA SAC, OTORGAN EL PRESENTE:';
        $this->x_A_1 = $A_1->x ?? '1000';
        $this->y_A_1 = $A_1->y ?? '200';

        $this->align_A_1 = $A_1->align ?? 'center';
        $this->type_typography_A_1 = $A_1->type_typography ?? 'ARIALBD';
        $this->font_size_A_1 = $A_1->font_size ?? '27';
        if ($A_1 == null) {
            $this->painting_A_1 = false;
        } else {
            if ($A_1->painting == 0) {
                $this->painting_A_1 = false;
            } else {
                $this->painting_A_1 = true;
            }
        }


        $this->value_A_2 = $A_2->value ?? $this->certificate->type_certificate->name;
        $this->x_A_2 = $A_2->x ?? '1000';
        $this->y_A_2 = $A_2->y ?? '280';
        $this->align_A_2 = $A_2->align ?? 'center';
        $this->type_typography_A_2 = $A_2->type_typography ?? 'ARIALBD';
        $this->font_size_A_2 = $A_2->font_size ?? '105';
        if ($A_2 == null) {
            $this->painting_A_2 = false;
        } else {
            if ($A_2->painting == 0) {
                $this->painting_A_2 = false;
            } else {
                $this->painting_A_2 = true;
            }
        }

        $this->value_A_3 = $A_3->value ?? 'RECONOCIMIENTO PARA:';
        $this->x_A_3 = $A_3->x ?? '1000';
        $this->y_A_3 = $A_3->y ?? '350';
        $this->align_A_3 = $A_3->align ?? 'center';
        $this->type_typography_A_3 = $A_3->type_typography ?? 'ARIALBD';
        $this->font_size_A_3 = $A_3->font_size ?? '27';
        if ($A_3 == null) {
            $this->painting_A_3 = false;
        } else {
            if ($A_3->painting == 0) {
                $this->painting_A_3 = false;
            } else {
                $this->painting_A_3 = true;
            }
        }

        $this->value_A_4 = $A_4->value ?? 'por haber Participado en el curso de "' . strtoupper($this->certificate->service->name) . '" .Evento desarrollado del ' . strtoupper($this->formatDate($this->certificate->service->start_date)) . ' al ' . strtoupper($this->formatDate($this->certificate->service->end_date)) . ', con una duracion de ' . strtoupper($this->certificate->service->hours) . '.';
        $this->x_A_4 = $A_4->x ?? '';
        $this->y_A_4 = $A_4->y ?? '';
        $this->align_A_4 = $A_4->align ?? '';
        $this->type_typography_A_4 = $A_4->type_typography ?? '';
        $this->font_size_A_4 = $A_4->font_size ?? '';
        if ($A_4 == null) {
            $this->painting_A_4 = false;
        } else {
            if ($A_4->painting == 0) {
                $this->painting_A_4 = false;
            } else {
                $this->painting_A_4 = true;
            }
        }


        $fecha = $this->formatDate($this->certificate->service->end_date);

        $this->value_A_5 = $A_5->value ?? $fecha;
        $this->x_A_5 = $A_5->x ?? '';
        $this->y_A_5 = $A_5->y ?? '';
        $this->align_A_5 = $A_5->align ?? '';
        $this->type_typography_A_5 = $A_5->type_typography ?? '';
        $this->font_size_A_5 = $A_5->font_size ?? '';
        if ($A_5 == null) {
            $this->painting_A_5 = false;
        } else {
            if ($A_5->painting == 0) {
                $this->painting_A_5 = false;
            } else {
                $this->painting_A_5 = true;
            }
        }

        $this->value_A_6 = $A_6->value ?? '';
        $this->x_A_6 = $A_6->x ?? '';
        $this->y_A_6 = $A_6->y ?? '';
        $this->align_A_6 = $A_6->align ?? '';
        $this->type_typography_A_6 = $A_6->type_typography ?? '';
        $this->font_size_A_6 = $A_6->font_size ?? '';
        if ($A_6 == null) {
            $this->painting_A_6 = false;
        } else {
            if ($A_6->painting == 0) {
                $this->painting_A_6 = false;
            } else {
                $this->painting_A_6 = true;
            }
        }


        $this->value_A_7 = $A_7->value ?? 'LUIS CRISTIAN DE LA CRUZ HUARANCCA';
        $this->x_A_7 = $A_7->x ?? '1000';
        $this->y_A_7 = $A_7->y ?? '400';
        $this->align_A_7 = $A_7->align ?? 'center';
        $this->type_typography_A_7 = $A_7->type_typography ?? 'ARIALBD';
        $this->font_size_A_7 = $A_7->font_size ?? '50';
        if ($A_7 == null) {
            $this->painting_A_7 = false;
        } else {
            if ($A_7->painting == 0) {
                $this->painting_A_7 = false;
            } else {
                $this->painting_A_7 = true;
            }
        }
    }
    public function formatDate($date)
    {
        return Carbon::parse($date)->locale('es')->translatedFormat('d \d\e F \d\e\l Y');
    }
    public function saveCertificateFrontA1()
    {
        $this->validate([
            'value_A_1' => 'required',
            'x_A_1' => 'required',
            'y_A_1' => 'required',
            'align_A_1' => 'required',
            'type_typography_A_1' => 'required',
            'font_size_A_1' => 'required',

        ]);
        if (DatosConfigCertificate::where('certificate_id', $this->certificate->id)->where('key', 'A_1')->first()) {
            $A1 = DatosConfigCertificate::where('certificate_id', $this->certificate->id)->where('key', 'A_1')->first();
            $A1->value = $this->value_A_1;
            $A1->x = $this->x_A_1;
            $A1->y = $this->y_A_1;
            $A1->align = $this->align_A_1;

            $A1->type_typography = $this->type_typography_A_1;
            $A1->font_size = $this->font_size_A_1;
            $A1->painting = $this->painting_A_1;
            $A1->update();
            $this->alert('success', 'A_1 Actualizado Correctamente');
        } else {
            $A1 = new DatosConfigCertificate();
            $A1->certificate_id = $this->certificate->id;
            $A1->key = "A_1";
            $A1->value = $this->value_A_1;
            $A1->x = $this->x_A_1;
            $A1->y = $this->y_A_1;

            $A1->align = $this->align_A_1;
            $A1->type_typography = $this->type_typography_A_1;
            $A1->font_size = $this->font_size_A_1;
            $A1->painting = $this->painting_A_1;
            $A1->save();

            $this->alert('success', 'A_1 Guardado Correctamente');
        }
    }
    public function saveCertificateFrontA6()
    {
        $this->validate([
            'value_A_6' => 'required',
            'x_A_6' => 'required',
            'y_A_6' => 'required',
            'align_A_6' => 'required',
            'type_typography_A_6' => 'required',
            'font_size_A_6' => 'required',
        ]);
        if (DatosConfigCertificate::where('certificate_id', $this->certificate->id)->where('key', 'A_6')->first()) {
            $A6 = DatosConfigCertificate::where('certificate_id', $this->certificate->id)->where('key', 'A_6')->first();
            $A6->certificate_id = $this->certificate->id;
            $A6->key = "A_6";
            $A6->value = $this->value_A_6;
            $A6->x = $this->x_A_6;
            $A6->y = $this->y_A_6;
            $A6->align = $this->align_A_6;
            $A6->type_typography = $this->type_typography_A_6;
            $A6->font_size = $this->font_size_A_6;
            $A6->painting = $this->painting_A_6;
            $A6->save();

            $this->alert('success', 'A_6 Actualizado Correctamente');
        } else {
            $A6 = new DatosConfigCertificate();
            $A6->certificate_id = $this->certificate->id;
            $A6->key = "A_6";
            $A6->value = $this->value_A_6;
            $A6->x = $this->x_A_6;
            $A6->y = $this->y_A_6;
            $A6->align = $this->align_A_6;
            $A6->type_typography = $this->type_typography_A_6;
            $A6->font_size = $this->font_size_A_6;
            $A6->painting = $this->painting_A_6;
            $A6->save();

            $this->alert('success', 'A_6 Guardado Correctamente');
        }
    }
    public function saveCertificateFrontA2()
    {
        $this->validate([
            'value_A_2' => 'required',
            'x_A_2' => 'required',
            'y_A_2' => 'required',
            'align_A_2' => 'required',
            'type_typography_A_2' => 'required',
            'font_size_A_2' => 'required',
        ]);
        if (DatosConfigCertificate::where('certificate_id', $this->certificate->id)->where('key', 'A_2')->first()) {
            $A2 = DatosConfigCertificate::where('certificate_id', $this->certificate->id)->where('key', 'A_2')->first();
            $A2->certificate_id = $this->certificate->id;
            $A2->key = "A_2";
            $A2->value = $this->value_A_2;
            $A2->x = $this->x_A_2;
            $A2->y = $this->y_A_2;
            $A2->align = $this->align_A_2;
            $A2->type_typography = $this->type_typography_A_2;
            $A2->font_size = $this->font_size_A_2;
            $A2->painting = $this->painting_A_2;
            $A2->save();

            $this->alert('success', 'A_2 Actualizado Correctamente');
        } else {
            $A2 = new DatosConfigCertificate();
            $A2->certificate_id = $this->certificate->id;
            $A2->key = "A_2";
            $A2->value = $this->value_A_2;
            $A2->x = $this->x_A_2;
            $A2->y = $this->y_A_2;
            $A2->align = $this->align_A_2;
            $A2->type_typography = $this->type_typography_A_2;
            $A2->font_size = $this->font_size_A_2;
            $A2->painting = $this->painting_A_2;
            $A2->save();

            $this->alert('success', 'A_2 Guardado Correctamente');
        }
    }
    public function saveCertificateFrontA3()
    {
        $this->validate([
            'value_A_3' => 'required',
            'x_A_3' => 'required',
            'y_A_3' => 'required',
            'align_A_3' => 'required',
            'type_typography_A_3' => 'required',
            'font_size_A_3' => 'required',
        ]);
        if (DatosConfigCertificate::where('certificate_id', $this->certificate->id)->where('key', 'A_3')->first()) {
            $A3 = DatosConfigCertificate::where('certificate_id', $this->certificate->id)->where('key', 'A_3')->first();
            $A3->certificate_id = $this->certificate->id;
            $A3->key = "A_3";
            $A3->value = $this->value_A_3;
            $A3->x = $this->x_A_3;
            $A3->y = $this->y_A_3;
            $A3->align = $this->align_A_3;
            $A3->type_typography = $this->type_typography_A_3;
            $A3->font_size = $this->font_size_A_3;
            $A3->painting = $this->painting_A_3;
            $A3->save();

            $this->alert('success', 'A_3 Actualizado Correctamente');
        } else {
            $A3 = new DatosConfigCertificate();
            $A3->certificate_id = $this->certificate->id;
            $A3->key = "A_3";
            $A3->value = $this->value_A_3;
            $A3->x = $this->x_A_3;
            $A3->y = $this->y_A_3;
            $A3->align = $this->align_A_3;
            $A3->type_typography = $this->type_typography_A_3;
            $A3->font_size = $this->font_size_A_3;
            $A3->painting = $this->painting_A_3;
            $A3->save();

            $this->alert('success', 'A_3 Guardado Correctamente');
        }
    }
    public function saveCertificateFrontA4()
    {
        $this->validate([
            'value_A_4' => 'required',
            'x_A_4' => 'required',
            'y_A_4' => 'required',
            'align_A_4' => 'required',
            'type_typography_A_4' => 'required',
            'type_typography2_A_4' => 'required',
            'font_size_A_4' => 'required',
        ]);
        if (DatosConfigCertificate::where('certificate_id', $this->certificate->id)->where('key', 'A_4')->first()) {
            $A4 = DatosConfigCertificate::where('certificate_id', $this->certificate->id)->where('key', 'A_4')->first();
            $A4->certificate_id = $this->certificate->id;
            $A4->key = "A_4";

            //$parsedown = new Parsedown();
            //$A4->value = $parsedown->text($this->value_A_4);

            $A4->value = $this->value_A_4;
            $A4->x = $this->x_A_4;
            $A4->y = $this->y_A_4;
            $A4->align = $this->align_A_4;
            $A4->type_typography = $this->type_typography_A_4;
            $A4->type_typography2 = $this->type_typography2_A_4;
            $A4->font_size = $this->font_size_A_4;
            $A4->painting = $this->painting_A_4;
            $A4->save();

            $this->alert('success', 'A_4 Actualizado Correctamente');
        } else {
            $A4 = new DatosConfigCertificate();
            $A4->certificate_id = $this->certificate->id;
            $A4->key = "A_4";
            $parsedown = new Parsedown();
            $A4->value = $parsedown->text($this->value_A_4);
            $A4->value = $this->value_A_4;
            $A4->x = $this->x_A_4;
            $A4->y = $this->y_A_4;
            $A4->align = $this->align_A_4;
            $A4->type_typography = $this->type_typography_A_4;
            $A4->type_typography2 = $this->type_typography2_A_4;
            $A4->font_size = $this->font_size_A_4;
            $A4->painting = $this->painting_A_4;
            $A4->save();

            $this->alert('success', 'A_4 Guardado Correctamente');
        }
    }
    public function saveCertificateFrontA5()
    {
        $this->validate([
            'value_A_5' => 'required',
            'x_A_5' => 'required',
            'y_A_5' => 'required',
            'align_A_5' => 'required',
            'type_typography_A_5' => 'required',
            'font_size_A_5' => 'required',
        ]);
        if (DatosConfigCertificate::where('certificate_id', $this->certificate->id)->where('key', 'A_5')->first()) {
            $A5 = DatosConfigCertificate::where('certificate_id', $this->certificate->id)->where('key', 'A_5')->first();
            $A5->certificate_id = $this->certificate->id;
            $A5->key = "A_5";
            $A5->value = $this->value_A_5;
            $A5->x = $this->x_A_5;
            $A5->y = $this->y_A_5;
            $A5->align = $this->align_A_5;
            $A5->type_typography = $this->type_typography_A_5;
            $A5->font_size = $this->font_size_A_5;
            $A5->painting = $this->painting_A_5;
            $A5->save();

            $this->alert('success', 'A_5  Actualizado Correctamente');
        } else {
            $A5 = new DatosConfigCertificate();
            $A5->certificate_id = $this->certificate->id;
            $A5->key = "A_5";
            $A5->value = $this->value_A_5;
            $A5->x = $this->x_A_5;
            $A5->y = $this->y_A_5;
            $A5->align = $this->align_A_5;
            $A5->type_typography = $this->type_typography_A_5;
            $A5->font_size = $this->font_size_A_5;
            $A5->painting = $this->painting_A_5;
            $A5->save();

            $this->alert('success', 'A_5 Guardado Correctamente');
        }
    }
    public function saveCertificateFrontA7()
    {
        $this->validate([
            'value_A_7' => 'required',
            'x_A_7' => 'required',
            'y_A_7' => 'required',
            'align_A_7' => 'required',
            'type_typography_A_7' => 'required',
            'font_size_A_7' => 'required',
        ]);
        if (DatosConfigCertificate::where('certificate_id', $this->certificate->id)->where('key', 'A_7')->first()) {
            $A7 = DatosConfigCertificate::where('certificate_id', $this->certificate->id)->where('key', 'A_7')->first();
            $A7->certificate_id = $this->certificate->id;
            $A7->key = "A_7";
            $A7->value = $this->value_A_7;
            $A7->x = $this->x_A_7;
            $A7->y = $this->y_A_7;
            $A7->align = $this->align_A_7;
            $A7->type_typography = $this->type_typography_A_7;
            $A7->font_size = $this->font_size_A_7;
            $A7->painting = $this->painting_A_7;
            $A7->save();

            $this->alert('success', 'A_7  Actualizado Correctamente');
        } else {
            $A7 = new DatosConfigCertificate();
            $A7->certificate_id = $this->certificate->id;
            $A7->key = "A_7";
            $A7->value = $this->value_A_7;
            $A7->x = $this->x_A_7;
            $A7->y = $this->y_A_7;
            $A7->align = $this->align_A_7;
            $A7->type_typography = $this->type_typography_A_7;
            $A7->font_size = $this->font_size_A_7;
            $A7->painting = $this->painting_A_7;
            $A7->save();

            $this->alert('success', 'A_7 Guardado Correctamente');
        }
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
