{{-- {{ var_dump(Request::route()->getAction()['as']) }} --}}
{{-- {{ var_dump(Request::path()) }} --}}
{{-- {{ var_dump(Auth::user()->perfis) }} --}}
{{-- {{ dd(Auth::user()->operacoesAtribuidas()) }} --}}
<div class="row">
    <div class="col-12">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('home') }}">
                    Home
                </a>
            </li>
            @foreach (Auth::user()->operacoesAtribuidas() as $operacao)
                @if (Request::route()->getAction()['as'] == $operacao->url)
                    <li class="breadcrumb-item">{{ $operacao->submodulo->nome }}</li>
                    <li class="breadcrumb-item active">{{ $operacao->nome }}</li>
                @endif
            @endforeach
        </ol>
    </div>
</div>
