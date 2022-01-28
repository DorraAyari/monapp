@extends('layouts.admin')

@section('main')
    <fieldset>
        <legend><i class="fas fa-user-edit"></i> Edit Commande: <strong>{{ $commande->date_commande }}</strong></legend>
        <form action="{{ route('commandes.update', ['commande' => $commande->id]) }}" method="post">
            @method('PUT')
            @include('admin.commande.form')
        </form>
    </fieldset>
@endsection
