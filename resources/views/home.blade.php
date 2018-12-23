
@extends('layouts.app')
@section('body-class','product-page')
@section('title','App Shop| Panel de Control')
@section('styles')
<style>
 .label-info {
    font-size: medium;
}
</style>
@endsection
@section('content')

<div class="header header-filter" style="background-image: url('https://images.unsplash.com/photo-1423655156442-ccc11daa4e99?crop=entropy&dpr=2&fit=crop&fm=jpg&h=750&ixjsv=2.1.0&ixlib=rb-0.3.5&q=50&w=1450');">

</div>

<div class="main main-raised">
<div class="container">
    

    <div class="section">
        <h2 class="title text-center">Panel de Usuario</h2>

        @if (session('notification'))
            <div class="alert alert-success">
                <div class="container-fluid">
                  <div class="alert-icon">
                    <i class="material-icons">check</i>
                  </div>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true"><i class="material-icons">clear</i></span>
                  </button>
                   {{session('notification')}}
                </div>
            </div>
        @endif
        <!-- Nav Pills -->
              <ul class="nav nav-pills nav-pills-primary" role="tablist">
            <li class="active">
                <a href="#dashboard" role="tab" data-toggle="tab">
                    <i class="material-icons">shopping_cart</i>
                    Carrito de compras
                </a>
            </li>
            <li>
                <a href="#tasks" role="tab" data-toggle="tab">
                    <i class="material-icons">list</i>
                    Historial de pedidos
                </a>
            </li>
            
        </ul>
        <!-- Listado carrito -->
        <hr>
       <?php 
       $count = auth()->user()->cart->details->count();
       ?>
        @switch($count)
            @case( $count == 0 )
            <span class="label label-info"><b> Tu carrito de compras está vacío.</b></span>
            @break;

            @case( $count == 1 )
            <span class="label label-info"><b>Tienes {{$count}} producto en tu carrito.</b></span>
            @break;

            @case( $count > 1 )
            <span class="label label-info"><b>Tienes {{$count}} productos en tu carrito.</b></span>
            @break
        @endswitch
        
                <table class = "table table-bordered" style="margin-top: 50px">
                    <thead>
                        <tr>
                            <th class = "text-center"> Imagen </th>
                            <th class=" text-center"> Nombre </th>
                            <th class=" text-center"> Precio </th>
                            <th class=" text-center"> Cantidad </th>
                            <th class=" text-center"> Subtotal </th>
                            <th class=" text-center"> Acciones </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ( auth()->user()->cart->details as $detail )
                        <tr>
                        <td class="text-center" style="vertical-align: middle;"><img src="{{$detail->product->featured_image_url}}" width="50" height="50">
                          </td>

                          <td style="vertical-align: middle;text-align: left;"><a href="{{route('products.show',$detail->product->id)}}" title="{{
                                $detail->product->name}}" target="_blank" >{{$detail->product->name}}</a> 
                            </td>

                        <td class = "text-right" style="vertical-align: middle;"> {{str_replace(".", ",",number_format($detail->product_price,2))}} &euro; </td>
                            <td class = "text-center" style="vertical-align: middle"> {{$detail->quantity}} </td>

                            <td class = "text-center" style="vertical-align: middle"> {{str_replace(".", ",", number_format( $detail->total,2)) }} &euro; </td>
                           
                            <td class = "td-actions text-center" style="vertical-align: middle">
                                <form action="{{route('cart.delete',$detail->id )}}" method="POST">
                                    {{csrf_field()}}
                                    {{method_field('DELETE')}}
                                     <a  href="{{route('products.show',[$detail->product->id,'carrito'=>true])}}" role = "button" rel = "tooltip" title = "Ver producto" class = "btn btn-info btn-simple btn-xs">
                                    <i class = "fa fa-info"> </i>
                                </a>
                                <button type = "submit" rel = "tooltip" title = "Eliminar producto" class = "btn btn-danger btn-simple btn-xs">
                                    <i class = "fa fa-times"> </i>
                                </button>
                            </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                          <p><span class="label label-info" style="font-size: medium;">Importe total (incluido I.V.A.) : </strong> {{auth()->user()->cart->total }} &euro;</span></p>
            
                <div class="text-center col-md-6" style="margin-top: 25px">
                <a href="{{route('welcome')}}#welcome" class="btn btn-primary btn-round">
    <i class="material-icons">shopping_basket</i> Seguir comprando
</a>
</div>
<div class="text-right" >
    <form action="{{route('cart.update')}}" method="post" accept-charset="utf-8" >
        {{csrf_field()}}
        <button class="btn btn-primary btn-round" style="margin-top: 25px">
    <i class="material-icons">done</i> Realizar pedido
</button>

    </form>
</div>


@endsection
