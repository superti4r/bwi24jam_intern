<div id="preloader" aria-hidden="true"
    class="fixed inset-0 z-[9999] flex items-center justify-center bg-[var(--color-background)] transition-opacity duration-300">
    <div class="spinner text-[var(--color-primary)]"
        style="--spinner-size: 3rem; --spinner-width: 4px; --spinner-duration: 0.75s;"></div>
</div>

<script>
    (function () {
        var preloader = document.getElementById("preloader");
        if (!preloader) return;

        var start = Date.now();
        var delay = 2500;

        function hide() {
            var remaining = Math.max(0, delay - (Date.now() - start));
            setTimeout(function () {
                preloader.classList.add("pointer-events-none", "opacity-0");
                setTimeout(function () {
                    preloader.remove();
                }, 300);
            }, remaining);
        }

        if (document.readyState === "complete") {
            hide();
        } else {
            window.addEventListener("load", hide);
        }
    })();
</script>
