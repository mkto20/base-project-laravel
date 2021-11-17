<?php

namespace App\Policies;

use App\Models\Modulo;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {
        return $user->canOperate('users.index');
    }

    public function create(User $user)
    {
        return $user->canOperate('users.create');
    }

    public function show(User $user)
    {
        return $user->canOperate('users.show');
    }

    public function update(User $user)
    {
        return $user->canOperate('users.edit');
    }
}
