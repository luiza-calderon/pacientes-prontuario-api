<?php

namespace App\Services\Interfaces;

use App\DTOs\StoreProntuarioRequestDTO;

interface ProntuarioServiceInterface
{
    public function create(StoreProntuarioRequestDTO $request): object;
}