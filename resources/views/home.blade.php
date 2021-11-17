@extends('adminlte::page')

@section('content')
    <div class="container">
        <div class="row">
            @php
                $modulos = Auth::user()->myModules();
                $submodules = Auth::user()->mySubmodules();
            @endphp
            @if (count($modulos->get()) == 0)
                <div class="alert yellow lighten-3 col-12 mt-2">
                    {{-- <button type="button" class="close" data-dismiss="alert"
                    aria-hidden="true">×</button> --}}
                    <i class="icon fas fa-info"></i>
                    Este usuário não tem permissões ativas ou perfil atribuído!
                </div>
            @endif
            @foreach ($modulos->get() as $modulo)
                <div class="col-3 mt-3">
                    <div class="card card-widget widget-user-2 card-outline card-secondary">
                        <div class="widget-user-header d-flex justify-content-center">
                            <h3 class="widget-user-username ml-0">
                                <i class="{{ $modulo->icone }}"></i>
                                {{ $modulo->nome }}
                            </h3>
                        </div>
                        <div class="card-footer p-0">
                            <ul class="nav flex-column">
                                @foreach ($submodules->get() as $submodulo)
                                    @if ($submodulo->menu)
                                        <li class="nav-item underline">
                                            <a href="{{ route($submodulo->url) }}" class="nav-link black-text">
                                                <i class="{{ $submodulo->icone }} mr-2"></i>{{ $submodulo->nome }}
                                                {{-- <span class="float-right badge bg-primary">31</span> --}}
                                            </a>
                                        </li>
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
