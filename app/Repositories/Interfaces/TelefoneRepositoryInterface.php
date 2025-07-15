<?php

namespace App\Repositories\Interfaces;

use App\Entities\Telefone;

interface TelefoneRepositoryInterface
{
    public function save(Telefone $entity): Telefone;
}