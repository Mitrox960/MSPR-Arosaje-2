// app/Models/Adresse.php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Adresse extends Model
{
    protected $table = 'adresses';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = [
        'ville',
        'code_postal',
        'nom_voie',
        'numero_voie',
    ];

    public function utilisateurs()
    {
        return $this->hasMany(Utilisateur::class, 'id_adresse');
    }

    // Ajoute d'autres relations si nécessaire
}
