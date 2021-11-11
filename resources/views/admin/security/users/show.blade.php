@extends('adminlte::page')

@section('content_header')
    <div class="d-flex d-inline-flex col-12">
        <div class="col-6">
            <h1 class="m-0 text-dark">Usuário</h1>
        </div>
    </div>

@stop

@section('content')
    @include('administration.users.aquisicao.create',[$produtos])
    <div class="card card-info card-outline">
        <div class="card-body">
            <div class="row">
                @include('administration.users._form',['user'=>$user,'show'=>true])
            </div>
        </div>
        <div class="card-footer">
            <a href="{{ route('users.index') }}" class="btn light-blue darken-3 white-text m-1 float-right">
                <i class="fas fa-arrow-left"></i>
                Voltar
            </a>
        </div>
    </div>
@endsection

@section('js')
    <script src="{{ asset('js/aquisicao.js') }}"></script>
@endsection
