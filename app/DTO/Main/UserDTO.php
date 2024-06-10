<?php

namespace App\DTO\Main;

class UserDTO
{
    private string $name;
    private string $email;
    private string $password;
    private int $roleId;

    public function __construct(array $params)
    {
        $this->name = $params['name'];
        $this->email = $params['email'];
        $this->password = $params['password'];
        $this->roleId = $params['role_id'];
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

    public function getRoleId(): int
    {
        return $this->roleId;
    }

    public function setRoleId(int $roleId): void
    {
        $this->roleId = $roleId;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function toArray()
    {
        return [
            'name' => $this->getName(),
            'email' => $this->getEmail(),
            'password' => $this->getPassword(),
            'role_id' => $this->getRoleId(),
        ];
    }
}
