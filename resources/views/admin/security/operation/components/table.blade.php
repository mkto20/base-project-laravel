<table class="table table-hover text-nowrap">
    <thead>
        <tr>
            <th></th>
            <th>Nome</th>
            <th>Nome curto</th>
            <th>icone</th>
            <th>URL</th>
            <th>Nova aba?</th>
            <th>Descrição</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($operacoes as $obj)
            <tr>
                <td width="5%">
                    @include('admin.security.operation.components._action',[$obj,$submodulo])
                </td>
                <td>
                    {{ $obj->nome ?? '-' }}
                </td>
                <td>
                    {{ $obj->nome_curto ?? '-' }}
                </td>
                <td>
                    <i class="{{ $obj->icone }}"></i>
                </td>
                <td>
                    {{ $obj->url }}
                </td>
                <td>
                    {{ $obj->target ?? 'Não' }}
                </td>
                <td>
                    {{ $obj->descricao ?? '-' }}
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
