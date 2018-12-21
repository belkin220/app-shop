
@extends('layouts.app')
@section('body-class','profile-page')
@section('title','App Shop| Panel de Control')
@section('styles')

<style>
 .team {
  padding-bottom: 50px;
 }
 .team .row .col-md-4 {margin-bottom: 5em;}
      .row > [class*='col-'] {
      display: flex;
      flex-direction: column;
    }
  
</style>
@endsection
@section('content')


<div class="header header-filter" style="background-image: url('/img/examples/city.jpg');"></div>

<div class="main main-raised">
    <div class="profile-content">
        <div class="container">
            <div class="row">
                <div class="profile">
                    <div class="avatar">
                        <img src="{{$category->featured_image_url}}" alt="Imagen de la categoria {{$category->name}}" class="img-circle img-responsive img-raised">
                    </div>
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
                    <div class="name">
                        <h3 class="title">Productos en la categoria {{$category->name}}</h3>
                        <h6>{{$category->name}}</h6>
                    </div>
                </div>
            </div>

             <div class="team text-center">
            <div class="row">
                @foreach($products as $product)
                <div class="col-md-4">
                    <div class="team-player">
                        <!-- Se ha definido un accesor en el modelo-->
                        <img src="{{$product->featured_image_url}}" alt="Thumbnail Image" class="img-raised img-circle">
                        <h4 class="title">
                            <a href="{{route('products.show', $product->id)}}">{{$product->name}}</a>
                        </h4>
                        <p class="description">{{$product->description}}</p>
                       
                    </div>
                </div>
                @endforeach
            </div>
            <div class="text-center">
                {{$products->links()}}
            </div>
        </div>
            
        </div>
    </div>
</div>
 <!-- Modal Core -->

            <div class="modal fade" id="modalAddToCart" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Indique la cantidad</h4>
                  </div>  
                  <form method="POST" action="{{route('cart.store',['product_id' =>$product->id])}}">
                    {{csrf_field()}}
                    <input type="hidden" name="product_id" value="{{$product->id}}">
                  <div class="modal-body">
                 <input type="number" class="form-control" name="quantity" placeholder="Cantidad" required>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default btn-simple" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-info btn-simple">Añadir</button>
                  </div>
              </form> 
          </div>
              </div>
            </div>
          

@endsection
