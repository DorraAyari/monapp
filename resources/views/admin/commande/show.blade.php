@extends('layouts.admin')

@section('main')
@if (session('storeCommande'))
    <div class="alert alert-dismissible alert-success fade show" role="alert">
        {{ session('storeCommande') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
@if (session('updateCommande'))
    <div class="alert alert-dismissible alert-success fade show" role="alert">
        {{ session('updateCommande') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
<h3><div class="text-info"><i class="fas fa-id-card"></i>Details about commande:</div> <strong>{{ $commande->date_commande }}</strong></h3>
<div class="card" style="width: 38rem;">
    <div class="card-body">
        <h5 class="card-title"><i class="fas fa-user-check"></i> <strong>{{  $commande->date_commande }}</strong></h5>
        <ul class="list-group list-group-flush">Details:
            <li class="list-group-item"> <i class="fas fa-at"></i>{{ $commande->date_commande}}</li>
            <li class="list-group-item"><i class="fas fa-mobile-alt"></i> {{ $commande->num_commande }}</li>
            <li class="list-group-item"> <i class="fas fa-map-marker"></i>{{ $commande->prix_commande }}</li>
   <li class="list-group-item"> <i class="fas fa-map-marker"></i>{{ $commande->description_commande }}</li>

        </ul>
        <hr>
        <a href="{{ route('commandes.edit', ['commande' => $commande->id]) }}" class="btn btn-warning" title="Edit commande{{ $commande->date_commande  }}">
            <i class="fas fa-user-check"></i></a>
            <a href="#" class="btn btn-danger" title="Delete commande {{ $commande->date_commande }}"
                onclick="event.preventDefault(); document.querySelector('#delete-commande-form').submit()"
                ><i class="fas fa-user-slash"></i></a>
            <form action="{{ route('commandes.destroy', ['commande' => $commande->id]) }}" method="post" id="delete-commande-form">@csrf @method('DELETE')</form>
       </div>
  </div>

@endsection
