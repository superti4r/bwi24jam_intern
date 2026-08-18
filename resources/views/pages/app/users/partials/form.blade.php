<div class="grid gap-6 sm:grid-cols-2">
    <div class="flex flex-col gap-2 sm:col-span-2">
        <label for="name" class="text-sm font-medium">Nama lengkap</label>
        <input id="name" name="name" value="{{ old('name', $user?->name) }}" required
            class="min-h-12 border border-border px-4 outline-none focus:border-primary focus:ring-2 focus:ring-primary/20">
    </div>
    <div class="flex flex-col gap-2">
        <label for="email" class="text-sm font-medium">Email</label>
        <input id="email" name="email" type="email" value="{{ old('email', $user?->email) }}" required
            class="min-h-12 border border-border px-4 outline-none focus:border-primary focus:ring-2 focus:ring-primary/20">
    </div>
    <div class="flex flex-col gap-2">
        <label for="roles" class="text-sm font-medium">Role</label>
        <select id="roles" name="roles" required
            class="min-h-12 border border-border px-4 outline-none focus:border-primary focus:ring-2 focus:ring-primary/20">
            @foreach (\App\Enum\Roles::cases() as $role)
                <option value="{{ $role->value }}" @selected(old('roles', $user?->roles?->value ?? 'user') === $role->value)>
                    {{ ucfirst($role->value) }}
                </option>
            @endforeach
        </select>
    </div>
    <div class="flex flex-col gap-2">
        <label for="password" class="text-sm font-medium">{{ $user ? 'Password baru (opsional)' : 'Password' }}</label>
        <input id="password" name="password" type="password" @required(!$user) autocomplete="new-password"
            class="min-h-12 border border-border px-4 outline-none focus:border-primary focus:ring-2 focus:ring-primary/20">
    </div>
    <div class="flex flex-col gap-2">
        <label for="password_confirmation" class="text-sm font-medium">Konfirmasi password</label>
        <input id="password_confirmation" name="password_confirmation" type="password" @required(!$user)
            autocomplete="new-password"
            class="min-h-12 border border-border px-4 outline-none focus:border-primary focus:ring-2 focus:ring-primary/20">
    </div>
</div>