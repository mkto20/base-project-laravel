<?php

namespace App\Policies;

use App\Models\Modulo;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class SubmoduloPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {
        return $user->canOperate('submodules.index');
    }

    public function create(User $user)
    {
        return $user->canOperate('submodules.create');
    }

    public function show(User $user)
    {
        return $user->canOperate('submodules.show');
    }

    public function update(User $user)
    {
        return $user->canOperate('submodules.edit');
    }
}
