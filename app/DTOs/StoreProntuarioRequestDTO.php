<?php

namespace App\DTOs;


class StoreProntuarioRequestDTO
{
    public function __construct(
        protected readonly string $dia_semana_atendimento,
        protected readonly string $horario_atendimento,
        protected readonly CreatePacienteDTO $paciente
    ) {
    }

    public function getDiaSemanaAtendimento(): string
    {
        return $this->dia_semana_atendimento;
    }

    public function getHorarioAtendimento(): string
    {
        return $this->horario_atendimento;
    }

    public function getPaciente(): CreatePacienteDTO
    {
        return $this->paciente;
    }

    public function getPacienteNome(): string
    {
        return $this->getPaciente()->getNome();
    }

    public function getPacienteDataNascimento(): string
    {
        return $this->getPaciente()->getDataNascimento();
    }

    public function getPacienteContato(): CreateTelefoneDTO
    {
        return $this->getPaciente()->getContato();
    }

    public function getPacienteContatoDDD(): string
    {
        return $this->getPacienteContato()->getDDD();
    }

    public function getPacienteContatoNumero(): string
    {
        return $this->getPacienteContato()->getNumero();
    }
}