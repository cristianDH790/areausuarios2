{{-- <!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Certificado</title>
    <style>
        body {
            font-family: 'DejaVu Sans', sans-serif;
            margin: -22;
            padding: 0;
            background-image: url("{{ $backgroundImageBase64 }}");
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
            width: 106%;
            height: 100vh;  
            position: relative;

        }

        .text {
            /* position: absolute;
            color: #202020;
            text-align: center;
            max-width: 80%;
            white-space: pre-wrap; */
            position: absolute;
            color: #202020;
            text-align: center;
            white-space: pre-wrap;
            max-width: 80%;
            word-wrap: break-word;
            padding: 10px;
        }

        .page-break {
            page-break-after: always;

        }
    </style>
</head>

<body>

    @foreach ($texts as $text)
        <div class="text"
            style="
                top: {{ $text->y }}px;
                left: {{ $text->x }}px;
                font-size: {{ $text->font_size }}px;
                color: {{ $text->painting ? '#FC8787' : '#202020' }};
                font-family: {{ $text->type_typography }};
                text-align: {{ $text->align }};
            ">
            {{ $text->value }}
        </div>
    @endforeach
    <!-- Forzar un salto de página -->
    <div class="page-break"></div>

    <!-- Contenido de la segunda página -->
    <div class="text"
        style="
            top: 100px;
            left: 50px;
            font-size: 20px;
            color: #202020;
            text-align: center;
        ">
        Contenido de la segunda página aquí...
    </div>
</body>

</html> --}}

<!DOCTYPE html>
<html lang="es">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@600&display=swap" rel="stylesheet">

<head>
    <meta charset="UTF-8">
    <title>Certificado Configuracion</title>
    <style>
        body {
            font-family: "Cinzel", serif;
            margin: -22;
            padding: 0;
            background-image: url("{{ $backgroundImageBase64 }}");
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
            width: 106%;
            height: 100vh;
            position: relative;

        }

        .text {
            /* position: absolute;
            color: #202020;
            text-align: center;
            max-width: 80%;
            white-space: pre-wrap; */
            position: absolute;
            color: #202020;
            text-align: center;
            white-space: pre-wrap;
            max-width: 100%;
            word-wrap: break-word;


        }

        .page-break {

            page-break-after: always;

        }
    </style>
</head>

