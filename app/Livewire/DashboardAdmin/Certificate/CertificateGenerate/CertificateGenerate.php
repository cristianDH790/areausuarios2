<?php

namespace App\Livewire\DashboardAdmin\Certificate\CertificateGenerate;

use Parsedown;
use Carbon\Carbon;
use App\Models\firm;
use App\Models\User;

use App\Models\module;
use Livewire\Component;

use App\Models\exhibitor;
use App\Models\certificate;
use Illuminate\Support\Str;
use Barryvdh\DomPDF\Facade\Pdf;
use function Laravel\Prompts\select;
use Intervention\Image\Facades\Image;

use App\Models\DatosConfigCertificate;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class CertificateGenerate extends Component
{

    use LivewireAlert;



    public $value_A_1;
    public $x_A_1;
    public $y_A_1;
    public $align_A_1;
    public $type_typography_A_1;
    public $ancho_caja_A_1;
    public $line_A_1;
    public $font_size_A_1;
    public $painting_A_1 = false;

    public $value_A_2;
    public $x_A_2;
    public $y_A_2;
    public $align_A_2;
    public $type_typography_A_2;
    public $ancho_caja_A_2;
    public $line_A_2;
    public $font_size_A_2;
    public $painting_A_2 = false;

    public $value_A_3;
    public $x_A_3;
    public $y_A_3;
    public $align_A_3;
    public $type_typography_A_3;
    public $ancho_caja_A_3;
    public $line_A_3;
    public $font_size_A_3;
    public $painting_A_3 = false;

    public $value_A_4;
    public $x_A_4;
    public $y_A_4;
    public $align_A_4;
    public $type_typography_A_4;
    public $ancho_caja_A_4;
    public $line_A_4;
    public $font_size_A_4;
    public $painting_A_4 = false;

    public $value_A_5;
    public $x_A_5;
    public $y_A_5;
    public $align_A_5;
    public $type_typography_A_5;
    public $ancho_caja_A_5;
    public $line_A_5;
    public $font_size_A_5;
    public $painting_A_5 = false;


    public int|null $SelectedFirmaUno = null;
    public $value_A_6;
    public $Firma1_A_6;
    public $nameFirma1_A_6;
    public $nameFirma2_A_6;
    public $foto_firm1_A_6;
    public $foto_firm2_A_6;
    public $x_A_6;
    public $y_A_6;
    public $align_A_6;
    public $type_typography_A_6;
    public $ancho_caja_A_6;
    public $line_A_6;
    public $font_size_A_6;
    public $painting_A_6 = false;


    public $value_A_7;
    public $x_A_7;
    public $y_A_7;
    public $align_A_7;
    public $type_typography_A_7;
    public $ancho_caja_A_7;
    public $line_A_7;
    public $font_size_A_7;
    public $painting_A_7 = false;


    public int|null $SelectedFirmaDos = null;
    public $value_A_8;
    public $Firma1_A_8;
    public $nameFirma1_A_8;
    public $nameFirma2_A_8;
    public $foto_firm1_A_8;
    public $foto_firm2_A_8;
    public $x_A_8;
    public $y_A_8;
    public $align_A_8;
    public $type_typography_A_8;
    public $ancho_caja_A_8;
    public $line_A_8;
    public $font_size_A_8;
    public $painting_A_8 = false;

    public int|null $SelectedFirmaTres = null;
    public $value_A_9;
    public $Firma1_A_9;
    public $nameFirma1_A_9;
    public $nameFirma2_A_9;
    public $foto_firm1_A_9;
    public $foto_firm2_A_9;
    public $x_A_9;
    public $y_A_9;
    public $align_A_9;
    public $type_typography_A_9;
    public $ancho_caja_A_9;
    public $line_A_9;
    public $font_size_A_9;
    public $painting_A_9 = false;


    public $value_B_1;
    public $x_B_1;
    public $y_B_1;
    public $align_B_1;
    public $type_typography_B_1;
    public $ancho_caja_B_1;
    public $line_B_1;
    public $font_size_B_1;
    public $painting_B_1 = false;

    public $value_B_2;
    public $x_B_2;
    public $y_B_2;
    public $align_B_2;
    public $type_typography_B_2;
    public $ancho_caja_B_2;
    public $line_B_2;
    public $font_size_B_2;
    public $painting_B_2 = false;

    public $value_B_3;
    public $x_B_3;
    public $y_B_3;
    public $align_B_3;
    public $type_typography_B_3;
    public $ancho_caja_B_3;
    public $line_B_3;
    public $font_size_B_3;
    public $painting_B_3 = false;


    public $value_B_4;
    public $x_B_4;
    public $y_B_4;
    public $align_B_4;
    public $type_typography_B_4;
    public $ancho_caja_B_4;
    public $line_B_4;
    public $font_size_B_4;
    public $painting_B_4 = false;

    // public $value_B_4;
    public $x_B_5;
    public $y_B_5;
    public $align_B_5;
    //public $type_typography_B_4;
    public $ancho_caja_B_5;
    //public $line_B_4;
    public $font_size_B_5;
    public $painting_B_5 = false;

    public $value_B_6;
    public $x_B_6;
    public $y_B_6;
    public $align_B_6;
    public $type_typography_B_6;
    public $ancho_caja_B_6;
    public $line_B_6;
    public $font_size_B_6;
    public $painting_B_6 = false;


    public $exhibitors;
    public $selectedExhibitors = [];
    public $value_B_7;
    public $x_B_7;
    public $y_B_7;
    public $align_B_7;
    public $type_typography_B_7;
    public $ancho_caja_B_7;
    public $line_B_7;
    public $font_size_B_7;
    public $painting_B_7 = false;

    public $value_B_8;
    public $x_B_8;
    public $y_B_8;
    public $align_B_8;
    public $type_typography_B_8;
    public $ancho_caja_B_8;
    public $line_B_8;
    public $font_size_B_8;
    public $painting_B_8 = false;

    public $texto;

    public $certificate_front;
    public certificate $certificate;

    public function updatedSelectedFirmaUno($id)
    {
        if (!$id == null) {
            $this->Firma1_A_6 = firm::where('id', $id)->first();
            $this->nameFirma1_A_6 = $this->Firma1_A_6->name_one;
            $this->nameFirma2_A_6 = $this->Firma1_A_6->name_two;
            $this->foto_firm1_A_6 = $this->Firma1_A_6->photo_firm;
            $this->foto_firm2_A_6 = $this->Firma1_A_6->photo_seal;
        } else {
            $this->nameFirma1_A_6 = '';
            $this->nameFirma2_A_6 = '';
            $this->foto_firm1_A_6 = '';
            $this->foto_firm2_A_6 = '';
        }


        //dd($this->nameFirma2_A_6);
    }

    public function updatedSelectedFirmaDos($id)
    {
        if (!$id == null) {
            $this->Firma1_A_8 = firm::where('id', $id)->first();
            $this->nameFirma1_A_8 = $this->Firma1_A_8->name_one;
            $this->nameFirma2_A_8 = $this->Firma1_A_8->name_two;
            $this->foto_firm1_A_8 = $this->Firma1_A_8->photo_firm;
            $this->foto_firm2_A_8 = $this->Firma1_A_8->photo_seal;
        } else {
            $this->nameFirma1_A_8 = '';
            $this->nameFirma2_A_8 = '';
            $this->foto_firm1_A_8 = '';
            $this->foto_firm2_A_8 = '';
        }


        //dd($this->nameFirma2_A_6);
    }

    public function updatedSelectedFirmaTres($id)
    {
        if (!$id == null) {
            $this->Firma1_A_9 = firm::where('id', $id)->first();
            $this->nameFirma1_A_9 = $this->Firma1_A_9->name_one;
            $this->nameFirma2_A_9 = $this->Firma1_A_9->name_two;
            $this->foto_firm1_A_9 = $this->Firma1_A_9->photo_firm;
            $this->foto_firm2_A_9 = $this->Firma1_A_9->photo_seal;
        } else {
            $this->nameFirma1_A_9 = '';
            $this->nameFirma2_A_9 = '';
            $this->foto_firm1_A_9 = '';
            $this->foto_firm2_A_9 = '';
        }


        //dd($this->nameFirma2_A_6);
    }

    public function GenerarCertificado2()
    {
        $datos_config_certificates = DatosConfigCertificate::all();
        $pdf = Pdf::loadView('certificates.certificate', compact('datos_config_certificates'));
        return $pdf->stream('certificate.pdf');
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
        $A_8 = DatosConfigCertificate::where('certificate_id', $this->certificate->id)->where('key', 'A_8')->first();
        $A_9 = DatosConfigCertificate::where('certificate_id', $this->certificate->id)->where('key', 'A_9')->first();
        $B_1 = DatosConfigCertificate::where('certificate_id', $this->certificate->id)->where('key', 'B_1')->first();
        $B_2 = DatosConfigCertificate::where('certificate_id', $this->certificate->id)->where('key', 'B_2')->first();
        $B_3 = DatosConfigCertificate::where('certificate_id', $this->certificate->id)->where('key', 'B_3')->first();
        $B_4 = DatosConfigCertificate::where('certificate_id', $this->certificate->id)->where('key', 'B_4')->first();
        $B_5 = DatosConfigCertificate::where('certificate_id', $this->certificate->id)->where('key', 'B_5')->first();
        $B_6 = DatosConfigCertificate::where('certificate_id', $this->certificate->id)->where('key', 'B_6')->first();
        $B_7 = DatosConfigCertificate::where('certificate_id', $this->certificate->id)->where('key', 'B_7')->first();
        $B_8 = DatosConfigCertificate::where('certificate_id', $this->certificate->id)->where('key', 'B_8')->first();

        $this->value_A_1 = $A_1->value ?? '*EL CENTRO DE CAPACITACIONES OBSTETRICA Y CAPACITACIONES PROFESIONALES AL DIA SAC, OTORGAN EL PRESENTE:*';
        $this->x_A_1 = $A_1->x ?? '';
        $this->y_A_1 = $A_1->y ?? '';

        $this->align_A_1 = $A_1->align ?? 'center';
        $this->type_typography_A_1 = $A_1->type_typography ?? 'ARIALBD';
        $this->ancho_caja_A_1 = $A_1->ancho_caja ?? '';
        $this->font_size_A_1 = $A_1->font_size ?? '';
        if ($A_1 == null) {
            $this->painting_A_1 = false;
        } else {
            if ($A_1->painting == 0) {
                $this->painting_A_1 = false;
            } else {
                $this->painting_A_1 = true;
            }
        }
        if ($A_1 == null) {
            $this->line_A_1 = false;
        } else {
            if ($A_1->lineado == 0) {
                $this->line_A_1 = false;
            } else {
                $this->line_A_1 = true;
            }
        }


        $this->value_A_2 = $A_2->value ?? $this->certificate->type_certificate->name;
        $this->x_A_2 = $A_2->x ?? '';
        $this->y_A_2 = $A_2->y ?? '';
        $this->align_A_2 = $A_2->align ?? 'center';
        $this->type_typography_A_2 = $A_2->type_typography ?? 'ARIALBD';
        $this->ancho_caja_A_2 = $A_2->ancho_caja ?? '';
        $this->font_size_A_2 = $A_2->font_size ?? '';
        if ($A_2 == null) {
            $this->painting_A_2 = false;
        } else {
            if ($A_2->painting == 0) {
                $this->painting_A_2 = false;
            } else {
                $this->painting_A_2 = true;
            }
        }
        if ($A_2 == null) {
            $this->line_A_2 = false;
        } else {
            if ($A_2->lineado == 0) {
                $this->line_A_2 = false;
            } else {
                $this->line_A_2 = true;
            }
        }

        $this->value_A_3 = $A_3->value ?? '*RECONOCIMIENTO PARA:*';
        $this->x_A_3 = $A_3->x ?? '';
        $this->y_A_3 = $A_3->y ?? '';
        $this->align_A_3 = $A_3->align ?? 'center';
        $this->type_typography_A_3 = $A_3->type_typography ?? 'ARIALBD';
        $this->ancho_caja_A_3 = $A_3->ancho_caja ?? '';
        $this->font_size_A_3 = $A_3->font_size ?? '';
        if ($A_3 == null) {
            $this->painting_A_3 = false;
        } else {
            if ($A_3->painting == 0) {
                $this->painting_A_3 = false;
            } else {
                $this->painting_A_3 = true;
            }
        }
        if ($A_3 == null) {
            $this->line_A_3 = false;
        } else {
            if ($A_3->lineado == 0) {
                $this->line_A_3 = false;
            } else {
                $this->line_A_3 = true;
            }
        }

        $this->value_A_4 = $A_4->value ?? 'Por haber Participado en el curso de "' . strtoupper($this->certificate->service->name) . '" .Evento desarrollado del ' . strtoupper($this->formatDate($this->certificate->service->start_date)) . ' al ' . strtoupper($this->formatDate($this->certificate->service->end_date)) . ', con una duracion de ' . strtoupper($this->certificate->service->hours) . '.';
        $this->x_A_4 = $A_4->x ?? '';
        $this->y_A_4 = $A_4->y ?? '';
        $this->align_A_4 = $A_4->align ?? '';
        $this->type_typography_A_4 = $A_4->type_typography ?? '';
        $this->ancho_caja_A_4 = $A_4->ancho_caja ?? '';
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
        if ($A_4 == null) {
            $this->line_A_4 = false;
        } else {
            if ($A_4->lineado == 0) {
                $this->line_A_4 = false;
            } else {
                $this->line_A_4 = true;
            }
        }


        $fecha = $this->formatDate($this->certificate->service->end_date);

        $this->value_A_5 = $A_5->value ?? $fecha;
        $this->x_A_5 = $A_5->x ?? '';
        $this->y_A_5 = $A_5->y ?? '';
        $this->ancho_caja_A_5 = $A_5->ancho_caja ?? '';
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
        if ($A_5 == null) {
            $this->line_A_5 = false;
        } else {
            if ($A_5->lineado == 0) {
                $this->line_A_5 = false;
            } else {
                $this->line_A_5 = true;
            }
        }

        //trayendo todas las firmas 
        if ($A_6) {
            $jsonData = json_decode($A_6->value, true);
            $this->SelectedFirmaUno = $jsonData['id'];
            $this->nameFirma1_A_6 = $jsonData['texto'];
            $this->nameFirma2_A_6 = $jsonData['texto2'];
            $this->foto_firm1_A_6 = $jsonData['firma'];
            $this->foto_firm2_A_6 = $jsonData['sello'];
        }

        $this->value_A_6 = $A_6->value ?? '';
        $this->ancho_caja_A_6 = $A_6->ancho_caja ?? '';
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
        if ($A_6 == null) {
            $this->line_A_6 = false;
        } else {
            if ($A_6->lineado == 0) {
                $this->line_A_6 = false;
            } else {
                $this->line_A_6 = true;
            }
        }


        $this->value_A_7 = $A_7->value ?? 'LUIS CRISTIAN DE LA CRUZ HUARANCCA';
        $this->x_A_7 = $A_7->x ?? '';
        $this->y_A_7 = $A_7->y ?? '';
        $this->align_A_7 = $A_7->align ?? 'center';
        $this->type_typography_A_7 = $A_7->type_typography ?? 'ARIALBD';
        $this->ancho_caja_A_7 = $A_7->ancho_caja ?? '';
        $this->font_size_A_7 = $A_7->font_size ?? '';
        if ($A_7 == null) {
            $this->painting_A_7 = false;
        } else {
            if ($A_7->painting == 0) {
                $this->painting_A_7 = false;
            } else {
                $this->painting_A_7 = true;
            }
        }
        if ($A_7 == null) {
            $this->line_A_7 = false;
        } else {
            if ($A_7->lineado == 0) {
                $this->line_A_7 = false;
            } else {
                $this->line_A_7 = true;
            }
        }


        if ($A_8) {
            $jsonData = json_decode($A_8->value, true);
            $this->SelectedFirmaDos = $jsonData['id'];
            $this->nameFirma1_A_8 = $jsonData['texto'];
            $this->nameFirma2_A_8 = $jsonData['texto2'];
            $this->foto_firm1_A_8 = $jsonData['firma'];
            $this->foto_firm2_A_8 = $jsonData['sello'];
        }
        $this->value_A_8 = $A_8->value ?? '';
        $this->ancho_caja_A_8 = $A_8->ancho_caja ?? '';
        $this->x_A_8 = $A_8->x ?? '';
        $this->y_A_8 = $A_8->y ?? '';
        $this->align_A_8 = $A_8->align ?? '';
        $this->type_typography_A_8 = $A_8->type_typography ?? '';
        $this->font_size_A_8 = $A_8->font_size ?? '';
        if ($A_8 == null) {
            $this->painting_A_8 = false;
        } else {
            if ($A_8->painting == 0) {
                $this->painting_A_8 = false;
            } else {
                $this->painting_A_8 = true;
            }
        }
        if ($A_8 == null) {
            $this->line_A_8 = false;
        } else {
            if ($A_8->lineado == 0) {
                $this->line_A_8 = false;
            } else {
                $this->line_A_8 = true;
            }
        }



        if ($A_9) {
            $jsonData = json_decode($A_9->value, true);
            $this->SelectedFirmaTres = $jsonData['id'];
            $this->nameFirma1_A_9 = $jsonData['texto'];
            $this->nameFirma2_A_9 = $jsonData['texto2'];
            $this->foto_firm1_A_9 = $jsonData['firma'];
            $this->foto_firm2_A_9 = $jsonData['sello'];
        }
        $this->value_A_9 = $A_9->value ?? '';
        $this->ancho_caja_A_9 = $A_9->ancho_caja ?? '';
        $this->x_A_9 = $A_9->x ?? '';
        $this->y_A_9 = $A_9->y ?? '';
        $this->align_A_9 = $A_9->align ?? '';
        $this->type_typography_A_9 = $A_9->type_typography ?? '';
        $this->font_size_A_9 = $A_9->font_size ?? '';
        if ($A_9 == null) {
            $this->painting_A_9 = false;
        } else {
            if ($A_9->painting == 0) {
                $this->painting_A_9 = false;
            } else {
                $this->painting_A_9 = true;
            }
        }
        if ($A_9 == null) {
            $this->line_A_9 = false;
        } else {
            if ($A_9->lineado == 0) {
                $this->line_A_9 = false;
            } else {
                $this->line_A_9 = true;
            }
        }



        $this->value_B_1 = $B_1->value ?? 'TEMARIO:';
        $this->x_B_1 = $B_1->x ?? '';
        $this->y_B_1 = $B_1->y ?? '';
        $this->align_B_1 = $B_1->align ?? '';
        $this->type_typography_B_1 = $B_1->type_typography ?? '';
        $this->ancho_caja_B_1 = $B_1->ancho_caja ?? '';
        $this->font_size_B_1 = $B_1->font_size ?? '';
        if ($B_1 == null) {
            $this->painting_B_1 = false;
        } else {
            if ($B_1->painting == 0) {
                $this->painting_B_1 = false;
            } else {
                $this->painting_B_1 = true;
            }
        }
        if ($B_1 == null) {
            $this->line_B_1 = false;
        } else {
            if ($B_1->lineado == 0) {
                $this->line_B_1 = false;
            } else {
                $this->line_B_1 = true;
            }
        }

        $this->value_B_2 = $B_2->value ?? '';
        $this->x_B_2 = $B_2->x ?? '';
        $this->y_B_2 = $B_2->y ?? '';
        $this->align_B_2 = $B_2->align ?? '';
        $this->type_typography_B_2 = $B_2->type_typography ?? '';
        $this->ancho_caja_B_2 = $B_2->ancho_caja ?? '';
        $this->font_size_B_2 = $B_2->font_size ?? '';
        if ($B_2 == null) {
            $this->painting_B_2 = false;
        } else {
            if ($B_2->painting == 0) {
                $this->painting_B_2 = false;
            } else {
                $this->painting_B_2 = true;
            }
        }
        if ($B_2 == null) {
            $this->line_B_2 = false;
        } else {
            if ($B_2->lineado == 0) {
                $this->line_B_2 = false;
            } else {
                $this->line_B_2 = true;
            }
        }

        $this->value_B_3 = $B_3->value ?? '';
        $this->x_B_3 = $B_3->x ?? '';
        $this->y_B_3 = $B_3->y ?? '';
        $this->align_B_3 = $B_3->align ?? '';
        $this->type_typography_B_3 = $B_3->type_typography ?? '';
        $this->ancho_caja_B_3 = $B_3->ancho_caja ?? '';
        $this->font_size_B_3 = $B_3->font_size ?? '';
        if ($B_3 == null) {
            $this->painting_B_3 = false;
        } else {
            if ($B_3->painting == 0) {
                $this->painting_B_3 = false;
            } else {
                $this->painting_B_3 = true;
            }
        }
        if ($B_3 == null) {
            $this->line_B_3 = false;
        } else {
            if ($B_3->lineado == 0) {
                $this->line_B_3 = false;
            } else {
                $this->line_B_3 = true;
            }
        }


        $this->value_B_4 = $B_4->value ?? '';
        $this->x_B_4 = $B_4->x ?? '';
        $this->y_B_4 = $B_4->y ?? '';
        $this->align_B_4 = $B_4->align ?? '';
        $this->type_typography_B_4 = $B_4->type_typography ?? '';
        $this->ancho_caja_B_4 = $B_4->ancho_caja ?? '';
        $this->font_size_B_4 = $B_4->font_size ?? '';
        if ($B_4 == null) {
            $this->painting_B_4 = false;
        } else {
            if ($B_4->painting == 0) {
                $this->painting_B_4 = false;
            } else {
                $this->painting_B_4 = true;
            }
        }
        if ($B_4 == null) {
            $this->line_B_4 = false;
        } else {
            if ($B_4->lineado == 0) {
                $this->line_B_4 = false;
            } else {
                $this->line_B_4 = true;
            }
        }



        $this->value_B_6 = $B_6->value ?? '';
        $this->x_B_6 = $B_6->x ?? '';
        $this->y_B_6 = $B_6->y ?? '';
        $this->align_B_6 = $B_6->align ?? '';
        $this->type_typography_B_6 = $B_6->type_typography ?? '';
        $this->ancho_caja_B_6 = $B_6->ancho_caja ?? '';
        $this->font_size_B_6 = $B_6->font_size ?? '';
        if ($B_6 == null) {
            $this->painting_B_6 = false;
        } else {
            if ($B_6->painting == 0) {
                $this->painting_B_6 = false;
            } else {
                $this->painting_B_6 = true;
            }
        }
        if ($B_6 == null) {
            $this->line_B_6 = false;
        } else {
            if ($B_6->lineado == 0) {
                $this->line_B_6 = false;
            } else {
                $this->line_B_6 = true;
            }
        }

        $this->exhibitors = exhibitor::all();
        if ($B_7) {
            $exhibitor_decode = json_decode($B_7->value);
            $this->selectedExhibitors = $exhibitor_decode;
        }

        $this->value_B_7 = $B_7->value ?? '';
        $this->x_B_7 = $B_7->x ?? '';
        $this->y_B_7 = $B_7->y ?? '';
        $this->align_B_7 = $B_7->align ?? '';
        $this->type_typography_B_7 = $B_7->type_typography ?? '';
        $this->ancho_caja_B_7 = $B_7->ancho_caja ?? '';
        $this->font_size_B_7 = $B_7->font_size ?? '';
        if ($B_7 == null) {
            $this->painting_B_7 = false;
        } else {
            if ($B_7->painting == 0) {
                $this->painting_B_7 = false;
            } else {
                $this->painting_B_7 = true;
            }
        }
        if ($B_7 == null) {
            $this->line_B_7 = false;
        } else {
            if ($B_7->lineado == 0) {
                $this->line_B_7 = false;
            } else {
                $this->line_B_7 = true;
            }
        }

        $this->value_B_8 = $B_8->value ?? 'TEMARIO:';
        $this->x_B_8 = $B_8->x ?? '';
        $this->y_B_8 = $B_8->y ?? '';
        $this->align_B_8 = $B_8->align ?? '';
        $this->type_typography_B_8 = $B_8->type_typography ?? '';
        $this->ancho_caja_B_8 = $B_8->ancho_caja ?? '';
        $this->font_size_B_8 = $B_8->font_size ?? '';
        if ($B_8 == null) {
            $this->painting_B_8 = false;
        } else {
            if ($B_8->painting == 0) {
                $this->painting_B_8 = false;
            } else {
                $this->painting_B_8 = true;
            }
        }
        if ($B_8 == null) {
            $this->line_B_8 = false;
        } else {
            if ($B_8->lineado == 0) {
                $this->line_B_8 = false;
            } else {
                $this->line_B_8 = true;
            }
        }


        //$this->value_B_5 = $B_5->value ?? 'TEMARIO:';
        $this->x_B_5 = $B_5->x ?? '';
        $this->y_B_5 = $B_5->y ?? '';
        $this->align_B_5 = $B_5->align ?? '';
        //$this->type_typography_B_5 = $B_5->type_typography ?? '';
        $this->ancho_caja_B_5 = $B_5->ancho_caja ?? '';
        $this->font_size_B_5 = $B_5->font_size ?? '';
        if ($B_5 == null) {
            $this->painting_B_5 = false;
        } else {
            if ($B_5->painting == 0) {
                $this->painting_B_5 = false;
            } else {
                $this->painting_B_5 = true;
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
            'line_A_1' => 'required',
            'ancho_caja_A_1' => 'required',
            'type_typography_A_1' => 'required',
            'font_size_A_1' => 'required',

        ]);
        if (DatosConfigCertificate::where('certificate_id', $this->certificate->id)->where('key', 'A_1')->first()) {
            $A1 = DatosConfigCertificate::where('certificate_id', $this->certificate->id)->where('key', 'A_1')->first();
            $A1->value = trim($this->value_A_1);
            $A1->x = $this->x_A_1;
            $A1->y = $this->y_A_1;
            $A1->align = $this->align_A_1;
            $A1->lineado = $this->line_A_1;
            $A1->type_typography = $this->type_typography_A_1;
            $A1->ancho_caja = $this->ancho_caja_A_1;
            $A1->font_size = $this->font_size_A_1;
            $A1->painting = $this->painting_A_1;
            $A1->update();
            $this->alert('success', 'A_1 Actualizado Correctamente');
        } else {
            $A1 = new DatosConfigCertificate();
            $A1->certificate_id = $this->certificate->id;
            $A1->key = "A_1";
            $A1->value = trim($this->value_A_1);
            $A1->x = $this->x_A_1;
            $A1->y = $this->y_A_1;
            $A1->lineado = $this->line_A_1;
            $A1->align = $this->align_A_1;
            $A1->type_typography = $this->type_typography_A_1;
            $A1->ancho_caja = $this->ancho_caja_A_1;
            $A1->font_size = $this->font_size_A_1;
            $A1->painting = $this->painting_A_1;
            $A1->save();

            $this->alert('success', 'A_1 Guardado Correctamente');
        }
    }
    public function saveCertificateFrontA2()
    {
        $this->validate([
            'value_A_2' => 'required',
            'x_A_2' => 'required',
            'y_A_2' => 'required',
            'align_A_2' => 'required',
            'line_A_2' => 'required',
            'type_typography_A_2' => 'required',
            'ancho_caja_A_2' => 'required',
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
            $A2->lineado = $this->line_A_2;
            $A2->ancho_caja = $this->ancho_caja_A_2;
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
            $A2->ancho_caja = $this->ancho_caja_A_2;
            $A2->lineado = $this->line_A_2;
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
            'line_A_3' => 'required',
            'ancho_caja_A_3' => 'required',
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
            $A3->ancho_caja = $this->ancho_caja_A_3;
            $A3->lineado = $this->line_A_3;
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
            $A3->ancho_caja = $this->ancho_caja_A_3;
            $A3->lineado = $this->line_A_3;
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
            'line_A_4' => 'required',
            'ancho_caja_A_4' => 'required',
            'font_size_A_4' => 'required',
        ]);
        if (DatosConfigCertificate::where('certificate_id', $this->certificate->id)->where('key', 'A_4')->first()) {
            $A4 = DatosConfigCertificate::where('certificate_id', $this->certificate->id)->where('key', 'A_4')->first();
            $A4->certificate_id = $this->certificate->id;
            $A4->key = "A_4";

            //$parsedown = new Parsedown();
            //$A4->value = $parsedown->text($this->value_A_4);

            $A4->value = trim($this->value_A_4);
            $A4->x = $this->x_A_4;
            $A4->y = $this->y_A_4;
            $A4->align = $this->align_A_4;
            $A4->type_typography = $this->type_typography_A_4;
            $A4->ancho_caja = $this->ancho_caja_A_4;
            $A4->lineado = $this->line_A_4;
            $A4->font_size = $this->font_size_A_4;
            $A4->painting = $this->painting_A_4;
            $A4->save();

            $this->alert('success', 'A_4 Actualizado Correctamente');
        } else {
            $A4 = new DatosConfigCertificate();
            $A4->certificate_id = $this->certificate->id;
            $A4->key = "A_4";

            $A4->value = trim($this->value_A_4);
            $A4->x = $this->x_A_4;
            $A4->y = $this->y_A_4;
            $A4->align = $this->align_A_4;
            $A4->type_typography = $this->type_typography_A_4;
            $A4->ancho_caja = $this->ancho_caja_A_4;
            $A4->lineado = $this->line_A_4;
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
            'ancho_caja_A_5' => 'required',
            'line_A_5' => 'required',
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
            $A5->ancho_caja = $this->ancho_caja_A_5;
            $A5->lineado = $this->line_A_5;
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
            $A5->ancho_caja = $this->ancho_caja_A_5;
            $A5->lineado = $this->line_A_5;
            $A5->font_size = $this->font_size_A_5;
            $A5->painting = $this->painting_A_5;
            $A5->save();

            $this->alert('success', 'A_5 Guardado Correctamente');
        }
    }
    public function saveCertificateFrontA6()
    {
        $this->validate([
            'SelectedFirmaUno' => 'required',
            'x_A_6' => 'required',
            'y_A_6' => 'required',
            'align_A_6' => 'required',
            'type_typography_A_6' => 'required',
            'line_A_6' => 'required',
            'font_size_A_6' => 'required',
        ]);
        if (DatosConfigCertificate::where('certificate_id', $this->certificate->id)->where('key', 'A_6')->first()) {
            $A6 = DatosConfigCertificate::where('certificate_id', $this->certificate->id)->where('key', 'A_6')->first();
            $A6->certificate_id = $this->certificate->id;
            $A6->key = "A_6";
            $firma = Firm::where('id', $this->SelectedFirmaUno)->first();

            $this->value_A_6 = json_encode([
                'id' => $firma->id,
                'alias' => $firma->alias,
                'texto' => $firma->name_one,
                'texto2' => $firma->name_two,
                'firma' => $firma->photo_firm,
                'sello' => $firma->photo_seal
            ]);

            $A6->value = $this->value_A_6;
            $A6->x = $this->x_A_6;
            $A6->y = $this->y_A_6;
            $A6->align = $this->align_A_6;
            $A6->type_typography = $this->type_typography_A_6;
            $A6->ancho_caja = $this->ancho_caja_A_6;
            $A6->lineado = $this->line_A_6;
            $A6->font_size = $this->font_size_A_6;
            $A6->painting = $this->painting_A_6;
            $A6->save();

            $this->alert('success', 'A_6 Actualizado Correctamente');
        } else {
            $A6 = new DatosConfigCertificate();
            $A6->certificate_id = $this->certificate->id;
            $A6->key = "A_6";
            $firma = Firm::where('id', $this->SelectedFirmaUno)->first();

            $this->value_A_6 = json_encode([
                'id' => $firma->id,
                'alias' => $firma->alias,
                'texto' => $firma->name_one,
                'texto2' => $firma->name_two,
                'firma' => $firma->photo_firm,
                'sello' => $firma->photo_seal
            ]);
            $A6->value = $this->value_A_6;
            $A6->x = $this->x_A_6;
            $A6->y = $this->y_A_6;
            $A6->align = $this->align_A_6;
            $A6->type_typography = $this->type_typography_A_6;
            $A6->ancho_caja = $this->ancho_caja_A_6;
            $A6->lineado = $this->line_A_6;
            $A6->font_size = $this->font_size_A_6;
            $A6->painting = $this->painting_A_6;
            $A6->save();

            $this->alert('success', 'A_6 Guardado Correctamente');
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
            'ancho_caja_A_7' => 'required',
            'line_A_7' => 'required',
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
            $A7->ancho_caja = $this->ancho_caja_A_7;
            $A7->lineado = $this->line_A_7;
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
            $A7->ancho_caja = $this->ancho_caja_A_7;
            $A7->lineado = $this->line_A_7;
            $A7->font_size = $this->font_size_A_7;
            $A7->painting = $this->painting_A_7;
            $A7->save();

            $this->alert('success', 'A_7 Guardado Correctamente');
        }
    }
    public function saveCertificateFrontA8()
    {
        $this->validate([
            'SelectedFirmaDos' => 'required',
            'x_A_8' => 'required',
            'y_A_8' => 'required',
            'align_A_8' => 'required',
            'type_typography_A_8' => 'required',
            'line_A_8' => 'required',
            'font_size_A_8' => 'required',
        ]);
        if (DatosConfigCertificate::where('certificate_id', $this->certificate->id)->where('key', 'A_8')->first()) {
            $A8 = DatosConfigCertificate::where('certificate_id', $this->certificate->id)->where('key', 'A_8')->first();
            $A8->certificate_id = $this->certificate->id;
            $A8->key = "A_8";
            $firma = Firm::where('id', $this->SelectedFirmaDos)->first();

            $this->value_A_8 = json_encode([
                'id' => $firma->id,
                'alias' => $firma->alias,
                'texto' => $firma->name_one,
                'texto2' => $firma->name_two,
                'firma' => $firma->photo_firm,
                'sello' => $firma->photo_seal
            ]);

            $A8->value = $this->value_A_8;
            $A8->x = $this->x_A_8;
            $A8->y = $this->y_A_8;
            $A8->align = $this->align_A_8;
            $A8->type_typography = $this->type_typography_A_8;
            $A8->ancho_caja = $this->ancho_caja_A_8;
            $A8->lineado = $this->line_A_8;
            $A8->font_size = $this->font_size_A_8;
            $A8->painting = $this->painting_A_8;
            $A8->save();

            $this->alert('success', 'A_8 Actualizado Correctamente');
        } else {
            $A8 = new DatosConfigCertificate();
            $A8->certificate_id = $this->certificate->id;
            $A8->key = "A_8";
            $firma = Firm::where('id', $this->SelectedFirmaDos)->first();

            $this->value_A_8 = json_encode([
                'id' => $firma->id,
                'alias' => $firma->alias,
                'texto' => $firma->name_one,
                'texto2' => $firma->name_two,
                'firma' => $firma->photo_firm,
                'sello' => $firma->photo_seal
            ]);
            $A8->value = $this->value_A_8;
            $A8->x = $this->x_A_8;
            $A8->y = $this->y_A_8;
            $A8->align = $this->align_A_8;
            $A8->type_typography = $this->type_typography_A_8;
            $A8->ancho_caja = $this->ancho_caja_A_8;
            $A8->lineado = $this->line_A_8;
            $A8->font_size = $this->font_size_A_8;
            $A8->painting = $this->painting_A_8;
            $A8->save();

            $this->alert('success', 'A_8 Guardado Correctamente');
        }
    }
    public function saveCertificateFrontA9()
    {
        $this->validate([
            'SelectedFirmaTres' => 'required',
            'x_A_9' => 'required',
            'y_A_9' => 'required',
            'align_A_9' => 'required',
            'type_typography_A_9' => 'required',
            'line_A_9' => 'required',
            'font_size_A_9' => 'required',
        ]);
        if (DatosConfigCertificate::where('certificate_id', $this->certificate->id)->where('key', 'A_9')->first()) {
            $A9 = DatosConfigCertificate::where('certificate_id', $this->certificate->id)->where('key', 'A_9')->first();
            $A9->certificate_id = $this->certificate->id;
            $A9->key = "A_9";
            $firma = Firm::where('id', $this->SelectedFirmaTres)->first();

            $this->value_A_9 = json_encode([
                'id' => $firma->id,
                'alias' => $firma->alias,
                'texto' => $firma->name_one,
                'texto2' => $firma->name_two,
                'firma' => $firma->photo_firm,
                'sello' => $firma->photo_seal
            ]);

            $A9->value = $this->value_A_9;
            $A9->x = $this->x_A_9;
            $A9->y = $this->y_A_9;
            $A9->align = $this->align_A_9;
            $A9->type_typography = $this->type_typography_A_9;
            $A9->ancho_caja = $this->ancho_caja_A_9;
            $A9->lineado = $this->line_A_9;
            $A9->font_size = $this->font_size_A_9;
            $A9->painting = $this->painting_A_9;
            $A9->save();

            $this->alert('success', 'A_9 Actualizado Correctamente');
        } else {
            $A9 = new DatosConfigCertificate();
            $A9->certificate_id = $this->certificate->id;
            $A9->key = "A_9";
            $firma = Firm::where('id', $this->SelectedFirmaTres)->first();

            $this->value_A_9 = json_encode([
                'id' => $firma->id,
                'alias' => $firma->alias,
                'texto' => $firma->name_one,
                'texto2' => $firma->name_two,
                'firma' => $firma->photo_firm,
                'sello' => $firma->photo_seal
            ]);
            $A9->value = $this->value_A_9;
            $A9->x = $this->x_A_9;
            $A9->y = $this->y_A_9;
            $A9->align = $this->align_A_9;
            $A9->type_typography = $this->type_typography_A_9;
            $A9->ancho_caja = $this->ancho_caja_A_9;
            $A9->lineado = $this->line_A_9;
            $A9->font_size = $this->font_size_A_9;
            $A9->painting = $this->painting_A_9;
            $A9->save();

            $this->alert('success', 'A_9 Guardado Correctamente');
        }
    }

    public function saveCertificateBackB1()
    {
        $this->validate([
            'value_B_1' => 'required',
            'x_B_1' => 'required',
            'y_B_1' => 'required',
            'align_B_1' => 'required',
            'line_B_1' => 'required',
            'ancho_caja_B_1' => 'required',
            'type_typography_B_1' => 'required',
            'font_size_B_1' => 'required',

        ]);
        if (DatosConfigCertificate::where('certificate_id', $this->certificate->id)->where('key', 'B_1')->first()) {
            $B1 = DatosConfigCertificate::where('certificate_id', $this->certificate->id)->where('key', 'B_1')->first();
            $B1->value = trim($this->value_B_1);
            $B1->x = $this->x_B_1;
            $B1->y = $this->y_B_1;
            $B1->align = $this->align_B_1;
            $B1->lineado = $this->line_B_1;
            $B1->type_typography = $this->type_typography_B_1;
            $B1->ancho_caja = $this->ancho_caja_B_1;
            $B1->font_size = $this->font_size_B_1;
            $B1->painting = $this->painting_B_1;
            $B1->update();
            $this->alert('success', 'B_1 Actualizado Correctamente');
        } else {
            $B1 = new DatosConfigCertificate();
            $B1->certificate_id = $this->certificate->id;
            $B1->key = "B_1";
            $B1->value = trim($this->value_B_1);
            $B1->x = $this->x_B_1;
            $B1->y = $this->y_B_1;
            $B1->lineado = $this->line_B_1;
            $B1->align = $this->align_B_1;
            $B1->type_typography = $this->type_typography_B_1;
            $B1->ancho_caja = $this->ancho_caja_B_1;
            $B1->font_size = $this->font_size_B_1;
            $B1->painting = $this->painting_B_1;
            $B1->save();

            $this->alert('success', 'B_1 Guardado Correctamente');
        }
    }
    public function saveCertificateBackB2()
    {
        $this->validate([
            'value_B_2' => 'required',
            'x_B_2' => 'required',
            'y_B_2' => 'required',
            'align_B_2' => 'required',
            'line_B_2' => 'required',
            'ancho_caja_B_2' => 'required',
            'type_typography_B_2' => 'required',
            'font_size_B_2' => 'required',

        ]);
        if (DatosConfigCertificate::where('certificate_id', $this->certificate->id)->where('key', 'B_2')->first()) {
            $B2 = DatosConfigCertificate::where('certificate_id', $this->certificate->id)->where('key', 'B_2')->first();

            // Obtener módulos con el ID de certificado específico y cargar relaciones





            $B2->value = trim($this->certificate->id);
            $B2->x = $this->x_B_2;
            $B2->y = $this->y_B_2;
            $B2->align = $this->align_B_2;
            $B2->lineado = $this->line_B_2;
            $B2->type_typography = $this->type_typography_B_2;
            $B2->ancho_caja = $this->ancho_caja_B_2;
            $B2->font_size = $this->font_size_B_2;
            $B2->painting = $this->painting_B_2;
            $B2->update();
            $this->alert('success', 'B_2 Actualizado Correctamente');
        } else {
            $B2 = new DatosConfigCertificate();
            $B2->certificate_id = $this->certificate->id;
            $B2->key = "B_2";
            $B2->value = trim($this->certificate->id);
            $B2->x = $this->x_B_2;
            $B2->y = $this->y_B_2;
            $B2->lineado = $this->line_B_2;
            $B2->align = $this->align_B_2;
            $B2->type_typography = $this->type_typography_B_2;
            $B2->ancho_caja = $this->ancho_caja_B_2;
            $B2->font_size = $this->font_size_B_2;
            $B2->painting = $this->painting_B_2;
            $B2->save();

            $this->alert('success', 'B_2 Guardado Correctamente');
        }
    }
    public function saveCertificateBackB3()
    {
        $this->validate([
            'value_B_3' => 'required',
            'x_B_3' => 'required',
            'y_B_3' => 'required',
            'align_B_3' => 'required',
            'line_B_3' => 'required',
            'ancho_caja_B_3' => 'required',
            'type_typography_B_3' => 'required',
            'font_size_B_3' => 'required',

        ]);
        if (DatosConfigCertificate::where('certificate_id', $this->certificate->id)->where('key', 'B_3')->first()) {
            $B3 = DatosConfigCertificate::where('certificate_id', $this->certificate->id)->where('key', 'B_3')->first();

            // Obtener módulos con el ID de certificado específico y cargar relaciones





            $B3->value = trim($this->value_B_3);
            $B3->x = $this->x_B_3;
            $B3->y = $this->y_B_3;
            $B3->align = $this->align_B_3;
            $B3->lineado = $this->line_B_3;
            $B3->type_typography = $this->type_typography_B_3;
            $B3->ancho_caja = $this->ancho_caja_B_3;
            $B3->font_size = $this->font_size_B_3;
            $B3->painting = $this->painting_B_3;
            $B3->update();
            $this->alert('success', 'B_3 Actualizado Correctamente');
        } else {
            $B3 = new DatosConfigCertificate();
            $B3->certificate_id = $this->certificate->id;
            $B3->key = "B_3";
            $B3->value = trim($this->value_B_3);
            $B3->x = $this->x_B_3;
            $B3->y = $this->y_B_3;
            $B3->lineado = $this->line_B_3;
            $B3->align = $this->align_B_3;
            $B3->type_typography = $this->type_typography_B_3;
            $B3->ancho_caja = $this->ancho_caja_B_3;
            $B3->font_size = $this->font_size_B_3;
            $B3->painting = $this->painting_B_3;
            $B3->save();

            $this->alert('success', 'B_3 Guardado Correctamente');
        }
    }
    public function saveCertificateBackB4()
    {
        $this->validate([
            //'value_B_4' => 'required',
            'x_B_4' => 'required',
            'y_B_4' => 'required',
            'align_B_4' => 'required',
            'line_B_4' => 'required',
            'ancho_caja_B_4' => 'required',
            'type_typography_B_4' => 'required',
            'font_size_B_4' => 'required',

        ]);
        if (DatosConfigCertificate::where('certificate_id', $this->certificate->id)->where('key', 'B_4')->first()) {
            $B4 = DatosConfigCertificate::where('certificate_id', $this->certificate->id)->where('key', 'B_4')->first();

            //cargar codigo unico del certificado (cliente-servicio)

            $cod_cliente_ejemplo = "*CODIGO:* CL-73042637-S-8523";




            $B4->value = $cod_cliente_ejemplo;
            $B4->x = $this->x_B_4;
            $B4->y = $this->y_B_4;
            $B4->align = $this->align_B_4;
            $B4->lineado = $this->line_B_4;
            $B4->type_typography = $this->type_typography_B_4;
            $B4->ancho_caja = $this->ancho_caja_B_4;
            $B4->font_size = $this->font_size_B_4;
            $B4->painting = $this->painting_B_4;
            $B4->update();
            $this->alert('success', 'B_4 Actualizado Correctamente');
        } else {
            $cod_cliente_ejemplo = "*CODIGO:* CL-73042637-S-8523";
            $B4 = new DatosConfigCertificate();
            $B4->certificate_id = $this->certificate->id;
            $B4->key = "B_4";
            $B4->value = $cod_cliente_ejemplo;
            $B4->x = $this->x_B_4;
            $B4->y = $this->y_B_4;
            $B4->lineado = $this->line_B_4;
            $B4->align = $this->align_B_4;
            $B4->type_typography = $this->type_typography_B_4;
            $B4->ancho_caja = $this->ancho_caja_B_4;
            $B4->font_size = $this->font_size_B_4;
            $B4->painting = $this->painting_B_4;
            $B4->save();

            $this->alert('success', 'B_4 Guardado Correctamente');
        }
    }

    public function saveCertificateBackB5()
    {
        $this->validate([
            //'value_B_4' => 'required',
            'x_B_5' => 'required',
            'y_B_5' => 'required',
            'align_B_5' => 'required',
            //'line_B_4' => 'required',
            'ancho_caja_B_5' => 'required',
            //'type_typography_B_4' => 'required',
            'font_size_B_5' => 'required',

        ]);
        if (DatosConfigCertificate::where('certificate_id', $this->certificate->id)->where('key', 'B_5')->first()) {
            $B5 = DatosConfigCertificate::where('certificate_id', $this->certificate->id)->where('key', 'B_5')->first();

            //cargar codigo unico del certificado (cliente-servicio)

            $cod_cliente_ejemplo = "*CODIGO:* CL-73042637-S-8523";




            $B5->value = $cod_cliente_ejemplo;
            $B5->x = $this->x_B_5;
            $B5->y = $this->y_B_5;
            $B5->align = $this->align_B_5;
            // $B5->lineado = $this->line_B_5;
            //  $B5->type_typography = $this->type_typography_B_5;
            $B5->ancho_caja = $this->ancho_caja_B_5;
            $B5->font_size = $this->font_size_B_5;
            $B5->painting = $this->painting_B_5;
            $B5->update();
            $this->alert('success', 'B_5 Actualizado Correctamente');
        } else {
            $cod_cliente_ejemplo = "*CODIGO:* CL-73042637-S-8523";
            $B5 = new DatosConfigCertificate();
            $B5->certificate_id = $this->certificate->id;
            $B5->key = "B_5";
            $B5->value = $cod_cliente_ejemplo;
            $B5->x = $this->x_B_5;
            $B5->y = $this->y_B_5;
            //$B5->lineado = $this->line_B_5;
            $B5->align = $this->align_B_5;
            //$B5->type_typography = $this->type_typography_B_5;
            $B5->ancho_caja = $this->ancho_caja_B_5;
            $B5->font_size = $this->font_size_B_5;
            $B5->painting = $this->painting_B_5;
            $B5->save();

            $this->alert('success', 'B_5 Guardado Correctamente');
        }
    }
    public function saveCertificateBackB6()
    {
        $this->validate([
            //'value_B_4' => 'required',
            'x_B_6' => 'required',
            'y_B_6' => 'required',
            'align_B_6' => 'required',
            'line_B_6' => 'required',
            'ancho_caja_B_6' => 'required',
            'type_typography_B_6' => 'required',
            'font_size_B_6' => 'required',

        ]);
        if (DatosConfigCertificate::where('certificate_id', $this->certificate->id)->where('key', 'B_6')->first()) {
            $B6 = DatosConfigCertificate::where('certificate_id', $this->certificate->id)->where('key', 'B_6')->first();

            //cargar codigo unico del certificado (cliente-servicio)






            $B6->value = $this->value_A_5;
            $B6->x = $this->x_B_6;
            $B6->y = $this->y_B_6;
            $B6->align = $this->align_B_6;
            $B6->lineado = $this->line_B_6;
            $B6->type_typography = $this->type_typography_B_6;
            $B6->ancho_caja = $this->ancho_caja_B_6;
            $B6->font_size = $this->font_size_B_6;
            $B6->painting = $this->painting_B_6;
            $B6->update();
            $this->alert('success', 'B_6 Actualizado Correctamente');
        } else {

            $B6 = new DatosConfigCertificate();
            $B6->certificate_id = $this->certificate->id;
            $B6->key = "B_6";
            $B6->value = $this->value_A_5;
            $B6->x = $this->x_B_6;
            $B6->y = $this->y_B_6;
            $B6->lineado = $this->line_B_6;
            $B6->align = $this->align_B_6;
            $B6->type_typography = $this->type_typography_B_6;
            $B6->ancho_caja = $this->ancho_caja_B_6;
            $B6->font_size = $this->font_size_B_6;
            $B6->painting = $this->painting_B_6;
            $B6->save();

            $this->alert('success', 'B_6 Guardado Correctamente');
        }
    }

    public function saveCertificateBackB7()
    {
        $this->validate([
            'selectedExhibitors' => 'required',
            'x_B_6' => 'required',
            'y_B_6' => 'required',
            'align_B_6' => 'required',
            'line_B_6' => 'required',
            'ancho_caja_B_6' => 'required',
            'type_typography_B_6' => 'required',
            'font_size_B_6' => 'required',

        ]);
        if (DatosConfigCertificate::where('certificate_id', $this->certificate->id)->where('key', 'B_7')->first()) {
            $B7 = DatosConfigCertificate::where('certificate_id', $this->certificate->id)->where('key', 'B_7')->first();

            //cargar codigo unico del certificado (cliente-servicio)




            $selectedExhibitorsJson = json_encode($this->selectedExhibitors);

            $B7->value = $selectedExhibitorsJson;
            $B7->x = $this->x_B_7;
            $B7->y = $this->y_B_7;
            $B7->align = $this->align_B_7;
            $B7->lineado = $this->line_B_7;
            $B7->type_typography = $this->type_typography_B_7;
            $B7->ancho_caja = $this->ancho_caja_B_7;
            $B7->font_size = $this->font_size_B_7;
            $B7->painting = $this->painting_B_7;
            $B7->update();
            $this->alert('success', 'B_7 Actualizado Correctamente');
        } else {
            $selectedExhibitorsJson = json_encode($this->selectedExhibitors);
            // dd($selectedExhibitorsJson);

            $B7 = new DatosConfigCertificate();
            $B7->certificate_id = $this->certificate->id;
            $B7->key = "B_7";
            $B7->value = $selectedExhibitorsJson;
            $B7->x = $this->x_B_7;
            $B7->y = $this->y_B_7;
            $B7->lineado = $this->line_B_7;
            $B7->align = $this->align_B_7;
            $B7->type_typography = $this->type_typography_B_7;
            $B7->ancho_caja = $this->ancho_caja_B_7;
            $B7->font_size = $this->font_size_B_7;
            $B7->painting = $this->painting_B_7;
            $B7->save();

            $this->alert('success', 'B_7 Guardado Correctamente');
        }
    }

    public function saveCertificateBackB8()
    {
        $this->validate([
            'value_B_8' => 'required',
            'x_B_8' => 'required',
            'y_B_8' => 'required',
            'align_B_8' => 'required',
            'line_B_8' => 'required',
            'ancho_caja_B_8' => 'required',
            'type_typography_B_8' => 'required',
            'font_size_B_8' => 'required',

        ]);
        if (DatosConfigCertificate::where('certificate_id', $this->certificate->id)->where('key', 'B_8')->first()) {
            $B8 = DatosConfigCertificate::where('certificate_id', $this->certificate->id)->where('key', 'B_8')->first();
            $B8->value = trim($this->value_B_8);
            $B8->x = $this->x_B_8;
            $B8->y = $this->y_B_8;
            $B8->align = $this->align_B_8;
            $B8->lineado = $this->line_B_8;
            $B8->type_typography = $this->type_typography_B_8;
            $B8->ancho_caja = $this->ancho_caja_B_8;
            $B8->font_size = $this->font_size_B_8;
            $B8->painting = $this->painting_B_8;
            $B8->update();
            $this->alert('success', 'B_8 Actualizado Correctamente');
        } else {
            $B8 = new DatosConfigCertificate();
            $B8->certificate_id = $this->certificate->id;
            $B8->key = "B_8";
            $B8->value = trim($this->value_B_8);
            $B8->x = $this->x_B_8;
            $B8->y = $this->y_B_8;
            $B8->lineado = $this->line_B_8;
            $B8->align = $this->align_B_8;
            $B8->type_typography = $this->type_typography_B_8;
            $B8->ancho_caja = $this->ancho_caja_B_8;
            $B8->font_size = $this->font_size_B_8;
            $B8->painting = $this->painting_B_8;
            $B8->save();

            $this->alert('success', 'B_8 Guardado Correctamente');
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
        $firmas = firm::all();
        $nameFirma = Firm::where('id', $this->certificate->firm_id)->first();
        return view('livewire.dashboard-admin.certificate.certificate-generate.certificate-generate', compact('firmas', 'nameFirma'));
    }
}
