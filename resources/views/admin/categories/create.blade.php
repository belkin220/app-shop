@extends('layouts.app')
@section('body-class','prduct-page')
@section('title','Bienvenido a App Shop')
@section('content')

<div class="header header-filter" style="background-image: url('https://images.unsplash.com/photo-1423655156442-ccc11daa4e99?crop=entropy&dpr=2&fit=crop&fm=jpg&h=750&ixjsv=2.1.0&ixlib=rb-0.3.5&q=50&w=1450');">
    
</div>
<div class="main main-raised">
<div class="container">
    <div class="section">
        <h2 class="title text-center">Registrar categoria</h2>

      @if (session('notification'))
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
        <form action="{{url('admin/categories/')}}" method="post" accept-charset="utf-8" enctype="multipart/form-data">
            {{ csrf_field() }}
            <input type="hidden" name="redirect" value="{{$redirect}}">
            <div class="row">
            <div class="col-sm-6">
                <div class="form-group label-floating">
                    <label class="control-label">Nombre categoria</label>
                    <input type="text" class="form-control" name="name" id="name" autofocus value={{old('name')}}>
                </div>
            </div>

           <div class="col-sm-6">
             <label class="control-label">Imagen</label>
             <input type="file" name="image" id="image" class="btn btn-info">
               </div>
            </div>
          
            <textarea class="form-control" placeholder="Descripción" rows="5" name="description"></textarea>
            <button type="submit" class="btn btn-primary">Registrar categoria</button>
            <a href="{{route('admin.category')}}" role="button" class="btn btn-default">Cancelar </a>
        </div>
    </form>
</div>
</div>
</div>
@endsection
