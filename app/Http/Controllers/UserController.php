<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\StoreUserRequest;
use App\Http\Requests\User\UpdateUserRequest;
use App\Models\User;
use App\Services\UserService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Gate;
use Illuminate\View\View;

class UserController extends Controller
{
    public function __construct(private readonly UserService $userService)
    {
    }

    public function index(): View
    {
        Gate::authorize('viewAny', User::class);

        return view('pages.app.users.index', ['users' => User::withCount('articles')->latest()->paginate(5)]);
    }

    public function create(): View
    {
        Gate::authorize('create', User::class);

        return view('pages.app.users.create');
    }

    public function store(StoreUserRequest $request): RedirectResponse
    {
        $this->userService->store($request->validated());

        return to_route('dashboard.users.index')->with('status', 'Pengguna berhasil dibuat.');
    }

    public function edit(User $user): View
    {
        Gate::authorize('view', $user);

        return view('pages.app.users.edit', compact('user'));
    }

    public function update(UpdateUserRequest $request, User $user): RedirectResponse
    {
        Gate::authorize('update', $user);
        $this->userService->update($user, $request->validated());

        return to_route('dashboard.users.index')->with('status', 'Pengguna berhasil diperbarui.');
    }

    public function destroy(User $user): RedirectResponse
    {
        Gate::authorize('delete', $user);
        abort_unless($this->userService->canDelete($user), 403, 'Administrator terakhir tidak dapat dihapus.');
        $user->delete();

        return to_route('dashboard.users.index')->with('status', 'Pengguna berhasil dihapus.');
    }
}
