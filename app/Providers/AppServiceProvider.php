<?php

namespace App\Providers;

use App\Services\Interfaces\ProntuarioServiceInterface;
use App\Services\ProntuarioService;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(
            ProntuarioServiceInterface::class,
            ProntuarioService::class
        );
    }

    public function boot(): void
    {
        Relation::enforceMorphMap([
            'TELEFONE' => \App\Models\Telefone::class,
        ]);
    }
}
