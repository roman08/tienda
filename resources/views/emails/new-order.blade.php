<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Nuevo Pedido</title>
</head>
<body>
    <p>Se ha realizado un nuevo perdido!</p>
    <p>Estos son los datos del cliebte que realizó el pedido:</p>
    <ul>
        <li><strong>Nombre:</strong> {{$user->name}}</li>
        <li><strong>E-mail:</strong> {{$user->email}}</li>
        <li><strong>Fecha del pedido:</strong> {{$cart->order_date}}</li>
    </ul>
    <hr>
        <p>Detalles del pedido:</p>
        <ul>
            @foreach($cart->details as $detail)
                <li>
                    {{ $detail->product->name }} x {{$detail->quantity}} ($ {{ $detail->quantity * $detail->product->price}})
                </li>
            @endforeach
        </ul>
        <p>
            <strong>
                Importe a pagar:
            </strong>
            {{ $cart->total }}
        </p>
    <hr>

    <p>
        <a href="#">Haz clic aquí</a>
        para ver más información sobre el pedido
    </p>
</body>
</html>