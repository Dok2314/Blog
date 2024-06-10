<?php

namespace App\Services\Main;

use App\DTO\Main\CategoryDTO;
use App\DTO\Main\TagDTO;
use App\DTO\Main\UserDTO;
use App\Models\Category;
use App\Models\Tag;
use App\Models\User;
use App\Repositories\Main\CategoryRepository;
use App\Repositories\Main\TagRepository;
use App\Repositories\Main\UserRepository;

class UserService
{
    public function __construct(private readonly UserRepository $userRepository)
    {
    }

    public function getPaginatedUsers(int $perPage)
    {
        return $this->userRepository->getPaginatedUsers($perPage);
    }

    public function createUser(UserDTO $userDTO): void
    {
        $this->userRepository->createUser($userDTO);
    }

    public function updateUser(User $user, UserDTO $userDTO): void
    {
        $this->userRepository->updateUser($user, $userDTO);
    }

    public function delete(User $user): void
    {
        $this->userRepository->delete($user);
    }

    public function restore(int $userId): void
    {
        $this->userRepository->restore($userId);
    }

    public function getDeletedPaginatedUsers(int $perPage)
    {
        return $this->userRepository->getDeletedPaginatedUsers($perPage);
    }
}
