<a id="menuUsers{{ $u->id }}" class="btn btn-tool" data-toggle="dropdown" aria-haspopup="true"
    aria-expanded="false">
    <i class="fas fa-bars"></i>
</a>
<ul aria-labelledby="menuUsers{{ $u->id }}" class="dropdown-menu border-0 shadow"
    style="left: 0px; right: inherit;">
    <li>
        <a href="{{ route('users.edit', $u) }}" class="dropdown-item pointer">
            <i class="far fa-edit"></i>
            Editar
        </a>
    </li>
</ul>
