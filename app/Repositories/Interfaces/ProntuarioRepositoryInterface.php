<?php

namespace App\Repositories\Interfaces;

use App\Entities\Prontuario;

interface ProntuarioRepositoryInterface
{
    public function save(Prontuario $entity): Prontuario;
}