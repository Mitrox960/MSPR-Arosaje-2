<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'roles';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = [
        'identifiant',
        'nom_role',
    ];

    public function utilisateurs()
    {
        return $this->hasMany(Utilisateur::class, 'id_role');
    }

    // Ajoute d'autres relations si n�cessaire
}
