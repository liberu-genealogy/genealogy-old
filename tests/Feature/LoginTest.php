<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Hash;
use Illuminate\Testing\TestResponse;
use Laravel\Sanctum\PersonalAccessToken;
use Tests\TestCase;

class LoginTest extends TestCase
{
    use RefreshDatabase;

    private const Password = 'password';
    private const WrongPassword = 'wrong_password';
    private const SpaUrl = 'spa.test';

    private $permissionGroup = 'administration.users';
    private $testModel;
    private $spaGuard;

    protected function setUp(): void
    {
        parent::setUp();

        $this->seed();

        $this->testModel = $this->user();

        $this->spaGuard = Arr::wrap(Config::get('sanctum.guard', 'web'))[0];

        Config::set('sanctum.stateful', [self::SpaUrl]);
    }

    /** @test */
    public function can_login_from_spa()
    {
        $response = $this->loginSpa();
        $response->assertJson(['auth' => true]);
        $this->assertAuthenticatedAs($this->testModel, $this->spaGuard);
    }

    /** @test */
    public function can_login_from_api()
    {
        $response = $this->loginApi();

        $this->assertTokenAuthenticate($response->json('token'));
    }

    /** @test */
    public function can_login_from_webview()
    {
        $response = $this->disableCookieEncryption()
            ->withCookie('webview', true)
            ->loginApi(null, self::SpaUrl);

        $this->assertTokenAuthenticate($response->json('token'));
    }

    /** @test */
    public function can_authenticate_token_api()
    {
        $response = $this->loginApi();

        $this->get(route('core.home.index'), [
            'Authorization' => 'Bearer '.$response->json('token'),
        ])->assertOk();
    }

    /** @test */
    public function can_authenticate_cookie_api()
    {
        $response = $this->loginApi();

        $this->disableCookieEncryption()
            ->withCookie('Authorization', $response->json('token'))
            ->get(route('core.home.index'))
            ->assertOk();
    }

    /** @test */
    public function can_logout_from_spa()
    {
        $this->loginSpa();

        $this->post(route('logout'), [], [
            'referer' => self::SpaUrl,
        ]);

        $this->assertFalse($this->isAuthenticated($this->spaGuard));
    }

    /** @test */
    public function can_logout_from_api()
    {
        $response = $this->loginApi();

        $this->post(route('logout'), [], [
            'Authorization' => 'Bearer '.$response->json('token'),
        ]);

        $this->assertFalse($this->isAuthenticated('sanctum'));

        $this->assertTrue($this->testModel->tokens->isEmpty());
    }

    /** @test */
    public function cannot_login_from_api()
    {
        $this->loginApi(self::WrongPassword);

        $this->assertFalse($this->isAuthenticated('sanctum'));
    }

    /** @test */
    public function cannot_login_from_spa()
    {
        $this->loginSpa(self::WrongPassword);

        $this->assertFalse($this->isAuthenticated());
    }

    private function loginApi($password = null, $referer = null): TestResponse
    {
        return $this->post(route('login'), [
            'email' => $this->testModel->email,
            'password' => $password ?? self::Password,
            'device_name' => 'mobile',
        ], [
            'referer' => $referer,
        ]);
    }

    private function loginSpa($password = null): TestResponse
    {
        return $this->post(route('login'), [
            'email' => $this->testModel->email,
            'password' => $password ?? self::Password,
        ], ['referer' => self::SpaUrl]);
    }

    private function user(): User
    {
        $user = User::first();
        $user->password = Hash::make(self::Password);
        $user->is_active = true;

        return tap($user)->save();
    }

    protected function assertTokenAuthenticate($token): void
    {
        $token = PersonalAccessToken::findToken($token);
        $this->assertTrue($token->tokenable->is($this->testModel));
    }
}
