@inject('utils', 'App\Models\Helpers\Functions')

<div class="row">
    <div class="col-12">
        <div class="card direct-chat direct-chat-primary collapsed-card">
            <div class="card-header pointer" data-card-widget="collapse">
                <h3 class="card-title">
                    <i class="fas fa-filter"></i> Filtro
                </h3>

                <div class="card-tools">
                    <span class="badge badge-info">{{ $utils::countParams($_GET) }}</span> Filtros Aplicados
                    {{-- <a href="" title="Limpar Filtros"><i class="far fa-trash-alt red-text"></i></a> --}}
                </div>
            </div>
            <div class="card-footer" style="display: none;">
                <form id="filtering" action="{{ route('modules.index') }}" method="get">
                    @csrf
                    <div class="row">
                        <div class="col-sm-12 col-md-6">
                            <div class="form-group">
                                <input placeholder="Nome" type="text" class="form-control" name="nome" id="nome"
                                    value="{{ old('nome') }}">
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <div class="form-group">
                                <input placeholder="URL" type="text" class="form-control" name="url" id="url"
                                    value="{{ old('url') }}">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 d-flex justify-content-center">
                        <button type="submit" id="apply" class="btn btn-sm teal darken-3 white-text mr-3">
                            Aplicar
                        </button>
                        <a href="{{ route('modules.index') }}"
                            class="btn btn-sm light-blue darken-3 darken-3 white-text">
                            Limpar
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
