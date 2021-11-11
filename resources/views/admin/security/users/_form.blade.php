<div class="col-sm-12 col-md-4">
    <div class="form-group">
        <label for="cpf">
            CPF
            <span class="red-text">*</span>
        </label>
        <input type="text" class="form-control material {{ $errors->has('cpf') ? 'is-invalid' : '' }}" id="cpf"
            name="cpf" value="{{ $user->cpf ?? old('cpf') }}" required autofocus>
        @if ($errors->has('cpf'))
            <div class="invalid-feedback">
                <strong>{{ $errors->first('cpf') }}</strong>
            </div>
        @endif
    </div>
</div>
<div class="col-sm-12 col-md-4">
    <div class="form-group">
        <label for="nome">
            Nome
            <span class="red-text">*</span>
        </label>
        <input type="text" class="form-control material {{ $errors->has('nome') ? 'is-invalid' : '' }}" id="nome"
            name="nome" value="{{ $user->nome ?? old('nome') }}" required>
        @if ($errors->has('nome'))
            <div class="invalid-feedback">
                <strong>{{ $errors->first('nome') }}</strong>
            </div>
        @endif
    </div>
</div>
<div class="col-sm-12 col-md-4">
    <div class="form-group">
        <label for="email">
            Email
            <span class="red-text">*</span>
        </label>
        <input type="email" class="form-control material {{ $errors->has('email') ? 'is-invalid' : '' }}" id="email"
            name="email" value="{{ $user->email ?? old('email') }}">
        @if ($errors->has('email'))
            <div class="invalid-feedback">
                <strong>{{ $errors->first('email') }}</strong>
            </div>
        @endif
    </div>
</div>
@if (!isset($user))
    <div class="col-sm-12 col-md-6">
        <div class="form-group">
            <label for="password">
                Senha
                <span class="red-text">*</span>
            </label>
            <input type="password" class="form-control material {{ $errors->has('password') ? 'is-invalid' : '' }}"
                id="password" name="password">
            @if ($errors->has('password'))
                <div class="invalid-feedback">
                    <strong>{{ $errors->first('password') }}</strong>
                </div>
            @endif
        </div>
    </div>
    <div class="col-sm-12 col-md-6">
        <div class="form-group">
            <label for="password_confirmation">
                Confirmação de Senha
                <span class="red-text">*</span>
            </label>
            <input type="password" class="form-control material {{ $errors->has('password') ? 'is-invalid' : '' }}"
                id="password_confirmation" name="password_confirmation" value="">
            @if ($errors->has('password'))
                <div class="invalid-feedback">
                    <strong>{{ $errors->first('password') }}</strong>
                </div>
            @endif
        </div>
    </div>
@endif
