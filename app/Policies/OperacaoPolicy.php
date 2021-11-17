<?php

namespace App\Policies;

use App\Models\Modulo;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class OperacaoPolicy
{
    use HandlesAuthorization;

    public function create(User $user)
    {
        return $user->canOperate('operations.create');
    }

    public function update(User $user)
    {
        return $user->canOperate('operations.edit');
    }
}
