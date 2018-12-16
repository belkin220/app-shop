@extends('layouts.app')
@section('body-class','product-page')
@section('title','Imágenes de productos')
@section('content')

<div class="header header-filter" style="background-image: url('https://images.unsplash.com/photo-1423655156442-ccc11daa4e99?crop=entropy&dpr=2&fit=crop&fm=jpg&h=750&ixjsv=2.1.0&ixlib=rb-0.3.5&q=50&w=1450');">
</div>
<div class="main main-raised">
    <div class="container">
        <div class="section text-center">
            <h2 class="title">Imágenes del producto "{{$product->name}}"</h2>
            <form action="{{route('admin.products.images.store',$product->id)}}" method="post" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="col-md-4">
               <input type="file" name="photo" class="btn btn-primary btn-round"  required></div>
               <button type="submit" class="btn btn-primary btn-round">subir imagaen</button>
               <a href="{{route('admin.products')}}" class="btn btn-default btn-round">Volver</a>
</form>
<hr>
       <div class="row" style="margin-top: 30px"> 
                @foreach($images as $image)
              <div class="col-sm-6 col-md-4">
                <div class="thumbnail">
                  <img src="{{$image->url}}" width="250" height="250" alt="Producto sin imagen">
                  <div class="caption">
                    <h3>{{$image->id}}</h3>
                    <p>...</p>

                    <form action="{{route('admin.products.images.delete',$image->id)}}" method="POST" >
                    {{csrf_field()}}
                    {{method_field('DELETE')}}
                     
                    <p><button type="submit" class="btn btn-primary" role="button">Eliminar</button>
                      @if($image->featured)
                      <button type="button" class="btn btn-info btn-fab btn-fab-mini btn-round" rel="tooltip" title="Imagen destacada"><i class="material-icons">favorite</i></a></p>
                      @else
                      <a href="{{route('admin.products.images.select', [$product->id,$image->id])}}" class="btn btn-success btn-fab btn-fab-mini btn-round" rel="tooltip" title="Destacar esta imagen"><i class="material-icons">favorite</i></a></p>
                      @endif

                    </form>
                  </div>
                </div>
              </div>
               @endforeach
            </div>
            {{ $images->links() }}
        </div>
    </div>
</div>

@endsection
