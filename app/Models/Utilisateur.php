<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Utilisateur extends Model
{
    protected $table = 'utilisateurs';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = [
        'nom',
        'prenom',
        'date_de_naissance',
        'adresse_mail',
        'mot_de_passe',
        'telephone',
        'id_adresse',
        'id_role',
    ];

    public function adresse()
    {
        return $this->belongsTo(Adresse::class, 'id_adresse');
    }

    public function role()
    {
        return $this->belongsTo(Role::class, 'id_role', 'identifiant');
    }

    public function sessionsDeGarde()
    {
        return $this->hasMany(SessionDeGarde::class, 'id_utilisateur');
    }

    public function historiques()
    {
        return $this->hasMany(Historique::class, 'id_utilisateur');
    }

    // Ajoute d'autres relations si nécessaire
}
