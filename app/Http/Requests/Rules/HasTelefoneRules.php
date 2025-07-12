<?php

namespace App\Http\Requests\Rules;

trait HasTelefoneRules
{
    public function telefoneRules(
        string $prefix = 'telefone.',
        bool $required = false
    ): array {
        return [
            $prefix . 'ddd' => [
                'numeric',
                'digits_between:2,3',
                $required ? 'required' : 'nullable',
            ],
            $prefix . 'numero' => [
                'numeric',
                'digits_between:8,9',
                $required ? 'required' : 'nullable',
            ],
        ];
    }
}
