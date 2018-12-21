
@extends('layouts.app')
@section('body-class','profile-page')
@section('title','Resultados de búsqueda')
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
                        <img src="/img/search1.png" alt="" class="img-circle img-responsive img-raised">
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
                        <h3 class="title">Resultados de la búsqueda</h3>
                    </div>
                  
                  <div class="descrition text-center">
                     <p class="description"><b>Se encontraron {{$products->count()}} resultados para el término {{strtoupper("$query")}}</b></p>
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
                            <a href="{{route('customer.products.show', $product->id)}}">{{$product->name}}</a>
                        </h4>
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

          

@endsection
