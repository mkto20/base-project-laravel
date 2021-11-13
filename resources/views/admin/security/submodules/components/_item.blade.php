<div class="card bg-light col-12">
    <div class="card-body p-2">
        <div class="row align-items-stretch">
            <div class="col align-self-center">
                <label class="labelWorks">
                    Módulo
                </label> <br>
                {{ $submodulo->modulo->nome ?? '-' }}
            </div>
            <div class="col align-self-center">
                <label class="labelWorks">
                    Nome
                </label> <br>
                {{ $submodulo->nome ?? '-' }}
            </div>
            <div class="col align-self-center">
                <label class="labelWorks">
                    Ícone
                </label> <br>
                <i class="{{ $submodulo->icone }}"></i>
            </div>
            <div class="col align-self-center">
                <label class="labelWorks">
                    Apareceu no menu?
                </label> <br>
                {{ $submodulo->menu ? 'Sim' : 'Não' }}
            </div>
            <div class="col align-self-center">
                <label class="labelWorks">
                    Ordenado?
                </label> <br>
                {{ $submodulo->ordem > 0 ? 'Sim' : 'Não' }}
            </div>
            <div class="col align-self-center">
                <label class="labelWorks">
                    Descrição
                </label> <br>
                {{ $submodulo->descricao ?? '-' }}
            </div>
        </div>
    </div>
</div>
