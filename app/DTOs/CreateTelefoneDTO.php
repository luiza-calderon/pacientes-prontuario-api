<?php

namespace App\DTOs;

class CreateTelefoneDTO
{
    public function __construct(
        protected readonly string $ddd,
        protected readonly string $numero
    ) {
    }

    public function getDDD(): string
    {
        return $this->ddd;
    }

    public function getNumero(): string
    {
        return $this->numero;
    }
}