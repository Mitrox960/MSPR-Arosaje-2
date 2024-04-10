<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;
use App\Models\User;

class creerplanteTest extends TestCase
{
    use RefreshDatabase;

    public function creerplanteTest()
    {
        Storage::fake('public'); 
        $user = User::factory()->create();
        $this->actingAs($user, 'api');

        $response = $this->json('POST', '/api/plants/create', [
            'nom' => 'Plante Test',
            'image' => UploadedFile::fake()->image('plante.jpg'),
            'description' => 'Description test',
            'conseil_entretien' => 'Conseils test',
        ]);

        $response->assertStatus(201); 
    }
}
