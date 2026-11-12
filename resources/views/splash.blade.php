<x-layout>
    <x-slot:title>
        Bem-vindo ao Chirper
    </x-slot:title>

    <div class="min-h-[calc(100vh-16rem)] flex items-center justify-center py-8">
        <div class="card w-full max-w-md bg-base-100 shadow-2xl border border-base-300">
            <div class="card-body items-center text-center p-6 sm:p-8">
                <!-- Animated Bird Icon -->
                <div class="size-20 rounded-2xl bg-base-200 border border-base-300 flex items-center justify-center text-4xl shadow-inner mb-2 animate-bounce select-none">
                    🐦
                </div>

                <!-- Title & Tagline -->
                <h1 class="text-4xl font-extrabold tracking-tight text-base-content">
                    Chirper
                </h1>

                <p class="text-sm text-base-content/60 mt-1 max-w-xs">
                    Compartilhe seus pensamentos e conecte-se com o mundo em tempo real.
                </p>

                <div class="divider my-3"></div>

                <!-- Progress Section -->
                <div class="w-full space-y-2">
                    <div class="flex justify-between text-xs text-base-content/70 font-medium">
                        <span id="splash-status">Iniciando o Chirper...</span>
                        <span id="splash-percent">0%</span>
                    </div>
                    <div class="w-full bg-base-200 rounded-full h-2.5 overflow-hidden border border-base-300">
                        <div id="splash-progress-bar" class="bg-primary h-full transition-all duration-150 ease-out" style="width: 0%;"></div>
                    </div>
                </div>

                <!-- Action Button & Countdown -->
                <div class="card-actions w-full mt-6 flex flex-col gap-2">
                    <a href="{{ route('home', ['skip_splash' => 1]) }}" id="splash-action-btn" class="btn btn-primary btn-sm sm:btn-md w-full shadow font-semibold">
                        <span>Acessar Tela Principal</span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 inline-block ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                        </svg>
                    </a>
                    <span class="text-xs text-base-content/50">
                        Redirecionando automaticamente em <span id="splash-countdown">3</span>s...
                    </span>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            let progress = 0;
            let countdown = 3;
            const progressBar = document.getElementById('splash-progress-bar');
            const percentLabel = document.getElementById('splash-percent');
            const statusLabel = document.getElementById('splash-status');
            const countdownLabel = document.getElementById('splash-countdown');
            const targetUrl = "{{ route('home', ['skip_splash' => 1]) }}";

            const interval = setInterval(function () {
                progress += 4;
                if (progress > 100) progress = 100;

                if (progressBar) progressBar.style.width = progress + '%';
                if (percentLabel) percentLabel.textContent = progress + '%';

                if (progress >= 30 && progress < 70 && statusLabel) {
                    statusLabel.textContent = 'Carregando chirps recentes...';
                } else if (progress >= 70 && progress < 100 && statusLabel) {
                    statusLabel.textContent = 'Preparando a tela principal...';
                } else if (progress >= 100 && statusLabel) {
                    statusLabel.textContent = 'Tudo pronto! Entrando...';
                }

                if (progress >= 100) {
                    clearInterval(interval);
                    window.location.href = targetUrl;
                }
            }, 80);

            const countInterval = setInterval(function () {
                countdown -= 1;
                if (countdown <= 0) {
                    clearInterval(countInterval);
                } else if (countdownLabel) {
                    countdownLabel.textContent = countdown;
                }
            }, 1000);
        });
    </script>
</x-layout>

