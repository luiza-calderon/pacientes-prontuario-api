<?php

namespace App\Providers;

use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(
            \App\Services\Interfaces\ProntuarioServiceInterface::class,
            \App\Services\ProntuarioService::class
        );
    }

    public function boot(): void
    {
        Relation::enforceMorphMap([
            'TELEFONE' => \App\Models\Telefone::class,
        ]);
    }
}
