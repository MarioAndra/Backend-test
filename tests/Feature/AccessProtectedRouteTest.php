<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;

class AccessProtectedRouteTest extends TestCase

{
    public function test_access_protected_route_without_token()
    {
        $response = $this->getJson('/api/companies');

        $response->assertStatus(401);
    }

    public function test_access_protected_route_with_valid_token()
    {

        $user = User::factory()->create([
            'phone' => '+963999999999',
        ]);

        $token = $user->createToken('access_token')->plainTextToken;

        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->getJson('/api/companies');

        $response->assertStatus(200);
    }
}
