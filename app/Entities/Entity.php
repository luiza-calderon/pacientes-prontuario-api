<?php

namespace App\Entities;

abstract class Entity
{
    public function __construct(
        protected ?string $id
    ) {
    }

    public function getId(): ?string
    {
        return $this->id;
    }

    public function toArray(): array
    {
        return [
            'id' => $this->id
        ];
    }
}