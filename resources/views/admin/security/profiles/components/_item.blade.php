<div class="card bg-light col-12">
    <div class="card-body p-2">
        <div class="row align-items-stretch">
            <div class="col align-self-center">
                <label class="labelWorks">
                    Nome
                </label> <br>
                {{ $perfil->nome ?? '-' }}
            </div>
            <div class="col align-self-center">
                <label class="labelWorks">
                    Identificador
                </label> <br>
                {{ $perfil->identificador ?? '-' }}
            </div>
        </div>
    </div>
</div>
