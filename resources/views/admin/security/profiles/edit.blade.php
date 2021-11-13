@extends('adminlte::page')

@section('content_header')
    <div class="d-flex d-inline-flex col-12 offset-2 pl-0 pr-0">
        <div class="col-6 pl-0">
            <h1 class="m-0 text-dark">
                <i class="far fa-address-card"></i>
                Perfis
            </h1>
        </div>
    </div>
@stop

@section('content')
    <div class="card card-info card-outline col-8 offset-2 pr-0 pl-0">
        <form id="update" action="{{ route('perfis.update', $perfil) }}" method="post">
            @csrf
            @method('PUT')
            <div class="card-body pb-0">
                <div class="row">
                    @include('admin.security.profiles.components._form',[$perfil])
                </div>
            </div>
            <div class="card-footer">
                <a href="{{ route('perfis.index') }}" class="btn light-blue darken-3 white-text m-1 float-right">
                    <i class="fas fa-arrow-left"></i>
                    Voltar
                </a>
                <button type="submit" class="btn teal darken-3 white-text m-1 float-right">
                    <i class="fas fa-sync"></i>
                    Atualizar
                </button>
            </div>
        </form>
    </div>
@endsection
