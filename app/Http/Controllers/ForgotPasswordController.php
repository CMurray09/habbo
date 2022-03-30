<?php

namespace App\Http\Controllers;

use App\Actions\Fortify\PasswordValidationRules;
use App\Models\User;
use Illuminate\Contracts\Auth\PasswordBroker;
use Illuminate\Contracts\Auth\StatefulGuard;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use App\Http\Controllers\UserMottoController as Motto;

class ForgotPasswordController extends Controller
{
    use PasswordValidationRules;

    /**
     * The guard implementation.
     *
     * @var StatefulGuard
     */
    protected StatefulGuard $guard;
    private User $user;

    /**
     * Create a new controller instance.
     *
     * @param StatefulGuard  $guard
     * @return void
     */
    public function __construct(StatefulGuard $guard, User $user)
    {
        $this->guard = $guard;
        $this->user = $user;
    }

    /**
     * Reset the user's password.
     *
     * @param  Request  $request
     * @return RedirectResponse
     */
    public function resetPassword(Request $request): RedirectResponse
    {
        $motto = new Motto();
        $request['motto'] = $motto->getMotto($request['habboname'], 'HabboDome-Reset');
        $request->validate([
            'username' => 'required',
            'habboname' => 'required',
            'motto' => ['required'],
            'password' => $this->passwordRules(),
        ]);

        $user = $this->user
            ->where('username', 'LIKE', $request['username'])
            ->where('habboname', 'LIKE', $request['habboname']);
        $user->update([
            'username' => $request['username'],
            'habboname' => $request['habboname'],
            'password' => Hash::make($request['password'])]);

        return redirect()->route('login');
    }

    /**
     * Get the broker to be used during password reset.
     *
     * @return PasswordBroker
     */
    protected function broker(): PasswordBroker
    {
        return Password::broker(config('fortify.passwords'));
    }
}
