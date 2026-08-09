<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use App\Http\Requests\Administrator\StoreUserRequest;
use App\Http\Requests\Administrator\UpdateUserRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class UserManagementController extends Controller
{
    public function index(): View
    {
        $users = User::query()
            ->orderBy('created_at', 'desc')
            ->paginate(5)
            ->withQueryString();

        return view('pages.administrator.users.index', compact('users'));
    }

    public function create(): View
    {
        return view('pages.administrator.users.create');
    }

    public function store(StoreUserRequest $request): RedirectResponse
    {
        $data = $request->validated();
        $data['password'] = Hash::make($data['password']);

        User::create($data);

        return redirect()
            ->route('administrator.users.index')
            ->with('success', 'Pengguna berhasil ditambahkan.');
    }

    public function edit(string $id): View
    {
        $user = User::findOrFail($id);

        return view('pages.administrator.users.edit', compact('user'));
    }

    public function update(UpdateUserRequest $request, string $id): RedirectResponse
    {
        $user = User::findOrFail($id);

        $data = $request->validated();

        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->validated('password'));
        } else {
            unset($data['password']);
        }

        $user->update($data);

        return redirect()
            ->route('administrator.users.index')
            ->with('success', 'Pengguna berhasil diperbarui.');
    }

    public function destroy(string $id): RedirectResponse
    {
        $user = User::findOrFail($id);

        if ($user->id === auth()->id()) {
            return back()->with('error', 'Anda tidak dapat menghapus akun Anda sendiri.');
        }

        $user->delete();

        return redirect()
            ->route('administrator.users.index')
            ->with('success', 'Pengguna berhasil dihapus.');
    }
}
