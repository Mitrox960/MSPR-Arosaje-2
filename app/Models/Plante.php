<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Plante extends Model
{
    protected $table = 'plantes';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = [
        'nom',
        'image',
        'description',
        'conseil_entretien',
        'id_session_de_garde',
    ];

    public function sessionDeGarde()
    {
        return $this->belongsTo(SessionDeGarde::class, 'id_session_de_garde');
    }

    public function createPlante(string $nom, string $image, string $desc, string $conseil_entret, int $id_session_de_garde) 
    {
        $plante = Plante::create([
            'nom' => $nom,
            'image' => $image,
            'description' => $desc,
            'conseil_entretien' => $conseil_entret,
            'id_session_de_garde' => $id_session_de_garde,
        ]);
    }
}
