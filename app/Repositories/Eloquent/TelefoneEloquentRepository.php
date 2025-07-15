<?php

namespace App\Repositories\Eloquent;

use App\Entities\Telefone;
use App\Models\Telefone as TelefoneModel;
use App\Repositories\Interfaces\TelefoneRepositoryInterface;

class TelefoneEloquentRepository implements TelefoneRepositoryInterface
{
    public function save(Telefone $entity): Telefone
    {
        $entityAsArray = $entity->toArray();
        
        $telefone = TelefoneModel::create($entityAsArray);
        $telefone->contato()->create([
                'paciente_id' => $entityAsArray['paciente_id']
        ]);

        return new Telefone(
            $telefone->ddd,
            $telefone->numero,
            $entityAsArray['paciente_id'],
            $telefone->id
        );
    }
}