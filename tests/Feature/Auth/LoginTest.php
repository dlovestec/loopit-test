<?php

namespace Tests\Feature\Auth;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Symfony\Component\HttpFoundation\Response;
use Tests\TestCase;

class LoginTest extends TestCase
{
    use RefreshDatabase;

    public function invalidUsersData(): array
    {
        return [
            [
                ['email' => '', 'password' => ''],
                ['email', 'password']
            ],
            [
                ['email' => 'somethingNotValid', 'password' => 'password'],
                ['email']
            ],
            [
                ['email' => 'somethingNotValid', 'password' => 123],
                ['password']
            ],
        ];
    }

    public function test_user_can_view_a_login_form()
    {
        $response = $this->get('/guest/login');
        $response->assertSuccessful();
    }

    public function test_user_cannot_view_a_login_form_when_authenticated()
    {
        $user = User::factory()->create();
        $response = $this->actingAs($user)->get('/guest/login');
        $response->assertSuccessful();
    }

    /**
     *
     * @dataProvider invalidUsersData
     */
    public function test_validation_error_should_be_triggered_for_invalid_email($invalidData, $invalidFields): void
    {
        $response = $this->post('auth/login', $invalidData);
        $this->assertDatabaseCount('users', 0);
    }

    public function test_user_can_login_with_correct_credentials()
    {
        $user = User::factory()->create([
            'password' => bcrypt($password = 'password'),
        ]);

        $response = $this->post('auth/login', [
            'email' => $user->email,
            'password' => $password,
        ]);

        $response->assertStatus(Response::HTTP_OK);
        $this->assertAuthenticatedAs($user);
    }

    public function test_user_cannot_login_with_incorrect_password()
    {
        $user = User::factory()->create([
            'password' => bcrypt('password'),
        ]);

        $response = $this->post('auth/login', [
            'email' => $user->email,
            'password' => 'invalid-password',
        ]);

        $response->assertStatus(Response::HTTP_UNAUTHORIZED);
        $this->assertGuest();
    }
}
