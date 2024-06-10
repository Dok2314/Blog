<?php

namespace App\Repositories\Main;

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
}
