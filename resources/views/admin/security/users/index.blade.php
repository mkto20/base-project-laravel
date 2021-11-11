@extends('adminlte::page')

@section('content_header')
    <div class="d-flex d-inline-flex col-12">
        <div class="col-6">
            <h1 class="m-0 text-dark">Usuários</h1>
        </div>
        <div class="col-6">
            <a href="{{ route('users.create') }}" class="btn btn-sm teal darken-3 white-text float-right m-0">
                Adicionar&nbsp;<i class="fas fa-plus-circle white-text"></i>
            </a>
        </div>
    </div>
@stop

@section('content')

    @include('admin.security.users._filter')
    @include('admin.security.users.list')

@endsection
