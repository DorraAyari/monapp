@extends('layouts.admin')

@section('main')
@if (session('deleteCommande'))
    <div class="alert alert-dismissible alert-success fade show" role="alert">
        {{ session('deleteCommande') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
<br>
<br>
<div class="text-info"><h3><i class="fas fa-users"></i>Commande list</h3></div>
 <br>

    <table class="table table-bordered">
        <thead>
          <tr class="table-info">
            <th scope="col"><i class="fas fa-key"></i> Key</th>
            <th scope="col"><i class="fas fa-user-check"></i>date</th>
            <th scope="col"><i class="fas fa-envelope-open-text"></i> numero de commande</th>
            <th scope="col"><i class="fas fa-envelope-open-text"></i> email</th>
<th scope="col"><i class="fas fa-user-check"></i>prix</th>

            <th scope="col"><i class="fas fa-cogs"></i> Opérations</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($commandes as $key => $commande)
            <tr>
              <th scope="row">{{ $key }}</th>
              <td>{{ $commande->date_commande}}</td>
              <td>{{ $commande->num_commande }}</td>
              <td>{{ $commande->email }}</td>
  <td>{{ $commande->prix_commande }}</td>
              <td>
                  <a href="{{ route('commandes.show', ['commande' => $commande->id]) }}" class="btn btn-info" title="Show details about {{ $commande->date_commande}}">
                  <i class="fas fa-user-tag">Detail</i></a>
                  <a href="{{ route('commandes.edit', ['commande' => $commande->id]) }}" class="btn btn-warning" title="Edit commande{{ $commande->date_commande  }}" >
                    <i class="fas fa-user-check">Edit</i></a>
                    <a href="#" class="btn btn-danger" title="Delete commande {{ $commande->date_commande }}"
                        onclick="event.preventDefault(); document.querySelector('#delete-commande-form').submit()"
                        ><i class="fas fa-user-slash">Delete</i></a>
                    <form action="{{ route('commandes.destroy', ['commande' => $commande->id]) }}" method="post" id="delete-commande-form">@csrf @method('DELETE')</form>
              </td>
            </tr>
            @endforeach
        </tbody>
      </table>
      <div class="mx-auto"  style="width: 200px;">
        {{ $commandes->links() }}
    </div>

@endsection
