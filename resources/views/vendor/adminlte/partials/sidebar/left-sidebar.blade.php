<aside class="main-sidebar {{ config('adminlte.classes_sidebar', 'sidebar-dark-primary elevation-4') }}">

    {{-- Sidebar brand logo --}}
    @if (config('adminlte.logo_img_xl'))
        @include('adminlte::partials.common.brand-logo-xl')
    @else
        @include('adminlte::partials.common.brand-logo-xs')
    @endif

    {{-- Sidebar menu --}}
    <div class="sidebar">
        <nav class="pt-2">
            <ul class="nav nav-pills nav-sidebar flex-column {{ config('adminlte.classes_sidebar_nav', '') }}"
                data-widget="treeview" role="menu" @if (config('adminlte.sidebar_nav_animation_speed') != 300)
                data-animation-speed="{{ config('adminlte.sidebar_nav_animation_speed') }}"
                @endif
                @if (!config('adminlte.sidebar_nav_accordion'))
                    data-accordion="false"
                @endif>
                {{-- Configured sidebar links --}}
                @each('adminlte::partials.sidebar.menu-item', $adminlte->menu('sidebar'), 'item')

                @php
                    $modulos = Auth::user()->myModules();
                    $submodules = Auth::user()->mySubmodules();
                @endphp
                @if (count($modulos->get()) > 0)
                    @foreach ($modulos->get() as $modulo)
                        <li id="{{ $modulo->id }}" class="nav-item has-treeview">
                            <a class="nav-link" >
                                <i class="{{ $modulo->icone ?? 'far fa-fw fa-circle' }}"></i>
                                <p>
                                    {{ $modulo->nome }}
                                    <i class="fas fa-angle-left right"></i>
                                    {{-- <span class="badge badge-{{ $item['label_color'] ?? 'primary' }} right">
                                        {{ $modulo->nome }}
                                    </span> --}}
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                @foreach ($submodules->get() as $submodulo)
                                    @if ($submodulo->menu)
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route($submodulo->url) }}">
                                                <i class="{{ $submodulo->icone }}"></i>
                                                <p>
                                                    {{ $submodulo->nome }}
                                                </p>
                                            </a>
                                        </li>
                                    @endif
                                @endforeach
                            </ul>
                        </li>
                    @endforeach
                @endif

            </ul>
        </nav>
    </div>

</aside>
