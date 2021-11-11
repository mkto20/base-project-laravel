<table class="table table-hover text-nowrap">
    <thead>
        <tr>
            <th></th>
            <th>Nome</th>
            <th>Ícone</th>
            <th>URL</th>
            <th>Descrição</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($modulos as $obj)
            <tr>
                <td width="5%">
                    @include('admin.security.modules._action',$obj)
                </td>
                <td>{{ $obj->nome }}</td>
                <td>
                    <i class="{{ $obj->icone }}"></i>
                </td>
                <td>{{ $obj->url }}</td>
                <td>
                    {!! $obj->descricao !!}
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
