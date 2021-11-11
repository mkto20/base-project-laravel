<div class="col-sm-12 col-md-4">
    <div class="form-group">
        <label for="nome">
            Nome
            <span class="red-text">*</span>
        </label>
        <input type="text" class="form-control material {{ $errors->has('nome') ? 'is-invalid' : '' }}" id="nome"
            name="nome" value="{{ $modulo->nome ?? old('nome') }}" required autofocus>
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
            name="icone" value="{{ $modulo->icone ?? old('icone') }}" required>
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
            URL (label)
            <span class="red-text">*</span>
        </label>
        <input type="text" class="form-control material {{ $errors->has('url') ? 'is-invalid' : '' }}" id="url"
            name="url" value="{{ $modulo->url ?? old('url') }}">
        @if ($errors->has('url'))
            <div class="invalid-feedback">
                <strong>{{ $errors->first('url') }}</strong>
            </div>
        @endif
    </div>
</div>
<div class="col-12 mt-2">
    <div class="form-group mb-1">
        <label for="descricao">Descrição do módulo <span class="red-text">*</span></label>
        <textarea name="descricao" class="form-control" placeholder required
            autofocus>{{ $modulo->descricao ?? old('descricao') }}</textarea>
    </div>
</div>
