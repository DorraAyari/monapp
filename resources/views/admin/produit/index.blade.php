@extends('layouts.admin')

@section('main')
@if (session('deleteProduit'))
    <div class="alert alert-dismissible alert-success fade show" role="alert">
        {{ session('deleteProduit') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
<br>
<br>
<a href="{{ route('produits.create') }}" class="btn btn-outline-primary float-right"><i class="fas fa-user-plus"></i> Add new produit</a>
<div class="text-info"><h3><i class="fas fa-users"></i> Produits list</h3></div>
 <br>

    <table class="table table-bordered">
        <thead>
          <tr class="table-info">
            <th scope="col"><i class="fas fa-key"></i> Key</th>
            <th scope="col"><i class="fas fa-user-check"></i>Name</th>
            <th scope="col"><i class="fas fa-envelope-open-text"></i> Price</th>
            
            <th scope="col"><i class="fas fa-cogs"></i> Opérations</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($produits as $key => $produit)
            <tr>
              <th scope="row">{{ $key }}</th>
              <td>{{ $produit->produits_nom }}</td>
              <td>{{ $produit->price }}</td>
       
              <td>
                  <a href="{{ route('produits.show', ['produit' => $produit->id]) }}" class="btn btn-info" title="Show details about {{ $produit->nom.' '.$produit->prenom }}">
                  <i class="fas fa-user-tag"></i>Detail</a>
                  <a href="{{ route('produits.edit', ['produit' => $produit->id]) }}" class="btn btn-warning" title="Edit produit{{ $produit->nom.' '.$produit->prenom  }}" >
                    <i class="fas fa-user-check">Edit</i></a>
                    <a href="#" class="btn btn-danger" title="Delete produit {{ $produit->nom.' '.$produit->prenom  }}"
                        onclick="event.preventDefault(); document.querySelector('#delete-produit-form').submit()"
                        ><i class="fas fa-user-slash">Delete</i></a>
                    <form action="{{ route('produits.destroy', ['produit' => $produit->id]) }}" method="post" id="delete-produit-form">@csrf @method('DELETE')</form>
              </td>
            </tr>
            @endforeach
        </tbody>
      </table>
      <div class="mx-auto"  style="width: 200px;">
        {{ $produits->links() }}
    </div>

@endsection
