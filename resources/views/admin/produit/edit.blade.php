@extends('layouts.admin')

@section('main')
    <fieldset>
        <legend><i class="fas fa-user-edit"></i> Edit Produit: <strong>{{ $produit->nom." ".$produit->prenom }}</strong></legend>
        <form action="{{ route('produits.update', ['produit' => $produit->id]) }}" method="post">
            @method('PUT')
            @include('admin.produit.form')
        </form>
    </fieldset>
@endsection
