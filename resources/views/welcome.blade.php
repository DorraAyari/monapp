@extends('layouts.app')

@section('content')

<div class="container">
    
<div class="row">
    <div class="col-lg-3">
        
  
        <h1 class="my-4">Catégorie</h1>
        <div class="list-group">
        @foreach ($catalogues as $catalogue)
            <a class="list-group-item" href="#!">{{ $catalogue->name }}</a>
            @endforeach
        </div>
    </div>
   
    <div class="col-lg-9">
    @if (session('success'))
      <div class="alert alert-success">
          {{ session('success') }}
      </div>
  @endif
  @if (session('storeProduit'))
    <div class="alert alert-dismissible alert-success fade show" role="alert">
        {{ session('storeProduit') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
        <div class="carousel slide my-4" id="carouselExampleIndicators" data-ride="carousel">
            <ol class="carousel-indicators">
                <li class="active" data-target="#carouselExampleIndicators" data-slide-to="0"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner" role="listbox">
                <div class="carousel-item active"><img class="d-block img-fluid" src="https://via.placeholder.com/900x350" alt="First slide" /></div>
                <div class="carousel-item"><img class="d-block img-fluid" src="https://via.placeholder.com/900x350" alt="Second slide" /></div>
                <div class="carousel-item"><img class="d-block img-fluid" src="https://via.placeholder.com/900x350" alt="Third slide" /></div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
        <div class="row">
        @foreach ($produits as $produit)
        <div class="col-lg-4 col-md-6 mb-4">
                <div class="card h-100">
                    <a href="#!"><img class="card-img-top" src="{{ $produit->pics }}" alt="..." /></a>
                    <div class="card-body">
                        <h4 class="card-title"><a href="#!">{{ $produit->produits_nom }}</a></h4>
                        <h5>${{ $produit->price}}</h5>
                        <p class="card-text">{{ $produit->price}}</p>
                        <form action="{{ route('cart.store') }}"method="post">
                        @csrf
                        <input type="hidden" name="id" value="{{ $produit->id }}">
                    <input type="hidden" name="produits_nom" value="{{ $produit->produits_nom }}">
                  <input type="hidden" name="price" value="{{ $produit->price }}">
                        <button type="submit" class="btn btn-dark">ajouter au panier</button>
                        </form>
                    </div>
                    <div class="card-footer"><small class="text-muted">★ ★ ★ ★ ☆</small></div>
                </div>
            </div>
            @endforeach
      
      
          
     
            
        </div>
    </div>
</div>
@endsection