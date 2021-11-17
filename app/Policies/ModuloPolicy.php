<?php

namespace App\Policies;

use App\Models\Modulo;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ModuloPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {
        return $user->canOperate('modules.index');
    }

    public function create(User $user)
    {
        return $user->canOperate('modules.create');
    }

    public function update(User $user)
    {
        return $user->canOperate('modules.edit');
    }
}
