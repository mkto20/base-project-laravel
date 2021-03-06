<a id="menuUsers{{ $u->id }}" class="btn btn-tool" data-toggle="dropdown" aria-haspopup="true"
    aria-expanded="false">
    <i class="fas fa-bars"></i>
</a>
<ul aria-labelledby="menuUsers{{ $u->id }}" class="dropdown-menu border-0 shadow"
    style="left: 0px; right: inherit;">
    @can('show', App\Models\User::class)
        <li>
            <a href="{{ route('users.show', $u) }}" class="dropdown-item pointer">
                <i class="fas fa-id-card-alt"></i>
                Perfis
            </a>
        </li>
    @endcan
    @can('update', App\Models\User::class)
        <li>
            <a href="{{ route('users.edit', $u) }}" class="dropdown-item pointer">
                <i class="far fa-edit"></i>
                Editar
            </a>
        </li>
    @endcan
</ul>
