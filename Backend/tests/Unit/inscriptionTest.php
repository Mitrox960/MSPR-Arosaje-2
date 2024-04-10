<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;
use App\Models\Adresse;
use App\Models\Role;

class inscriptionTest extends TestCase
{
    use RefreshDatabase;

    public function inscriptionTest()
    {
        
        $userData = [
            'nom' => 'Dagba',
            'prenom' => 'Didier',
            'adresse_mail' => 'didierdrogbagoat@gmail.com',
            'mot_de_passe' => 'password',
            'mot_de_passe_confirmation' => 'password', 
            'ville' => 'sevran',
            'code_postal' => '93800',
            'nom_voie' => 'Rue de Michel',
            'numero_voie' => '123',
            'nom_role' => 'utilisateur',
            'date_de_naissance' => '1990-01-01',
            'telephone' => '0102030405',
        ];

       
        $response = $this->json('POST', '/register', $userData);

       
        $response->assertStatus(201); 
        $this->assertDatabaseHas('users', [
            'adresse_mail' => 'john.doe@example.com',
        ]);
        $this->assertDatabaseHas('adresses', [
            'ville' => 'Paris',
        ]);
        $this->assertDatabaseHas('roles', [
            'nom_role' => 'utilisateur',
        ]);
    }
}
