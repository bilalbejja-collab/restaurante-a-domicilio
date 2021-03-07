<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Auth;

class RepartidorPolicy
{
    use HandlesAuthorization;

    public function autor(User $user, User $repartidor)
    {
        if (($user->id == $repartidor->id) || ($user->hasRole('Admin'))) {
            return true;
        } else
            return false;
    }
}
