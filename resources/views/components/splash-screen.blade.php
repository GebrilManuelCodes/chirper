@if (!session('success') && !request()->has('skip_splash'))
<div id="chirper-splash-overlay"
     class="fixed inset-0 z-50 flex items-center justify-center bg-base-200 transition-all duration-700 ease-in-out p-4"
     role="dialog"
     aria-modal="true"
     aria-label="Tela de Inicialização Chirper">
    <div class="card w-full max-w-md bg-base-100 shadow-2xl border border-base-300 transform transition-all duration-500 scale-100">
        <div class="card-body items-center text-center p-6 sm:p-8">
            <!-- Animated Bird Icon -->
            <div class="size-20 rounded-2xl bg-base-200 border border-base-300 flex items-center justify-center text-4xl shadow-inner mb-2 animate-bounce select-none">
                🐦
            </div>

            <!-- Title & Subtitle matching existing branding -->
            <h1 class="text-4xl font-extrabold tracking-tight text-base-content">
                Chirper
            </h1>

            <p class="text-sm text-base-content/60 mt-1 max-w-xs">
                Compartilhe o que está pensando com o mundo em tempo real.
            </p>

            <div class="divider my-3"></div>

            <!-- Progress Section -->
            <div class="w-full space-y-2">
                <div class="flex justify-between text-xs text-base-content/70 font-medium">
                    <span id="overlay-splash-status">Iniciando o Chirper...</span>
                    <span id="overlay-splash-percent">0%</span>
                </div>
                <div class="w-full bg-base-200 rounded-full h-2.5 overflow-hidden border border-base-300">
                    <div id="overlay-splash-bar" class="bg-primary h-full transition-all duration-150 ease-out" style="width: 0%;"></div>
                </div>
            </div>

            <!-- Action Button & Auto-transition notice -->
            <div class="w-full mt-6 flex flex-col gap-2">
                <button id="overlay-splash-btn"
                        type="button"
                        class="btn btn-primary btn-sm sm:btn-md w-full shadow font-semibold">
                    <span>Entrar na Tela Principal</span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 inline-block ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                    </svg>
                </button>
                <span class="text-xs text-base-content/50">
                    Avançando automaticamente em instantes...
                </span>
            </div>

            <p class="text-xs text-base-content/40 mt-4">
                © {{ date('Y') }} Chirper · Built with Laravel and ❤️
            </p>
        </div>
    </div>
</div>

<script>
    (function() {
        const overlay = document.getElementById('chirper-splash-overlay');
        if (!overlay) return;

        // Prevent body scrolling while splash is active
        document.body.style.overflow = 'hidden';

        const bar = document.getElementById('overlay-splash-bar');
        const percent = document.getElementById('overlay-splash-percent');
        const status = document.getElementById('overlay-splash-status');
        const btn = document.getElementById('overlay-splash-btn');

        let progress = 0;
        let isClosed = false;

        function closeSplash() {
            if (isClosed) return;
            isClosed = true;
            clearInterval(timer);

            // Re-enable scrolling
            document.body.style.overflow = '';

            // Fade out & scale out animation
            overlay.classList.add('opacity-0', 'scale-95', 'pointer-events-none');
            setTimeout(function() {
                if (overlay && overlay.parentNode) {
                    overlay.parentNode.removeChild(overlay);
                }
            }, 700);
        }

        if (btn) {
            btn.addEventListener('click', closeSplash);
        }

        // Allow pressing Enter, Space, or Escape to dismiss
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Enter' || e.key === ' ' || e.key === 'Escape') {
                closeSplash();
            }
        }, { once: true });

        const timer = setInterval(function() {
            progress += 4;
            if (progress > 100) progress = 100;

            if (bar) bar.style.width = progress + '%';
            if (percent) percent.textContent = progress + '%';

            if (progress >= 30 && progress < 70 && status) {
                status.textContent = 'Carregando chirps recentes...';
            } else if (progress >= 70 && progress < 100 && status) {
                status.textContent = 'Preparando a tela principal...';
            } else if (progress >= 100 && status) {
                status.textContent = 'Tudo pronto! Entrando...';
            }

            if (progress >= 100) {
                setTimeout(closeSplash, 300);
            }
        }, 80);
    })();
</script>
@endif

