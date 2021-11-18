<table class="table table-hover text-nowrap">
    <thead>
        <tr>
            <th></th>
            <th>Nome</th>
            <th>Nome curto</th>
            <th>icone</th>
            <th>URL</th>
            <th>Status</th>
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
                    @if ($obj->status)
                        <span class="green-text">Ativo</span>
                    @else
                        <span class="red-text">Inativo</span>
                    @endif
                </td>
                <td>
                    {{ is_null($obj->target) ? 'Aba Atual' : 'Nova Aba' }}
                </td>
                <td>
                    {{ $obj->descricao ?? '-' }}
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
