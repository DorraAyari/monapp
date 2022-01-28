@extends('layouts.admin')

@section('main')
    <fieldset>
        <legend><i class="fas fa-user-plus"></i> Add new commande</legend>
        <form action="{{ route('commandes.store') }}" method="post">
        @include('admin.commande.form')
        </form>
    </fieldset>
@endsection
