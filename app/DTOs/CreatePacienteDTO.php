<?php

namespace App\DTOs;

use DateTime;

class CreatePacienteDTO
{
    public function __construct(
        protected readonly string $nome,
        protected readonly DateTime $data_nascimento,
        protected readonly CreateTelefoneDTO $contato
    ) {
    }

    public function getNome(): string
    {
        return $this->nome;
    }

    public function getDataNascimento(): DateTime
    {
        return $this->data_nascimento;
    }

    public function getContato(): CreateTelefoneDTO
    {
        return $this->contato;
    }
}