<?php

namespace App\Http\Controllers\Security;

use App\Http\Controllers\Controller;
use App\Http\Requests\Security\PerfilRequest;
use App\Models\Helpers\Functions;
use App\Models\Helpers\ReportMessage;
use App\Models\Security\Perfil;
use App\Models\Security\Submodulo;
use Illuminate\Http\Request;

class PerfilController extends Controller
{
    private static $oneModel = "Perfil";
    private static $manyModel = "Perfis";
    private static $paginate = 10;

    private function applyFilters(Request $request)
    {
        $perfis = Perfil::query();

        if ($request->filled('nome')) {
            $perfis->where('nome', 'like', "%{$request->nome}%");
        }

        if ($request->filled('identificador')) {
            $perfis->where('identificador', 'like', "%{$request->identificador}%");
        }

        return $perfis->paginate(self::$paginate);
    }

    public function index(Request $request)
    {
        // aplica filtros de usuários
        $perfis = $this->applyFilters($request);
        // aplica filtro na session
        $request = Functions::hasFilter($request);

        return view('admin.security.profiles.index', compact([
            'perfis'
        ]));
    }

    public function create()
    {
        return view('admin.security.profiles.create');
    }

    public function store(PerfilRequest $request)
    {
        Perfil::create($request->all());
        ReportMessage::save(self::$oneModel);

        return redirect()->route('perfis.index');
    }

    public function show(Perfil $perfil)
    {
        $submodulos = Submodulo::orderBy('nome', 'asc')->get();
        return view('admin.security.profiles.show', compact([
            'perfil',
            'submodulos'
        ]));
    }

    public function edit(Perfil $perfil)
    {
        return view('admin.security.profiles.edit', compact([
            'perfil'
        ]));
    }

    public function update(PerfilRequest $request, Perfil $perfil)
    {
        $perfil->update($request->all());
        ReportMessage::update(self::$oneModel);

        return redirect()->back();
    }

    public function attach(Request $request, Perfil $perfil)
    {
        $perfil->operacoes()->sync($request->operacoes);
        ReportMessage::update(self::$oneModel);

        return redirect()->back();
    }
}
