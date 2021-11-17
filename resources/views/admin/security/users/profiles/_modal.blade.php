<div class="modal fade" id="modal_{{ $id }}" aria-modal="true" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            @if (is_null($obj))
                <form id="profiles{{ $id }}" action="{{ route('users.attach', $user) }}" method="POST">
                    @method('PUT')
                @else
                    <form id="remove_profile{{ $id }}" action="{{ route('users.detach', $obj) }}"
                        method="POST">
                        @method('delete')
            @endif
            @csrf
            <div class="modal-header">
                <h4 class="modal-title">{{ $title }}</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    @if (is_null($obj))
                        @include('admin.security.users.profiles._form',[$perfis])
                    @else
                        Deseja remover o perfil &nbsp;<span class="red-text"> {{ $obj->nome }} </span>&nbsp;
                        para este usuário?
                    @endif
                </div>
            </div>
            <div class="modal-footer justify-content-end">
                @if (!is_null($obj))
                    <input type="hidden" name="perfil_id" value="{{ $obj->id ?? '' }}">
                @endif
                <button type="submit" class="btn teal darken-3 white-text m-1">
                    <i class="fas fa-check"></i>
                    @if (is_null($obj))
                        Salvar
                    @else
                        Confirmar
                    @endif
                </button>
                <a class="btn light-blue darken-3 white-text" data-dismiss="modal">
                    Cancelar
                </a>
            </div>
            </form>
        </div>
    </div>
</div>
