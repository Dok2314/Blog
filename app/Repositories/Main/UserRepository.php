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

    public function updateUser(User $user, UserDTO $userDTO): void
    {
        $password = $userDTO->getPassword();
        $password = $password ?? $user->password;
        $userDTO->setPassword($password);

        $user->update($userDTO->toArray());
    }

    public function delete(User $user): void
    {
        $user->delete();
    }

    public function restore($userId): void
    {
        $user = User::withTrashed()->find($userId);
        $user->restore();
    }

    public function getDeletedPaginatedUsers(int $perPage)
    {
        return User::onlyTrashed()->paginate($perPage);
    }
}
