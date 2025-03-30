<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;

class AuthTest extends TestCase
{
    //use RefreshDatabase;
    /**
     * A basic feature test example.
     */
    public function test_user_registration_with_valid_data()
    {
        $response = $this->postJson('/api/users/auth/register', [
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'password' => 'Password',
            'phone' => '+963997614102',
        ]);

        $response->assertStatus(200)
            ->assertJsonStructure(['access_token']);
    }


    public function test_user_registration_with_invalid_data()
    {

        $response = $this->postJson('/api/users/auth/register', [
            'name' => 'John',
            'email' => 'invalid-email',
            'password' => 'password',
            'phone' => '+963937723418',
        ]);

        $response->assertStatus(422)
            ->assertJsonValidationErrors(['email']);
    }

    public function test_login_and_token_generation()
    {

        $user = User::factory()->create([
            'password' => bcrypt('123456789'),
            'phone' => '+963937723413'
        ]);
        $response = $this->postJson('/api/users/auth/login', [
            'phone' => $user->phone,
            'password' => '123456789',
        ]);

        $response->assertStatus(200)
            ->assertJsonStructure(['access_token']);
    }


    public function test_login_with_invalid_credentials()
    {
        $response = $this->postJson('/api/users/auth/login', [
            'email' => 'nonexistent@example.com',
            'password' => 'wrong-password',
        ]);

        $response->assertStatus(401);
    }
}
