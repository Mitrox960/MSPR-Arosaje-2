<?php

namespace App\Services;

use App\Models\Plante;

class PlanteService
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

    public function create($nom, $image, $desc, $conseil_entret, $id_session_de_garde = null)
    {
        return $this->plante->createPlante($nom, $image, $desc, $conseil_entret, $id_session_de_garde);
    }
}