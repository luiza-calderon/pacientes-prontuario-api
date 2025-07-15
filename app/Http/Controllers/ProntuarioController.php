<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProntuarioRequest;
use App\Services\Interfaces\ProntuarioServiceInterface;

class ProntuarioController extends Controller
{
    public function __construct(
        private ProntuarioServiceInterface $prontuarioService
    ) {
    }

    public function store(StoreProntuarioRequest $request)
    {
        $prontuario = $this->prontuarioService->create($request->toDTO());

        return response([
            'id' => $prontuario->getId(),
        ], 201);
    }
}
