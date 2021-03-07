<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mail Test</title>
</head>

<body>
    <h1>{{ $details['title'] }}</h1>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Plato</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($details['pedido']->platos as $plato)
                <tr>
                    <td>{{ $plato->nombre }}</td>
                </tr>
            @endforeach
        </tbody>
</body>

</html>
