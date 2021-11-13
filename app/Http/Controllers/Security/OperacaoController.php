<?php

namespace App\Http\Controllers\Security;

use App\Http\Controllers\Controller;
use App\Http\Requests\Security\OperacaoRequest;
use App\Models\Helpers\Functions;
use App\Models\Helpers\ReportMessage;
use App\Models\Security\Operacao;
use Illuminate\Http\Request;

class OperacaoController extends Controller
{
    private static $oneModel = "Operação";
    private static $manyModel = "Operações";

    public function store(OperacaoRequest $request)
    {
        Operacao::create($request->all());
        ReportMessage::save(self::$oneModel);

        return redirect()->back();
    }


    public function update(OperacaoRequest $request, Operacao $operacao)
    {
        $operacao->update($request->all());
        ReportMessage::update(self::$oneModel);

        return redirect()->back();
    }
}
