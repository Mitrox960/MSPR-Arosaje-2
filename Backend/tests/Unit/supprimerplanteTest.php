<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;
use App\Models\Plante;

class supprimerplanteTest extends TestCase
{
    use RefreshDatabase;

    public function supprimerplanteTest()
    {
        $user = User::factory()->create();
        $this->actingAs($user, 'api');
        $plante = Plante::factory()->create(['user_id' => $user->id]); 

        $response = $this->json('DELETE', "/api/plants/delete/{$plante->id}");

        $response->assertStatus(200); 
        $this->assertDatabaseMissing('plantes', ['id' => $plante->id]); 
    }
}
