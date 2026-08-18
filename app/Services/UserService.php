<?php

namespace App\Services;

use App\Enum\Roles;
use App\Models\User;

class UserService
{
    public function store(array $data): User
    {
        return User::create($data);
    }

    public function update(User $user, array $data): User
    {
        if (filled($data['password'] ?? null)) {
        } else {
            unset($data['password']);
        }

        $user->update($data);

        return $user->refresh();
    }

    public function canDelete(User $user): bool
    {
        return ! $user->hasRole('administrator') || User::where('roles', Roles::ADMINISTRATOR->value)->count() > 1;
    }
}
