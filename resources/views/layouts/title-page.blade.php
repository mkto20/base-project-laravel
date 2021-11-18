@inject('operacao', 'App\Models\Security\Operacao')
@php
$operation = $operacao::where('url', '=', Request::route()->getAction()['as'])->first();
@endphp
<h1 class="m-0 text-dark">
    <i class="{{ $operation->submodulo->icone }} mr-2"></i>
    {{ $operation->submodulo->nome }}
</h1>
