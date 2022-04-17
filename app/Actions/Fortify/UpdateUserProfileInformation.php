<?php

namespace App\Actions\Fortify;

use App\Http\Controllers\UserMottoController as Motto;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;
use Laravel\Fortify\Contracts\UpdatesUserProfileInformation;

class UpdateUserProfileInformation implements UpdatesUserProfileInformation
{
    /**
     * Validate and update the given user's profile information.
     *
     * @param mixed $user
     * @param array $input
     * @return void
     * @throws ValidationException|GuzzleException
     */
    public function update($user, array $input)
    {
        $motto = new Motto();
        $input['motto'] = $motto->getMotto($input['habboname'], 'HabboDome-Update');
        Validator::make($input, [
            'username' => ['required', 'string', 'min:3', 'max:20', Rule::unique('users')->ignore($user->id)],
            'habboname' => ['required', 'string', Rule::unique('users')->ignore($user->id)],
            'motto' => ['required'],
        ])->validateWithBag('updateProfileInformation');
        $user->forceFill([
            'username' => $input['username'],
            'habboname' => $input['habboname'],
        ])->save();
    }

    /**
     * Update the given verified user's profile information.
     *
     * @param mixed $user
     * @param array $input
     * @return void
     */
    protected function updateVerifiedUser(mixed $user, array $input)
    {
        $user->forceFill([
            'username' => $input['username'],
            'habboname' => $input['habboname'],
        ])->save();
    }
}
