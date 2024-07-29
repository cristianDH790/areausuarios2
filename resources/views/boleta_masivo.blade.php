<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Boleta</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .encabezado {
            width: 100%;
            display: table;
            table-layout: fixed;
        }

        .encabezado .col {
            display: table-cell;
            vertical-align: top;

            width: 60%;
        }

        .encabezado .col2 {
            display: table-cell;
            vertical-align: top;

            text-align: center;
        }


        .productos {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        .productos th,
        .productos td {
            border: 1px solid #000;
            padding: 8px;
            text-align: left;
        }

        .productos th {
            background-color: #f2f2f2;
        }

        .total-container {
            display: table;
            width: 100%;
            padding: 0;
        }

        .total-container .total {
            display: table-cell;
            border: 1px solid #000;
            padding-right: 10px;
            padding-top: 0;
            padding-bottom: 0;
            padding-left: 10px;
            width: 200px;
            /* Ajusta el ancho del total según sea necesario */
            text-align: right;
            vertical-align: top;
        }

        .footer {
            margin-top: 10px;
            padding: 5px;
            border-top: 1px solid #000;
            text-align: center;
            position: absolute;
            width: 100%;
            bottom: 0;
        }

        img {
            width: 150px;
        }
    </style>
</head>

<body>
    @php
        $logoPath = public_path('storage/' . $settings->logo);
    @endphp
    <div class="encabezado">
        <div class="col">
            <p style="text-align: center; font-size: 25 ; font-weight: bold; ">
                {{ $settings->name_boleta ?? 'Nombre de la empresa' }}
            </p>
            <span style="font-weight: bold; font-size: 14px; ">PROPIETARIO: </span><span
                style="margin-right: 10px;   font-size: 14px;">{{ $settings->propietario_boleta ?? 'Nombre del propietario' }}</span>
            <br>
            <span style="font-weight: bold; font-size: 14px; ">DIRECCION: </span> <span
                style="margin-right: 10px;  font-size: 14px;">{{ $settings->direccion_boleta ?? 'Direccion boleta' }}</span>
            <br>
            <span style="font-weight: bold; font-size: 14px; ">EMAIL: </span> <span
                style="margin-right: 10px;  font-size: 14px;">{{ $settings->email_boleta ?? 'Email boleta' }}</span>
            <br>
            <span style="font-weight: bold; font-size: 14px; ">RUC: </span> <span
                style="margin-right: 10px;  font-size: 14px;">{{ $settings->ruc_boleta ?? '77777777' }}</span>
        </div>
        <div class="col2" style=" text-align: center;">
            <img src="data:image/png;base64,{{ base64_encode(file_get_contents($logoPath)) }}" alt="logo"
                style="">
            <p style="font-size: 20;font-weight: bold; ">BOLETA DE VENTA</p>
            <span style="font-weight: bold">CODIGO: </span> <span>{{ $code . '-' . $sale->id }}</span>
        </div>
    </div>
    <br>
    <br>
    <div>
        <div style="margin-bottom: 10px;">
            <span style="display: inline-block; margin-right: 10px; font-weight: bold; font-size: 14px;">Nombre Cliente:
            </span>
            <span
                style="display: inline-block; margin-right: 10px; width: 200px; border-bottom: 1px solid #000;">{{ $user->name . ' ' . $user->last_name }}</span>
            <span
                style="display: inline-block; margin-right: 10px; font-weight: bold; font-size: 14px;">Documento(Dni-Ruc):
            </span><span
                style="display: inline-block; margin-right: 10px; width: 200px; border-bottom: 1px solid  #000;">{{ $user->document }}</span>
        </div>
        <div style="margin-bottom: 10px; width: 100%;">
            <span style="display: inline-block; margin-right: 10px; font-weight: bold; font-size: 14px; ">Direccion:
            </span>
            <span
                style="display: inline-block; margin-right: 10px; width: 200px; border-bottom: 1px solid #000; width: 610px;"></span>
        </div>
        <div style="margin-bottom: 10px;  width: 100%">
            <span style="display: inline-block; margin-right: 10px; font-weight: bold; font-size: 14px;">Correo:
            </span><span
                style="display: inline-block; margin-right: 10px; width: 200px; width: 630px; border-bottom: 1px solid #000;">{{ $user->email }}</span>
        </div>
        <div style="margin-bottom: 10px;">
            <span style="display: inline-block; margin-right: 10px; font-weight: bold; font-size: 14px;">Telefono:
            </span>
            <span
                style="display: inline-block; margin-right: 10px; width: 200px; border-bottom: 1px solid #000;">{{ $user->phone }}</span>
            <span style="display: inline-block; margin-right: 10px; font-weight: bold; font-size: 14px;">Fecha Emision:
            </span>
            <span
                style="display: inline-block; margin-right: 10px; width: 280px; border-bottom: 1px solid #000;">{{ $sale->date_sale }}</span>
        </div>
    </div>
    <br>
    <table class="productos">
        <thead>
            <tr>
                <th style="width: 5%;">#</th>
                <th style="width: 55%;">Producto</th>

                <th style="width: 20%;">Precio Unitario</th>
                <th style="width: 20%;">Precio Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($sale->saleDetails as $saleDetail)
                <tr>
                    <td>
                        {{ $loop->index + 1 }}
                    </td>
                    <td>{{ $saleDetail->service->name }}</td>

                    <td>{{ $saleDetail->price_service }}</td>
                    <td>{{ $saleDetail->price_sale }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>


    <div class="total-container">
        <div class="total">
            <p><strong>Total:</strong> {{ $sale->total }}</p>
            <!-- $totalPrice debe ser calculado en tu controlador -->
        </div>
    </div>

    <div class="footer">
        <div>
            <p>Gracias por su compra</p>

        </div>

        <div>
            <img style="margin: 0;" src="data:image/png;base64,{!! base64_encode(
                QrCode::format('png')->size(125)->errorCorrection('H')->margin(3)->generate(route('generate.boleta.masivo', ['code' => $user->code, 'sale' => $sale->id])),
            ) !!}" alt="QR Code">
            <p>Codigo QR</p>
        </div>

    </div>
</body>

</html>
