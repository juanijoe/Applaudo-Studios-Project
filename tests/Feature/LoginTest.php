<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Auth;
use Illuminate\Testing\Fluent\AssertableJson;
use Laravel\Passport\Passport;
use Tests\TestCase;

class LoginTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();

        $this->seed();
        $this->artisan('passport:install', ['--no-interaction' => true,]);
    }
    public function test_check_login_for_an_exist_user()
    {
        $user = User::find(fake()->randomElement(User::all()->pluck('id')->all()));

        $body = [
            'email' => $user->email,
            'password' => '123456'
        ];
        $this->json('POST', '/api/v1/login', $body, ['Accept' => 'application/json'])
            ->assertStatus(201)
            ->assertJsonStructure(['user' => ['id'], 'access_token']);
    }

    public function user()
    {
        $u = User::factory()->create()->assignRole('User');
        return Passport::actingAs($u);
    }

    public function test_check_login_for_any_new_user()
    {


        $user = $this->user();

        $response = $this->postJson(route('login'), [
            'email' => $user->email,
            'password' => '123456'
        ])->assertStatus(201);

        $response->assertJsonStructure(['access_token']);
    }


    public function test_check_login_for_a_fake_any_user()
    {
        $body = [
            'email' => fake()->email,
            'password' => '123456'
        ];
        $this->json('POST', '/api/v1/login', $body, ['Accept' => 'application/json'])
            ->assertStatus(401)
            ->assertJson(fn(AssertableJson $js) => $js->where('message', 'Bad user credentials'));
    }

    public function test_check_logout_from_a_user()
    {
        $user = $this->user();

        $response = $this->postJson(route('login'), [
            'email' => $user->email,
            'password' => '123456'
        ])->assertStatus(201);

        $token = $response->json(['access_token']);

        $this->postJson(route('logout'), ['Authorization' => "Bearer $token"])
            ->assertJson(fn(AssertableJson $js) => $js->where('message', 'Unauthenticated.'))
            ->assertStatus(401);

    }
}
