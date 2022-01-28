@extends('layouts.app')

@section('content')
    <fieldset>
        <legend><i class="fas fa-user-plus"></i> Add new Produit</legend>
        <form action="{{ route('views.store') }}" method="post">
        @include('form')
        </form>
    </fieldset>
@endsection
