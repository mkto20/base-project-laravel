@extends('adminlte::page')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-3 mt-3">
                <div class="card card-widget widget-user-2 card-outline card-secondary">
                    <!-- Add the bg color to the header using any of the bg-* classes -->
                    <div class="widget-user-header d-flex justify-content-center">
                        <!-- /.widget-user-image -->
                        <h3 class="widget-user-username ml-0">
                            <i class="fas fa-shield-alt"></i>
                            Segurança
                        </h3>
                        {{-- <h5 class="widget-user-desc">Lead Developer</h5> --}}
                    </div>
                    <div class="card-footer p-0">
                        <ul class="nav flex-column">
                            <li class="nav-item underline">
                                <a href="{{ route('users.index') }}" class="nav-link black-text">
                                    <i class="fas fa-user-shield mr-2"></i>Usuários
                                    {{-- <span class="float-right badge bg-primary">31</span> --}}
                                </a>
                            </li>
                            <li class="nav-item underline">
                                <a href="{{ route('perfis.index') }}" class="nav-link black-text">
                                    <i class="far fa-address-card mr-2"></i>Perfil
                                    {{-- <span class="float-right badge bg-info">5</span> --}}
                                </a>
                            </li>
                            <li class="nav-item underline">
                                <a href="#" class="nav-link black-text">
                                    Módulos
                                    {{-- <span class="float-right badge bg-success">12</span> --}}
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
