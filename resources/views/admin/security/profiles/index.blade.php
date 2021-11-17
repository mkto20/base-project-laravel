@extends('adminlte::page')

@section('content_header')
    <div class="d-flex d-inline-flex col-12 pl-0 pr-0">
        <div class="col-6 pl-0">
            <h1 class="m-0 text-dark">
                <i class="far fa-address-card"></i>
                Perfis
            </h1>
        </div>
        @can('create', App\Models\Security\Perfil::class)
            <div class="col-6 pr-0">
                <a href="{{ route('perfis.create') }}" class="btn btn-sm bg-info white-text float-right m-0 elevation-1">
                    Adicionar&nbsp;<i class="fas fa-plus-circle white-text"></i>
                </a>
            </div>
        @endcan
    </div>
@stop

@section('content')

    @include('admin.security.profiles.components._filter')
    @include('admin.security.profiles.components.list',$perfis)

@endsection
