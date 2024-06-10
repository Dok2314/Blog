<?php

namespace App\Repositories\Main;

use App\DTO\Main\UserDTO;
use App\Models\User;

class UserRepository
{
    public function getPaginatedUsers(int $perPage)
    {
        return User::paginate($perPage);
    }

    public function createUser(UserDTO $userDTO): void
    {
        User::create($userDTO->toArray());
    }
}
