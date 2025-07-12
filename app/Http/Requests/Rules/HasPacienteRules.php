<?php

namespace App\Http\Requests\Rules;

trait HasPacienteRules
{
    public function pacienteRules(
        string $prefix = 'paciente.',
        bool $required = false
    ): array {
        return [
            $prefix . 'nome' => [
                'string',
                'max:150',
                'min:2',
                $required ? 'required' : 'nullable',
            ],
            $prefix . 'data_nascimento' => [
                'date',
                'before_or_equal:' . today(),
                $required ? 'required' : 'nullable',
            ],
        ];
    }
}
