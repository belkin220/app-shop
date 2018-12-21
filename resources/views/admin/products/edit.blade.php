@extends('layouts.app')
@section('body-class','product-page')
@section('title','Bienvenido a App Shop')
@section('content')

<div class="header header-filter" style="background-image: url('https://images.unsplash.com/photo-1423655156442-ccc11daa4e99?crop=entropy&dpr=2&fit=crop&fm=jpg&h=750&ixjsv=2.1.0&ixlib=rb-0.3.5&q=50&w=1450');">

</div>

<div class="main main-raised">
<div class="container">
    <div class="section">
        <h2 class="title text-center">Editar producto</h2>
        {{-- Validation --}}
         @if ($errors->any())
            <div class="alert alert-danger" role="alert">
                <ul>
                    @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
                </ul>
                    </div>
                     @endif
                     {{-- end validation --}}

        <form action="{{route('admin.products.update', $product->id)}}" method="post" accept-charset="utf-8">
            {{ csrf_field() }}
            <div class="row">

            <div class="col-sm-6">
                <div class="form-group label-floating">
                    <label class="control-label">Nombre del producto </label>
                    <input type="text" class="form-control"name="name" id="name" value="{{old('name',$product->name)}}">
                </div>
            </div>

            <div class="col-sm-6">
                 <div class="form-group label-floating">
                    <label class="control-label">Precio del producto </label>
                    <input type="number" step="0.01" class="form-control"name="price" id="price" value="{{old('price',$product->price)}}">
                </div>
            </div>
        
           
        <div class="col-sm-6">
            <div class="form-group label-floating">
                    <label class="control-label">Descripción </label>
                    <input type="text" class="form-control"name="description" id="description" value="{{old('description',$product->description)}}">
            </div>
        </div>

        <div class="col-sm-6">
           <div class="form-group label-floating">
                    <label class="control-label">Categoria </label>
                    <select class="form-control"name="category_id" id="category_id"> 
                         <option value={{old('category_id',$product->category->id)}}>{{old('category_name',$product->category->name)}}</option> 
                         @foreach($categories as $item)
                         <option value={{$item->id}}>{{$item->name}}</option> 
                         @endforeach
                     
                    </select>
            </div>
          

        </div>
    </div>
            <textarea class="form-control" placeholder="Descripción detallada del producto" rows="5" name="long_description">
                {{old('long_description',$product->long_description)}}
            </textarea>

            <button type="submit" class="btn btn-primary">Actualizar producto</button>
            <a href="{{route('admin.products')}}" role="button" class="btn btn-default">Cancelar </a>
</div>

        </form>
                
            </div>
        </div>

    </div>

@endsection
