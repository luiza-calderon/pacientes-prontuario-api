<?php

namespace App\Entities;

class Telefone extends Entity
{
    public function __construct(
        private string $ddd,
        private string $numero,
        private string $pacienteId,
        ?string $id = null
    ) {
        parent::__construct($id);
    }

    public function toArray(): array
    {
        return array_merge([
            'ddd' => $this->ddd,
            'numero' => $this->numero,
            'paciente_id' => $this->pacienteId
        ], parent::toArray());
    }
}