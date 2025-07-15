<?php

namespace App\Repositories\Eloquent;

use App\Entities\Paciente;
use App\Models\Paciente as PacienteModel;
use App\Repositories\Interfaces\PacienteRepositoryInterface;

class PacienteEloquentRepository implements PacienteRepositoryInterface
{
    public function save(Paciente $entity): Paciente
    {
        $paciente = PacienteModel::create($entity->toArray());
        
        return new Paciente(
            $paciente->nome,
            $paciente->data_nascimento,
            $paciente->id
        );
    }
}