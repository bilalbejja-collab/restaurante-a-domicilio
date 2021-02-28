<?php

namespace App\Http\Responses;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Fortify\Contracts\LoginResponse as LoginResponseContract;

class LoginResponse implements LoginResponseContract
{

    public function toResponse($request)
    {
        $id = Auth::id();
        $user = User::find($id);

        if ($user->hasRole("Cliente")) {
            return $request->wantsJson()
                ? response()->json(['two_factor' => false])
                : redirect()->intended('/');
        } else {

            return $request->wantsJson()
                ? response()->json(['two_factor' => false])
                : redirect()->intended(config('fortify.home'));
        }
    }
}
