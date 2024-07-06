<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Certificado</title>
    <style>
        body {
            font-family: 'DejaVu Sans', sans-serif;
            margin: 0;
            padding: 0;
            background-image: url("{{ $backgroundImageBase64 }}");
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
            width: 100%;
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
    </style>
</head>
<body >
    
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
</body>
</html>
