@extends('layouts.admin')

@section('main')
@if (session('storeProduit'))
    <div class="alert alert-dismissible alert-success fade show" role="alert">
        {{ session('storeProduit') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
<br>
<br>
@if (session('updateProduit'))
    <div class="alert alert-dismissible alert-success fade show" role="alert">
        {{ session('updateProduit') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
<h3><div class="text-info"><i class="fas fa-id-card"></i>Details about Produit :</div> <strong>{{ $produit->produits_nom}}</strong></h3>
<div class="card" style="width: 38rem;">
    <div class="card-body">
        <h5 class="card-title"><i class="fas fa-user-check"></i> <strong>{{  $produit->produits_nom}}</strong></h5>
        <ul class="list-group list-group-flush">Details:
            <li class="list-group-item"> <i class="fas fa-at"></i>{{ $produit->pics }}</li>
            <li class="list-group-item"><i class="fas fa-mobile-alt"></i> {{ $produit->price }}</li>
            <li class="list-group-item"> <i class="fas fa-map-marker"></i>{{ $produit->produits_description }}</li>
        </ul>
        <hr>
        <a href="{{ route('produits.edit', ['produit' => $produit->id]) }}" class="btn btn-warning" title="Edit produit{{ $produit->produits_nom }}">
            <i class="fas fa-user-check"></i></a>
            <a href="#" class="btn btn-danger" title="Delete user {{ $produit->produits_nom }}"
                onclick="event.preventDefault(); document.querySelector('#delete-produit-form').submit()"
                ><i class="fas fa-user-slash"></i></a>
            <form action="{{ route('produits.destroy', ['produit' => $produit->id]) }}" method="post" id="delete-produit-form">@csrf @method('DELETE')</form>
       </div>
  </div>

@endsection
