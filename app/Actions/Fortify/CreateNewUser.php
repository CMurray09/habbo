<?php

namespace App\Actions\Fortify;

use App\Enums\Role;
use App\Models\User;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;
use App\Http\Controllers\UserMottoController as Motto;
use Illuminate\Validation\ValidationException;


class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param array $input
     * @return User
     * @throws GuzzleException|ValidationException
     */
    public function create(array $input): User
    {
        $motto = new Motto();
        $input['motto'] = $motto->getMotto($input['habboname']);
        Validator::make($input, [
            'username' => ['required', 'string', 'min:3', 'max:20', Rule::unique('users')],
            'habboname' => ['required', 'string', Rule::unique('users')],
            'motto' => ['required'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
        ])->validate();

        return User::create([
            'username' => $input['username'],
            'habboname' => $input['habboname'],
            'role' => Role::STANDARD->value,
            'password' => Hash::make($input['password']),
        ]);
    }
}
