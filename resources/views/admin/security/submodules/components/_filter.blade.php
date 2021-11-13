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
                <form id="filtering" method="get">
                    @csrf
                    <div class="row">
                        <div class="col-sm-12 col-md-6">
                            <div class="form-group">
                                <select
                                    class="custom-select select2 {{ $errors->has('modulo_id') ? 'is-invalid' : '' }}"
                                    style="width: 100%" name="modulo_id" id="modulo_id">
                                    <option value="" selected>Selecione o módulo...</option>
                                    @foreach ($modulos as $obj)
                                        <option value="{{ $obj->id }}" @if ($obj->id == old('modulo_id')) selected @endif>
                                            {{ $obj->nome }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <div class="form-group">
                                <input placeholder="Nome" type="text" class="form-control" name="nome" id="nome"
                                    value="{{ old('nome') }}">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 d-flex justify-content-center">
                        <button type="submit" id="apply" class="btn btn-sm teal darken-3 white-text mr-3">
                            Aplicar
                        </button>
                        <a href="{{ route('submodules.index') }}"
                            class="btn btn-sm light-blue darken-3 darken-3 white-text">
                            Limpar
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
