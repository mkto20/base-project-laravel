<div class="card card-info card-outline">
    <div class="card-footer">
        {{ $users->appends($_GET)->links('pagination::adminlte-paginate') }}
    </div>
    <div class="card-body pt-1 pb-0 pl-2 pr-2">
        <div class="row">
            @if ($users->isEmpty())
                <div class="alert alert-info col-6 offset-3 mt-2">
                    {{-- <button type="button" class="close" data-dismiss="alert"
                        aria-hidden="true">×</button> --}}
                    <i class="icon fas fa-info"></i>
                    Nenhum usuário encontrado!
                </div>
            @else
                @include('admin.security.users.components.table')
            @endif
        </div>
    </div>
</div>
