<?php

namespace Tests\Feature\DataProviders;

final class ProntuarioPayloadDataProvider
{
    public static function create(): array
    {
        return [
            'paciente' => [
                'nome'            => 'João',
                'data_nascimento' => '1999-12-12',
                'contato' => [
                    'tipo'   => 'TELEFONE',
                    'ddd'    => '12',
                    'numero' => '999999999'
                ],
            ],
            'dia_semana_atendimento' => 'SEG',
            'horario_atendimento'    => '19:00:00',
        ];
    }

    public static function createWithField(string $field, $value): array
    {
        $payload = ProntuarioPayloadDataProvider::create();
        data_set($payload, $field, $value);

        return [$field, $payload];
    }

    public static function createWithBlankField(string $field): array
    {
        $payload = ProntuarioPayloadDataProvider::createWithField($field, '');

        return [$field, $payload];
    }
    
    public static function provideManyInvalid(): array
    {
        $PACIENTE_NOME_FIELD = 'paciente.nome';
        $PACIENTE_DATA_NASCIMENTO_FIELD = 'paciente.data_nascimento';
        $PACIENTE_CONTATO_TIPO_FIELD = 'paciente.contato.tipo';
        $PACIENTE_CONTATO_DDD_FIELD = 'paciente.contato.tipo';
        $PACIENTE_CONTATO_NUMERO_FIELD = 'paciente.contato.tipo';
        $DIA_SEMANA_ATENDIMENTO_FIELD = 'dia_semana_atendimento';
        $HORARIO_ATENDIMENTO_FIELD = 'horario_atendimento';

        return [
            'Nome do paciente é obrigatório' => 
                ProntuarioPayloadDataProvider::createWithBlankField($PACIENTE_NOME_FIELD),
            'Nome do paciente não é texto' => 
                ProntuarioPayloadDataProvider::createWithField($PACIENTE_NOME_FIELD, 1),
            'Nome do paciente maior que 150 caracteres' => 
                ProntuarioPayloadDataProvider::createWithField($PACIENTE_NOME_FIELD, str_repeat('A', 151)),
            'Nome do paciente menor que 2 caracteres' => 
                ProntuarioPayloadDataProvider::createWithField($PACIENTE_NOME_FIELD, 'A'),
            'Data de nascimento do paciente é obrigatória' => 
                ProntuarioPayloadDataProvider::createWithBlankField($PACIENTE_DATA_NASCIMENTO_FIELD),
            'Data de nascimento não é data' => 
                ProntuarioPayloadDataProvider::createWithField($PACIENTE_DATA_NASCIMENTO_FIELD, 'A'),
            'Data de nascimento não é anterior a hoje' => 
                ProntuarioPayloadDataProvider::createWithField($PACIENTE_DATA_NASCIMENTO_FIELD, date('Y-m-d') + 1),
            'Tipo de contato do paciente é obrigatório' => 
                ProntuarioPayloadDataProvider::createWithBlankField($PACIENTE_CONTATO_TIPO_FIELD),
            'Tipo de contato do paciente não existe' =>
                ProntuarioPayloadDataProvider::createWithField($PACIENTE_CONTATO_TIPO_FIELD, 'CARTA'),
            'DDD do telefone do paciente é obrigatório' => 
                ProntuarioPayloadDataProvider::createWithBlankField($PACIENTE_CONTATO_DDD_FIELD),
            'DDD do telefone do paciente não é numérico' => 
                ProntuarioPayloadDataProvider::createWithField($PACIENTE_CONTATO_DDD_FIELD, 'AAA'),
            'DDD do telefone do paciente possui mais de 3 dígitos' => 
                ProntuarioPayloadDataProvider::createWithField($PACIENTE_CONTATO_DDD_FIELD, '1234'),
            'DDD do telefone do paciente possui menos de 2 dígitos' => 
                ProntuarioPayloadDataProvider::createWithField($PACIENTE_CONTATO_DDD_FIELD, '1'),
            'Número do telefone do paciente é obrigatório' => 
                ProntuarioPayloadDataProvider::createWithBlankField($PACIENTE_CONTATO_NUMERO_FIELD),
            'Número do telefone do paciente não é numérico' => 
                ProntuarioPayloadDataProvider::createWithField($PACIENTE_CONTATO_NUMERO_FIELD, 'AAA'),
            'Número do telefone do paciente possui mais de 9 dígitos' => 
                ProntuarioPayloadDataProvider::createWithField($PACIENTE_CONTATO_NUMERO_FIELD, '1234567890'),
            'Número do telefone do paciente possui menos de 8 dígitos' => 
                ProntuarioPayloadDataProvider::createWithField($PACIENTE_CONTATO_NUMERO_FIELD, '1234567'),
            'Dia da semana do atendiemnto é obrigatório' => 
                ProntuarioPayloadDataProvider::createWithBlankField($DIA_SEMANA_ATENDIMENTO_FIELD),
            'Dia da semana do atendimento no formato inválido' => 
                ProntuarioPayloadDataProvider::createWithField($DIA_SEMANA_ATENDIMENTO_FIELD, 'SEGUNDA'),
            'Dia da semana do atendimento é domingo' => 
                ProntuarioPayloadDataProvider::createWithField($DIA_SEMANA_ATENDIMENTO_FIELD, 'DOM'),
            'Horário do atendimento é obrigatório' => 
                ProntuarioPayloadDataProvider::createWithBlankField($HORARIO_ATENDIMENTO_FIELD),
            'Horário do atendimento não é hora' => 
                ProntuarioPayloadDataProvider::createWithField($HORARIO_ATENDIMENTO_FIELD, 'AAA'),
        ];
    }
}