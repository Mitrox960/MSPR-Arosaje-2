<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;

class infouserTest extends TestCase
{
    use RefreshDatabase;

    public function infouserTest()
    {
      
        $user = User::factory()->create();

     
        $response = $this->actingAs($user, 'api')->json('GET', '/api/me');

   
        $response->assertStatus(200);
        $response->assertJson([
            'id' => $user->id,
            'adresse_mail' => $user->adresse_mail,
        ]);
    }
}
