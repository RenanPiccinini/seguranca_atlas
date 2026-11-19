<!DOCTYPE html>
<html lang="pt-BR" class="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Painel Administrativo') | Atlas Segurança e Zeladoria</title>

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-[#07090e] text-slate-100 antialiased font-sans min-h-screen flex flex-col" x-data="{ sidebarOpen: false }">

    @php
        $pendingQuotesCount = \App\Models\QuoteRequest::where('status', 'pendente')->count();
    @endphp

    <!-- Mobile Backdrop Overlay -->
    <div x-show="sidebarOpen" 
         x-transition:enter="transition-opacity ease-linear duration-300"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="transition-opacity ease-linear duration-300"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"
         @click="sidebarOpen = false" 
         class="fixed inset-0 z-40 bg-black/80 backdrop-blur-sm lg:hidden"
         style="display: none;"></div>

    <!-- ============================================================
         SIDEBAR ESQUERDA (MENUS NA ESQUERDA - 100% RESPONSIVA)
         ============================================================ -->
    <aside :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full lg:translate-x-0'"
           class="w-64 bg-[#0a0e17] border-r border-slate-800 flex flex-col justify-between shrink-0 fixed inset-y-0 left-0 z-50 transition-transform duration-300 ease-in-out">
        <div>
            <!-- Brand Logo Header -->
            <div class="h-20 flex items-center justify-between px-6 border-b border-slate-800/80 bg-[#080b12]">
                <div class="flex items-center space-x-3">
                    <div class="w-10 h-10 rounded-lg bg-black border border-orange-500/30 flex items-center justify-center p-1 shadow-md shadow-orange-500/10 shrink-0">
                        <img src="{{ asset('images/atlas/emblem.png') }}" class="w-full h-full object-contain" alt="Atlas Logo">
                    </div>
                    <div class="overflow-hidden">
                        <span class="font-black text-white text-base tracking-wider block">ATLAS PAINEL</span>
                        <span class="text-[10px] text-orange-400 font-bold uppercase tracking-wider block">Arcos - MG • 24h</span>
                    </div>
                </div>

                <!-- Close button for mobile -->
                <button @click="sidebarOpen = false" class="lg:hidden text-slate-400 hover:text-white p-1">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>

            <!-- Navigation Links -->
            <nav class="p-4 space-y-1.5 text-xs font-semibold">
                
                <!-- 1. Dashboard -->
                <a href="{{ route('admin.dashboard') }}" 
                   class="flex items-center justify-between px-3.5 py-3 rounded-xl transition-colors {{ request()->routeIs('admin.dashboard') ? 'bg-orange-500 text-white shadow-lg shadow-orange-500/25' : 'text-slate-300 hover:bg-slate-800/60 hover:text-white' }}">
                    <div class="flex items-center space-x-3">
                        <svg class="w-4 h-4 {{ request()->routeIs('admin.dashboard') ? 'text-white' : 'text-orange-400' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path>
                        </svg>
                        <span>Visão Geral</span>
                    </div>
                </a>

                <!-- 2. Solicitações de Orçamento (Leads) -->
                <a href="{{ route('admin.quotes.index') }}" 
                   class="flex items-center justify-between px-3.5 py-3 rounded-xl transition-colors {{ request()->routeIs('admin.quotes.*') ? 'bg-orange-500 text-white shadow-lg shadow-orange-500/25' : 'text-slate-300 hover:bg-slate-800/60 hover:text-white' }}">
                    <div class="flex items-center space-x-3">
                        <svg class="w-4 h-4 {{ request()->routeIs('admin.quotes.*') ? 'text-white' : 'text-emerald-400' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                        </svg>
                        <span>Cotações & Leads</span>
                    </div>
                    @if($pendingQuotesCount > 0)
                    <span class="px-2 py-0.5 rounded-full text-[10px] font-black {{ request()->routeIs('admin.quotes.*') ? 'bg-white text-orange-600' : 'bg-orange-500/20 text-orange-400 border border-orange-500/40' }}">
                        {{ $pendingQuotesCount }}
                    </span>
                    @endif
                </a>

                <div class="pt-4 pb-1 px-3">
                    <span class="text-[10px] uppercase font-bold text-slate-500 tracking-wider">Controle do Site (CMS)</span>
                </div>

                <!-- 3. Gerenciar Serviços -->
                <a href="{{ route('admin.services.index') }}" 
                   class="flex items-center space-x-3 px-3.5 py-3 rounded-xl transition-colors {{ request()->routeIs('admin.services.*') ? 'bg-orange-500 text-white shadow-lg shadow-orange-500/25' : 'text-slate-300 hover:bg-slate-800/60 hover:text-white' }}">
                    <svg class="w-4 h-4 {{ request()->routeIs('admin.services.*') ? 'text-white' : 'text-orange-400' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                    </svg>
                    <span>Serviços do Site</span>
                </a>

                <!-- 4. Galeria de Fotos -->
                <a href="{{ route('admin.gallery.index') }}" 
                   class="flex items-center space-x-3 px-3.5 py-3 rounded-xl transition-colors {{ request()->routeIs('admin.gallery.*') ? 'bg-orange-500 text-white shadow-lg shadow-orange-500/25' : 'text-slate-300 hover:bg-slate-800/60 hover:text-white' }}">
                    <svg class="w-4 h-4 {{ request()->routeIs('admin.gallery.*') ? 'text-white' : 'text-purple-400' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                    </svg>
                    <span>Galeria de Fotos</span>
                </a>

                <!-- 5. Diferenciais -->
                <a href="{{ route('admin.differentials.index') }}" 
                   class="flex items-center space-x-3 px-3.5 py-3 rounded-xl transition-colors {{ request()->routeIs('admin.differentials.*') ? 'bg-orange-500 text-white shadow-lg shadow-orange-500/25' : 'text-slate-300 hover:bg-slate-800/60 hover:text-white' }}">
                    <svg class="w-4 h-4 {{ request()->routeIs('admin.differentials.*') ? 'text-white' : 'text-amber-400' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"></path>
                    </svg>
                    <span>Diferenciais</span>
                </a>

                <!-- 6. Configurações Gerais -->
                <a href="{{ route('admin.settings.index') }}" 
                   class="flex items-center space-x-3 px-3.5 py-3 rounded-xl transition-colors {{ request()->routeIs('admin.settings.*') ? 'bg-orange-500 text-white shadow-lg shadow-orange-500/25' : 'text-slate-300 hover:bg-slate-800/60 hover:text-white' }}">
                    <svg class="w-4 h-4 {{ request()->routeIs('admin.settings.*') ? 'text-white' : 'text-slate-400' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                    </svg>
                    <span>Textos & Contatos</span>
                </a>

            </nav>
        </div>

        <!-- Bottom Actions & System Info -->
        <div class="p-4 border-t border-slate-800/80 bg-[#080b12] space-y-3">
            
            <!-- User Status & Logout -->
            @auth
            <div class="px-2 py-1.5 rounded-xl bg-slate-900/90 border border-slate-800 flex items-center justify-between">
                <div class="overflow-hidden">
                    <span class="text-[10px] text-slate-500 font-bold block uppercase tracking-wider">Logado como</span>
                    <span class="text-xs font-semibold text-white truncate block" title="{{ Auth::user()->email }}">{{ Auth::user()->email }}</span>
                </div>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" title="Encerrar Sessão" class="p-2 rounded-lg bg-rose-500/10 hover:bg-rose-500 text-rose-400 hover:text-white transition-colors">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                        </svg>
                    </button>
                </form>
            </div>
            @endauth

            <a href="{{ route('home') }}" target="_blank" class="w-full flex items-center justify-center space-x-2 py-2.5 rounded-xl bg-slate-800/80 hover:bg-slate-700 text-slate-200 text-xs font-bold border border-slate-700/60 transition-colors">
                <span>Ver Site Público</span>
                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path>
                </svg>
            </a>

            <div class="px-2 flex items-center justify-between text-[11px] text-slate-500">
                <span class="flex items-center">
                    <span class="w-2 h-2 rounded-full bg-emerald-400 mr-1.5"></span>
                    MySQL Ativo
                </span>
                <span>v1.2</span>
            </div>
        </div>
    </aside>

    <!-- ============================================================
         MAIN CONTENT AREA (À DIREITA DA SIDEBAR - 100% RESPONSIVA)
         ============================================================ -->
    <div class="flex-1 lg:ml-64 flex flex-col min-h-screen">
        
        <!-- Top Operational Bar -->
        <header class="h-20 bg-[#0a0e17]/90 backdrop-blur-md border-b border-slate-800/80 px-4 sm:px-8 flex items-center justify-between sticky top-0 z-20">
            <div class="flex items-center space-x-3 sm:space-x-4">
                <!-- Hamburger Menu for Mobile -->
                <button @click="sidebarOpen = !sidebarOpen" 
                        class="lg:hidden p-2 rounded-xl bg-slate-800 border border-slate-700 text-slate-200 hover:text-white focus:outline-none focus:ring-2 focus:ring-orange-500">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>

                <div>
                    <h2 class="text-base sm:text-lg font-black text-white">@yield('page-title', 'Painel Atlas')</h2>
                    <p class="text-[11px] sm:text-xs text-slate-400">@yield('page-subtitle', 'Base Operacional Arcos - MG')</p>
                </div>
            </div>

            <div class="flex items-center space-x-2 sm:space-x-4">
                <a href="https://wa.me/5537999673426" target="_blank" class="flex items-center space-x-1.5 px-2.5 sm:px-3 py-1.5 rounded-xl bg-emerald-500/10 border border-emerald-500/30 text-emerald-400 text-xs font-bold hover:bg-emerald-500/20 transition-colors">
                    <span class="w-2 h-2 rounded-full bg-emerald-400 animate-pulse"></span>
                    <span class="hidden md:inline">WhatsApp Central:</span>
                    <span>(37) 99967-3426</span>
                </a>
            </div>
        </header>

        <!-- Main Body -->
        <main class="flex-1 p-4 sm:p-8 bg-[#07090e]">
            
            @if(session('success'))
            <div class="mb-6 p-4 rounded-xl bg-emerald-500/10 border border-emerald-500/30 text-emerald-400 text-xs font-semibold flex items-center justify-between shadow-lg">
                <div class="flex items-center space-x-2">
                    <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                    <span>{{ session('success') }}</span>
                </div>
            </div>
            @endif

            @if($errors->any())
            <div class="mb-6 p-4 rounded-xl bg-rose-500/10 border border-rose-500/30 text-rose-400 text-xs font-semibold space-y-1">
                @foreach($errors->all() as $err)
                    <div>• {{ $err }}</div>
                @endforeach
            </div>
            @endif

            @yield('content')
        </main>

    </div>

</body>
</html>
