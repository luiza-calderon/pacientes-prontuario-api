<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\DataProviderExternal;
use Tests\Feature\DataProviders\ProntuarioPayloadDataProvider;
use Tests\TestCase;

final class ProntuarioTest extends TestCase
{
    use RefreshDatabase;

    public function test_shoud_it_be_created_a_new_prontuario(): void
    {
        $payload = ProntuarioPayloadDataProvider::create();

        $response = $this->postJson(route('prontuarios.store'), $payload);

        $response
            ->assertCreated()
            ->assertJsonStructure(['id']);
        $this
            ->assertDatabaseCount('prontuarios', 1)
            ->assertDatabaseHas('prontuarios', [
                'dia_semana_atendimento' => $payload['dia_semana_atendimento'],
                'horario_atendimento' => $payload['horario_atendimento'],
                'paciente_id' => 1,
            ])
            ->assertDatabaseCount('pacientes', 1)
            ->assertDatabaseHas('pacientes', [
                'nome' => $payload['paciente']['nome'],
                'data_nascimento' => $payload['paciente']['data_nascimento'],
            ])
            ->assertDatabaseCount('contatos', 1)
            ->assertDatabaseHas('contatos', [
                'contatavel_tipo' => $payload['paciente']['contato']['tipo'],
                'contatavel_id' => 1,
                'paciente_id' => 1,
            ])
            ->assertDatabaseCount('telefones', 1)
            ->assertDatabaseHas('telefones', [
                'ddd' => $payload['paciente']['contato']['ddd'],
                'numero' => $payload['paciente']['contato']['numero'],
            ]);
    }

    #[DataProviderExternal(ProntuarioPayloadDataProvider::class, 'provideManyInvalid')]
    public function test_should_not_create_a_prontuario_with_invalid_fields(
        string $field, 
        array $payload
    ): void {

        $response = $this->postJson(route('prontuarios.store'), $payload);

        $response
            ->assertUnprocessable()
            ->assertJsonValidationErrors([$field]);
        $this
            ->assertDatabaseEmpty('prontuarios')
            ->assertDatabaseEmpty('pacientes')
            ->assertDatabaseEmpty('contatos')
            ->assertDatabaseEmpty('telefones');
    }
}
