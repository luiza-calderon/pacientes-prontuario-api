<?php

namespace App\Services;

use App\DTOs\StoreProntuarioRequestDTO;
use App\Models\Paciente;
use App\Models\Prontuario;
use App\Models\Telefone;
use App\Services\Interfaces\ProntuarioServiceInterface;
use Illuminate\Support\Facades\DB;

class ProntuarioService implements ProntuarioServiceInterface
{
    public function create(StoreProntuarioRequestDTO $request): object
    {
        return DB::transaction(function () use ($request) {
            $paciente = Paciente::create([
                'nome' => $request->getPacienteNome(),
                'data_nascimento' => $request->getPacienteDataNascimento()
            ]);
    
            Telefone::create([
                'ddd' => $request->getPacienteContatoDDD(),
                'numero' => $request->getPacienteContatoNumero()
            ])->contato()->create([
                'paciente_id' => $paciente->id,
            ]);
            
            return Prontuario::create([
                'dia_semana_atendimento' => $request->getDiaSemanaAtendimento(),
                'horario_atendimento' => $request->getHorarioAtendimento(),
                'paciente_id' => $paciente->id
            ]);
        });
    }
}