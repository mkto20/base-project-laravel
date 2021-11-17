<?php

namespace App\Http\Controllers\Security;

use App\Http\Controllers\Controller;
use App\Http\Requests\Security\UserRequest;
use App\Models\Helpers\Functions;
use App\Models\Helpers\ReportMessage;
use App\Models\Security\Perfil;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    private static $oneModel = "Usuário";
    private static $manyModel = "Usuários";
    private static $paginate = 10;

    private function applyFilters(Request $request)
    {
        $users = User::query();

        if ($request->filled('cpf')) {
            $users->where('cpf', 'like', "%{$request->cpf}%");
        }

        if ($request->filled('nome')) {
            $users->where('nome', 'like', "%{$request->nome}%");
        }

        if ($request->filled('email')) {
            $users->where('email', 'like', "%{$request->email}%");
        }

        return $users->paginate(self::$paginate);
    }

    public function index(Request $request)
    {
        $this->authorize('viewAny', User::class);
        // aplica filtros de usuários
        $users = $this->applyFilters($request);
        // aplica filtro na session
        $request = Functions::hasFilter($request);

        return view('admin.security.users.index', compact([
            'users'
        ]));
    }

    public function create()
    {
        $this->authorize('create', User::class);
        $perfis = Perfil::all();

        return view('admin.security.users.create', compact([
            'perfis'
        ]));
    }

    public function store(UserRequest $request)
    {
        $this->authorize('create', User::class);
        User::create($request->all());
        ReportMessage::save(self::$oneModel);

        return redirect()->route('users.index');
    }

    public function show(User $user)
    {
        $this->authorize('show', User::class);
        $perfis = Perfil::all();

        return view('admin.security.users.show', compact([
            'user',
            'perfis'
        ]));
    }

    public function edit(User $user)
    {
        $this->authorize('update', User::class);
        $perfis = Perfil::all();

        return view('admin.security.users.edit', compact([
            'user',
            'perfis'
        ]));
    }

    public function update(UserRequest $request, User $user)
    {
        $this->authorize('update', User::class);
        $user->update($request->all());
        ReportMessage::update(self::$oneModel);

        return redirect()->back();
    }

    public function attach(Request $request, User $user)
    {
        $this->authorize('show', User::class);
        $user->perfis()->syncWithoutDetaching($request->perfil_id);
        ReportMessage::attach("Perfil");

        return redirect()->back();
    }

    public function detach(Request $request, User $user)
    {
        $this->authorize('show', User::class);
        $user->perfis()->detach($request->perfil_id);
        ReportMessage::detach("Perfil");

        return redirect()->back();
    }
}
