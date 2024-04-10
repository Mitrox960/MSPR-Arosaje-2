<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;

class authentificationTest extends TestCase
{
    use RefreshDatabase;

    public function authentificationTest()
    {
 
        $user = User::factory()->create([
            'adresse_mail' => 'user@example.com',
            'password' => bcrypt('password'),
        ]);

  
        $response = $this->json('POST', '/api/login', [
            'adresse_mail' => 'user@example.com',
            'password' => 'password',
        ]);

 
        $response->assertStatus(200);
        $response->assertJsonStructure(['access_token', 'token_type', 'expires_in']);
    }
}
