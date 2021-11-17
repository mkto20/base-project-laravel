@inject('lists', 'App\Models\Helpers\Lists')

<div class="col-sm-12 col-md-4">
    <div class="form-group">
        <label for="nome">
            Nome
            <span class="red-text">*</span>
        </label>
        <input type="text" class="form-control material {{ $errors->has('nome') ? 'is-invalid' : '' }}" id="nome"
            name="nome" value="{{ $submodulo->nome ?? old('nome') }}" required autofocus>
        @if ($errors->has('nome'))
            <div class="invalid-feedback">
                <strong>{{ $errors->first('nome') }}</strong>
            </div>
        @endif
    </div>
</div>
<div class="col-sm-12 col-md-4">
    <div class="form-group">
        <label for="icone">
            Icone
            <span class="red-text">*</span>
        </label>
        <input type="text" class="form-control material {{ $errors->has('icone') ? 'is-invalid' : '' }}" id="icone"
            name="icone" value="{{ $submodulo->icone ?? old('icone') }}" required>
        @if ($errors->has('icone'))
            <div class="invalid-feedback">
                <strong>{{ $errors->first('icone') }}</strong>
            </div>
        @endif
    </div>
</div>
<div class="col-sm-12 col-md-4">
    <div class="form-group">
        <label for="url">
            URL operação principal
            <span class="red-text">*</span>
        </label>
        <input type="text" class="form-control material {{ $errors->has('url') ? 'is-invalid' : '' }}" id="url"
            name="url" value="{{ $submodulo->url ?? old('url') }}" required>
        @if ($errors->has('url'))
            <div class="invalid-feedback">
                <strong>{{ $errors->first('url') }}</strong>
            </div>
        @endif
    </div>
</div>
<div class="col-4">
    <div class="form-group">
        <label for="modulo_id">Módulo <span class="red-text">*</span></label>
        <select class="custom-select select2 {{ $errors->has('modulo_id') ? 'is-invalid' : '' }}" name="modulo_id"
            id="modulo_id">
            <option value="" selected>Selecione...</option>
            @foreach ($modulos as $obj)
                <option value="{{ $obj->id }}" @if (isset($submodulo) && $obj->id == $submodulo->modulo_id) selected @endif>
                    {{ $obj->nome }}
                </option>
            @endforeach
        </select>
        @if ($errors->has('modulo_id'))
            <div class="invalid-feedback">
                <strong>{{ $errors->first('modulo_id') }}</strong>
            </div>
        @endif
    </div>
</div>
<div class="col-4">
    <div class="form-group">
        <label for="menu">Faz parte do menu? <span class="red-text">*</span></label>
        <select class="custom-select {{ $errors->has('menu') ? 'is-invalid' : '' }}" name="menu" id="menu">
            <option value="" selected>Selecione...</option>
            @foreach ($lists::$boolean as $key => $value)
                <option value="{{ $key }}" @if (isset($submodulo) && $key == $submodulo->menu) selected @endif>
                    {{ $value }}
                </option>
            @endforeach
        </select>
        @if ($errors->has('menu'))
            <div class="invalid-feedback">
                <strong>{{ $errors->first('menu') }}</strong>
            </div>
        @endif
    </div>
</div>
<div class="col-sm-12 col-md-4">
    <div class="form-group">
        <label for="ordem">
            ordem
        </label>
        <input type="number" min="1" class="form-control material {{ $errors->has('ordem') ? 'is-invalid' : '' }}"
            id="ordem" name="ordem" value="{{ $submodulo->ordem ?? old('ordem') }}">
        @if ($errors->has('ordem'))
            <div class="invalid-feedback">
                <strong>{{ $errors->first('ordem') }}</strong>
            </div>
        @endif
    </div>
</div>
<div class="col-12 mt-2">
    <div class="form-group mb-1">
        <label for="descricao">Descrição do submódulo</label>
        <textarea name="descricao" class="form-control {{ $errors->has('descricao') ? 'is-invalid' : '' }}"
            placeholder autofocus>{{ $submodulo->descricao ?? old('descricao') }}</textarea>
        @if ($errors->has('descricao'))
            <div class="invalid-feedback">
                <strong>{{ $errors->first('descricao') }}</strong>
            </div>
        @endif
    </div>
</div>
