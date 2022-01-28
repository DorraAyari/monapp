@extends('layouts.admin')

@section('main')
@if (session('deleteClient'))
    <div class="alert alert-dismissible alert-success fade show" role="alert">
        {{ session('deleteClient') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
<br>
<br>
<a href="{{ route('clients.create') }}" class="btn btn-outline-primary float-right"><i class="fas fa-user-plus"></i> Add new client</a>
<div class="text-info"><h3><i class="fas fa-users"></i> Clients list</h3></div>
 <br>

    <table class="table table-bordered">
        <thead>
          <tr class="table-info">
            <th scope="col"><i class="fas fa-key"></i> Key</th>
            <th scope="col"><i class="fas fa-user-check"></i>Name</th>
            <th scope="col"><i class="fas fa-envelope-open-text"></i> Email</th>

            <th scope="col"><i class="fas fa-cogs"></i> Opérations</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($clients as $key => $client)
            <tr>
              <th scope="row">{{ $key }}</th>
              <td>{{ $client->nom.' '.$client->prenom }}</td>
              <td>{{ $client->email }}</td>
              <td>
                  <a href="{{ route('clients.show', ['client' => $client->id]) }}" class="btn btn-info" title="Show details about {{ $client->nom.' '.$client->prenom }}">
                  <i class="fas fa-user-tag"></i>Detail</a>
                  <a href="{{ route('clients.edit', ['client' => $client->id]) }}" class="btn btn-warning" title="Edit client{{ $client->nom.' '.$client->prenom  }}" >
                    <i class="fas fa-user-check"></i>Edit</a>
                    <a href="#" class="btn btn-danger" title="Delete client {{ $client->nom.' '.$client->prenom  }}"
                        onclick="event.preventDefault(); document.querySelector('#delete-client-form').submit()"
                        ><i class="fas fa-user-slash">Delete</i></a>
                    <form action="{{ route('clients.destroy', ['client' => $client->id]) }}" method="post" id="delete-client-form">@csrf @method('DELETE')</form>
              </td>
            </tr>
            @endforeach
        </tbody>
      </table>
      <div class="mx-auto"  style="width: 200px;">
        {{ $clients->links() }}
    </div>

@endsection
