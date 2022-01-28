@extends('layouts.admin')

@section('main')
    <fieldset>
        <legend><i class="fas fa-user-edit"></i> Edit Catalogue: <strong>{{ $catalogue->nom." ".$catalogue->prenom }}</strong></legend>
        <form action="{{ route('catalogues.update', ['catalogue' => $catalogue->id]) }}" method="post">
            @method('PUT')
            @include('admin.catalogue.form')
        </form>
    </fieldset>
@endsection