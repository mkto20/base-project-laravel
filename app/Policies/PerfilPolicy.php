<?php

namespace App\Policies;

use App\Models\Modulo;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PerfilPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {
        return $user->canOperate('perfis.index');
    }

    public function create(User $user)
    {
        return $user->canOperate('perfis.create');
    }

    public function show(User $user)
    {
        return $user->canOperate('perfis.show');
    }

    public function update(User $user)
    {
        return $user->canOperate('perfis.edit');
    }
}
