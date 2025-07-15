<?php

namespace App\Entities;

class Paciente extends Entity
{
    public function __construct(
        protected string $nome,
        protected string $data_nascimento,
        ?string $id = null
    ) {
        parent::__construct($id);
    }

    public function toArray(): array
    {
        return array_merge([
            'nome' => $this->nome,
            'data_nascimento' => $this->data_nascimento
        ], parent::toArray());
    }
}