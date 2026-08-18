<div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
    <p class="text-xs font-semibold uppercase tracking-[0.14em] text-muted">Akun terdaftar</p><a
        href="{{ route('dashboard.users.create') }}"
        class="w-full bg-primary px-4 py-3 text-center text-sm font-semibold text-white hover:bg-primary/85 sm:w-auto">Tambah
        pengguna</a>
</div>
<div class="mt-5"><x-app.data-table>
        <table class="min-w-[760px] w-full text-left text-sm">
            <thead
                class="border-b border-border bg-surface text-[10px] font-semibold uppercase tracking-[0.16em] text-muted">
                <tr>
                    <th class="px-5 py-4">Pengguna</th>
                    <th class="px-5 py-4">Email</th>
                    <th class="px-5 py-4">Role</th>
                    <th class="px-5 py-4">Artikel</th>
                    <th class="px-5 py-4 text-right">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-border">@foreach($users as $user)
                <tr class="transition-colors hover:bg-surface/60">
                    <td class="px-5 py-5">
                        <p class="font-semibold">{{ $user->name }}</p>
                        <p class="mt-1 text-xs text-muted">{{ $user->created_at->format('d M Y') }}</p>
                    </td>
                    <td class="px-5 py-5 text-muted">{{ $user->email }}</td>
                    <td class="px-5 py-5"><span
                            class="border border-border px-2 py-1 text-[10px] uppercase tracking-[0.12em] text-muted">{{ $user->roles->value }}</span>
                    </td>
                    <td class="px-5 py-5 text-primary">{{ $user->articles_count }}</td>
                    <td class="px-5 py-5">
                        <div class="flex justify-end gap-4"><a href="{{ route('dashboard.users.edit', $user) }}"
                                class="font-semibold text-primary underline underline-offset-4">Edit</a>@if($user->id !== auth()->id())<button
                                    type="button" data-confirm-open="delete-user-{{ $user->id }}"
                                class="font-semibold text-red-700 underline underline-offset-4">Hapus</button>@endif
                        </div>
                    </td>
            </tr>@endforeach
            </tbody>
        </table>
    </x-app.data-table></div>
<div class="mt-5 border-t border-border pt-5">{{ $users->onEachSide(1)->links() }}</div>
@foreach($users as $user)@if($user->id !== auth()->id())<x-app.confirm-dialog id="delete-user-{{ $user->id }}"
    title="Hapus pengguna?" message="Akun {{ $user->name }} akan dihapus dan tidak dapat dikembalikan."
:action="route('dashboard.users.destroy', $user)" />@endif @endforeach