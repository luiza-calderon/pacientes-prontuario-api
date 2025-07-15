<?php

namespace App\Services;

use App\DTOs\StoreProntuarioRequestDTO;
use App\Entities\Paciente;
use App\Entities\Telefone;
use App\Entities\Prontuario;
use App\Repositories\Interfaces\PacienteRepositoryInterface;
use App\Repositories\Interfaces\ProntuarioRepositoryInterface;
use App\Repositories\Interfaces\TelefoneRepositoryInterface;
use App\Services\Interfaces\ProntuarioServiceInterface;
use Illuminate\Support\Facades\DB;

class ProntuarioService implements ProntuarioServiceInterface
{
    public function __construct(
        private PacienteRepositoryInterface $pacienteRepository,
        private ProntuarioRepositoryInterface $prontuarioRepository,
        private TelefoneRepositoryInterface $telefoneRepository
    ) {
    }

    public function create(StoreProntuarioRequestDTO $request): object
    {
        return DB::transaction(function () use ($request) {
            $paciente = $this->pacienteRepository->save(
                new Paciente(
                    $request->getPacienteNome(),
                    $request->getPacienteDataNascimento()
                )
            );
    
            $this->telefoneRepository->save(
                new Telefone(
                    $request->getPacienteContatoDDD(),
                    $request->getPacienteContatoNumero(),
                    $paciente->getId()
                )
            );
            
            return $this->prontuarioRepository->save(
                new Prontuario(
                    $request->getDiaSemanaAtendimento(),
                    $request->getHorarioAtendimento(),
                    $paciente->getId()
                )
            );
        });
    }
}