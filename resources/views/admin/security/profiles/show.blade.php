@extends('adminlte::page')

@section('content_header')
    <div class="d-flex d-inline-flex col-12 pl-0 pr-0">
        <div class="col-6 pl-0">
            @include('layouts.title-page')
        </div>
        <div class="col-6 pr-0 mb-2">
            <a href="{{ route('perfis.index') }}"
                class="btn btn-sm light-blue darken-3 white-text float-right m-0 elevation-1">
                <i class="fas fa-arrow-left"></i>
                Voltar
            </a>
        </div>
    </div>
@stop

@section('content')
    @include('admin.security.profiles.components._item',['obj'=>$perfil])
    <div class="card card-info card-outline col-12 pr-0 pl-0">
        @php
            $operacoesAtribuidas = $perfil
                ->operacoes()
                ->pluck('id')
                ->toArray();
        @endphp
        <form id="attach" action="{{ route('perfis.attach', $perfil) }}" method="post">
            @csrf
            @method('PUT')
            <div class="card-body pb-0">
                <div class="row">
                    @foreach ($submodulos as $submodulo)
                        <div class="col-sm-12 col-md-2">
                            <div class="card collapsed-card pointer">
                                <div class="card-header" data-card-widget="collapse">
                                    <h3 class="card-title">
                                        {{ $submodulo->nome }}
                                    </h3>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                            <i class="fas fa-plus"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body p-0" style="display: none;">
                                    <ul class="nav nav-pills flex-column">
                                        @php
                                            $operacoes = $submodulo
                                                ->operacoes()
                                                ->where('status', '=', 1)
                                                ->get();
                                        @endphp
                                        @foreach ($operacoes as $operacao)
                                            <li class="nav-item active">
                                                <a href="#" class="nav-link d-flex justify-content-between">
                                                    <label for="{{ $operacao->url }}" class="mt-1">
                                                        <i class="{{ $operacao->icone }}"></i>
                                                        {{ $operacao->nome_curto }}
                                                    </label>
                                                    <input type="checkbox" id="{{ $operacao->url }}" name="operacoes[]"
                                                        style="width: 20px; height: 20px"
                                                        class="pointer mt-2 select-checkbox" value="{{ $operacao->id }}"
                                                        @if (in_array($operacao->id, $operacoesAtribuidas)) checked @endif>
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn teal darken-3 white-text m-1 float-right">
                    <i class="fas fa-sync"></i>
                    Atualizar
                </button>
            </div>
        </form>
    </div>
@endsection
