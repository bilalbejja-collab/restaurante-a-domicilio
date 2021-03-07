<?php

namespace App\Policies;

use App\Models\Pedido;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PedidoPolicy
{
    use HandlesAuthorization;

    public function autor(User $user, Pedido $pedido)
    {
        if (($user->id == $pedido->repartidor_id) || ($user->hasRole('Admin'))){
            return true;
        }
        else
            return false;
    }
}
