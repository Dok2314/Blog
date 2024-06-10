<?php

namespace App\Services\Main;

use App\DTO\Main\CategoryDTO;
use App\DTO\Main\RoleDTO;
use App\Models\Category;
use App\Models\Role;
use App\Repositories\Main\CategoryRepository;
use App\Repositories\Main\RoleRepository;

class RoleService
{
    public function __construct(private readonly RoleRepository $roleRepository)
    {
    }

    public function getRoles()
    {
        return $this->roleRepository->getRoles();
    }

    public function getPaginatedRoles($perPage)
    {
        return $this->roleRepository->getPaginatedRoles($perPage);
    }

    public function update(Role $role, RoleDTO $roleDTO)
    {
        $this->roleRepository->update($role, $roleDTO);
    }

    public function delete(Role $role): void
    {
        $this->roleRepository->delete($role);
    }

    public function restore(int $roleId): void
    {
        $this->roleRepository->restore($roleId);
    }

    public function getDeletedPaginatedRoles($perPage)
    {
        return $this->roleRepository->getDeletedPaginatedRoles($perPage);
    }

    public function store(RoleDTO $roleDTO): void
    {
        $this->roleRepository->store($roleDTO);
    }

    public function massDelete(array $ids): void
    {
        $this->roleRepository->massDelete($ids);
    }

    public function massRestore(array $ids): void
    {
        $this->roleRepository->massRestore($ids);
    }
}
