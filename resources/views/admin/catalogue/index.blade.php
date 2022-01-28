@extends('layouts.admin')

@section('main')
@if (session('deleteCatalogue'))
    <div class="alert alert-dismissible alert-success fade show" role="alert">
        {{ session('deleteCatalogue') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
<a href="{{ route('catalogues.create') }}" class="btn btn-outline-primary float-right"><i class="fas fa-user-plus"></i> Add new catalogue</a>
<div class="text-info"><h3><i class="fas fa-users"></i> Catalogues list</h3></div>
 <br>

    <table class="table table-bordered">
        <thead>
          <tr class="table-info">
            <th scope="col"><i class="fas fa-key"></i> Key</th>
            <th scope="col"><i class="fas fa-user-check"></i>name</th>
            <th scope="col"><i class="fas fa-envelope-open-text"></i> description</th>

            <th scope="col"><i class="fas fa-cogs"></i> Opérations</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($catalogues as $key => $catalogue)
            <tr>
              <th scope="row">{{ $key }}</th>
              <td>{{ $catalogue->name }}</td>
              <td>{{ $catalogue->description }}</td>
              <td>
                <a href="{{ route('catalogues.show', ['catalogue' => $catalogue->id]) }}" class="btn btn-info" title="Show details about {{ $catalogue->name }}"><i class="fas fa-user-tag">Detail</i></a>
           
                  <a href="{{ route('catalogues.edit', ['catalogue' => $catalogue->id]) }}" class="btn btn-warning" title="Edit catalogue{{ $catalogue->name }}" >
                    <i class="fas fa-user-check">Edit</i></a>
                
                  <a href="#" class="btn btn-danger" title="Delete catalogue {{ $catalogue->name  }}"
                    onclick="event.preventDefault(); document.querySelector('#delete-catalogue-form').submit()"
                    ><i class="fas fa-user-slash">Delete</i></a>
                <form action="{{ route('catalogues.destroy', ['catalogue' => $catalogue->id]) }}" method="post" id="delete-catalogue-form">@csrf @method('DELETE')</form>
              </td>
            </tr>
            @endforeach
        </tbody>
      </table>
      <div class="mx-auto"  style="width: 200px;">
        {{ $catalogues->links() }}
    </div>

@endsection
