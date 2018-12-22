@extends('layouts.app')
@section('body-class','product-page')
@section('title','Editar categoria')
@section('content')

<div class="header header-filter" style="background-image: url('https://images.unsplash.com/photo-1423655156442-ccc11daa4e99?crop=entropy&dpr=2&fit=crop&fm=jpg&h=750&ixjsv=2.1.0&ixlib=rb-0.3.5&q=50&w=1450');">

</div>

<div class="main main-raised">
<div class="container">
    <div class="section">
        <h2 class="title text-center">Editar categoria</h2>
        {{--Mensaje--}}
        
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

        <form action="{{route('admin.category.update', $category->id)}}" method="post" accept-charset="utf-8" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group label-floating">
                    <label class="control-label">Nombre categoria </label>
                    <input type="text" class="form-control"name="name" id="name" value="{{old('name',$category->name)}}">
                </div>
            </div>
            <div class="col-sm-6">
             <label class="control-label">Imagen</label>
             <input type="file" name="image" id="image" class="btn btn-info">
             @if ($category->image)
             <p class="help-block"> Subir solo si desea remplazar la <a href=" {{asset('images/categories/' . $category->image) }} ">imagen actual</a>
            </p>
             @endif
               </div>
            </div>
          
            <textarea class="form-control" placeholder="Descripción" rows="5" name="description">{{old('description', $category->description)}}</textarea>
            <button type="submit" class="btn btn-primary">Actualizar categoria</button>
            <a href="{{route('admin.category')}}" role="button" class="btn btn-default">Cancelar </a></form>
        </div>
    </div>
</div>

@endsection
