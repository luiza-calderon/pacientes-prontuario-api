<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(
            \App\Repositories\Interfaces\PacienteRepositoryInterface::class,
            \App\Repositories\Eloquent\PacienteEloquentRepository::class
        );

        $this->app->bind(
            \App\Repositories\Interfaces\ProntuarioRepositoryInterface::class,
            \App\Repositories\Eloquent\ProntuarioEloquentRepository::class
        );

        $this->app->bind(
            \App\Repositories\Interfaces\TelefoneRepositoryInterface::class,
            \App\Repositories\Eloquent\TelefoneEloquentRepository::class
        );
    }

    public function boot(): void
    {
        //
    }
}
