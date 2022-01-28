@extends('layouts.admin')

@section('main')
    <fieldset>
        <legend><i class="fas fa-user-plus"></i> Add new catalogue</legend>
        <form action="{{ route('catalogues.store') }}" method="post">
        @include('admin.catalogue.form')
        </form>
    </fieldset>
@endsection
