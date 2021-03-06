@extends('adminlte::page')

@section('content_header')
    <div class="d-flex d-inline-flex col-12 pl-0 pr-0">
        <div class="col-6 pl-0">
            @include('layouts.title-page')
        </div>
        <div class="col-6 pr-0 mb-2">
            <a href="{{ route('submodules.index') }}"
                class="btn btn-sm light-blue darken-3 white-text float-right m-0 elevation-1">
                <i class="fas fa-arrow-left"></i>
                Voltar
            </a>
        </div>
    </div>
@stop

@section('content')
    @include('admin.security.submodules.components._item',$submodulo)
    <div class="row">
        <div class="col-12 pr-0 mb-2">
            @can('create', App\Models\Security\Operacao::class)
                <a class="btn btn-sm bg-info white-text float-right m-0 elevation-1" data-toggle="modal"
                    data-target="#modal_operacao0">
                    Nova Operação &nbsp;<i class="fas fa-plus-circle white-text"></i>
                </a>
                @include('admin.security.operation.components._modal',[
                'id'=>0,
                'submodulo'=>$submodulo,
                'title'=>'Nova Operação',
                'obj'=>null,
                ])
            @endcan
        </div>
        <div class="col-12 pr-0 mb-2">
            @include('admin.security.operation.components.list',['operacoes'=>$submodulo->operacoes()->paginate(10)])
        </div>
    </div>

@endsection
