<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {
        Validator::make($input, [
            'dni' => ['required', 'string', 'max:10'],
            'name' => ['required', 'string', 'max:255'],
            'lastname' => ['required'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'address' => ['required'],
            'city' => ['required'],
            'movil' => ['required'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['required', 'accepted'] : '',
        ])->validate();

        return User::create([
            'dni' => $input['dni'],
            'nombre' => $input['name'],
            'apellidos' => $input['lastname'],
            'email' => $input['email'],
            'direccion' => $input['address'],
            'ciudad' => $input['city'],
            'telefono' => $input['movil'],
            'password' => Hash::make($input['password']),
        ]);
    }
}
