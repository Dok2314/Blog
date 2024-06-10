<?php

namespace App\Repositories\Main;

use App\DTO\Main\RoleDTO;
use App\Models\Role;
use Illuminate\Database\Eloquent\Collection;

class RoleRepository
{
    public function getRoles(): Collection
    {
        $user = auth()->user();

        $query = Role::query();

        if (!$user->isAdmin()) {
            $query->whereNot('id', 1);
        }

        return $query->get();
    }

    public function getPaginatedRoles($perPage)
    {
        return Role::paginate($perPage);
    }

    public function update(Role $role, RoleDTO $roleDTO)
    {
        $role->update($roleDTO->toArray());
    }

    public function delete(Role $role): void
    {
        $role->delete();
    }

    public function restore(int $roleId): void
    {
        $role = Role::withTrashed()->find($roleId);
        $role->restore();
    }

    public function getDeletedPaginatedRoles($perPage)
    {
        return Role::onlyTrashed()->paginate($perPage);
    }

    public function store(RoleDTO $roleDTO): void
    {
        Role::create($roleDTO->toArray());
    }
}
