<!DOCTYPE html>
<html lang="pt-BR" class="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Acesso Restrito | Atlas Segurança e Zeladoria</title>

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-[#07090e] text-slate-100 min-h-screen flex items-center justify-center p-4 relative overflow-x-hidden selection:bg-orange-500 selection:text-white">

    <!-- Tactical Cyber Background Effects -->
    <div class="fixed inset-0 pointer-events-none z-0">
        <div class="absolute -top-40 -left-40 w-96 h-96 bg-orange-600/15 rounded-full blur-3xl"></div>
        <div class="absolute -bottom-40 -right-40 w-96 h-96 bg-amber-500/10 rounded-full blur-3xl"></div>
        <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[700px] h-[700px] bg-radial from-orange-500/5 to-transparent blur-2xl"></div>
        <div class="absolute inset-0 bg-[linear-gradient(to_right,#ffffff05_1px,transparent_1px),linear-gradient(to_bottom,#ffffff05_1px,transparent_1px)] bg-[size:40px_40px]"></div>
    </div>

    <!-- Login Container -->
    <div class="w-full max-w-md relative z-10 py-6 sm:py-10">
        
        <!-- Logo & Branding -->
        <div class="text-center mb-8">
            <div class="inline-flex items-center justify-center w-20 h-20 rounded-2xl bg-black border border-orange-500/40 p-2 shadow-2xl shadow-orange-500/20 mb-4 group transform transition hover:scale-105">
                <img src="{{ asset('images/atlas/emblem.png') }}" alt="Atlas Logo" class="w-full h-full object-contain filter drop-shadow">
            </div>
            
            <h1 class="text-2xl sm:text-3xl font-black text-white tracking-wider flex items-center justify-center space-x-2">
                <span>ATLAS</span>
                <span class="text-orange-500">PAINEL</span>
            </h1>
            <p class="text-xs sm:text-sm text-slate-400 mt-1 font-medium">Segurança Privada & Zeladoria • Arcos - MG</p>
            
            <div class="inline-flex items-center space-x-2 mt-3 px-3 py-1 rounded-full bg-orange-500/10 border border-orange-500/30 text-[11px] font-bold text-orange-400">
                <span class="w-2 h-2 rounded-full bg-orange-500 animate-pulse"></span>
                <span>CENTRAL DE OPERAÇÕES 24H</span>
            </div>
        </div>

        <!-- Card Form -->
        <div class="rounded-3xl bg-[#0c101b]/95 backdrop-blur-xl border border-slate-800 shadow-2xl p-6 sm:p-8 relative">
            
            <div class="mb-6">
                <h2 class="text-lg font-black text-white">Autenticação Restrita</h2>
                <p class="text-xs text-slate-400">Insira suas credenciais corporativas autorizadas.</p>
            </div>

            <!-- Validation Errors -->
            @if ($errors->any())
            <div class="mb-5 p-3.5 rounded-xl bg-rose-500/10 border border-rose-500/30 text-rose-400 text-xs font-semibold space-y-1">
                @foreach ($errors->all() as $error)
                    <div class="flex items-center space-x-2">
                        <svg class="w-4 h-4 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <span>{{ $error }}</span>
                    </div>
                @endforeach
            </div>
            @endif

            <form method="POST" action="{{ route('login') }}" class="space-y-5">
                @csrf

                <!-- Email -->
                <div class="space-y-1.5">
                    <label for="email" class="block text-xs font-bold uppercase tracking-wider text-slate-300">
                        E-mail de Acesso
                    </label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-500">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.206"></path>
                            </svg>
                        </div>
                        <input id="email" 
                               type="email" 
                               name="email" 
                               value="{{ old('email', 'atlasadmin@gmail.com') }}" 
                               required 
                               autofocus 
                               autocomplete="username" 
                               class="w-full pl-10 pr-4 py-3 rounded-xl bg-black/60 border border-slate-800 focus:border-orange-500 focus:ring-2 focus:ring-orange-500/20 text-white text-sm placeholder-slate-500 transition-colors"
                               placeholder="exemplo@atlasseguranca.com.br">
                    </div>
                </div>

                <!-- Password -->
                <div class="space-y-1.5">
                    <label for="password" class="block text-xs font-bold uppercase tracking-wider text-slate-300">
                        Senha Tática
                    </label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-500">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                            </svg>
                        </div>
                        <input id="password" 
                               type="password" 
                               name="password" 
                               required 
                               autocomplete="current-password" 
                               class="w-full pl-10 pr-10 py-3 rounded-xl bg-black/60 border border-slate-800 focus:border-orange-500 focus:ring-2 focus:ring-orange-500/20 text-white text-sm placeholder-slate-500 transition-colors"
                               placeholder="••••••••••••">
                    </div>
                </div>

                <!-- Remember Me -->
                <div class="flex items-center justify-between text-xs pt-1">
                    <label for="remember_me" class="inline-flex items-center cursor-pointer select-none text-slate-300 hover:text-white">
                        <input id="remember_me" 
                               type="checkbox" 
                               name="remember" 
                               class="w-4 h-4 rounded bg-black/60 border-slate-700 text-orange-500 focus:ring-orange-500 focus:ring-offset-0 transition">
                        <span class="ms-2 font-medium">Lembrar neste navegador</span>
                    </label>
                </div>

                <!-- Submit Button -->
                <div class="pt-2">
                    <button type="submit" 
                            class="w-full py-3.5 px-6 rounded-xl bg-gradient-to-r from-orange-500 via-orange-600 to-amber-500 hover:from-orange-600 hover:to-amber-600 text-white font-extrabold text-sm uppercase tracking-wider shadow-lg shadow-orange-500/30 transform transition active:scale-[0.98] flex items-center justify-center space-x-2">
                        <span>Acessar Painel Tático</span>
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                        </svg>
                    </button>
                </div>
            </form>

            <!-- Bottom Back Link -->
            <div class="mt-6 pt-6 border-t border-slate-800 text-center">
                <a href="{{ route('home') }}" class="inline-flex items-center space-x-1.5 text-xs font-semibold text-slate-400 hover:text-orange-400 transition-colors">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                    </svg>
                    <span>Voltar para o site público</span>
                </a>
            </div>

        </div>

        <!-- Footer Notice -->
        <div class="mt-6 text-center text-[11px] text-slate-500">
            Atlas Segurança e Zeladoria Ltda • Arcos - MG<br>
            Acesso restrito e monitorado por IP.
        </div>

    </div>

</body>
</html>
