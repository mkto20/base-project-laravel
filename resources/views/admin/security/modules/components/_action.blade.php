@can('update', App\Models\Security\Modulo::class)
    <a id="menu{{ $obj->id }}" class="btn btn-tool" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-bars"></i>
    </a>
    <ul aria-labelledby="menu{{ $obj->id }}" class="dropdown-menu border-0 shadow" style="left: 0px; right: inherit;">
        <li>
            <a href="{{ route('modules.edit', $obj) }}" class="dropdown-item pointer">
                <i class="far fa-edit"></i>
                Editar
            </a>
        </li>
    </ul>
@endcan
