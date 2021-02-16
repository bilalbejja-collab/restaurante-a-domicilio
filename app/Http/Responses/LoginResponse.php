<?php

namespace App\Http\Responses;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Fortify\Contracts\LoginResponse as LoginResponseContract;

class LoginResponse implements LoginResponseContract
{

    public function toResponse($request)
    {
        /*
        $id = Auth::id();
        $user = User::find($id);
        if ($user->role->role_id == '2') {
            return $request->wantsJson()
                ? response()->json(['two_factor' => false])
                : redirect()->intended('welcome');
        }
        */

        return $request->wantsJson()
            ? response()->json(['two_factor' => false])
            : redirect()->intended(config('fortify.home'));
    }
}
