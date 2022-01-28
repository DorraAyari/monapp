@extends('layouts.admin')

@section('main')
@if (session('storeCatalogue'))
    <div class="alert alert-dismissible alert-success fade show" role="alert">
        {{ session('storeCatalogue') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
@if (session('updateCatalogue'))
    <div class="alert alert-dismissible alert-success fade show" role="alert">
        {{ session('updateCatalogue') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

<h3><div class="text-info"><i class="fas fa-id-card"></i>Details about catalogue :</div> <strong>{{ $catalogue->name }}</strong></h3>
<div class="card" style="width: 38rem;">
    <div class="card-body">
        <h5 class="card-title"><i class="fas fa-user-check"></i> <strong>{{  $catalogue->name }}</strong></h5>
        <ul class="list-group list-group-flush">Details:
            <li class="list-group-item"> <i class="fas fa-at"></i>{{ $catalogue->name }}</li>
            <li class="list-group-item"><i class="fas fa-mobile-alt"></i> {{ $catalogue->description }}</li>
          
        </ul>
        <hr>
        <a href="{{ route('catalogues.edit', ['catalogue' => $catalogue->id]) }}" class="btn btn-warning" title="Edit catalogue{{ $catalogue->name }}" >
            <i class="fas fa-user-check"></i></a>
            <a href="#" class="btn btn-danger" title="Delete catalogue {{ $catalogue->name  }}"
                onclick="event.preventDefault(); document.querySelector('#delete-catalogue-form').submit()"
                ><i class="fas fa-user-slash"></i></a>
            <form action="{{ route('catalogues.destroy', ['catalogue' => $catalogue->id]) }}" method="post" id="delete-catalogue-form">@csrf @method('DELETE')</form>
       </div>
  </div>

@endsection
.