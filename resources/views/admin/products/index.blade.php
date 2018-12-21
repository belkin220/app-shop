@extends('layouts.app')
@section('body-class','product-page')
@section('title','Listado de productos')
@section('content')

<div class="header header-filter" style="background-image: url('https://images.unsplash.com/photo-1423655156442-ccc11daa4e99?crop=entropy&dpr=2&fit=crop&fm=jpg&h=750&ixjsv=2.1.0&ixlib=rb-0.3.5&q=50&w=1450');">
</div>
<div class="main main-raised">
    <div class="container">
   <div class="section text-center">
    <h2 class="title">Listado productos disponibles</h2>
        <div class="team">
            <div class="row">
                <a href="{{url('admin/products/create')}}" class="btn btn-primary btn-round text-center" style="margin-top: -55px;margin-bottom: 55px ">Agregar producto</a>
                <table class = "table">
                    <thead>
                        <tr>
                            <th class = "text-center"> # </th>
                            <th lass="col-md-2 text-center"> Nombre </th>
                            <th class="col-md-4 text-center"> Descripción </th>
                            <th class="text-center"> Categoria </th>
                            <th class = "text-right"> Precio </th>
                            <th class = "text-center"> Acciones </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($products as $product)
                        <tr>
                            <td style="vertical-align: middle; text-align: left;"> {{$product->id}} </td>
                            <td style="vertical-align: middle;text-align: left;"> {{$product->name}} </td>
                            <td style="vertical-align: middle;text-align: left;"> {{$product->description}} </td>
                            <td style="vertical-align: middle;text-align: left;"> {{$product->category ? $product->category->name : 'General'}} </td>
                            <td class = "text-right"style="vertical-align: middle;text-align: right;"> {{$product->price}} &euro; </td>
                            <td class = "td-actions text-right" style="vertical-align: middle;text-align: right;">
                                <form action="{{route('admin.products.delete',$product->id )}}" method="POST">
                                    {{csrf_field()}}
                                     <a  href="{{url('admin/products',$product->id)}}" role = "button" rel = "tooltip" title = "Ver producto"  target="_blank" class = "btn btn-info btn-simple btn-xs">
                                    <i class = "fa fa-info"> </i>
                                </a>
                                <a href="{{ route('admin.products.edit',$product->id )}}" role = "button" rel = "tooltip" title = "Editar producto: {{$product->id}}  " class = "btn btn-success btn-simple btn-xs">
                                    <i class = "fa fa-edit"> </i>
                                </a>

                                 <a  href="{{ route('admin.products.images',$product->id )}}" role = "button" rel = "tooltip" title = "Imagenes" class = "btn btn-warning btn-simple btn-xs">
                                    <i class = "fa fa-image"> </i>
                                </a>

                                <button type = "submit" rel = "tooltip" title = "Eliminar producto: {{$product->id}}" class = "btn btn-danger btn-simple btn-xs">
                                    <i class = "fa fa-times"> </i>
                                </button>
                            </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
<!-- Paginación -->
        {{ $products->links() }}
            </div>
        </div>
    </div>
</div>
</div>


@endsection
