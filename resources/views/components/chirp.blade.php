@props(['chirp'])

<div class="card bg-base-100 shadow-sm border border-base-300 rounded-lg overflow-hidden transition-all hover:shadow-md chirp-post mb-4" id="chirp-{{ $chirp->id }}">
    <!-- Post Header -->
    <div class="p-3 sm:p-4 pb-2">
        <div class="flex items-start justify-between gap-3">
            <!-- Author Info -->
            <div class="flex items-center gap-3">
                <div class="relative">
                    <div class="size-10 sm:size-11 rounded-full ring-1 ring-base-300 overflow-hidden bg-base-200 flex items-center justify-center">
                        @if ($chirp->user)
                            <img src="https://avatars.laravel.cloud/{{ urlencode($chirp->user->email) }}"
                                 alt="{{ $chirp->user->name }}" class="size-full object-cover" />
                        @else
                            <img src="https://avatars.laravel.cloud/f61123d5-0b27-434c-a4ae-c653c7fc9ed6?vibe=stealth"
                                 alt="Anonymous" class="size-full object-cover" />
                        @endif
                    </div>
                    <!-- Online indicator dot -->
                    <span class="absolute bottom-0 right-0 size-2.5 sm:size-3 rounded-full bg-emerald-500 ring-2 ring-base-100" title="Online agora"></span>
                </div>

                <div>
                    <div class="flex items-center gap-1.5 flex-wrap">
                        <span class="font-bold text-sm sm:text-base text-base-content hover:underline cursor-pointer">
                            {{ $chirp->user ? $chirp->user->name : 'Anonymous' }}
                        </span>
                        @if ($chirp->user)
                            <span class="text-blue-600 text-xs font-bold" title="Perfil verificado">✓</span>
                        @endif
                    </div>
                    <div class="flex items-center gap-1 text-xs text-base-content/60">
                        <span>{{ $chirp->created_at->diffForHumans() }}</span>
                        <span>·</span>
                        <span class="inline-flex items-center gap-0.5" title="Público">
                            <svg xmlns="http://www.w3.org/2000/svg" class="size-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <circle cx="12" cy="12" r="10" stroke-width="2"/>
                                <path stroke-width="2" d="M2 12h20M12 2a15.3 15.3 0 014 10 15.3 15.3 0 01-4 10 15.3 15.3 0 01-4-10 15.3 15.3 0 014-10z"/>
                            </svg>
                            Público
                        </span>
                        @if ($chirp->updated_at->gt($chirp->created_at->addSeconds(5)))
                            <span>·</span>
                            <span class="italic">editado</span>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Post Options (3 dots dropdown) -->
            <div class="dropdown dropdown-end">
                <div tabindex="0" role="button" class="btn btn-ghost btn-xs btn-circle text-base-content/60 hover:text-base-content" title="Mais opções">
                    <svg xmlns="http://www.w3.org/2000/svg" class="size-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z" />
                    </svg>
                </div>
                <ul tabindex="0" class="dropdown-content menu p-2 shadow-lg bg-base-100 border border-base-300 rounded-box w-52 z-30 text-xs">
                    @can('update', $chirp)
                        <li>
                            <a href="/chirps/{{ $chirp->id }}/edit" class="flex items-center gap-2">
                                ✏️ <span>Editar publicação</span>
                            </a>
                        </li>
                        <li>
                            <form method="POST" action="/chirps/{{ $chirp->id }}" onsubmit="return confirm('Tens a certeza que desejas eliminar esta publicação?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-error flex items-center gap-2 w-full text-left">
                                    🗑️ <span>Eliminar publicação</span>
                                </button>
                            </form>
                        </li>
                        <div class="divider my-1"></div>
                    @endcan
                    <li>
                        <button type="button" onclick="copyChirpLink('{{ $chirp->id }}')" class="flex items-center gap-2">
                            🔗 <span>Copiar ligação</span>
                        </button>
                    </li>
                    <li>
                        <button type="button" onclick="saveChirpPost('{{ $chirp->id }}')" class="flex items-center gap-2">
                            🔖 <span>Guardar publicação</span>
                        </button>
                    </li>
                    <li>
                        <button type="button" onclick="hideChirpPost('{{ $chirp->id }}')" class="flex items-center gap-2 text-base-content/70">
                            👁️ <span>Ocultar publicação</span>
                        </button>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Post Message Text -->
        <div class="mt-3 text-sm sm:text-base text-base-content leading-relaxed whitespace-pre-line select-text">
            {{ $chirp->message }}
        </div>
    </div>

    <!-- Reactions & Counters Stats Bar -->
    @php
        $seedLikes = (($chirp->id * 7 + 3) % 25) + 3;
        $seedComments = (($chirp->id * 3 + 2) % 6) + 1;
        $seedShares = (($chirp->id * 2) % 4) + 1;
    @endphp
    <div class="px-3 sm:px-4 py-2 flex items-center justify-between text-xs text-base-content/60 border-t border-base-200">
        <div class="flex items-center gap-1.5 cursor-pointer hover:underline" onclick="toggleReactionList('{{ $chirp->id }}')">
            <span class="inline-flex items-center -space-x-1">
                <span class="inline-flex items-center justify-center size-4 sm:size-5 rounded-full bg-blue-600 text-white text-[10px] sm:text-[11px] shadow">👍</span>
                <span class="inline-flex items-center justify-center size-4 sm:size-5 rounded-full bg-rose-500 text-white text-[10px] sm:text-[11px] shadow">❤️</span>
            </span>
            <span class="font-medium text-base-content/80 ml-0.5" id="reaction-count-{{ $chirp->id }}">
                {{ $seedLikes }}
            </span>
        </div>
        <div class="flex items-center gap-3">
            <button type="button" class="hover:underline" onclick="toggleComments('{{ $chirp->id }}')">
                <span id="comment-count-{{ $chirp->id }}">{{ $seedComments }}</span> comentários
            </button>
            <span>·</span>
            <span>{{ $seedShares }} partilhas</span>
        </div>
    </div>

    <!-- Facebook Action Buttons: Gosto, Comentar, Partilhar -->
    <div class="px-2 py-1 border-t border-base-300 grid grid-cols-3 gap-1 text-xs sm:text-sm font-semibold text-base-content/70">
        <!-- Like / Gosto -->
        <button type="button"
                id="like-btn-{{ $chirp->id }}"
                onclick="handleLikeToggle('{{ $chirp->id }}')"
                class="btn btn-ghost btn-sm h-9 flex items-center justify-center gap-1.5 sm:gap-2 hover:bg-base-200 hover:text-blue-600 transition-colors">
            <svg xmlns="http://www.w3.org/2000/svg" id="like-icon-{{ $chirp->id }}" class="size-4 stroke-current" fill="none" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 10h4.764a2 2 0 011.789 2.894l-3.5 7A2 2 0 0115.263 21h-4.017c-.163 0-.326-.02-.485-.06L7 20m7-10V5a2 2 0 00-2-2h-.095c-.5 0-.905.405-.905.905 0 .714-.211 1.412-.608 2.006L7 11v9m7-10h-2M7 20H5a2 2 0 01-2-2v-6a2 2 0 012-2h2" />
            </svg>
            <span id="like-text-{{ $chirp->id }}">Gosto</span>
        </button>

        <!-- Comentar -->
        <button type="button"
                onclick="toggleComments('{{ $chirp->id }}', true)"
                class="btn btn-ghost btn-sm h-9 flex items-center justify-center gap-1.5 sm:gap-2 hover:bg-base-200 hover:text-blue-600 transition-colors">
            <svg xmlns="http://www.w3.org/2000/svg" class="size-4 stroke-current" fill="none" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
            </svg>
            <span>Comentar</span>
        </button>

        <!-- Partilhar -->
        <button type="button"
                onclick="handleShare('{{ $chirp->id }}')"
                class="btn btn-ghost btn-sm h-9 flex items-center justify-center gap-1.5 sm:gap-2 hover:bg-base-200 hover:text-blue-600 transition-colors">
            <svg xmlns="http://www.w3.org/2000/svg" class="size-4 stroke-current" fill="none" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.368 2.684 3 3 0 00-5.368-2.684z" />
            </svg>
            <span>Partilhar</span>
        </button>
    </div>

    <!-- Facebook Comments Section (Collapsible/Interactive) -->
    <div id="comments-section-{{ $chirp->id }}" class="border-t border-base-200 bg-base-200/40 p-3 sm:p-4 space-y-3">
        <!-- Comments List -->
        <div class="space-y-2 text-xs" id="comments-list-{{ $chirp->id }}">
            <div class="flex items-start gap-2">
                <div class="size-7 rounded-full bg-blue-600 text-white flex items-center justify-center text-[10px] font-bold shrink-0">
                    MS
                </div>
                <div class="bg-base-100 rounded-2xl px-3 py-1.5 border border-base-300 max-w-[85%] shadow-2xs">
                    <span class="font-bold text-base-content hover:underline cursor-pointer">Mariana Santos</span>
                    <p class="text-base-content/80 mt-0.5 text-xs">Muito bom! Ficou perfeito estilo Facebook Lite 👏</p>
                </div>
            </div>
            <div class="flex items-start gap-2">
                <div class="size-7 rounded-full bg-neutral text-neutral-content flex items-center justify-center text-[10px] font-bold shrink-0">
                    PF
                </div>
                <div class="bg-base-100 rounded-2xl px-3 py-1.5 border border-base-300 max-w-[85%] shadow-2xs">
                    <span class="font-bold text-base-content hover:underline cursor-pointer">Pedro Ferreira</span>
                    <p class="text-base-content/80 mt-0.5 text-xs">Concordo totalmente! Excelente publicação.</p>
                </div>
            </div>
        </div>

        <!-- Write a comment input bar -->
        <form onsubmit="submitChirpComment(event, '{{ $chirp->id }}')" class="flex items-center gap-2 pt-1">
            <div class="size-7 rounded-full bg-base-300 flex items-center justify-center text-xs overflow-hidden shrink-0">
                @auth
                    <img src="https://avatars.laravel.cloud/{{ urlencode(auth()->user()->email) }}" class="size-full object-cover" />
                @else
                    <span class="text-[11px]">👤</span>
                @endauth
            </div>
            <div class="relative flex-1">
                <input type="text"
                       placeholder="Escreve um comentário..."
                       id="comment-input-{{ $chirp->id }}"
                       class="input input-bordered input-xs sm:input-sm w-full rounded-full bg-base-100 pr-9 text-xs focus:border-blue-500"
                       required />
                <button type="submit"
                        class="absolute right-1 top-1/2 -translate-y-1/2 btn btn-ghost btn-circle btn-xs text-blue-600 hover:bg-transparent"
                        title="Enviar comentário">
                    <svg xmlns="http://www.w3.org/2000/svg" class="size-3.5 fill-current" viewBox="0 0 24 24">
                        <path d="M2.01 21L23 12 2.01 3 2 10l15 2-15 2z"/>
                    </svg>
                </button>
            </div>
        </form>
    </div>
</div>
