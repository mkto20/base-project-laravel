@extends('adminlte::page')

@section('content_header')
    <div class="d-flex d-inline-flex col-12">
        <div class="col-6">
            <h1 class="m-0 text-dark">
                <i class="fas fa-user-shield"></i>
                Usuário
            </h1>
        </div>
    </div>

@stop

@section('content')
    @include('admin.security.users.components._item',$user)
    <div class="row">
        <div class="col-12 mb-2">
            <a class="btn btn-sm bg-info white-text float-right m-0 elevation-1" data-toggle="modal" data-target="#modal_0">
                Novo Perfil &nbsp;<i class="fas fa-plus-circle white-text"></i>
            </a>
            @include('admin.security.users.profiles._modal',
            [
            'id'=>0,
            'title'=>'Novo Perfil',
            'obj'=>null,
            'user'=>$user,
            'perfis'=>$perfis
            ])
        </div>
        <div class="col-12 mb-2">
            @include('admin.security.users.profiles.list',[
            'perfis'=>$user->perfis()->paginate(10),
            ])
        </div>
    </div>
@endsection
