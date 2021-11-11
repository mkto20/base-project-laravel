<table class="table table-hover text-nowrap">
    <thead>
        <tr>
            <th></th>
            <th>CPF</th>
            <th>Nome</th>
            <th>Email</th>
            <th>Data Cadastro</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($users as $u)
            <tr>
                <td width="5%">
                    @include('admin.security.users._action',$u)
                </td>
                <td>{{ $u->cpf }}</td>
                <td>{{ $u->nome }}</td>
                <td>{{ $u->email }}</td>
                <td>{{ $u->created_at->format('d/m/Y - H:i') }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
