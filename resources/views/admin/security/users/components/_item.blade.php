<div class="card bg-light col-12">
    <div class="card-body p-2">
        <div class="row align-items-stretch">
            <div class="col align-self-center">
                <label class="labelWorks">
                    CPF
                </label> <br>
                {{ $user->cpf ?? '-' }}
            </div>
            <div class="col align-self-center">
                <label class="labelWorks">
                    Nome
                </label> <br>
                {{ $user->nome ?? '-' }}
            </div>
            <div class="col align-self-center">
                <label class="labelWorks">
                    Email
                </label> <br>
                {{ $user->email ?? '-' }}
            </div>
            <div class="col align-self-center">
                <label class="labelWorks">
                    Lembrete
                </label> <br>
                {{ $user->lembrete ?? '-' }}
            </div>
        </div>
    </div>
</div>
