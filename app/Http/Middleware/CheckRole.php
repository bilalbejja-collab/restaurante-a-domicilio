<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string $role
     * @return mixed
     */
    public function handle(Request $request, Closure $next, string $role)
    {
        $id = Auth::id();
        $user = User::find($id);

        if ($user->role->role != 'admin') {

            if ($role == 'grestaurante' && $user->role->role != 'grestaurante') {
                abort(403);
            }

            if ($role == 'repartidor' && $user->role->role != 'repartidor') {
                abort(403);
            }

            if ($role == 'cliente' && $user->role->role != 'cliente') {
                abort(403);
            }

            return $next($request);
        }

        return $next($request);
    }
}
