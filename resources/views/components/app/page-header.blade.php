<header class="border-b border-border bg-background">
    <div class="mx-auto flex max-w-[90rem] flex-col gap-6 px-5 py-10 sm:px-8 lg:flex-row lg:items-end lg:justify-between lg:px-12 lg:py-14">
        <div><p class="text-[10px] font-semibold uppercase tracking-[0.2em] text-primary">{{ $eyebrow ?? 'Ruang kerja' }}</p><h1 class="mt-3 text-[clamp(2.5rem,5vw,4.5rem)] font-semibold leading-none tracking-[-0.07em]">{{ $title }}</h1>@isset($description)<p class="mt-5 max-w-xl text-base leading-7 text-muted">{{ $description }}</p>@endisset</div>
        @isset($action)<div class="w-full shrink-0 sm:w-auto">{{ $action }}</div>@endisset
    </div>
</header>
