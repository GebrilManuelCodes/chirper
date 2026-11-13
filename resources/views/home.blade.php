<x-layout>
    <x-slot:title>
        Dashboard - Chirper Lite
    </x-slot:title>

    <x-splash-screen />

    <!-- Facebook Lite Responsive Sub-Navigation Bar (Sticky Tabs) -->
    <nav class="sticky top-14 z-30 bg-base-100 border-b border-base-300 shadow-2xs" aria-label="Navegação Facebook Lite">
        <div class="max-w-6xl mx-auto px-2 sm:px-4">
            <div class="grid grid-cols-5 text-center text-xs sm:text-sm font-semibold select-none">
                <!-- Feed / Início -->
                <button type="button"
                        onclick="switchDashboardTab('feed')"
                        id="tab-btn-feed"
                        class="fb-nav-tab flex flex-col sm:flex-row items-center justify-center gap-1 sm:gap-2 py-2.5 sm:py-3 border-b-2 border-blue-600 text-blue-600 transition-colors">
                    <span class="text-lg sm:text-xl">🏠</span>
                    <span class="text-[11px] sm:text-xs">Início</span>
                </button>

                <!-- Amigos -->
                <button type="button"
                        onclick="switchDashboardTab('amigos')"
                        id="tab-btn-amigos"
                        class="fb-nav-tab flex flex-col sm:flex-row items-center justify-center gap-1 sm:gap-2 py-2.5 sm:py-3 border-b-2 border-transparent text-base-content/70 hover:text-base-content transition-colors relative">
                    <span class="text-lg sm:text-xl">👥</span>
                    <span class="text-[11px] sm:text-xs">Amigos</span>
                    <span class="badge badge-error badge-xs text-[9px] text-white p-0.5 sm:p-1 size-3.5 sm:size-4 font-bold flex items-center justify-center ml-0.5">3</span>
                </button>

                <!-- Mensagens -->
                <button type="button"
                        onclick="switchDashboardTab('mensagens')"
                        id="tab-btn-mensagens"
                        class="fb-nav-tab flex flex-col sm:flex-row items-center justify-center gap-1 sm:gap-2 py-2.5 sm:py-3 border-b-2 border-transparent text-base-content/70 hover:text-base-content transition-colors relative">
                    <span class="text-lg sm:text-xl">💬</span>
                    <span class="text-[11px] sm:text-xs">Mensagens</span>
                    <span class="badge badge-primary badge-xs bg-blue-600 border-none text-[9px] text-white p-0.5 sm:p-1 size-3.5 sm:size-4 font-bold flex items-center justify-center ml-0.5">2</span>
                </button>

                <!-- Definições -->
                <button type="button"
                        onclick="switchDashboardTab('definicoes')"
                        id="tab-btn-definicoes"
                        class="fb-nav-tab flex flex-col sm:flex-row items-center justify-center gap-1 sm:gap-2 py-2.5 sm:py-3 border-b-2 border-transparent text-base-content/70 hover:text-base-content transition-colors">
                    <span class="text-lg sm:text-xl">⚙️</span>
                    <span class="text-[11px] sm:text-xs">Definições</span>
                </button>

                <!-- Menu -->
                <button type="button"
                        onclick="switchDashboardTab('menu')"
                        id="tab-btn-menu"
                        class="fb-nav-tab flex flex-col sm:flex-row items-center justify-center gap-1 sm:gap-2 py-2.5 sm:py-3 border-b-2 border-transparent text-base-content/70 hover:text-base-content transition-colors">
                    <span class="text-lg sm:text-xl">☰</span>
                    <span class="text-[11px] sm:text-xs">Menu</span>
                </button>
            </div>
        </div>
    </nav>

    <!-- Main Container: 3 Columns on Desktop, 1 Column on Mobile -->
    <div class="max-w-6xl mx-auto px-2 sm:px-4 py-4">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-5 items-start">

            <!-- ================= LEFT SIDEBAR (Desktop) ================= -->
            <aside class="hidden lg:block lg:col-span-3 space-y-3 sticky top-32">
                <!-- User Profile Preview Card -->
                <div class="card bg-base-100 border border-base-300 p-3 shadow-2xs rounded-lg">
                    <div class="flex items-center gap-3">
                        <div class="size-11 rounded-full ring-1 ring-base-300 overflow-hidden bg-base-200 shrink-0">
                            @auth
                                <img src="https://avatars.laravel.cloud/{{ urlencode(auth()->user()->email) }}" class="size-full object-cover" />
                            @else
                                <div class="size-full flex items-center justify-center text-xl bg-blue-50 text-blue-600">👤</div>
                            @endauth
                        </div>
                        <div class="min-w-0 flex-1">
                            @auth
                                <p class="font-bold text-sm text-base-content truncate">{{ auth()->user()->name }}</p>
                                <span class="text-xs text-blue-600 hover:underline cursor-pointer" onclick="switchDashboardTab('definicoes')">
                                    Ver definições de conta
                                </span>
                            @else
                                <p class="font-bold text-sm text-base-content">Visitante</p>
                                <a href="/login" class="text-xs text-blue-600 hover:underline">Iniciar sessão</a>
                            @endauth
                        </div>
                    </div>
                </div>

                <!-- Navigation Shortcuts List -->
                <div class="card bg-base-100 border border-base-300 shadow-2xs rounded-lg p-2 text-xs font-semibold">
                    <nav class="space-y-1">
                        <button type="button" onclick="switchDashboardTab('feed')" class="flex items-center gap-3 w-full px-3 py-2 rounded-lg hover:bg-base-200 transition text-left text-base-content">
                            <span class="text-base text-blue-600">📰</span>
                            <span>Feed de Notícias</span>
                        </button>
                        <button type="button" onclick="switchDashboardTab('amigos')" class="flex items-center justify-between w-full px-3 py-2 rounded-lg hover:bg-base-200 transition text-left text-base-content">
                            <div class="flex items-center gap-3">
                                <span class="text-base text-cyan-600">👥</span>
                                <span>Amigos</span>
                            </div>
                            <span class="badge badge-error badge-xs text-white">3</span>
                        </button>
                        <button type="button" onclick="switchDashboardTab('mensagens')" class="flex items-center justify-between w-full px-3 py-2 rounded-lg hover:bg-base-200 transition text-left text-base-content">
                            <div class="flex items-center gap-3">
                                <span class="text-base text-blue-500">💬</span>
                                <span>Mensagens</span>
                            </div>
                            <span class="badge badge-primary badge-xs bg-blue-600 border-none text-white">2</span>
                        </button>
                        <button type="button" onclick="switchDashboardTab('definicoes')" class="flex items-center gap-3 w-full px-3 py-2 rounded-lg hover:bg-base-200 transition text-left text-base-content">
                            <span class="text-base text-neutral-500">⚙️</span>
                            <span>Definições</span>
                        </button>
                        <button type="button" onclick="showChirperToast('Item guardado com sucesso!', 'info')" class="flex items-center gap-3 w-full px-3 py-2 rounded-lg hover:bg-base-200 transition text-left text-base-content/80">
                            <span class="text-base text-purple-500">🔖</span>
                            <span>Guardados</span>
                        </button>
                        <button type="button" onclick="showChirperToast('Sem lembranças hoje!', 'info')" class="flex items-center gap-3 w-full px-3 py-2 rounded-lg hover:bg-base-200 transition text-left text-base-content/80">
                            <span class="text-base text-amber-500">⏰</span>
                            <span>Lembranças</span>
                        </button>
                    </nav>
                </div>

                <!-- Privacy & Terms Footer -->
                <div class="text-[11px] text-base-content/50 px-2 space-y-1">
                    <p>Privacidade · Termos · Cookies · Publicidade</p>
                    <p>© {{ date('Y') }} Chirper Lite da Meta / Laravel</p>
                </div>
            </aside>

            <!-- ================= CENTER CONTENT (Tabs) ================= -->
            <main class="col-span-1 lg:col-span-6 space-y-4">

                <!-- ================= TAB 1: FEED ================= -->
                <div id="view-feed" class="dashboard-tab-view space-y-4">
                    <!-- Stories Bar (Facebook Lite) -->
                    <div class="card bg-base-100 border border-base-300 p-3 shadow-2xs rounded-lg overflow-x-auto">
                        <div class="flex items-center gap-2.5 min-w-max pb-1">
                            <!-- Create Story Card -->
                            <div class="w-24 sm:w-28 h-36 sm:h-40 rounded-lg border border-base-300 bg-base-200 flex flex-col items-center justify-between overflow-hidden cursor-pointer hover:opacity-95 transition relative shadow-2xs group"
                                 onclick="showChirperToast('📸 Funcionalidade de criar história em breve!', 'info')">
                                <div class="h-24 w-full bg-base-300 overflow-hidden">
                                    @auth
                                        <img src="https://avatars.laravel.cloud/{{ urlencode(auth()->user()->email) }}" class="size-full object-cover group-hover:scale-105 transition duration-300" />
                                    @else
                                        <div class="size-full flex items-center justify-center text-3xl">👤</div>
                                    @endauth
                                </div>
                                <div class="absolute top-[80px] size-7 rounded-full bg-blue-600 text-white flex items-center justify-center font-bold text-lg ring-2 ring-base-100 shadow">
                                    +
                                </div>
                                <div class="p-1 pb-2 text-[10px] sm:text-xs font-bold text-center text-base-content">
                                    Criar história
                                </div>
                            </div>

                            <!-- Friend Story 1 -->
                            <div class="w-24 sm:w-28 h-36 sm:h-40 rounded-lg overflow-hidden relative cursor-pointer hover:opacity-95 transition shadow-2xs flex flex-col justify-between p-2 bg-gradient-to-t from-black/80 via-black/20 to-transparent"
                                 style="background-image: url('https://images.unsplash.com/photo-1534528741775-53994a69daeb?w=300&auto=format&fit=crop&q=60'); background-size: cover; background-position: center;"
                                 onclick="showChirperToast('Visualizando história de Mariana...', 'info')">
                                <div class="size-7 rounded-full ring-2 ring-blue-500 overflow-hidden bg-base-100">
                                    <div class="size-full bg-blue-600 text-white font-bold text-[10px] flex items-center justify-center">MS</div>
                                </div>
                                <span class="text-white text-[11px] font-semibold drop-shadow-md">Mariana</span>
                            </div>

                            <!-- Friend Story 2 -->
                            <div class="w-24 sm:w-28 h-36 sm:h-40 rounded-lg overflow-hidden relative cursor-pointer hover:opacity-95 transition shadow-2xs flex flex-col justify-between p-2 bg-gradient-to-t from-black/80 via-black/20 to-transparent"
                                 style="background-image: url('https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=300&auto=format&fit=crop&q=60'); background-size: cover; background-position: center;"
                                 onclick="showChirperToast('Visualizando história de Pedro...', 'info')">
                                <div class="size-7 rounded-full ring-2 ring-blue-500 overflow-hidden bg-base-100">
                                    <div class="size-full bg-emerald-600 text-white font-bold text-[10px] flex items-center justify-center">PF</div>
                                </div>
                                <span class="text-white text-[11px] font-semibold drop-shadow-md">Pedro F.</span>
                            </div>

                            <!-- Friend Story 3 -->
                            <div class="w-24 sm:w-28 h-36 sm:h-40 rounded-lg overflow-hidden relative cursor-pointer hover:opacity-95 transition shadow-2xs flex flex-col justify-between p-2 bg-gradient-to-t from-black/80 via-black/20 to-transparent"
                                 style="background-image: url('https://images.unsplash.com/photo-1494790108377-be9c29b29330?w=300&auto=format&fit=crop&q=60'); background-size: cover; background-position: center;"
                                 onclick="showChirperToast('Visualizando história de Beatriz...', 'info')">
                                <div class="size-7 rounded-full ring-2 ring-blue-500 overflow-hidden bg-base-100">
                                    <div class="size-full bg-rose-500 text-white font-bold text-[10px] flex items-center justify-center">BC</div>
                                </div>
                                <span class="text-white text-[11px] font-semibold drop-shadow-md">Beatriz</span>
                            </div>

                            <!-- Friend Story 4 -->
                            <div class="w-24 sm:w-28 h-36 sm:h-40 rounded-lg overflow-hidden relative cursor-pointer hover:opacity-95 transition shadow-2xs flex flex-col justify-between p-2 bg-gradient-to-t from-black/80 via-black/20 to-transparent"
                                 style="background-image: url('https://images.unsplash.com/photo-1500648767791-00dcc994a43e?w=300&auto=format&fit=crop&q=60'); background-size: cover; background-position: center;"
                                 onclick="showChirperToast('Visualizando história de Carlos...', 'info')">
                                <div class="size-7 rounded-full ring-2 ring-blue-500 overflow-hidden bg-base-100">
                                    <div class="size-full bg-purple-600 text-white font-bold text-[10px] flex items-center justify-center">CR</div>
                                </div>
                                <span class="text-white text-[11px] font-semibold drop-shadow-md">Carlos R.</span>
                            </div>
                        </div>
                    </div>

                    <!-- Create Post Box ("No que estás a pensar?") -->
                    <div class="card bg-base-100 border border-base-300 shadow-sm rounded-lg p-3 sm:p-4">
                        <div class="flex items-center gap-3">
                            <div class="size-10 rounded-full ring-1 ring-base-300 overflow-hidden bg-base-200 shrink-0">
                                @auth
                                    <img src="https://avatars.laravel.cloud/{{ urlencode(auth()->user()->email) }}" class="size-full object-cover" />
                                @else
                                    <div class="size-full flex items-center justify-center text-lg">🐦</div>
                                @endauth
                            </div>

                            <button type="button"
                                    onclick="openCreatePostModal()"
                                    class="flex-1 bg-base-200/80 hover:bg-base-200 text-left px-4 py-2.5 rounded-full text-xs sm:text-sm text-base-content/60 transition border border-base-300">
                                @auth
                                    No que estás a pensar, {{ auth()->user()->name }}?
                                @else
                                    No que estás a pensar? (Inicia sessão para publicar)
                                @endauth
                            </button>
                        </div>

                        <div class="divider my-2"></div>

                        <!-- 3 Facebook Lite Post Actions -->
                        <div class="grid grid-cols-3 gap-1 text-xs text-base-content/70">
                            <button type="button" onclick="openCreatePostModal()" class="btn btn-ghost btn-sm h-8 flex items-center justify-center gap-1.5 hover:bg-base-200">
                                <span class="text-rose-500 text-sm">📹</span>
                                <span class="hidden sm:inline">Vídeo direto</span>
                                <span class="sm:hidden">Direto</span>
                            </button>
                            <button type="button" onclick="openCreatePostModal()" class="btn btn-ghost btn-sm h-8 flex items-center justify-center gap-1.5 hover:bg-base-200">
                                <span class="text-emerald-500 text-sm">🖼️</span>
                                <span>Foto/vídeo</span>
                            </button>
                            <button type="button" onclick="openCreatePostModal()" class="btn btn-ghost btn-sm h-8 flex items-center justify-center gap-1.5 hover:bg-base-200">
                                <span class="text-amber-500 text-sm">😊</span>
                                <span class="hidden sm:inline">Sentimento</span>
                                <span class="sm:hidden">Humor</span>
                            </button>
                        </div>
                    </div>

                    <!-- Feed Header -->
                    <div class="flex items-center justify-between px-1 text-xs font-bold text-base-content/70">
                        <span>Publicações recentes</span>
                        <div class="flex items-center gap-2">
                            <span class="text-blue-600 cursor-pointer hover:underline">Principais</span>
                            <span>·</span>
                            <span class="cursor-pointer hover:underline">Recentes</span>
                        </div>
                    </div>

                    <!-- Chirps Transformed into Facebook Posts -->
                    <div class="space-y-4">
                        @forelse ($chirps as $chirp)
                            <x-chirp :chirp="$chirp" />
                        @empty
                            <div class="card bg-base-100 border border-base-300 p-8 text-center rounded-lg shadow-sm">
                                <div class="text-4xl mb-2">🐦</div>
                                <h3 class="font-bold text-base">Ainda não há publicações no feed</h3>
                                <p class="text-xs text-base-content/60 mt-1 max-w-sm mx-auto">
                                    Sê o primeiro a partilhar algo no Chirper Lite com os teus amigos!
                                </p>
                                <div class="mt-4">
                                    <button type="button" onclick="openCreatePostModal()" class="btn btn-primary btn-sm bg-blue-600 border-none text-white hover:bg-blue-700">
                                        Criar primeira publicação
                                    </button>
                                </div>
                            </div>
                        @endforelse
                    </div>
                </div>

                <!-- ================= TAB 2: AMIGOS ================= -->
                <div id="view-amigos" class="dashboard-tab-view hidden space-y-4">
                    <div class="card bg-base-100 border border-base-300 p-4 shadow-sm rounded-lg">
                        <div class="flex items-center justify-between mb-4 pb-2 border-b border-base-200">
                            <div>
                                <h2 class="font-extrabold text-lg text-base-content">Amigos</h2>
                                <p class="text-xs text-base-content/60">Gere pedidos e descobre novas pessoas</p>
                            </div>
                            <div class="flex gap-1">
                                <button type="button" class="btn btn-xs btn-primary bg-blue-600 border-none text-white">Todos</button>
                                <button type="button" class="btn btn-xs btn-ghost">Sugestões</button>
                            </div>
                        </div>

                        <!-- Pedidos de Amizade (Friend Requests) -->
                        <div class="mb-6">
                            <div class="flex items-center justify-between mb-3">
                                <span class="font-bold text-sm text-base-content flex items-center gap-1.5">
                                    <span>Pedidos de amizade</span>
                                    <span class="badge badge-error badge-xs text-white" id="requests-badge">3</span>
                                </span>
                                <span class="text-blue-600 text-xs font-semibold cursor-pointer hover:underline">Ver todos</span>
                            </div>

                            <div class="space-y-3" id="friend-requests-list">
                                <!-- Request 1 -->
                                <div class="flex items-center justify-between p-3 bg-base-200/50 border border-base-300 rounded-lg gap-3" id="request-mariana">
                                    <div class="flex items-center gap-3">
                                        <div class="size-12 rounded-full bg-blue-600 text-white font-bold flex items-center justify-center text-sm shrink-0">
                                            MS
                                        </div>
                                        <div>
                                            <p class="font-bold text-sm text-base-content">Mariana Santos</p>
                                            <p class="text-xs text-base-content/60">4 amigos em comum</p>
                                        </div>
                                    </div>
                                    <div class="flex items-center gap-2">
                                        <button type="button" onclick="acceptFriend('mariana')" class="btn btn-primary btn-xs sm:btn-sm bg-blue-600 border-none text-white hover:bg-blue-700">Confirmar</button>
                                        <button type="button" onclick="deleteFriend('mariana')" class="btn btn-ghost btn-xs sm:btn-sm bg-base-300 hover:bg-base-400">Eliminar</button>
                                    </div>
                                </div>

                                <!-- Request 2 -->
                                <div class="flex items-center justify-between p-3 bg-base-200/50 border border-base-300 rounded-lg gap-3" id="request-pedro">
                                    <div class="flex items-center gap-3">
                                        <div class="size-12 rounded-full bg-emerald-600 text-white font-bold flex items-center justify-center text-sm shrink-0">
                                            PF
                                        </div>
                                        <div>
                                            <p class="font-bold text-sm text-base-content">Pedro Ferreira</p>
                                            <p class="text-xs text-base-content/60">8 amigos em comum</p>
                                        </div>
                                    </div>
                                    <div class="flex items-center gap-2">
                                        <button type="button" onclick="acceptFriend('pedro')" class="btn btn-primary btn-xs sm:btn-sm bg-blue-600 border-none text-white hover:bg-blue-700">Confirmar</button>
                                        <button type="button" onclick="deleteFriend('pedro')" class="btn btn-ghost btn-xs sm:btn-sm bg-base-300 hover:bg-base-400">Eliminar</button>
                                    </div>
                                </div>

                                <!-- Request 3 -->
                                <div class="flex items-center justify-between p-3 bg-base-200/50 border border-base-300 rounded-lg gap-3" id="request-beatriz">
                                    <div class="flex items-center gap-3">
                                        <div class="size-12 rounded-full bg-rose-500 text-white font-bold flex items-center justify-center text-sm shrink-0">
                                            BC
                                        </div>
                                        <div>
                                            <p class="font-bold text-sm text-base-content">Beatriz Costa</p>
                                            <p class="text-xs text-base-content/60">1 amigo em comum</p>
                                        </div>
                                    </div>
                                    <div class="flex items-center gap-2">
                                        <button type="button" onclick="acceptFriend('beatriz')" class="btn btn-primary btn-xs sm:btn-sm bg-blue-600 border-none text-white hover:bg-blue-700">Confirmar</button>
                                        <button type="button" onclick="deleteFriend('beatriz')" class="btn btn-ghost btn-xs sm:btn-sm bg-base-300 hover:bg-base-400">Eliminar</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Sugestões de Amizade (Suggestions) -->
                        <div>
                            <span class="font-bold text-sm text-base-content mb-3 block">Pessoas que talvez conheças</span>
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                                <div class="p-3 bg-base-200/40 border border-base-300 rounded-lg flex items-center gap-3">
                                    <div class="size-11 rounded-full bg-purple-600 text-white font-bold flex items-center justify-center text-xs shrink-0">LM</div>
                                    <div class="min-w-0 flex-1">
                                        <p class="font-bold text-xs truncate">Lucas Mendes</p>
                                        <p class="text-[11px] text-base-content/60 truncate">2 amigos em comum</p>
                                        <button type="button" onclick="this.textContent = 'Pedido enviado ✓'; this.classList.add('bg-emerald-600'); showChirperToast('Pedido enviado para Lucas!', 'success')" class="btn btn-xs btn-primary bg-blue-600 border-none text-white mt-1 w-full">Adicionar</button>
                                    </div>
                                </div>

                                <div class="p-3 bg-base-200/40 border border-base-300 rounded-lg flex items-center gap-3">
                                    <div class="size-11 rounded-full bg-amber-600 text-white font-bold flex items-center justify-center text-xs shrink-0">SA</div>
                                    <div class="min-w-0 flex-1">
                                        <p class="font-bold text-xs truncate">Sofia Alves</p>
                                        <p class="text-[11px] text-base-content/60 truncate">6 amigos em comum</p>
                                        <button type="button" onclick="this.textContent = 'Pedido enviado ✓'; this.classList.add('bg-emerald-600'); showChirperToast('Pedido enviado para Sofia!', 'success')" class="btn btn-xs btn-primary bg-blue-600 border-none text-white mt-1 w-full">Adicionar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- ================= TAB 3: MENSAGENS ================= -->
                <div id="view-mensagens" class="dashboard-tab-view hidden space-y-4">
                    <div class="card bg-base-100 border border-base-300 shadow-sm rounded-lg overflow-hidden">
                        <!-- Messages Header -->
                        <div class="p-3.5 border-b border-base-200 flex items-center justify-between bg-base-100">
                            <div class="flex items-center gap-2">
                                <span class="text-xl">💬</span>
                                <h2 class="font-extrabold text-base text-base-content">Mensagens (Messenger Lite)</h2>
                            </div>
                            <span class="badge badge-primary badge-sm bg-blue-600 border-none text-white font-bold">2 novas</span>
                        </div>

                        <!-- Messenger Grid: Contact List + Active Chat Window -->
                        <div class="grid grid-cols-1 md:grid-cols-12 min-h-[420px]">
                            <!-- Conversations List (Left/Mobile) -->
                            <div class="md:col-span-5 border-r border-base-300 p-2 space-y-1 bg-base-100">
                                <div class="px-2 py-1">
                                    <input type="text" placeholder="🔍 Pesquisar conversas..." class="input input-xs w-full bg-base-200 rounded-full pl-3" />
                                </div>

                                <!-- Contact 1 -->
                                <div onclick="openConversation('Mariana Santos', 'MS', 'Olá! Viste a nova publicação no Chirper?')"
                                     class="flex items-center gap-2.5 p-2 rounded-lg bg-blue-50/60 dark:bg-base-200 hover:bg-base-200 cursor-pointer transition">
                                    <div class="relative">
                                        <div class="size-9 rounded-full bg-blue-600 text-white font-bold flex items-center justify-center text-xs">MS</div>
                                        <span class="absolute bottom-0 right-0 size-2.5 rounded-full bg-emerald-500 ring-1 ring-base-100"></span>
                                    </div>
                                    <div class="min-w-0 flex-1">
                                        <div class="flex items-center justify-between">
                                            <span class="font-bold text-xs text-base-content truncate">Mariana Santos</span>
                                            <span class="text-[10px] text-blue-600 font-semibold">12m</span>
                                        </div>
                                        <p class="text-[11px] text-base-content/80 truncate font-semibold">Olá! Viste a nova publicação no Chirper?</p>
                                    </div>
                                </div>

                                <!-- Contact 2 -->
                                <div onclick="openConversation('Pedro Ferreira', 'PF', 'O novo visual estilo Facebook Lite ficou genial!')"
                                     class="flex items-center gap-2.5 p-2 rounded-lg hover:bg-base-200 cursor-pointer transition">
                                    <div class="relative">
                                        <div class="size-9 rounded-full bg-emerald-600 text-white font-bold flex items-center justify-center text-xs">PF</div>
                                        <span class="absolute bottom-0 right-0 size-2.5 rounded-full bg-emerald-500 ring-1 ring-base-100"></span>
                                    </div>
                                    <div class="min-w-0 flex-1">
                                        <div class="flex items-center justify-between">
                                            <span class="font-bold text-xs text-base-content truncate">Pedro Ferreira</span>
                                            <span class="text-[10px] text-base-content/50">1h</span>
                                        </div>
                                        <p class="text-[11px] text-base-content/60 truncate">O novo visual estilo Facebook Lite ficou genial!</p>
                                    </div>
                                </div>

                                <!-- Contact 3 -->
                                <div onclick="openConversation('Beatriz Costa', 'BC', 'Depois combinamos um café para falar do projeto!')"
                                     class="flex items-center gap-2.5 p-2 rounded-lg hover:bg-base-200 cursor-pointer transition">
                                    <div class="relative">
                                        <div class="size-9 rounded-full bg-rose-500 text-white font-bold flex items-center justify-center text-xs">BC</div>
                                    </div>
                                    <div class="min-w-0 flex-1">
                                        <div class="flex items-center justify-between">
                                            <span class="font-bold text-xs text-base-content truncate">Beatriz Costa</span>
                                            <span class="text-[10px] text-base-content/50">Ontem</span>
                                        </div>
                                        <p class="text-[11px] text-base-content/60 truncate">Depois combinamos um café para falar...</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Active Chat Box (Right/Mobile Full) -->
                            <div class="md:col-span-7 flex flex-col justify-between bg-base-200/30">
                                <!-- Chat Top Bar -->
                                <div class="p-2.5 border-b border-base-300 bg-base-100 flex items-center justify-between">
                                    <div class="flex items-center gap-2">
                                        <div class="size-8 rounded-full bg-blue-600 text-white font-bold flex items-center justify-center text-xs" id="chat-active-avatar">
                                            MS
                                        </div>
                                        <div>
                                            <p class="font-bold text-xs" id="chat-active-name">Mariana Santos</p>
                                            <p class="text-[10px] text-emerald-600 font-medium">● Ativa agora</p>
                                        </div>
                                    </div>
                                    <div class="flex items-center gap-1 text-base-content/60">
                                        <button type="button" class="btn btn-ghost btn-circle btn-xs" title="Chamada">📞</button>
                                        <button type="button" class="btn btn-ghost btn-circle btn-xs" title="Vídeo">📹</button>
                                    </div>
                                </div>

                                <!-- Message History -->
                                <div class="p-3 space-y-2 overflow-y-auto max-h-64 text-xs" id="chat-messages-container">
                                    <div class="flex justify-start">
                                        <div class="bg-base-100 border border-base-300 rounded-2xl px-3 py-2 max-w-[80%] text-base-content shadow-2xs">
                                            Olá! Já viste como os chirps agora parecem publicações do Facebook?
                                        </div>
                                    </div>
                                    <div class="flex justify-start">
                                        <div class="bg-base-100 border border-base-300 rounded-2xl px-3 py-2 max-w-[80%] text-base-content shadow-2xs">
                                            E o menu com amigos, mensagens e definições ficou idêntico ao Facebook Lite!
                                        </div>
                                    </div>
                                    <div class="flex justify-end">
                                        <div class="bg-blue-600 text-white rounded-2xl px-3 py-2 max-w-[80%] shadow-2xs font-medium">
                                            Sim! Ficou espetacular e super responsivo 🚀
                                        </div>
                                    </div>
                                </div>

                                <!-- Send Message Form -->
                                <form onsubmit="handleSendDirectMessage(event)" class="p-2 bg-base-100 border-t border-base-300 flex items-center gap-2">
                                    <input type="text"
                                           id="chat-input"
                                           placeholder="Escreve uma mensagem..."
                                           class="input input-sm flex-1 bg-base-200 border-none rounded-full text-xs focus:ring-1 focus:ring-blue-500"
                                           required />
                                    <button type="submit" class="btn btn-primary btn-sm btn-circle bg-blue-600 border-none text-white hover:bg-blue-700" title="Enviar">
                                        ➤
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- ================= TAB 4: DEFINIÇÕES ================= -->
                <div id="view-definicoes" class="dashboard-tab-view hidden space-y-4">
                    <div class="card bg-base-100 border border-base-300 shadow-sm rounded-lg p-4 sm:p-6 space-y-6">
                        <div>
                            <h2 class="font-extrabold text-lg text-base-content">Definições da Conta</h2>
                            <p class="text-xs text-base-content/60">Gere as tuas preferências, privacidade e informações pessoais</p>
                        </div>

                        <!-- Section: Informações Pessoais -->
                        <div class="space-y-3 pb-4 border-b border-base-200">
                            <h3 class="font-bold text-xs uppercase tracking-wider text-base-content/70">Conta & Perfil</h3>
                            @auth
                                <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 text-xs">
                                    <div class="p-3 bg-base-200/50 rounded-lg border border-base-300">
                                        <span class="text-base-content/60 block">Nome de Utilizador</span>
                                        <span class="font-bold text-sm text-base-content">{{ auth()->user()->name }}</span>
                                    </div>
                                    <div class="p-3 bg-base-200/50 rounded-lg border border-base-300">
                                        <span class="text-base-content/60 block">Email de Acesso</span>
                                        <span class="font-bold text-sm text-base-content truncate">{{ auth()->user()->email }}</span>
                                    </div>
                                </div>
                            @else
                                <div class="alert alert-warning text-xs">
                                    <span>Inicia sessão para editar as tuas informações de perfil.</span>
                                </div>
                            @endauth
                        </div>

                        <!-- Section: Preferências de Aparência & Notificações -->
                        <div class="space-y-3 pb-4 border-b border-base-200">
                            <h3 class="font-bold text-xs uppercase tracking-wider text-base-content/70">Preferências do Sistema</h3>
                            
                            <!-- Toggle Tema Claro / Escuro -->
                            <div class="flex items-center justify-between p-3 bg-base-200/40 rounded-lg border border-base-300">
                                <div>
                                    <p class="font-bold text-xs text-base-content">Tema Escuro / Modo Noite</p>
                                    <p class="text-[11px] text-base-content/60">Alternar tema visual do Chirper Lite</p>
                                </div>
                                <input type="checkbox" id="theme-toggle" onchange="toggleAppTheme(this)" class="toggle toggle-primary toggle-sm" />
                            </div>

                            <!-- Notificações -->
                            <div class="flex items-center justify-between p-3 bg-base-200/40 rounded-lg border border-base-300">
                                <div>
                                    <p class="font-bold text-xs text-base-content">Notificações de Reações e Amigos</p>
                                    <p class="text-[11px] text-base-content/60">Receber alertas quando alguém reage aos teus chirps</p>
                                </div>
                                <input type="checkbox" checked class="toggle toggle-success toggle-sm" />
                            </div>

                            <!-- Idioma -->
                            <div class="flex items-center justify-between p-3 bg-base-200/40 rounded-lg border border-base-300">
                                <div>
                                    <p class="font-bold text-xs text-base-content">Idioma</p>
                                    <p class="text-[11px] text-base-content/60">Português (Portugal)</p>
                                </div>
                                <button type="button" class="btn btn-ghost btn-xs text-blue-600">Alterar</button>
                            </div>
                        </div>

                        <!-- Section: Terminar Sessão -->
                        <div class="pt-2">
                            @auth
                                <form method="POST" action="/logout">
                                    @csrf
                                    <button type="submit" class="btn btn-error btn-outline btn-sm w-full font-bold flex items-center justify-center gap-2">
                                        <span>🚪</span>
                                        <span>Terminar Sessão</span>
                                    </button>
                                </form>
                            @else
                                <a href="/login" class="btn btn-primary btn-sm w-full bg-blue-600 border-none text-white hover:bg-blue-700">
                                    Iniciar Sessão agora
                                </a>
                            @endauth
                        </div>
                    </div>
                </div>

                <!-- ================= TAB 5: MENU ================= -->
                <div id="view-menu" class="dashboard-tab-view hidden space-y-4">
                    <div class="card bg-base-100 border border-base-300 shadow-sm rounded-lg p-4 space-y-4">
                        <div class="flex items-center gap-3 p-3 bg-base-200 rounded-lg border border-base-300">
                            <div class="size-12 rounded-full overflow-hidden bg-base-300 shrink-0">
                                @auth
                                    <img src="https://avatars.laravel.cloud/{{ urlencode(auth()->user()->email) }}" class="size-full object-cover" />
                                @else
                                    <div class="size-full flex items-center justify-center text-xl">👤</div>
                                @endauth
                            </div>
                            <div>
                                <h3 class="font-bold text-sm">
                                    {{ auth()->check() ? auth()->user()->name : 'Visitante' }}
                                </h3>
                                <p class="text-xs text-base-content/60">Ver o teu perfil no Chirper Lite</p>
                            </div>
                        </div>

                        <div class="divider my-1"></div>

                        <!-- Menu Shortcuts Grid -->
                        <div class="grid grid-cols-2 gap-2 text-xs font-semibold">
                            <button type="button" onclick="switchDashboardTab('feed')" class="flex items-center gap-2.5 p-3 rounded-lg bg-base-200/60 hover:bg-base-200 border border-base-300 text-left transition">
                                <span class="text-xl">🏠</span>
                                <div>
                                    <p class="font-bold">Início</p>
                                    <span class="text-[10px] text-base-content/60 font-normal">Feed principal</span>
                                </div>
                            </button>

                            <button type="button" onclick="switchDashboardTab('amigos')" class="flex items-center gap-2.5 p-3 rounded-lg bg-base-200/60 hover:bg-base-200 border border-base-300 text-left transition">
                                <span class="text-xl">👥</span>
                                <div>
                                    <p class="font-bold">Amigos</p>
                                    <span class="text-[10px] text-base-content/60 font-normal">3 pedidos</span>
                                </div>
                            </button>

                            <button type="button" onclick="switchDashboardTab('mensagens')" class="flex items-center gap-2.5 p-3 rounded-lg bg-base-200/60 hover:bg-base-200 border border-base-300 text-left transition">
                                <span class="text-xl">💬</span>
                                <div>
                                    <p class="font-bold">Mensagens</p>
                                    <span class="text-[10px] text-base-content/60 font-normal">2 conversas</span>
                                </div>
                            </button>

                            <button type="button" onclick="switchDashboardTab('definicoes')" class="flex items-center gap-2.5 p-3 rounded-lg bg-base-200/60 hover:bg-base-200 border border-base-300 text-left transition">
                                <span class="text-xl">⚙️</span>
                                <div>
                                    <p class="font-bold">Definições</p>
                                    <span class="text-[10px] text-base-content/60 font-normal">Conta & Privacidade</span>
                                </div>
                            </button>

                            <button type="button" onclick="showChirperToast('Item guardado aberto!', 'info')" class="flex items-center gap-2.5 p-3 rounded-lg bg-base-200/60 hover:bg-base-200 border border-base-300 text-left transition">
                                <span class="text-xl">🔖</span>
                                <div>
                                    <p class="font-bold">Guardados</p>
                                    <span class="text-[10px] text-base-content/60 font-normal">Publicações salvas</span>
                                </div>
                            </button>

                            <button type="button" onclick="showChirperToast('Marketplace em breve no Chirper!', 'info')" class="flex items-center gap-2.5 p-3 rounded-lg bg-base-200/60 hover:bg-base-200 border border-base-300 text-left transition">
                                <span class="text-xl">🏪</span>
                                <div>
                                    <p class="font-bold">Marketplace</p>
                                    <span class="text-[10px] text-base-content/60 font-normal">Comprar e vender</span>
                                </div>
                            </button>
                        </div>
                    </div>
                </div>

            </main>

            <!-- ================= RIGHT SIDEBAR (Desktop) ================= -->
            <aside class="hidden lg:block lg:col-span-3 space-y-4 sticky top-32">
                <!-- Sponsor / Destaque Card (FB Lite style) -->
                <div class="card bg-base-100 border border-base-300 p-3 shadow-2xs rounded-lg">
                    <span class="text-[11px] font-bold text-base-content/50 uppercase tracking-wider block mb-2">Patrocinado</span>
                    <a href="https://laravel.com" target="_blank" class="flex items-center gap-3 group">
                        <div class="size-14 rounded-lg bg-rose-50 border border-rose-200 flex items-center justify-center text-rose-500 font-extrabold text-lg shrink-0">
                            LV
                        </div>
                        <div class="min-w-0">
                            <p class="font-bold text-xs text-base-content group-hover:text-blue-600 transition truncate">Laravel Framework 12</p>
                            <p class="text-[11px] text-base-content/60 leading-tight">O framework web PHP para artesãos modernos.</p>
                        </div>
                    </a>
                </div>

                <!-- Contatos / Amigos Online (Facebook Lite style) -->
                <div class="card bg-base-100 border border-base-300 p-3 shadow-2xs rounded-lg">
                    <div class="flex items-center justify-between mb-2 pb-1 border-b border-base-200">
                        <span class="font-bold text-xs text-base-content/80">Amigos Online (Contatos)</span>
                        <span class="size-2 rounded-full bg-emerald-500"></span>
                    </div>

                    <div class="space-y-1 text-xs">
                        <div onclick="switchDashboardTab('mensagens'); openConversation('Mariana Santos', 'MS', 'Olá! Viste a nova publicação no Chirper?');"
                             class="flex items-center gap-2.5 p-1.5 rounded-lg hover:bg-base-200 cursor-pointer transition">
                            <div class="relative">
                                <div class="size-8 rounded-full bg-blue-600 text-white font-bold flex items-center justify-center text-xs">MS</div>
                                <span class="absolute bottom-0 right-0 size-2.5 rounded-full bg-emerald-500 ring-2 ring-base-100"></span>
                            </div>
                            <span class="font-semibold text-base-content truncate">Mariana Santos</span>
                        </div>

                        <div onclick="switchDashboardTab('mensagens'); openConversation('Pedro Ferreira', 'PF', 'O novo visual estilo Facebook Lite ficou genial!');"
                             class="flex items-center gap-2.5 p-1.5 rounded-lg hover:bg-base-200 cursor-pointer transition">
                            <div class="relative">
                                <div class="size-8 rounded-full bg-emerald-600 text-white font-bold flex items-center justify-center text-xs">PF</div>
                                <span class="absolute bottom-0 right-0 size-2.5 rounded-full bg-emerald-500 ring-2 ring-base-100"></span>
                            </div>
                            <span class="font-semibold text-base-content truncate">Pedro Ferreira</span>
                        </div>

                        <div onclick="switchDashboardTab('mensagens'); openConversation('Carlos Rocha', 'CR', 'Top demais!');"
                             class="flex items-center gap-2.5 p-1.5 rounded-lg hover:bg-base-200 cursor-pointer transition">
                            <div class="relative">
                                <div class="size-8 rounded-full bg-purple-600 text-white font-bold flex items-center justify-center text-xs">CR</div>
                                <span class="absolute bottom-0 right-0 size-2.5 rounded-full bg-emerald-500 ring-2 ring-base-100"></span>
                            </div>
                            <span class="font-semibold text-base-content truncate">Carlos Rocha</span>
                        </div>

                        <div onclick="switchDashboardTab('mensagens'); openConversation('Sofia Alves', 'SA', 'Olá!');"
                             class="flex items-center gap-2.5 p-1.5 rounded-lg hover:bg-base-200 cursor-pointer transition">
                            <div class="relative">
                                <div class="size-8 rounded-full bg-amber-600 text-white font-bold flex items-center justify-center text-xs">SA</div>
                                <span class="absolute bottom-0 right-0 size-2.5 rounded-full bg-emerald-500 ring-2 ring-base-100"></span>
                            </div>
                            <span class="font-semibold text-base-content truncate">Sofia Alves</span>
                        </div>
                    </div>
                </div>
            </aside>

        </div>
    </div>

    <!-- ================= MODAL DE CRIAÇÃO DE PUBLICAÇÃO (Estilo Facebook) ================= -->
    <dialog id="publish-modal" class="modal modal-bottom sm:modal-middle">
        <div class="modal-box bg-base-100 border border-base-300 p-0 overflow-hidden max-w-lg">
            <!-- Modal Header -->
            <div class="p-4 border-b border-base-200 flex items-center justify-between">
                <h3 class="font-bold text-base text-center flex-1">Criar publicação</h3>
                <form method="dialog">
                    <button class="btn btn-ghost btn-circle btn-sm">✕</button>
                </form>
            </div>

            <!-- Modal Body: Form to POST /chirps -->
            <form method="POST" action="/chirps" class="p-4 space-y-4">
                @csrf
                <div class="flex items-center gap-3">
                    <div class="size-10 rounded-full bg-base-200 ring-1 ring-base-300 overflow-hidden shrink-0">
                        @auth
                            <img src="https://avatars.laravel.cloud/{{ urlencode(auth()->user()->email) }}" class="size-full object-cover" />
                        @else
                            <div class="size-full flex items-center justify-center">👤</div>
                        @endauth
                    </div>
                    <div>
                        <span class="font-bold text-sm block">
                            {{ auth()->check() ? auth()->user()->name : 'Visitante (Inicia sessão para publicar)' }}
                        </span>
                        <span class="badge badge-neutral badge-xs gap-1 font-normal text-[10px]">
                            🌐 Público ▼
                        </span>
                    </div>
                </div>

                <div class="form-control">
                    <textarea name="message"
                              id="modal-message-input"
                              rows="4"
                              placeholder="No que estás a pensar?"
                              class="textarea textarea-ghost w-full text-base sm:text-lg focus:outline-hidden p-0 resize-none @error('message') textarea-error @enderror"
                              maxlength="255"
                              required>{{ old('message') }}</textarea>
                    @error('message')
                        <span class="text-error text-xs mt-1">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Add to post attachments box -->
                <div class="p-3 border border-base-300 rounded-lg flex items-center justify-between text-xs">
                    <span class="font-semibold text-base-content/80">Adicionar à tua publicação</span>
                    <div class="flex items-center gap-1.5 text-lg">
                        <button type="button" class="btn btn-ghost btn-circle btn-xs text-emerald-500" title="Foto/vídeo">🖼️</button>
                        <button type="button" class="btn btn-ghost btn-circle btn-xs text-blue-500" title="Marcar amigos">🏷️</button>
                        <button type="button" class="btn btn-ghost btn-circle btn-xs text-amber-500" title="Sentimento">😊</button>
                        <button type="button" class="btn btn-ghost btn-circle btn-xs text-rose-500" title="Localização">📍</button>
                    </div>
                </div>

                <!-- Submit Button -->
                <div>
                    @auth
                        <button type="submit" class="btn btn-primary w-full bg-blue-600 hover:bg-blue-700 border-none text-white font-bold">
                            Publicar
                        </button>
                    @else
                        <a href="/login" class="btn btn-primary w-full bg-blue-600 hover:bg-blue-700 border-none text-white font-bold">
                            Iniciar sessão para publicar
                        </a>
                    @endauth
                </div>
            </form>
        </div>
        <form method="dialog" class="modal-backdrop">
            <button>fechar</button>
        </form>
    </dialog>

    <!-- Dashboard Interactive Scripts -->
    <script>
        function openCreatePostModal() {
            const modal = document.getElementById('publish-modal');
            if (modal) {
                modal.showModal();
                setTimeout(() => {
                    const input = document.getElementById('modal-message-input');
                    if (input) input.focus();
                }, 100);
            }
        }

        function switchDashboardTab(tabName) {
            const tabs = ['feed', 'amigos', 'mensagens', 'definicoes', 'menu'];
            if (!tabs.includes(tabName)) tabName = 'feed';

            tabs.forEach(t => {
                const view = document.getElementById('view-' + t);
                const btn = document.getElementById('tab-btn-' + t);
                if (view) {
                    if (t === tabName) {
                        view.classList.remove('hidden');
                    } else {
                        view.classList.add('hidden');
                    }
                }
                if (btn) {
                    if (t === tabName) {
                        btn.classList.add('border-blue-600', 'text-blue-600');
                        btn.classList.remove('border-transparent', 'text-base-content/70');
                    } else {
                        btn.classList.remove('border-blue-600', 'text-blue-600');
                        btn.classList.add('border-transparent', 'text-base-content/70');
                    }
                }
            });

            // Update URL hash without forcing jump
            if (history.pushState) {
                history.pushState(null, null, '#' + tabName);
            } else {
                location.hash = '#' + tabName;
            }
        }

        // Friends actions
        function acceptFriend(id) {
            const el = document.getElementById('request-' + id);
            if (el) {
                el.innerHTML = `
                    <div class="flex items-center gap-3 w-full py-1">
                        <span class="text-emerald-500 font-bold text-lg">✓</span>
                        <span class="text-xs font-semibold text-emerald-600">Agora são amigos no Chirper Lite!</span>
                    </div>
                `;
                showChirperToast('Amizade confirmada!', 'success');
                decrementRequestBadge();
            }
        }

        function deleteFriend(id) {
            const el = document.getElementById('request-' + id);
            if (el) {
                el.remove();
                showChirperToast('Pedido eliminado.', 'info');
                decrementRequestBadge();
            }
        }

        function decrementRequestBadge() {
            const badge = document.getElementById('requests-badge');
            if (badge) {
                let current = parseInt(badge.textContent) || 0;
                badge.textContent = Math.max(0, current - 1);
            }
        }

        // Messenger interactions
        function openConversation(name, initials, sampleMsg) {
            const chatName = document.getElementById('chat-active-name');
            const chatAvatar = document.getElementById('chat-active-avatar');
            if (chatName) chatName.textContent = name;
            if (chatAvatar) chatAvatar.textContent = initials;

            const container = document.getElementById('chat-messages-container');
            if (container) {
                container.innerHTML = `
                    <div class="flex justify-start">
                        <div class="bg-base-100 border border-base-300 rounded-2xl px-3 py-2 max-w-[80%] text-base-content shadow-2xs">
                            ${sampleMsg}
                        </div>
                    </div>
                `;
            }
            showChirperToast('Conversa com ' + name + ' aberta.', 'info');
        }

        function handleSendDirectMessage(e) {
            e.preventDefault();
            const input = document.getElementById('chat-input');
            const container = document.getElementById('chat-messages-container');
            if (!input || !container) return;

            const val = input.value.trim();
            if (!val) return;

            // Append user bubble
            const userBubble = document.createElement('div');
            userBubble.className = 'flex justify-end';
            userBubble.innerHTML = `
                <div class="bg-blue-600 text-white rounded-2xl px-3 py-2 max-w-[80%] shadow-2xs font-medium">
                    ${val.replace(/</g, "&lt;").replace(/>/g, "&gt;")}
                </div>
            `;
            container.appendChild(userBubble);
            input.value = '';
            container.scrollTop = container.scrollHeight;

            // Simulated quick reply
            setTimeout(() => {
                const replyBubble = document.createElement('div');
                replyBubble.className = 'flex justify-start animate-fadeIn';
                replyBubble.innerHTML = `
                    <div class="bg-base-100 border border-base-300 rounded-2xl px-3 py-2 max-w-[80%] text-base-content shadow-2xs">
                        Perfeito! Adorei a mensagem. Chirper Lite está demais! 👍
                    </div>
                `;
                container.appendChild(replyBubble);
                container.scrollTop = container.scrollHeight;
            }, 800);
        }

        // Theme toggle
        function toggleAppTheme(checkbox) {
            const html = document.documentElement;
            if (checkbox.checked) {
                html.setAttribute('data-theme', 'dark');
                showChirperToast('Tema Escuro ativado 🌙', 'info');
            } else {
                html.setAttribute('data-theme', 'lofi');
                showChirperToast('Tema Claro ativado ☀️', 'info');
            }
        }

        // Initialize active tab from hash on load
        document.addEventListener('DOMContentLoaded', function () {
            const hash = window.location.hash.replace('#', '');
            if (hash && ['feed', 'amigos', 'mensagens', 'definicoes', 'menu'].includes(hash)) {
                switchDashboardTab(hash);
            }
        });
    </script>
</x-layout>
