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
            background-image: url("{{ $backgroundImagePath }}");
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
        }
        .certificate {
           color : blue;
        }
        .text {
            position: absolute;
            color: #202020;
            text-align: center;
            white-space: pre-wrap; /* Para asegurar que los saltos de línea se respeten */
        }
    </style>
</head>
<body background = "http://127.0.0.1:8001{{ $backgroundImagePath }}">
    
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
