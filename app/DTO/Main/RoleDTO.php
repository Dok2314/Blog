<?php

namespace App\DTO\Main;

class RoleDTO
{
    private string $name;

    public function __construct(array $params)
    {
        $this->name = $params['name'];
    }

    public function getTitle(): string
    {
        return $this->name;
    }

    public function toArray(): array
    {
        return [
            'name' => $this->name,
        ];
    }
}
