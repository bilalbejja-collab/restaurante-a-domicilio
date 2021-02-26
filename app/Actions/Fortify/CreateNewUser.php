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
            'movil' => ['required', 'numeric'],

            'salario' => ['required', 'numeric', 'min:5'],
            'estado' => ['required'],

            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['required', 'accepted'] : '',
        ])->validate();

        return User::create([
            'dni' => $input['dni'],
            'name' => $input['name'],
            'lastname' => $input['lastname'],
            'email' => $input['email'],
            'address' => $input['address'],
            'city' => $input['city'],
            'movil' => $input['movil'],

            'salario' => $input['salario'],
            'estado' => $input['estado'],

            'password' => Hash::make($input['password']),
        ]);
    }
}
