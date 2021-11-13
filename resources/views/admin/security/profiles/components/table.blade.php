<table class="table table-hover text-nowrap">
    <thead>
        <tr>
            <th></th>
            <th>Nome</th>
            <th>Identificador</th>
            <th>Data Cadastro</th>
            <th>Data Atualização</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($perfis as $p)
            <tr>
                <td width="5%">
                    @include('admin.security.profiles.components._action',['obj'=>$p])
                </td>
                <td>{{ $p->nome }}</td>
                <td>{{ $p->identificador }}</td>
                <td>{{ $p->created_at->format('d/m/Y - H:i') }}</td>
                <td>{{ $p->updated_at->format('d/m/Y - H:i') }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
