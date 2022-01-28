@extends('layouts.admin')

@section('main')
    <fieldset>
        <legend><i class="fas fa-user-plus"></i> Add new Produit</legend>
        <form action="{{ route('produits.store') }}" method="post">
        @include('admin.produit.form')
        </form>
    </fieldset>
@endsection
