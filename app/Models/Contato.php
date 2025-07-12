<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Contato extends Model
{
    protected $fillable = [
        'contatavel_tipo',
        'contatavel_id',
        'paciente_id',
    ];

    public function paciente(): BelongsTo
    {
        return $this->belongsTo(Paciente::class);
    }

    public function contatavel(): MorphTo
    {
        return $this->morphTo(type: 'contatavel_tipo');
    }
}
