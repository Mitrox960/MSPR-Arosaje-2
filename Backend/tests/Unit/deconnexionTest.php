<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;

class deconnexionTest extends TestCase
{
    use RefreshDatabase;

    public function deconnexionTest()
    {
      
        $user = User::factory()->create();

      
        $response = $this->actingAs($user, 'api')->json('POST', '/api/logout');

        $response->assertStatus(200);
        $response->assertJson(['message' => 'Successfully logged out']);
    }
}
