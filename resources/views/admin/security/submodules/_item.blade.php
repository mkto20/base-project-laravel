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
                <i class="{{ $obj->icone }}"></i>
            </div>
            <div class="col align-self-center">
                <label class="labelWorks">
                    Apareceu no menu?
                </label> <br>
                {{ $obj->menu ? 'Sim' : 'Não' }}
            </div>
            <div class="col align-self-center">
                <label class="labelWorks">
                    Ordenado?
                </label> <br>
                {{ $obj->ordem > 0 ? 'Sim' : 'Não' }}
            </div>
            <div class="col align-self-center">
                <label class="labelWorks">
                    Descrição
                </label> <br>
                {{ $obj->descricao ?? '-' }}
            </div>
        </div>
    </div>
</div>
