<?php

namespace App\Http\Requests\Rules;

trait HasContatoRules
{
    public function contatoRules(
        string $prefix = 'contato.',
        bool $required = false
    ): array {
        return [
            $prefix . 'tipo' => [
                'string',
                'in:TELEFONE',
                $required ? 'required' : 'nullable',
            ],
        ];
    }
}
