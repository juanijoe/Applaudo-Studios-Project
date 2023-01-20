<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Testing\Fluent\AssertableJson;
use Tests\TestCase;

class UserTest extends TestCase
{
    public function test_get_me()
    {
        $user = User::find(fake()->randomElement(User::all()->pluck('id')->all()));

        $response = $this->postJson(route('login'),[
            'email' => $user->email,
            'password' => '123456'
        ])->assertStatus(201);

        $token = ($response->json(['access_token']));

        $json = $this->getJson(route('user.current'), ['Authorization' => "Bearer $token"])
                      ->assertStatus(200);
        $json->assertJsonStructure(['current user' => ['id']]);
    }
}
