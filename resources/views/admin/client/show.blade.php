@extends('layouts.admin')

@section('main')
@if (session('storeClient'))
    <div class="alert alert-dismissible alert-success fade show" role="alert">
        {{ session('storeClient') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
@if (session('updateClient'))
    <div class="alert alert-dismissible alert-success fade show" role="alert">
        {{ session('updateClient') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
<h3><div class="text-info"><i class="fas fa-id-card"></i>Details about client :</div> <strong>{{ $client->nom.' '.$client->prenom }}</strong></h3>
<div class="card" style="width: 38rem;">
    <div class="card-body">
        <h5 class="card-title"><i class="fas fa-user-check"></i> <strong>{{  $client->nom.' '.$client->prenom }}</strong></h5>
        <ul class="list-group list-group-flush">Details:
            <li class="list-group-item"> <i class="fas fa-at"></i>{{ $client->email }}</li>
            <li class="list-group-item"><i class="fas fa-mobile-alt"></i> {{ $client->telephone }}</li>
            <li class="list-group-item"> <i class="fas fa-map-marker"></i>{{ $client->adresse }}</li>
        </ul>
        <hr>
        <a href="{{ route('clients.edit', ['client' => $client->id]) }}" class="btn btn-warning" title="Edit client{{ $client->nom.' '.$client->prenom  }}">
            <i class="fas fa-user-check">Edit</i></a>
            <a href="#" class="btn btn-danger" title="Delete user {{ $client->nom.' '.$client->prenom  }}"
                onclick="event.preventDefault(); document.querySelector('#delete-client-form').submit()"
                ><i class="fas fa-user-slash">Delete</i></a>
            <form action="{{ route('clients.destroy', ['client' => $client->id]) }}" method="post" id="delete-client-form">@csrf @method('DELETE')</form>
       </div>
  </div>

@endsection
