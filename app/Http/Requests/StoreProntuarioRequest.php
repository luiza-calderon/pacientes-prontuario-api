<?php

namespace App\Http\Requests;

use App\Http\Requests\Rules\HasContatoRules;
use App\Http\Requests\Rules\HasPacienteRules;
use App\Http\Requests\Rules\HasTelefoneRules;
use Illuminate\Foundation\Http\FormRequest;

class StoreProntuarioRequest extends FormRequest
{
    use HasPacienteRules, 
        HasContatoRules, 
        HasTelefoneRules;

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return array_merge([
                'dia_semana_atendimento' => [
                    'required',
                    'string',
                    'in:SEG,TER,QUA,QUI,SEX,SAB',
                ],
                'horario_atendimento' => [
                    'required',
                    'date_format:H:i:s',
                ],
            ],
            $this->pacienteRules(required: true),
            $this->contatoRules(prefix: 'paciente.contato.', required: true),
            $this->telefoneRules(prefix: 'paciente.contato.', required: true),
        );
    }
}
