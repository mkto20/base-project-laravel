@extends('adminlte::page')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-3 mt-3">
                <div class="card card-widget widget-user-2 card-outline card-info">
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
                            <li class="nav-item">
                                <a href="{{ route('users.index') }}" class="nav-link">
                                    Usuários
                                    {{-- <span class="float-right badge bg-primary">31</span> --}}
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    Perfil
                                    {{-- <span class="float-right badge bg-info">5</span> --}}
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
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
