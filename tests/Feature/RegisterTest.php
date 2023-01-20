<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RegisterTest extends TestCase
{

    public function userProvider(): array
    {
        $user = [
            'name' => fake()->name,
            'email' => fake()->email,
            'password' => config('app.user_password'),
            'password_confirmation' => config('app.user_password')
        ];

        return [
            [$user, 201, 'user successful registered'],
            [$user, 401, 'only guest user can submit a register form'],
            [$user, 401, 'only guest user can submit a register form']
        ];
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_verify_create_a_new_account_guest_access(): void
    {
        $response = $this->postJson(route('register'),[
            'name' => fake()->name,
            'email' => fake()->email,
            'password' => config('app.user_password'),
            'password_confirmation' => config('app.user_password')
        ])->assertStatus(201);

        $response->assertJsonStructure(['user successful registered']);
    }

    /**
    * @dataProvider  userProvider
     */
    public function test_verify_create_a_new_account($user, $status, $message)
    {
        $response = $this->postJson(route('register'),$user)->assertStatus($status);

        $response->assertJsonStructure([$message]);
    }
}
