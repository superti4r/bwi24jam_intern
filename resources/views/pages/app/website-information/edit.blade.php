@extends('layouts.app')

@section('title', 'Informasi Website')

@section('content')
    @include('components.app.page-header', [
        'title' => 'Informasi Website',
        'eyebrow' => 'Pengaturan',
        'description' => 'Kelola konten utama yang tampil pada halaman publik BWI 24 Jam.',
    ])

    <div class="mx-auto max-w-[90rem] px-5 py-8 sm:px-8 lg:px-12">
        @if (session('status'))
            <p class="mb-6 border-l-2 border-primary bg-surface px-4 py-3 text-sm" role="status">{{ session('status') }}</p>
        @endif

        <form method="POST" action="{{ route('dashboard.website-information.update') }}" enctype="multipart/form-data"
            class="grid gap-5 lg:grid-cols-2">
            @csrf
            @method('PUT')

            <section class="border border-border bg-background p-5 sm:p-8">
                <p class="text-[10px] font-semibold uppercase tracking-[0.2em] text-primary">Hero</p>
                <h2 class="mt-3 text-2xl font-semibold tracking-[-0.05em]">Bagian pembuka</h2>
                <div class="mt-8 flex flex-col gap-2">
                    <label for="hero_description" class="text-sm font-medium">Deskripsi hero</label>
                    <textarea id="hero_description" name="hero_description" rows="5" required
                        class="border border-border px-4 py-3 outline-none transition-colors focus:border-primary focus:ring-2 focus:ring-primary/20">{{ old('hero_description', $websiteInformation->hero_description) }}</textarea>
                    @error('hero_description')
                    <p class="text-xs text-red-700">{{ $message }}</p>@enderror
                </div>
                <div class="mt-6 flex flex-col gap-2">
                    <label for="hero_image" class="text-sm font-medium">Gambar hero</label>
                    <input id="hero_image" name="hero_image" type="file" accept="image/*"
                        class="border border-border px-4 py-3 text-sm outline-none file:mr-4 file:border-0 file:bg-primary file:px-3 file:py-2 file:text-white focus:border-primary focus:ring-2 focus:ring-primary/20">
                    @error('hero_image')
                    <p class="text-xs text-red-700">{{ $message }}</p>@enderror
                    @if ($websiteInformation->hero_image)
                        <img src="{{ $websiteInformation->hero_image_url }}" alt="Gambar hero saat ini"
                            class="mt-3 aspect-[16/7] w-full object-cover">
                    @endif
                </div>
            </section>

            <section class="border border-border bg-background p-5 sm:p-8 lg:col-span-2">
                <p class="text-[10px] font-semibold uppercase tracking-[0.2em] text-primary">Welcomer</p>
                <h2 class="mt-3 text-2xl font-semibold tracking-[-0.05em]">Section video halaman utama</h2>
                <div class="mt-8 grid gap-6 sm:grid-cols-2">
                    <div class="flex flex-col gap-2 sm:col-span-2"><label for="welcomer_video_url"
                            class="text-sm font-medium">Alamat video YouTube</label><input id="welcomer_video_url"
                            name="welcomer_video_url" type="url"
                            value="{{ old('welcomer_video_url', $websiteInformation->welcomer_video_url) }}"
                            placeholder="https://www.youtube.com/watch?v=..." required
                            class="min-h-12 border border-border px-4 outline-none focus:border-primary focus:ring-2 focus:ring-primary/20">@error('welcomer_video_url')
                            <p class="text-xs text-red-700">{{ $message }}</p>@enderror
                    </div>
                    <div class="flex flex-col gap-2"><label for="welcomer_eyebrow"
                            class="text-sm font-medium">Eyebrow</label><input id="welcomer_eyebrow" name="welcomer_eyebrow"
                            value="{{ old('welcomer_eyebrow', $websiteInformation->welcomer_eyebrow) }}" required
                            class="min-h-12 border border-border px-4 outline-none focus:border-primary focus:ring-2 focus:ring-primary/20">
                    </div>
                    <div class="flex flex-col gap-2"><label for="welcomer_label" class="text-sm font-medium">Label
                            bawah</label><input id="welcomer_label" name="welcomer_label"
                            value="{{ old('welcomer_label', $websiteInformation->welcomer_label) }}" required
                            class="min-h-12 border border-border px-4 outline-none focus:border-primary focus:ring-2 focus:ring-primary/20">
                    </div>
                    <div class="flex flex-col gap-2 sm:col-span-2"><label for="welcomer_title"
                            class="text-sm font-medium">Judul</label><input id="welcomer_title" name="welcomer_title"
                            value="{{ old('welcomer_title', $websiteInformation->welcomer_title) }}" required
                            class="min-h-12 border border-border px-4 outline-none focus:border-primary focus:ring-2 focus:ring-primary/20">
                    </div>
                    <div class="flex flex-col gap-2 sm:col-span-2"><label for="welcomer_description"
                            class="text-sm font-medium">Deskripsi</label><textarea id="welcomer_description"
                            name="welcomer_description" rows="3" required
                            class="border border-border px-4 py-3 outline-none focus:border-primary focus:ring-2 focus:ring-primary/20">{{ old('welcomer_description', $websiteInformation->welcomer_description) }}</textarea>
                    </div>
                </div>
            </section>

            <section class="border border-border bg-background p-5 sm:p-8">
                <p class="text-[10px] font-semibold uppercase tracking-[0.2em] text-primary">Secondary hero</p>
                <h2 class="mt-3 text-2xl font-semibold tracking-[-0.05em]">Ajakan berkontribusi</h2>
                <div class="mt-8 flex flex-col gap-2">
                    <label for="secondary_hero_title" class="text-sm font-medium">Judul</label>
                    <textarea id="secondary_hero_title" name="secondary_hero_title" rows="3" required
                        class="border border-border px-4 py-3 outline-none transition-colors focus:border-primary focus:ring-2 focus:ring-primary/20">{{ old('secondary_hero_title', $websiteInformation->secondary_hero_title) }}</textarea>
                    @error('secondary_hero_title')
                    <p class="text-xs text-red-700">{{ $message }}</p>@enderror
                </div>
                <div class="mt-6 flex flex-col gap-2">
                    <label for="secondary_hero_description" class="text-sm font-medium">Deskripsi</label>
                    <textarea id="secondary_hero_description" name="secondary_hero_description" rows="3" required
                        class="border border-border px-4 py-3 outline-none transition-colors focus:border-primary focus:ring-2 focus:ring-primary/20">{{ old('secondary_hero_description', $websiteInformation->secondary_hero_description) }}</textarea>
                    @error('secondary_hero_description')
                    <p class="text-xs text-red-700">{{ $message }}</p>@enderror
                </div>
                <div class="mt-6 flex flex-col gap-2">
                    <label for="contact_email" class="text-sm font-medium">Email kontak</label>
                    <input id="contact_email" name="contact_email" type="email"
                        value="{{ old('contact_email', $websiteInformation->contact_email) }}" required
                        class="min-h-12 border border-border px-4 outline-none transition-colors focus:border-primary focus:ring-2 focus:ring-primary/20">
                    @error('contact_email')
                    <p class="text-xs text-red-700">{{ $message }}</p>@enderror
                </div>
            </section>

            <section class="border border-border bg-background p-5 sm:p-8 lg:col-span-2">
                <p class="text-[10px] font-semibold uppercase tracking-[0.2em] text-primary">Sosial media</p>
                <h2 class="mt-3 text-2xl font-semibold tracking-[-0.05em]">Tautan publik</h2>
                <div class="mt-8 grid gap-6 sm:grid-cols-2">
                    @foreach ([
                            'facebook_url' => 'Facebook',
                            'instagram_url' => 'Instagram',
                            'x_url' => 'X',
                            'youtube_url' => 'YouTube',
                        ] as $field => $label)
                        <div class="flex flex-col gap-2">
                            <label for="{{ $field }}" class="text-sm font-medium">{{ $label }}</label>
                            <input id="{{ $field }}" name="{{ $field }}" type="url"
                                value="{{ old($field, $websiteInformation->{$field}) }}" placeholder="https://"
                                class="min-h-12 border border-border px-4 outline-none transition-colors focus:border-primary focus:ring-2 focus:ring-primary/20">
                            @error($field)
                            <p class="text-xs text-red-700">{{ $message }}</p>@enderror
                        </div>
                    @endforeach
                </div>
            </section>

            <div class="flex justify-end lg:col-span-2">
                <button type="submit"
                    class="min-h-12 bg-primary px-5 text-sm font-semibold text-white transition-colors hover:bg-primary/85 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-primary focus-visible:ring-offset-2">Simpan
                    informasi website</button>
            </div>
        </form>
    </div>
@endsection