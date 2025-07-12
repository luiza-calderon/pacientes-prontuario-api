<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Paciente extends Model
{
    protected $fillable = [
        'nome',
        'data_nascimento'
    ];

    public function contatos(): HasMany
    {
        return $this->hasMany(Contato::class);
    }
}
