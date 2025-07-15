<?php

namespace App\Repositories\Eloquent;

use App\Entities\Prontuario;
use App\Models\Prontuario as ProntuarioModel;
use App\Repositories\Interfaces\ProntuarioRepositoryInterface;

class ProntuarioEloquentRepository implements ProntuarioRepositoryInterface
{
    public function save(Prontuario $entity): Prontuario
    {
        $prontuario = ProntuarioModel::create($entity->toArray());

        return new Prontuario(
            $prontuario->dia_semana_atendimento,
            $prontuario->horario_atendimento,
            $entity->getPacienteId(),
            $prontuario->id
        );
    }
}