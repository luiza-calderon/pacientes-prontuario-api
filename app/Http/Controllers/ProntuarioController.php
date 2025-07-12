<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProntuarioRequest;
use App\Models\Paciente;
use App\Models\Prontuario;
use App\Models\Telefone;
use Illuminate\Support\Facades\DB;

class ProntuarioController extends Controller
{
    public function store(StoreProntuarioRequest $request)
    {
        $validatedRequest = $request->validated();

        $prontuario = DB::transaction(function () use ($validatedRequest) {
            $paciente = Paciente::create([
                'nome' => $validatedRequest['paciente']['nome'],
                'data_nascimento' => $validatedRequest['paciente']['data_nascimento'],
            ]);
    
            Telefone::create([
                'ddd' => $validatedRequest['paciente']['contato']['ddd'],
                'numero' => $validatedRequest['paciente']['contato']['numero'],
            ])->contato()->create([
                'paciente_id' => $paciente->id,
            ]);
    
            $prontuario = Prontuario::create([
                'dia_semana_atendimento' => $validatedRequest['dia_semana_atendimento'],
                'horario_atendimento' => $validatedRequest['horario_atendimento'],
                'paciente_id' => $paciente->id,
            ]);

            return $prontuario;
        });

        return response([
            'id' => $prontuario->id,
        ], 201);
    }
}
