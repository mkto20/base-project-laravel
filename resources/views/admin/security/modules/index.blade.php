@extends('adminlte::page')

@section('content_header')
    <div class="d-flex d-inline-flex col-12 pl-0 pr-0">
        <div class="col-6 pl-0">
            <h1 class="m-0 text-dark">
                <i class="far fa-object-group mr-2"></i>
                Módulos
            </h1>
        </div>
        <div class="col-6 pr-0">
            <a href="{{ route('modules.create') }}" class="btn btn-sm bg-info white-text float-right m-0 elevation-1">
                Adicionar&nbsp;<i class="fas fa-plus-circle white-text"></i>
            </a>
        </div>
    </div>
@stop

@section('content')

    @include('admin.security.modules.components._filter')
    @include('admin.security.modules.components.list',$modulos)

@endsection
