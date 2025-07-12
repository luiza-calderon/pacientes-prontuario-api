<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class Telefone extends Model
{
    protected $fillable = [
        'ddd',
        'numero',
        'contato_id',
    ];

    public function contato(): MorphOne
    {
        return $this->morphOne(Contato::class, 'contatavel', type: 'contatavel_tipo');
    }
}
