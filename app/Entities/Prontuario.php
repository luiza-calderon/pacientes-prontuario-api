<?php

namespace App\Entities;

class Prontuario extends Entity
{
    public function __construct(
        private string $diaSemanaAtendimento,
        private string $horarioAtendimento,
        private string $pacienteId,
        ?string $id = null,
    ) {
        parent::__construct($id);
    }

    public function toArray(): array
    {
        return array_merge([
            'dia_semana_atendimento' => $this->diaSemanaAtendimento,
            'horario_atendimento' => $this->horarioAtendimento,
            'paciente_id' => $this->pacienteId
        ], parent::toArray());
    }

    public function getPacienteId(): string
    {
        return $this->pacienteId;
    }
}