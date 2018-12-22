<!DOCTYPE html>
<html>
<head>
    <title>Nuevo pedido</title>
</head>
<body>
  <p>Se ha realizado un nuevo pedido</p>
  <p>Datos del cliente que realizó el pedido:</p>
  <ul>
        <li><strong>Nombre:</strong>
        {{ $user->name }}
    </li>
        <li><strong>E-mail:</strong>
        {{ $user->email }}
        </li>
        <li><strong>Fecha del pedido:</strong>
        {{ $cart->order_date}}
        </li>
        <li></li>
    </ul>  
    <hr>
    <p><strong>Detalle del pedido:</strong></p>
    <ul>
       
        <table class="table">
          
            <thead>
                <th class="text-center">Nombre del producto</th>
                <th class="text-right">Cantidad</th>
                <th class="text-right">Subtotal</th>
                <th class="text-right">Total </th>
              

            </thead> 
            @foreach($cart->details as $detail)
            <tbody>
                <tr> 
                    <td>{{ $detail->product->name}}</td>
                    <td class="text-right">{{ $detail->quantity}}</td>
                    <td class="text-right">{{ $detail->quantity * $detail->product->price}}</td>
                    <td class="text-right">{{$cart->total}}</td>
                   </tr> 
                @endforeach
            </tbody>
        </table>
        <hr>
        <p><strong>Importe total : {{$cart->total}} &euro;</strong></p>
    <p>
        <a href="{{url('admin/orders/' . $cart->id )}}">Haz click aquí para más información sobre este pedido</a>
    </p>
    </p>
</body>
</html>