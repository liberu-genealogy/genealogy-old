<?php

namespace Tests\Feature;

use App\Models\User;
use App\Notifications\ResetPassword;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Notification;
use LaravelLiberu\Forms\TestTraits\DestroyForm;
use LaravelLiberu\Forms\TestTraits\EditForm;
use LaravelLiberu\Tables\Traits\Tests\Datatable;
use Tests\TestCase;

class UserTest extends TestCase
{
    use Datatable, DestroyForm, EditForm, RefreshDatabase;

    private $permissionGroup = 'administration.users';
    private $testModel;

    protected function setUp(): void
    {
        parent::setUp();

        $this->seed()
            ->actingAs(User::first());

        $this->testModel = User::factory()->make();
    }

    /** @test */
    public function can_view_create_form()
    {
        $this->get(route($this->permissionGroup.'.create', [$this->testModel->id], false))
            ->assertStatus(200)
            ->assertJsonStructure(['form']);
    }

    /** @test */
    public function can_store_user()
    {
        Notification::fake();

        $response = $this->post(
            route('administration.users.store', [], false),
            $this->testModel->toArray()
        );

        $user = App::make(User::class)->whereEmail($this->testModel->email)
            ->first();

        $response->assertStatus(200)
            ->assertJsonStructure(['message'])
            ->assertJsonFragment([
                'redirect' => 'administration.users.edit',
                'param' => ['user' => $user->id],
            ]);

        Notification::assertSentTo($user, ResetPassword::class);
    }

    /** @test */
    public function can_update_user()
    {
        $this->testModel->save();

        $this->testModel->is_active = ! $this->testModel->is_active;

        $this->patch(
            route('administration.users.update', $this->testModel->id, false),
            $this->testModel->toArray()
        )->assertStatus(200)
            ->assertJsonStructure(['message']);

        $this->assertEquals($this->testModel->is_active, $this->testModel->fresh()->is_active);
    }

    /** @test */
    public function can_update_user_without_password_change()
    {
        $originalPassword = Hash::make('test');
        $this->testModel->password = $originalPassword;
        $this->testModel->save();

        $this->testModel->is_active = ! $this->testModel->is_active;
        $updatePayload = array_merge($this->testModel->toArray(), [
            // 'password' => '',
            // 'password_confirmation' => '',
        ]);
        $response = $this->patch(
            route('administration.users.update', $this->testModel->id, false),
            $updatePayload
        );

        $response->assertStatus(200)->assertJsonStructure(['message']);

        $updatedModel = $this->testModel->fresh();
        $this->assertEquals($this->testModel->is_active, $updatedModel->is_active);
        $this->assertEquals($originalPassword, $updatedModel->password);
    }

    /** @test */
    public function can_update_user_password()
    {
        $originalPassword = Hash::make('test');
        $newPassword = 'new-password';
        $this->testModel->password = $originalPassword;
        $this->testModel->save();

        $updatePayload = array_merge($this->testModel->toArray(), [
            'password' => $newPassword,
            'password_confirmation' => $newPassword,
        ]);

        $this->patch(
            route('administration.users.update', $this->testModel->id, false),
            $updatePayload
        )->assertStatus(200)->assertJsonStructure(['message']);

        $this->assertTrue(Hash::check($newPassword, $this->testModel->fresh()->password));
    }

    /** @test */
    public function get_option_list()
    {
        $this->testModel->is_active = true;
        $this->testModel->save();

        $this->get(route('administration.users.options', [
            'query' => $this->testModel->email,
            'limit' => 10,
        ], false))
            ->assertStatus(200)
            ->assertJsonFragment(['email' => $this->testModel->email]);
    }
}
