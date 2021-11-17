@can('update', App\Models\Security\Operacao::class)
    <a id="menu{{ $obj->id }}" class="btn btn-tool" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-bars"></i>
    </a>
    <ul aria-labelledby="menu{{ $obj->id }}" class="dropdown-menu border-0 shadow" style="left: 0px; right: inherit;">
        <li>
            <a class="dropdown-item pointer" data-toggle="modal" data-target="#modal_operacao{{ $obj->id }}">
                <i class="far fa-edit"></i>
                Editar
            </a>
        </li>
    </ul>
    @include('admin.security.operation.components._modal',[
    'id'=>$obj->id,
    'submodulo'=>$submodulo,
    'title'=>'Editar Operação',
    'obj'=>$obj,
    ])
@endcan
