@extends('layouts.admin')

@section('main')
    <fieldset>
        <legend><i class="fas fa-user-edit"></i> Edit Client: <strong>{{ $client->nom." ".$client->prenom }}</strong></legend>
        <form action="{{ route('clients.update', ['client' => $client->id]) }}" method="post">
            @method('PUT')
            @include('admin.client.form')
        </form>
    </fieldset>
@endsection
