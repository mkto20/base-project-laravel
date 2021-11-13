<?php

namespace App\Http\Controllers\Security;

use App\Http\Controllers\Controller;
use App\Http\Requests\Security\SubmoduloRequest;
use App\Models\Helpers\Functions;
use App\Models\Helpers\ReportMessage;
use App\Models\Security\Modulo;
use App\Models\Security\Submodulo;
use Illuminate\Http\Request;

class SubmoduloController extends Controller
{
    private static $oneModel = "Submódulo";
    private static $manyModel = "Submódulos";
    private static $paginate = 10;

    private function applyFilters(Request $request)
    {
        $submodulos = Submodulo::query();

        if ($request->filled('modulo_id')) {
            $submodulos->where('modulo_id', '=', "{$request->modulo_id}");
        }

        if ($request->filled('nome')) {
            $submodulos->where('nome', 'like', "%{$request->nome}%");
        }

        return $submodulos->paginate(self::$paginate);
    }

    public function index(Request $request)
    {
        // aplica filtros de usuários
        $submodulos = $this->applyFilters($request);
        $modulos = Modulo::orderBy('nome', 'asc')->get();

        // aplica filtro na session
        $request = Functions::hasFilter($request);

        return view('admin.security.submodules.index', compact([
            'modulos',
            'submodulos'
        ]));
    }

    public function create()
    {
        $modulos = Modulo::orderBy('nome', 'asc')->get();
        return view('admin.security.submodules.create', compact([
            'modulos'
        ]));
    }

    public function store(SubmoduloRequest $request)
    {
        Submodulo::create($request->all());
        ReportMessage::save(self::$oneModel);

        return redirect()->route('submodules.index');
    }

    public function show(Submodulo $submodulo)
    {
        $modulos = Modulo::orderBy('nome', 'asc')->get();
        return view('admin.security.submodules.show', compact([
            'modulos',
            'submodulo'
        ]));
    }

    public function edit(Submodulo $submodulo)
    {
        $modulos = Modulo::orderBy('nome', 'asc')->get();
        return view('admin.security.submodules.edit', compact([
            'modulos',
            'submodulo'
        ]));
    }

    public function update(SubmoduloRequest $request, Submodulo $submodulo)
    {
        $submodulo->update($request->all());
        ReportMessage::update(self::$oneModel);

        return redirect()->back();
    }
}
