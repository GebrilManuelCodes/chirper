<!DOCTYPE html>
<html lang="en" data-theme="lofi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ isset($title) ? $title . ' - Chirper Lite' : 'Chirper Lite' }}</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/daisyui@5" rel="stylesheet" type="text/css" />
    <link href="https://cdn.jsdelivr.net/npm/daisyui@5/themes.css" rel="stylesheet" type="text/css" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen flex flex-col bg-base-200 font-sans text-base-content antialiased">
    <!-- Facebook Lite Top Header -->
    <header class="w-full bg-base-100 border-b border-base-300 sticky top-0 z-40 shadow-2xs">
        <div class="max-w-6xl mx-auto px-3 sm:px-4 flex items-center justify-between h-14">
            <!-- Brand & Search -->
            <div class="flex items-center gap-3">
                <a href="/" class="flex items-center gap-1.5 font-bold text-xl sm:text-2xl hover:opacity-90 transition">
                    <span class="text-2xl select-none">🐦</span>
                    <span class="tracking-tight text-base-content font-extrabold">Chirper</span>
                    <span class="badge badge-neutral badge-xs font-mono text-[9px] uppercase px-1.5 py-0.5">lite</span>
                </a>

                <!-- Search Input (Facebook Lite style) -->
                <div class="hidden md:flex items-center relative">
                    <input type="text"
                           placeholder="Pesquisar no Chirper..."
                           class="input input-sm bg-base-200 border-none rounded-full pl-8 pr-3 text-xs w-44 lg:w-60 focus:w-72 transition-all focus:bg-base-100 focus:ring-1 focus:ring-blue-500" />
                    <svg xmlns="http://www.w3.org/2000/svg" class="size-4 text-base-content/50 absolute left-2.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </div>
            </div>

            <!-- Right Quick Actions -->
            <div class="flex items-center gap-1.5 sm:gap-2">
                @auth
                    <!-- Messenger Quick Action -->
                    <button type="button"
                            onclick="switchDashboardTab('mensagens')"
                            class="btn btn-ghost btn-circle btn-sm bg-base-200 text-base-content relative hover:bg-base-300"
                            title="Mensagens">
                        <span class="text-base select-none">💬</span>
                        <span class="badge badge-primary badge-xs absolute -top-1 -right-1 text-[10px] size-4 p-0 flex items-center justify-center font-bold text-white bg-blue-600 border-none">3</span>
                    </button>

                    <!-- Notifications Dropdown -->
                    <div class="dropdown dropdown-end">
                        <button tabindex="0" type="button" class="btn btn-ghost btn-circle btn-sm bg-base-200 text-base-content relative hover:bg-base-300" title="Notificações">
                            <span class="text-base select-none">🔔</span>
                            <span class="badge badge-error badge-xs absolute -top-1 -right-1 text-[10px] size-4 p-0 flex items-center justify-center font-bold text-white bg-rose-500 border-none">2</span>
                        </button>
                        <div tabindex="0" class="dropdown-content menu p-3 shadow-xl bg-base-100 border border-base-300 rounded-box w-72 sm:w-80 z-50 text-xs mt-2">
                            <div class="flex items-center justify-between font-bold text-sm mb-2 pb-1 border-b border-base-200">
                                <span>Notificações</span>
                                <span class="text-blue-600 text-xs cursor-pointer hover:underline">Marcar lidas</span>
                            </div>
                            <div class="space-y-2">
                                <div class="flex items-start gap-2 p-1.5 rounded-lg hover:bg-base-200 cursor-pointer transition">
                                    <div class="size-8 rounded-full bg-blue-600 text-white flex items-center justify-center font-bold shrink-0 text-xs">MS</div>
                                    <div>
                                        <p><span class="font-bold">Mariana Santos</span> reagiu à tua publicação: "👍 Gosto".</p>
                                        <span class="text-blue-600 text-[10px] font-semibold">Há 5 min</span>
                                    </div>
                                </div>
                                <div class="flex items-start gap-2 p-1.5 rounded-lg hover:bg-base-200 cursor-pointer transition">
                                    <div class="size-8 rounded-full bg-emerald-600 text-white flex items-center justify-center font-bold shrink-0 text-xs">PF</div>
                                    <div>
                                        <p><span class="font-bold">Pedro Ferreira</span> enviou-te um pedido de amizade.</p>
                                        <span class="text-blue-600 text-[10px] font-semibold">Há 1 hora</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Profile Avatar Dropdown -->
                    <div class="dropdown dropdown-end">
                        <div tabindex="0" role="button" class="btn btn-ghost btn-circle btn-sm avatar">
                            <div class="size-8 rounded-full ring-1 ring-base-300 overflow-hidden bg-base-200">
                                <img src="https://avatars.laravel.cloud/{{ urlencode(auth()->user()->email) }}" alt="{{ auth()->user()->name }}" class="size-full object-cover" />
                            </div>
                        </div>
                        <ul tabindex="0" class="dropdown-content menu p-2 shadow-xl bg-base-100 border border-base-300 rounded-box w-56 z-50 text-xs mt-2">
                            <li class="menu-title px-2 py-1">
                                <div class="font-bold text-sm text-base-content">{{ auth()->user()->name }}</div>
                                <div class="text-[11px] text-base-content/60 font-normal truncate">{{ auth()->user()->email }}</div>
                            </li>
                            <div class="divider my-1"></div>
                            <li><a href="/dashboard" onclick="switchDashboardTab('feed')">🏠 Feed Principal</a></li>
                            <li><a href="javascript:void(0)" onclick="switchDashboardTab('amigos')">👥 Amigos</a></li>
                            <li><a href="javascript:void(0)" onclick="switchDashboardTab('mensagens')">💬 Mensagens</a></li>
                            <li><a href="javascript:void(0)" onclick="switchDashboardTab('definicoes')">⚙️ Definições</a></li>
                            <div class="divider my-1"></div>
                            <li>
                                <form method="POST" action="/logout" class="w-full">
                                    @csrf
                                    <button type="submit" class="text-error w-full text-left font-semibold flex items-center gap-2">
                                        🚪 Terminar Sessão
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </div>
                @else
                    <a href="/login" class="btn btn-ghost btn-sm text-xs">Iniciar Sessão</a>
                    <a href="{{ route('register') }}" class="btn btn-primary btn-sm text-xs bg-blue-600 border-none text-white hover:bg-blue-700">Registar</a>
                @endauth
            </div>
        </div>
    </header>

    <!-- Global Toast / Alerts -->
    <div id="toast-container" class="fixed top-16 right-4 z-50 space-y-2 pointer-events-none">
        @if (session('success'))
            <div class="alert alert-success shadow-lg text-xs py-2 px-3 animate-fade-out pointer-events-auto flex items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="size-4 shrink-0 stroke-current" fill="none" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <span>{{ session('success') }}</span>
            </div>
        @endif
    </div>

    <!-- Main Content Slot -->
    <main class="flex-1 w-full">
        {{ $slot }}
    </main>

    <!-- Footer -->
    <footer class="footer footer-center p-4 bg-base-300 text-base-content text-xs border-t border-base-300 mt-auto">
        <div class="flex flex-col sm:flex-row items-center gap-2">
            <p>© {{ date('Y') }} Chirper Lite - Inspirado no Facebook Lite · Laravel & Tailwind</p>
            <span class="hidden sm:inline text-base-content/40">·</span>
            <a href="{{ route('splash') }}" class="link link-hover text-base-content/70">
                🐦 Ver tela splash
            </a>
        </div>
    </footer>

    <!-- Global UI Scripts -->
    <script>
        function showChirperToast(message, type = 'info') {
            const container = document.getElementById('toast-container');
            if (!container) return;
            const toast = document.createElement('div');
            toast.className = `alert alert-${type} shadow-lg text-xs py-2 px-3 pointer-events-auto transition-all duration-300 transform translate-y-0 opacity-100 flex items-center gap-2`;
            toast.innerHTML = `<span>${message}</span>`;
            container.appendChild(toast);
            setTimeout(() => {
                toast.classList.add('opacity-0', '-translate-y-2');
                setTimeout(() => toast.remove(), 300);
            }, 3000);
        }

        function copyChirpLink(id) {
            const url = window.location.origin + '/#chirp-' + id;
            navigator.clipboard.writeText(url).then(() => {
                showChirperToast('🔗 Ligação copiada para a área de transferência!', 'success');
            }).catch(() => {
                showChirperToast('🔗 Ligação copiada: ' + url, 'success');
            });
        }

        function handleShare(id) {
            copyChirpLink(id);
        }

        function saveChirpPost(id) {
            showChirperToast('🔖 Publicação guardada nos teus itens salvos!', 'success');
        }

        function hideChirpPost(id) {
            const el = document.getElementById('chirp-' + id);
            if (el) {
                el.style.transition = 'all 0.3s ease';
                el.style.opacity = '0';
                el.style.transform = 'scale(0.95)';
                setTimeout(() => {
                    el.innerHTML = '<div class="p-3 text-xs text-base-content/60 text-center bg-base-200 rounded-lg">Publicação ocultada do teu feed.</div>';
                    el.style.opacity = '1';
                    el.style.transform = 'scale(1)';
                }, 300);
            }
        }

        function handleLikeToggle(id) {
            const btn = document.getElementById('like-btn-' + id);
            const text = document.getElementById('like-text-' + id);
            const icon = document.getElementById('like-icon-' + id);
            const counter = document.getElementById('reaction-count-' + id);
            if (!btn || !counter) return;

            const isLiked = btn.classList.contains('text-blue-600');
            let current = parseInt(counter.textContent.trim()) || 0;

            if (isLiked) {
                btn.classList.remove('text-blue-600', 'font-bold');
                if (icon) icon.setAttribute('fill', 'none');
                if (text) text.textContent = 'Gosto';
                counter.textContent = Math.max(0, current - 1);
            } else {
                btn.classList.add('text-blue-600', 'font-bold');
                if (icon) icon.setAttribute('fill', 'currentColor');
                if (text) text.textContent = 'Gostei';
                counter.textContent = current + 1;
            }
        }

        function toggleComments(id, focus = false) {
            const section = document.getElementById('comments-section-' + id);
            if (!section) return;
            if (section.classList.contains('hidden')) {
                section.classList.remove('hidden');
            }
            if (focus) {
                const input = document.getElementById('comment-input-' + id);
                if (input) input.focus();
            }
        }

        function submitChirpComment(e, id) {
            e.preventDefault();
            const input = document.getElementById('comment-input-' + id);
            const list = document.getElementById('comments-list-' + id);
            const count = document.getElementById('comment-count-' + id);
            if (!input || !list) return;

            const val = input.value.trim();
            if (!val) return;

            const commentNode = document.createElement('div');
            commentNode.className = 'flex items-start gap-2 animate-fadeIn';
            commentNode.innerHTML = `
                <div class="size-7 rounded-full bg-blue-600 text-white flex items-center justify-center text-[10px] font-bold shrink-0">
                    Tu
                </div>
                <div class="bg-base-100 rounded-2xl px-3 py-1.5 border border-base-300 max-w-[85%] shadow-2xs">
                    <span class="font-bold text-base-content">Tu</span>
                    <p class="text-base-content/80 mt-0.5 text-xs">${val.replace(/</g, "&lt;").replace(/>/g, "&gt;")}</p>
                </div>
            `;
            list.appendChild(commentNode);
            input.value = '';

            if (count) {
                let current = parseInt(count.textContent) || 0;
                count.textContent = current + 1;
            }
            showChirperToast('💬 Comentário publicado!', 'success');
        }
    </script>
</body>
</html>
