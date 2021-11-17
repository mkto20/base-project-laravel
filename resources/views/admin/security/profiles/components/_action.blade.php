<a id="menu{{ $obj->id }}" class="btn btn-tool" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    <i class="fas fa-bars"></i>
</a>
<ul aria-labelledby="menu{{ $obj->id }}" class="dropdown-menu border-0 shadow" style="left: 0px; right: inherit;">
    @can('show', App\Models\Security\Perfil::class)
        <li>
            <a href="{{ route('perfis.show', $obj) }}" class="dropdown-item pointer">
                <i class="fas fa-clipboard-list"></i>
                Permissões
            </a>
        </li>
    @endcan
    @can('update', App\Models\Security\Perfil::class)
        <li>
            <a href="{{ route('perfis.edit', $obj) }}" class="dropdown-item pointer">
                <i class="far fa-edit"></i>
                Editar
            </a>
        </li>
    @endcan
</ul>
