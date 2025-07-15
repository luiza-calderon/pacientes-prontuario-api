<?php

namespace App\Repositories\Interfaces;

use App\Entities\Paciente;

interface PacienteRepositoryInterface
{
    public function save(Paciente $entity): Paciente;
}