@extends('layouts.admin')

@section('main')
    <fieldset>
        <legend><i class="fas fa-user-plus"></i> Add new client</legend>
        <form action="{{ route('clients.store') }}" method="post">
        @include('admin.client.form')
        </form>
    </fieldset>
@endsection
