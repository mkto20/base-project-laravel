@inject('lists', 'App\Models\Helpers\Lists')

<div class="col-12">
    <div class="form-group">
        <label for="perfil_id">Selecione o perfil <span class="red-text">*</span></label>
        <select class="custom-select select2 {{ $errors->has('perfil_id') ? 'is-invalid' : '' }}" name="perfil_id"
            id="perfil_id" style="width: 100%">
            @foreach ($perfis as $perfil)
                <option value="{{ $perfil->id }}" @if (isset($obj) && $perfil->id == $perfil->id) selected @endif>
                    {{ $perfil->nome }}
                </option>
            @endforeach
        </select>
        @if ($errors->has('perfil_id'))
            <div class="invalid-feedback">
                <strong>{{ $errors->first('perfil_id') }}</strong>
            </div>
        @endif
    </div>
</div>
