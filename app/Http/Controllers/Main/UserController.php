<?php

namespace App\Http\Controllers\Main;

use App\DTO\Main\UserDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\Main\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Models\User;
use App\Repositories\Main\RoleRepository;
use App\Services\Main\UserService;
use Illuminate\Http\Request;
use Exception;

class UserController extends Controller
{
    public function __construct(
        private readonly UserService $userService,
        private readonly RoleRepository $roleRepository
    ) {
    }

    public function index(Request $request)
    {
        $perPage = $request->query('perPage', 10);
        $users = $this->userService->getPaginatedUsers($perPage);
        return view('admin.users.index', compact('users'));
    }

    public function show(User $user)
    {
        return view('admin.users.show', compact('user'));
    }

    public function create()
    {
        $roles = $this->roleRepository->getRoles();
        return view('admin.users.create', compact('roles'));
    }

    public function store(UserStoreRequest $request)
    {
        try {
            $userDTO = new UserDTO($request->validated());
            $this->userService->createUser($userDTO);

            return redirect()
                ->route('admin.users.index')
                ->with(['success' => 'Пользователь успешно создан!']);
        } catch (Exception $exception) {
            return $exception->getMessage();
        }
    }

    public function edit(User $user)
    {
        $roles = $this->roleRepository->getRoles();
        return view('admin.users.edit', compact('user', 'roles'));
    }

    public function update(User $user, UserUpdateRequest $request)
    {
        try {
            $userDTO = new UserDTO($request->validated());
            $this->userService->updateUser($user, $userDTO);

            return redirect()
                ->route('admin.users.index')
                ->with(['success' => 'Пользователь успешно обновлен!']);
        } catch (Exception $exception) {
            return $exception->getMessage();
        }
    }

    public function delete(User $user)
    {
        try {
            $this->userService->delete($user);

            return redirect()
                ->route('admin.users.index')
                ->with(['success' => 'Пользователь успешно удален!']);
        } catch (Exception $exception) {
            return $exception->getMessage();
        }
    }

    public function restore($userId)
    {
        try {
            $this->userService->restore($userId);

            return redirect()
                ->route('admin.users.index')
                ->with(['success' => 'Пользователь успешно восстановлен!']);
        } catch (Exception $exception) {
            return $exception->getMessage();
        }
    }

    public function listOfDeletedUsers(Request $request)
    {
        $perPage = $request->query('perPage', 10);
        $users = $this->userService->getDeletedPaginatedUsers($perPage);
        return view('admin.users.deleted', compact('users'));
    }
}
