<?php

namespace App\Actions\Fortify;

use DateTime;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;

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
        Validator::extend('olderThan', function($attribute, $value, $parameters)
    {
        $minAge = ( ! empty($parameters)) ? (int) $parameters[0] : 18;
        return (new DateTime)->diff(new DateTime($value))->y >= $minAge;

    // or the same using Carbon:
    // return Carbon\Carbon::now()->diff(new Carbon\Carbon($value))->y >= $minAge;
    });
    
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'birthdate' => 'olderThan:18',
            'confirm_majority' => 'required',
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
        ])->validate();

        return User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'birthdate' => $input['birthdate'],
            'password' => Hash::make($input['password']),
        ]);
    }
}
