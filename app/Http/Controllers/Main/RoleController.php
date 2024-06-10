<?php

namespace App\Http\Controllers\Main;

use App\DTO\Main\RoleDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\Main\MassRoleDeleteRequest;
use App\Http\Requests\Main\MassRoleRestoreRequest;
use App\Http\Requests\Main\RoleStoreRequest;
use App\Http\Requests\Main\RoleUpdateRequest;
use App\Models\Role;
use App\Services\Main\RoleService;
use Illuminate\Http\Request;
use Exception;

class RoleController extends Controller
{
    public function __construct(private readonly RoleService $roleService) {
    }

    public function index(Request $request)
    {
        $perPage = $request->query('perPage', 10);
        $roles = $this->roleService->getPaginatedRoles($perPage);
        return view('admin.roles.index', compact('roles'));
    }

    public function show(Role $role)
    {
        return view('admin.roles.show', compact('role'));
    }

    public function edit(Role $role)
    {
        return view('admin.roles.edit', compact('role'));
    }

    public function create()
    {
        return view('admin.roles.create');
    }

    public function store(RoleStoreRequest $request)
    {
        try {
            $roleDTO = new RoleDTO($request->validated());
            $this->roleService->store($roleDTO);

            return redirect()
                ->route('admin.roles.index')
                ->with(['success' => 'Роль успешно создана!']);
        } catch (Exception $exception) {
            return $exception->getMessage();
        }
    }

    public function update(Role $role, RoleUpdateRequest $request)
    {
        try {
            $roleDTO = new RoleDTO($request->validated());
            $this->roleService->update($role, $roleDTO);

            return redirect()
                ->route('admin.roles.index')
                ->with(['success' => 'Роль успешно обновлена!']);
        } catch (Exception $exception) {
            return $exception->getMessage();
        }
    }

    public function delete(Role $role)
    {
        try {
            $this->roleService->delete($role);

            return redirect()
                ->route('admin.roles.index')
                ->with(['success' => 'Роль успешно удалена!']);
        } catch (Exception $exception) {
            return $exception->getMessage();
        }
    }

    public function restore($roleId)
    {
        try {
            $this->roleService->restore($roleId);

            return redirect()
                ->route('admin.roles.index')
                ->with(['success' => 'Роль успешно восстановлена!']);
        } catch (Exception $exception) {
            return $exception->getMessage();
        }
    }

    public function listOfDeletedRoles(Request $request)
    {
        $perPage = $request->query('perPage', 10);
        $roles = $this->roleService->getDeletedPaginatedRoles($perPage);
        return view('admin.roles.deleted', compact('roles'));
    }

    public function massDelete(MassRoleDeleteRequest $request)
    {
        try {
            $ids = $request->get('ids');
            $this->roleService->massDelete($ids);

            return redirect()
                ->route('admin.roles.index')
                ->with(['success' => 'Роли успешно удалены!']);
        } catch (Exception $exception) {
            return $exception->getMessage();
        }
    }
}