<body>
     
    @php
        $var = true;
    @endphp
    @foreach ($texts as $text)
        {{-- @if (strip_tags($text->value) !== $text->value) --}}
        @if (
            $text->key == 'A_1' ||
                $text->key == 'A_2' ||
                $text->key == 'A_3' ||
                $text->key == 'A_4' ||
                $text->key == 'A_5' ||
                $text->key == 'A_6' ||
                $text->key == 'A_7' ||
                $text->key == 'A_8' ||
                $text->key == 'A_9')
            <div class="text "
                style="
            {{ $text->lineado ? 'border-bottom: 1px solid black;' : '' }}
            top: {{ $text->y }}px;
            left: {{ $text->x }}px; 
            font-size: {{ $text->font_size }}px; 
            color: {{ $text->painting ? '#FC8787' : '#202020' }}; 
             font-family: 'Cinzel', 'serif';
             font-weight: {{$text->type_typography}};
            text-align: {{ $text->align }}; 
            width: {{ $text->ancho_caja }}px; 
            {{ $text->painting ? 'background-color: red;' : '' }} ">@if (!($jsonData = json_decode($text->value, true))){!! preg_replace('/\*(.*?)\*/', '<b>$1</b>', htmlspecialchars($text->value)) !!}@else @endif</div>
            @if ($jsonData = json_decode($text->value, true))
                @php
                    // Extrae la ruta de la imagen desde el JSON
                    $firma = $jsonData['firma'];
                    $ruta_firma = 'storage/' . $jsonData['firma'];
                    $ruta_sello = 'storage/' . $jsonData['sello'];
                    //echo $firmas_all;
                @endphp

                <div
                    style=" top: {{ $text->y }}px;
            left: {{ $text->x }}px; 
            {{ $text->painting ? 'background-color: red;' : '' }};   text-align: {{ $text->align }};  width: {{ $text->ancho_caja }}px; height: auto;   position: relative;">
                    <!-- Muestra la imagen con la ruta obtenida del JSON -->
                    <img src="data:image/png;base64,{{ base64_encode(file_get_contents($ruta_firma)) }}" width="120"
                        height="auto" alt="Firma" style=" position: relative; bottom: 0; z-index: 2; margin: 0;">
                    <img src="data:image/png;base64,{{ base64_encode(file_get_contents($ruta_sello)) }}" width="90"
                        height="auto" alt="Firma"
                        style=" position: absolute ; top: -19;right: -19 ; z-index: 3; margin: 0; ">
                    <div style="position: relative; z-index: 1;">
                        <p
                            style=" font-size: {{ $text->font_size }}px; margin: 0;border-top: 1px solid black;  font-weight: bold; display: inline-block;">
                            {{ $jsonData['texto'] }}
                        </p>
                        <p style="margin: 0;  font-size: {{ $text->font_size - 3 }}px;  font-weight: bold ">
                            {{ $jsonData['texto2'] }}</p>
                    </div>



                </div>
            @else
            @endif
        @endif
    @endforeach
    <!-- Forzar un salto de página -->
    <div class="page-break"></div>
    @foreach ($texts as $text)
        @if (
            $text->key == 'B_1' ||
                $text->key == 'B_2' ||
                $text->key == 'B_3' ||
                $text->key == 'B_4' ||
                $text->key == 'B_5' ||
                $text->key == 'B_6' ||
                $text->key == 'B_7' ||
                $text->key == 'B_8' ||
                $text->key == 'B_9')
            <div>
                <div class="text"
                    style="
                top: {{ $text->y }}px;
                left: {{ $text->x }}px;
                font-size: {{ $text->font_size }}px;
                 color: {{ $text->painting ? '#FC8787' : '#202020' }}; 
                 font-weight: {{$text->type_typography}};
                text-align: {{ $text->align }}; 
            width: {{ $text->ancho_caja }}px; 
                {{ $text->painting ? 'background-color: red;' : '' }}
            ">@if ($text->key == 'B_2')@foreach ($temarios as $temario)<li style="margin: 0; font-size: {{ $text->font_size }}px;">{{ $temario->title }}@if (!empty($temario->topics))<ul style="margin: 0;">@foreach ($temario->topics as $topic)<li style="margin: 0; list-style-type: square; font-size: {{ $text->font_size - 3 }}px; ">{{ $topic->title }}@if (!empty($topic->sub_topics))<ul style="margin: 0; font-size: {{ $text->font_size - 5 }}px;">@foreach ($topic->sub_topics as $subTopic)<li style="margin: 0;">{{ $subTopic->title }}</li>@endforeach</ul>@endif</li>@endforeach</ul>@endif</li>@endforeach @else @if (json_decode($text->value, true))@php $jsonDatas = json_decode($text->value, true); @endphp @foreach ($jsonDatas as $jsonData)<li style="margin: 0;">{{ $jsonData }}</li>@endforeach @else @if($text->key == 'B_5')<img style="margin: 0;" src="data:image/png;base64, {!! base64_encode(QrCode::format('png')->merge('/public/img/logo.jpg')->size($text->font_size)->errorCorrection('H')->margin(3)->generate(route('generate.certificate', ['id' => $certificate->id]))) !!} ">@else{!! preg_replace('/\*(.*?)\*/', '<b>$1</b>', htmlspecialchars($text->value)) !!}@endif @endif @endif</div></div>@endif
    @endforeach
    {{-- <div>
        <div class="text"
            style="
            top: 100px;
            left: 50px;
            font-size: 20px;
            color: #202020;
            text-align: center;
        ">
            Contenido de la segunda página aquí...
        </div>
    </div> --}}

</body>
