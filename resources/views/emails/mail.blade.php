<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>BB.com</title>
    <style>
        h1,
        #msj {
            text-align: center;
        }

        #msj {
            margin-top: 20px;
        }

        table {
            margin-top: 30px;
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td,
        th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }

    </style>
</head>

<body>
    <h1 style="margin-bottom: 20px">{{ $titulo }}</h1>

    <p style="float: right">RESTAURANTE: <strong>{{ $restaurante->nombre }}</strong></p>
    <p>CLIENTE:</p>
    <p><strong>{{ $cliente->lastname }}, {{ $cliente->name }} </strong></p>
    <p>{{ $cliente->address }}</p>
    <p>{{ $cliente->city }}</p>
    <p>{{ $cliente->movil }}</p>

    @php
        $total = 0;
    @endphp

    <table>
        <tr>
            <th>Plato</th>
            <th>Cantidad</th>
            <th>Precio</th>
            <th>Total</th>
        </tr>
        @foreach ($pedido->platos as $plato)
            <tr>
                <td>
                    {{ $plato->nombre }}
                </td>
                <td>
                    {{ $plato->pivot['cantidad'] }}
                </td>
                <td>
                    {{ $plato->precio }}€
                </td>
                <td>
                    {{ $plato->pivot['cantidad'] * $plato->precio }}€
                </td>
                @php
                    $total += $plato->pivot['cantidad'] * $plato->precio;
                @endphp
            </tr>
        @endforeach
        <tr>
            <th colspan="3">
                Subtotal + IVA(21%)
            </th>
            <th>
                {{ $total + $total * 0.21 }}€
            </th>
        </tr>
    </table>
    <p id="msj"><strong>Muchas gracias por tu compra !</strong></p>
</body>

</html>
