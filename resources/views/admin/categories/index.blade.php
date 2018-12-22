@extends('layouts.app')
@section('body-class','product-page')
@section('title','Listado de categorias')
@section('content')

<div class="header header-filter" style="background-image: url('https://images.unsplash.com/photo-1423655156442-ccc11daa4e99?crop=entropy&dpr=2&fit=crop&fm=jpg&h=750&ixjsv=2.1.0&ixlib=rb-0.3.5&q=50&w=1450');">
</div>

<div class="main main-raised">
    <div class="container">
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
   <div class="section text-center">
    <h2 class="title">Listado de categorias</h2>
        <div class="team">
            <div class="row">
                <a href="{{url('admin/categories/create',array('redirect'=>0))}}" class="btn btn-primary btn-round text-center" style="margin-top: -55px;margin-bottom: 55px ">Agregar categoria</a>
                <table class = "table">
                    <thead>
                        <tr>
                            <th class = "text-center"> # </th>
                             <th class = "text-center"> Imagen </th>
                            <th lass="col-md-2 text-center"> Nombre </th>
                            <th class="col-md-4 text-center"> Descripción </th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach($categories as $category)
                        <tr>
                            <td style="vertical-align: middle; text-align: left;"> {{$category->id}} </td>

                            <td class="text-center" style="vertical-align: middle; text-align: center;"> <img src="{{$category->featured_image_url}}" height="50"> </td>

                            <td style="vertical-align: middle;text-align: left;"> {{$category->name}} </td>
                            <td style="vertical-align: middle;text-align: left;"> {{$category->description}} </td>
                            <td class = "td-actions text-right" style="vertical-align: middle;text-align: right;">
                                <form action="{{route('admin.category.delete',$category->id )}}" method="POST">
                                    {{csrf_field()}}
                                     <a  href="#" role = "button" rel = "tooltip" title = "Ver categoria" class = "btn btn-info btn-simple btn-xs">
                                    <i class = "fa fa-info"> </i>
                                </a>
                                <a href="{{ route('admin.category.edit',$category->id )}}" role = "button" rel = "tooltip" title = "Editar categoria" class = "btn btn-success btn-simple btn-xs">
                                    <i class = "fa fa-edit"> </i>
                                </a>

                                <button type = "submit" rel = "tooltip" title = "Eliminar categoria" class = "btn btn-danger btn-simple btn-xs">
                                    <i class = "fa fa-times"> </i>
                                </button>
                            </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
<!-- Paginación -->
        {{ $categories->links() }}
            </div>
        </div>
    </div>
</div>
</div>


@endsection
