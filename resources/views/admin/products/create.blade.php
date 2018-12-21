@extends('layouts.app')
@section('body-class','product-page')
@section('title','Bienvenido a App Shop|Crear producto')
@section('content')

<div class="header header-filter" style="background-image: url('https://images.unsplash.com/photo-1423655156442-ccc11daa4e99?crop=entropy&dpr=2&fit=crop&fm=jpg&h=750&ixjsv=2.1.0&ixlib=rb-0.3.5&q=50&w=1450');">
    
</div>
<div class="main main-raised">
<div class="container">
    <div class="section">
        <h2 class="title text-center">Registrar producto</h2>

        @if(session('notification'))
        <div class="alert alert-success" style="margin-top: 25px">
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

        @if ($errors->any())
            <div class="alert alert-danger" role="alert">
                <ul>
                    @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
                </ul>
            </div>
        @endif
        <form action="{{route('admin.products.store')}}" method="post" accept-charset="utf-8">
            {{ csrf_field() }}
            <div class="row">

            <div class="col-sm-6">
                <div class="form-group label-floating">
                    <label class="control-label">Nombre del producto </label>
                    <input type="text" class="form-control"name="name" id="name" autofocus value={{old('name')}}>
                </div>
            </div>

            <div class="col-sm-6">
                 <div class="form-group label-floating">
                    <label class="control-label">Precio del producto </label>
                    <input type="text" class="form-control"name="price" id="price" value={{old('price')}}>
                </div>
            </div>
            <div class="col-sm-6">
            <div class="form-group label-floating">
                    <label class="control-label">Descripción </label>
                    <input type="text" class="form-control"name="description" id="description" value={{old('description')}}>
            </div>
        </div>

        <div class="col-sm-4">
           <div class="form-group label-floating">
                    <label class="control-label">Categoria </label>
                    <select class="form-control"name="category_id" id="category_id"> 
                        <option value="0" disable selected>Seleccione una opción</option>
                         @foreach($categories as $category)

                        <option value={{$category->id}}>{{$category->name}}</option> 
                         @endforeach
                    </select>
                   
                </div>
            </div>
             <div class="col-sm-2">
                 <div class="form-group">
                    <a href="{{url('admin/categories/create',array('redirect'=>true))}}" class="btn btn-primary btn-round btn-sm">
                    <i class="material-icons">add</i> Nueva categoria
                    </a>
                </div>
            </div>
        </div>
   
            <textarea class="form-control" placeholder="Descripción detallada del producto" rows="5" name="long_description">{{old('long_description')}}</textarea>
            <button class="btn btn-primary">Registrar producto</button>
            <a href="{{route('admin.products')}}" role="button" class="btn btn-default">Cancelar </a>
        </div>
    </form>
</div>
</div>
</div>
@endsection
