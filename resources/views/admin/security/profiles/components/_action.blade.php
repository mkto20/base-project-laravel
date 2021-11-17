<a class="float-right pointer" data-toggle="modal" data-target="#modal_{{ $obj->id }}">
    <i class="far fa-trash-alt"></i>
</a>
@include('admin.security.users.profiles._modal',
[
'id'=>$obj->id,
'title'=>'Confirmação de exclusão',
'obj'=>$obj,
'user'=>$user,
'perfis'=>$perfis
])
{{-- <a id="menu{{ $obj->id }}" class="btn btn-tool" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    <i class="fas fa-bars"></i>
</a>
<ul aria-labelledby="menu{{ $obj->id }}" class="dropdown-menu border-0 shadow" style="left: 0px; right: inherit;">
    <li>
        <a href="{{ route('perfis.show', $obj) }}" class="dropdown-item pointer">
            <i class="fas fa-clipboard-list"></i>
            Permissões
        </a>
    </li>
    <li>
        <a href="{{ route('perfis.edit', $obj) }}" class="dropdown-item pointer">
            <i class="far fa-edit"></i>
            Editar
        </a>
    </li>
</ul> --}}
