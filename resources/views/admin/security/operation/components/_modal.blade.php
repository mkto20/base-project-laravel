<div class="modal fade" id="modal_operacao{{ $id }}" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            @if (is_null($obj))
                <form id="operation{{ $id }}" action="{{ route('operations.store') }}" method="POST">
                @else
                    <form id="edit_operation{{ $id }}" action="{{ route('operations.update', $obj) }}"
                        method="POST">
                        @method('PUT')
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
                    @include('admin.security.operation.components._form',[$obj])
                </div>
            </div>
            <div class="modal-footer justify-content-end">
                <input type="hidden" name="submodulo_id" value="{{ $submodulo->id }}">
                <button type="submit" class="btn teal darken-3 white-text m-1">
                    <i class="fas fa-check"></i>
                    Salvar
                </button>
                <a class="btn light-blue darken-3 white-text" data-dismiss="modal">
                    Cancelar
                </a>
            </div>
            </form>
        </div>
    </div>
</div>
