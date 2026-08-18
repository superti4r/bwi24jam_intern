@props([
    'id',
    'title' => 'Konfirmasi tindakan',
    'message' => 'Apakah Anda yakin ingin melanjutkan tindakan ini?',
    'action',
    'method' => 'DELETE',
    'confirmLabel' => 'Hapus',
])

<div data-confirm-dialog="{{ $id }}" hidden class="fixed inset-0 z-50 flex items-end justify-center bg-foreground/30 p-4 sm:items-center" role="dialog" aria-modal="true" aria-labelledby="{{ $id }}-title" aria-describedby="{{ $id }}-message">
    <div data-confirm-panel class="w-full max-w-md border border-border bg-background p-6 opacity-0 sm:p-8">
        <div class="flex items-start justify-between gap-6">
            <div><p class="text-[10px] font-semibold uppercase tracking-[0.18em] text-primary">Perhatian</p><h2 id="{{ $id }}-title" class="mt-3 text-2xl font-semibold tracking-[-0.05em]">{{ $title }}</h2></div>
            <button type="button" data-confirm-close class="flex size-9 shrink-0 items-center justify-center text-muted transition-colors hover:text-primary focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-primary focus-visible:ring-offset-2" aria-label="Tutup dialog"><x-icon.close class="size-5" /></button>
        </div>
        <p id="{{ $id }}-message" class="mt-4 text-sm leading-6 text-muted">{{ $message }}</p>
        <div class="mt-8 flex flex-col-reverse gap-3 sm:flex-row sm:justify-end">
            <button type="button" data-confirm-close class="min-h-11 border border-border px-4 text-sm font-medium text-foreground transition-colors hover:border-primary hover:text-primary focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-primary focus-visible:ring-offset-2">Batal</button>
            <form method="POST" action="{{ $action }}">@csrf @method($method)<button type="submit" data-motion-interaction class="login-splash min-h-11 border border-primary px-4 text-sm font-semibold focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-primary focus-visible:ring-offset-2">{{ $confirmLabel }}</button></form>
        </div>
    </div>
</div>
