@php
    $toastIcons = [
        'success' => 'circle-check',
        'danger' => 'circle-x',
        'warning' => 'triangle-alert',
        'info' => 'info',
        'primary' => 'bell',
    ];

    $toasts = [];
    if (session('success')) {
        $toasts[] = ['variant' => 'success', 'title' => session('success'), 'icon' => $toastIcons['success']];
    }
    if (session('error')) {
        $toasts[] = ['variant' => 'danger', 'title' => session('error'), 'icon' => $toastIcons['danger']];
    }
    if (session('warning')) {
        $toasts[] = ['variant' => 'warning', 'title' => session('warning'), 'icon' => $toastIcons['warning']];
    }
    if (session('info')) {
        $toasts[] = ['variant' => 'info', 'title' => session('info'), 'icon' => $toastIcons['info']];
    }
    if ($errors->any()) {
        $toasts[] = [
            'variant' => 'danger',
            'title' => 'Terjadi kesalahan',
            'description' => $errors->first(),
            'icon' => $toastIcons['danger'],
        ];
    }

    $toastIconMarkup = collect($toasts)
        ->mapWithKeys(fn($toast) => [$toast['variant'] => (string) view('components.icons.' . $toastIcons[$toast['variant']])])
        ->all();
@endphp

@if (!empty($toasts))
    <script>
        window.addEventListener('DOMContentLoaded', function () {
            const toasts = @json($toasts);
            const icons = @json($toastIconMarkup);

            function makeIcon(svg) {
                const wrapper = document.createElement('div');
                wrapper.innerHTML = svg.trim();
                return wrapper.firstElementChild;
            }

            toasts.forEach(function (toast) {
                const options = {
                    icon: makeIcon(icons[toast.variant]),
                    description: toast.description || undefined,
                };

                if (toast.variant === 'success') {
                    Stisla.toast.success(toast.title, options);
                } else {
                    Stisla.toast(toast.title, {
                        ...options,
                        variant: toast.variant,
                    });
                }
            });
        });
    </script>
@endif