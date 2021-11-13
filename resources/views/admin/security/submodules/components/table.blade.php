<table class="table table-hover text-nowrap">
    <thead>
        <tr>
            <th></th>
            <th>Módulo</th>
            <th>Nome</th>
            <th>Ícone</th>
            <th>Aparece no menu?</th>
            <th>Ordenado?</th>
            <th>Descrição</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($submodulos as $obj)
            <tr>
                <td width="5%">
                    @include('admin.security.submodules.components._action',$obj)
                </td>
                <td>{{ $obj->modulo->nome }}</td>
                <td>
                    {{ $obj->nome }}
                </td>
                <td>
                    <i class="{{ $obj->icone }}"></i>
                </td>
                <td>
                    {{ $obj->menu ? 'Sim' : 'Não' }}
                </td>
                <td>
                    {{ $obj->ordem > 0 ? 'Sim' : 'Não' }}
                </td>
                <td>
                    {{ $obj->descricao }}
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
