<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;
use App\Models\Plante;

class Utilisateur extends Model implements Authenticatable
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

     public function getAuthIdentifierName()
    {
        return 'id';
    }

    public function getAuthIdentifier()
    {
        return $this->getKey();
    }

    public function getAuthPassword()
    {
        return $this->mot_de_passe;
    }

     public function getRememberToken()
    {
        return $this->remember_token;
    }

    public function setRememberToken($value)
    {
        $this->remember_token = $value;
    }

    public function getRememberTokenName()
    {
        return 'remember_token';
    }

    public function plantes()
    {
        return $this->hasMany(Plante::class, 'id_utilisateur');
    }

    // Ajoute d'autres relations si n�cessaire
}
