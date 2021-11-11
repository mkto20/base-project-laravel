<div class="col-sm-12 col-md-6">
    <div class="form-group">
        <label for="nome">
            nome
            <span class="red-text">*</span>
        </label>
        <input type="text" class="form-control material {{ $errors->has('nome') ? 'is-invalid' : '' }}" id="nome"
            name="nome" value="{{ $perfil->nome ?? old('nome') }}" required autofocus>
        @if ($errors->has('nome'))
            <div class="invalid-feedback">
                <strong>{{ $errors->first('nome') }}</strong>
            </div>
        @endif
    </div>
</div>
<div class="col-sm-12 col-md-6">
    <div class="form-group">
        <label for="identificador">
            identificador
            <span class="red-text">*</span>
        </label>
        <input type="text" class="form-control material {{ $errors->has('identificador') ? 'is-invalid' : '' }}"
            id="identificador" name="identificador" value="{{ $perfil->identificador ?? old('identificador') }}"
            required>
        @if ($errors->has('identificador'))
            <div class="invalid-feedback">
                <strong>{{ $errors->first('identificador') }}</strong>
            </div>
        @endif
    </div>
</div>
