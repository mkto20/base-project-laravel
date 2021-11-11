<?php

namespace App\Http\Controllers\Security;

use App\Http\Controllers\Controller;
use App\Http\Requests\Security\ModuloRequest;
use App\Models\Helpers\Functions;
use App\Models\Helpers\ReportMessage;
use App\Models\Security\Modulo;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\AssignOp\Mod;

class ModuloController extends Controller
{
    private static $oneModel = "Módulo";
    private static $manyModel = "Módulos";
    private static $paginate = 10;

    private function applyFilters(Request $request)
    {
        $modulos = Modulo::query();

        if ($request->filled('nome')) {
            $modulos->where('nome', 'like', "%{$request->nome}%");
        }

        return $modulos->paginate(self::$paginate);
    }

    public function index(Request $request)
    {
        // aplica filtros de usuários
        $modulos = $this->applyFilters($request);
        // aplica filtro na session
        $request = Functions::hasFilter($request);

        return view('admin.security.modules.index', compact([
            'modulos'
        ]));
    }

    public function create()
    {
        return view('admin.security.modules.create');
    }

    public function store(ModuloRequest $request)
    {
        Modulo::create($request->all());
        ReportMessage::save(self::$oneModel);

        return redirect()->route('modules.index');
    }

    public function edit(Modulo $modulo)
    {
        return view('admin.security.modules.edit', compact([
            'modulo'
        ]));
    }

    public function update(ModuloRequest $request, Modulo $modulo)
    {
        $modulo->update($request->all());
        ReportMessage::update(self::$oneModel);

        return redirect()->back();
    }
}
