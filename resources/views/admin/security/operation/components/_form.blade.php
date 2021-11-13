@inject('lists', 'App\Models\Helpers\Lists')

<div class="col-sm-12 col-md-4">
    <div class="form-group">
        <label for="nome">
            Nome
            <span class="red-text">*</span>
        </label>
        <input type="text" class="form-control material {{ $errors->has('nome') ? 'is-invalid' : '' }}" id="nome"
            name="nome" value="{{ $obj->nome ?? old('nome') }}" required autofocus>
        @if ($errors->has('nome'))
            <div class="invalid-feedback">
                <strong>{{ $errors->first('nome') }}</strong>
            </div>
        @endif
    </div>
</div>
<div class="col-sm-12 col-md-4">
    <div class="form-group">
        <label for="nome_curto">
            Nome curto
            <span class="red-text">*</span>
        </label>
        <input type="text" class="form-control material {{ $errors->has('nome_curto') ? 'is-invalid' : '' }}"
            id="nome_curto" name="nome_curto" value="{{ $obj->nome_curto ?? old('nome_curto') }}" required autofocus>
        @if ($errors->has('nome_curto'))
            <div class="invalid-feedback">
                <strong>{{ $errors->first('nome_curto') }}</strong>
            </div>
        @endif
    </div>
</div>
<div class="col-sm-12 col-md-4">
    <div class="form-group">
        <label for="url">
            URL
            <span class="red-text">*</span>
        </label>
        <input type="text" class="form-control material {{ $errors->has('url') ? 'is-invalid' : '' }}" id="url"
            name="url" value="{{ $obj->url ?? old('url') }}" required>
        @if ($errors->has('url'))
            <div class="invalid-feedback">
                <strong>{{ $errors->first('url') }}</strong>
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
            name="icone" value="{{ $obj->icone ?? old('icone') }}" required>
        @if ($errors->has('icone'))
            <div class="invalid-feedback">
                <strong>{{ $errors->first('icone') }}</strong>
            </div>
        @endif
    </div>
</div>
<div class="col-4">
    <div class="form-group">
        <label for="target">Nova aba? <span class="red-text">*</span></label>
        <select class="custom-select {{ $errors->has('target') ? 'is-invalid' : '' }}" name="target" id="target">
            @foreach ($lists::$target as $key => $value)
                <option value="{{ $key }}" @if (isset($obj) && $key == $obj->target) selected @endif>
                    {{ $value }}
                </option>
            @endforeach
        </select>
        @if ($errors->has('target'))
            <div class="invalid-feedback">
                <strong>{{ $errors->first('target') }}</strong>
            </div>
        @endif
    </div>
</div>
<div class="col-12 mt-2">
    <div class="form-group mb-1">
        <label for="descricao">Descrição do submódulo</label>
        <textarea name="descricao" class="form-control {{ $errors->has('descricao') ? 'is-invalid' : '' }}"
            placeholder autofocus>{{ $obj->descricao ?? old('descricao') }}</textarea>
        @if ($errors->has('descricao'))
            <div class="invalid-feedback">
                <strong>{{ $errors->first('descricao') }}</strong>
            </div>
        @endif
    </div>
</div>
