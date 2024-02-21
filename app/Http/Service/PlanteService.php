<?php

namespace App\Services;

use App\Models\Plante;

class NomDuModeleService
{
    protected Plante $plante;

    public function __construct(Plante $plante)
    {
        $this->plante = $plante;
    }

    public function getAll()
    {
        return $this->plante->all();
    }

    public function getById($id)
    {
        return $this->plante->find($id);
    }

    public function create($nom, $image, $desc, $conseil_entret, $id_session_de_garde)
    {
        return $this->plante->create($nom, $image, $desc, $conseil_entret, $id_session_de_garde);
    }
}