<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class PasswordResetTest extends TestCase
{
    use RefreshDatabase;

    public function test_password_can_be_reset(): bool
    {
        $user['username'] = 'HabboDome';
        $user['habboname'] = 'HabboDome';
        $user['password'] = 'test';
        $user = User::factory()->create($user);

        $myArray = array(
            'username' => 'HabboDome',
            'habboname' => 'HabboDome',
            'motto' => 'HabboDome-Reset',
            'password' => 'Password123',
        );

        $this->json('POST', 'password-reset', $myArray);

        $this->assertDatabaseHas('users', [
            'username' => 'HabboDome',
            'habboname' => 'HabboDome',
            'password' => Hash::check('Password123', $user->password),
        ]);

        return true;
    }
}
