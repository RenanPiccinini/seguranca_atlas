<!DOCTYPE html>
<html lang="pt-BR" class="dark scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Atlas Segurança e Zeladoria | Segurança Privada em Arcos MG')</title>
    <meta name="description" content="Atlas Segurança e Zeladoria em Arcos MG. Serviços de segurança privada, equipe de apoio, brigadista, segurança hospitalar, portaria, vigia e monitoramento CFTV 24 horas.">
    <meta name="keywords" content="segurança privada Arcos MG, vigilância Arcos, brigadista, equipe de apoio eventos, portaria, zeladoria, monitoramento CFTV, usinas solares segurança">
    <meta name="author" content="Atlas Segurança e Zeladoria LTDA">

    <!-- Open Graph / Meta Social -->
    <meta property="og:title" content="Atlas Segurança e Zeladoria - Arcos MG">
    <meta property="og:description" content="Proteção Estratégica, Inteligência Operacional e Zeladoria de Alta Performance. Plantão 24h: (37) 99967-3426">
    <meta property="og:image" content="{{ asset('images/atlas/logo.jpg') }}">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:type" content="website">

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}">

    <!-- Google Fonts: Plus Jakarta Sans -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Scripts & Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Schema.org Structured Data -->
    <script type="application/ld+json">
    {
      "{{ '@' }}context": "https://schema.org",
      "{{ '@' }}type": "SecurityService",
      "name": "Atlas Segurança e Zeladoria",
      "image": "{{ asset('images/atlas/logo.jpg') }}",
      "telephone": "+5537999673426",
      "address": {
        "{{ '@' }}type": "PostalAddress",
        "addressLocality": "Arcos",
        "addressRegion": "MG",
        "addressCountry": "BR"
      },
      "areaServed": "Arcos e região Centro-Oeste de Minas Gerais",
      "openingHours": "Mo-Su 00:00-24:00"
    }
    </script>
</head>
<body class="bg-[#07090e] text-slate-100 antialiased selection:bg-orange-500 selection:text-white">

    <!-- Top Tactical Status Bar -->
    <div class="bg-[#0c101b] border-b border-slate-800/80 text-xs text-slate-300 py-2 px-4 relative z-50">
        <div class="max-w-7xl mx-auto flex flex-col md:flex-row justify-between items-center gap-2">
            <div class="flex items-center space-x-3">
                <span class="inline-flex items-center px-2 py-0.5 rounded text-[11px] font-semibold bg-emerald-500/10 text-emerald-400 border border-emerald-500/30">
                    <span class="w-1.5 h-1.5 rounded-full bg-emerald-400 mr-1.5 animate-ping"></span>
                    PLANTÃO TÁTICO ATIVO 24H
                </span>
                <span class="hidden sm:inline text-slate-400">|</span>
                <span class="flex items-center text-slate-300">
                    <svg class="w-3.5 h-3.5 mr-1 text-orange-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                    </svg>
                    Sede: <strong>Arcos - MG</strong> & Atendimento Regional
                </span>
            </div>
            <div class="flex items-center space-x-4">
                <a href="tel:37999673426" class="flex items-center hover:text-orange-400 transition-colors font-semibold">
                    <svg class="w-3.5 h-3.5 mr-1 text-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                    </svg>
                    (37) 99967-3426
                </a>
                <span class="text-slate-600">/</span>
                <a href="https://wa.me/5537999673426?text=Ol%C3%A1!%20Gostaria%20de%20informa%C3%A7%C3%B5es%20sobre%20os%20servi%C3%A7os%20da%20Atlas%20Seguran%C3%A7a." target="_blank" class="flex items-center text-emerald-400 hover:text-emerald-300 transition-colors">
                    <svg class="w-3.5 h-3.5 mr-1 fill-current" viewBox="0 0 24 24">
                        <path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/>
                    </svg>
                    WhatsApp Direto
                </a>
            </div>
        </div>
    </div>

    <!-- Main Navigation Bar (Glassmorphism & Fixed) -->
    <header class="sticky top-0 z-40 transition-all duration-300 bg-[#07090e]/85 backdrop-blur-md border-b border-slate-800/80">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-20">
                <!-- Brand / Logo -->
                <a href="{{ route('home') }}" class="flex items-center space-x-3 group">
                    <div class="relative w-12 h-12 rounded-lg overflow-hidden bg-black border border-orange-500/30 flex items-center justify-center p-1 group-hover:border-orange-500 transition-colors shadow-lg shadow-orange-500/10">
                        <img src="{{ asset('images/atlas/emblem.png') }}" alt="Atlas Segurança Logo" class="w-full h-full object-contain transform group-hover:scale-110 transition-transform duration-300">
                    </div>
                    <div>
                        <div class="flex items-center space-x-1.5">
                            <span class="text-xl sm:text-2xl font-black tracking-wider text-white">ATLAS</span>
                            <span class="text-xs px-1.5 py-0.5 rounded bg-orange-500/20 text-orange-400 font-bold border border-orange-500/30 tracking-tight">LTDA</span>
                        </div>
                        <span class="text-[11px] font-semibold text-orange-400 tracking-wider uppercase block">Segurança e Zeladoria</span>
                    </div>
                </a>

                <!-- Desktop Navigation Links -->
                <nav class="hidden lg:flex items-center space-x-8 text-sm font-medium text-slate-300">
                    <a href="{{ route('home') }}#inicio" class="hover:text-orange-400 transition-colors">Início</a>
                    
                    <!-- Services Dropdown Anchor -->
                    <div class="relative group">
                        <a href="{{ route('home') }}#servicos" class="flex items-center hover:text-orange-400 transition-colors py-2">
                            <span>Serviços</span>
                            <svg class="w-4 h-4 ml-1 text-slate-400 group-hover:rotate-180 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </a>
                        <div class="absolute left-0 mt-2 w-72 rounded-xl bg-[#0e131f] border border-slate-800 shadow-2xl p-2 hidden group-hover:block transition-all opacity-0 group-hover:opacity-100 z-50">
                            <a href="{{ route('home') }}#servicos" class="flex items-center px-3 py-2 rounded-lg hover:bg-slate-800/60 text-slate-200 hover:text-orange-400 text-xs">
                                <span class="w-2 h-2 rounded-full bg-orange-500 mr-2.5"></span>
                                Segurança Privada Especializada
                            </a>
                            <a href="{{ route('home') }}#servicos" class="flex items-center px-3 py-2 rounded-lg hover:bg-slate-800/60 text-slate-200 hover:text-orange-400 text-xs">
                                <span class="w-2 h-2 rounded-full bg-orange-500 mr-2.5"></span>
                                Equipe de Apoio para Eventos
                            </a>
                            <a href="{{ route('home') }}#servicos" class="flex items-center px-3 py-2 rounded-lg hover:bg-slate-800/60 text-slate-200 hover:text-orange-400 text-xs">
                                <span class="w-2 h-2 rounded-full bg-orange-500 mr-2.5"></span>
                                Brigadista & Combate a Incêndio
                            </a>
                            <a href="{{ route('home') }}#servicos" class="flex items-center px-3 py-2 rounded-lg hover:bg-slate-800/60 text-slate-200 hover:text-orange-400 text-xs">
                                <span class="w-2 h-2 rounded-full bg-orange-500 mr-2.5"></span>
                                Segurança Hospitalar
                            </a>
                            <a href="{{ route('home') }}#servicos" class="flex items-center px-3 py-2 rounded-lg hover:bg-slate-800/60 text-slate-200 hover:text-orange-400 text-xs">
                                <span class="w-2 h-2 rounded-full bg-orange-500 mr-2.5"></span>
                                Portaria & Controle de Acesso
                            </a>
                            <a href="{{ route('home') }}#servicos" class="flex items-center px-3 py-2 rounded-lg hover:bg-slate-800/60 text-slate-200 hover:text-orange-400 text-xs">
                                <span class="w-2 h-2 rounded-full bg-orange-500 mr-2.5"></span>
                                Vigia & Usinas Fotovoltaicas
                            </a>
                            <a href="{{ route('home') }}#servicos" class="flex items-center px-3 py-2 rounded-lg hover:bg-slate-800/60 text-slate-200 hover:text-orange-400 text-xs">
                                <span class="w-2 h-2 rounded-full bg-orange-500 mr-2.5"></span>
                                Central CFTV & Monitoramento
                            </a>
                        </div>
                    </div>

                    <a href="{{ route('home') }}#sobre" class="hover:text-orange-400 transition-colors">Sobre Nós</a>
                    <a href="{{ route('home') }}#diferenciais" class="hover:text-orange-400 transition-colors">Diferenciais</a>
                    <a href="{{ route('home') }}#orcamento" class="hover:text-orange-400 transition-colors">Simulador</a>
                    <a href="{{ route('home') }}#galeria" class="hover:text-orange-400 transition-colors">Fotos Oficiais</a>
                    <a href="{{ route('home') }}#contato" class="hover:text-orange-400 transition-colors">Contato</a>
                </nav>

                <!-- Action Button & WhatsApp Header CTA -->
                <div class="hidden sm:flex items-center space-x-3">
                    <a href="{{ route('home') }}#orcamento" class="relative group px-5 py-2.5 rounded-xl font-semibold text-xs tracking-wider uppercase text-white bg-gradient-to-r from-orange-600 to-amber-500 hover:from-orange-500 hover:to-amber-400 shadow-lg shadow-orange-600/30 transition-all duration-300 transform hover:-translate-y-0.5">
                        <span class="flex items-center">
                            <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                            </svg>
                            Orçamento Rápido
                        </span>
                    </a>
                </div>

                <!-- Mobile Menu Button -->
                <div class="flex lg:hidden items-center">
                    <button type="button" id="mobile-menu-toggler" class="p-2 rounded-lg text-slate-400 hover:text-white hover:bg-slate-800 focus:outline-none" aria-label="Abrir Menu">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </header>

    <!-- Mobile Drawer Navigation -->
    <div id="mobile-drawer" class="fixed inset-y-0 right-0 max-w-xs w-full bg-[#0a0e17] border-l border-slate-800 shadow-2xl z-50 transform translate-x-full transition-transform duration-300 ease-in-out p-6 flex flex-col justify-between">
        <div>
            <div class="flex items-center justify-between pb-6 border-b border-slate-800">
                <div class="flex items-center space-x-2">
                    <img src="{{ asset('images/atlas/emblem.png') }}" class="w-9 h-9 object-contain" alt="Atlas Logo">
                    <span class="font-bold text-lg text-white">ATLAS SEGURANÇA</span>
                </div>
                <button type="button" id="close-mobile-drawer" class="p-1.5 rounded-lg text-slate-400 hover:text-white hover:bg-slate-800">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>

            <nav class="mt-6 flex flex-col space-y-4 text-base font-medium">
                <a href="{{ route('home') }}#inicio" class="text-slate-300 hover:text-orange-400 transition-colors">Início</a>
                <a href="{{ route('home') }}#servicos" class="text-slate-300 hover:text-orange-400 transition-colors">Nossos Serviços</a>
                <a href="{{ route('home') }}#sobre" class="text-slate-300 hover:text-orange-400 transition-colors">Sobre a Atlas</a>
                <a href="{{ route('home') }}#diferenciais" class="text-slate-300 hover:text-orange-400 transition-colors">Diferenciais Operacionais</a>
                <a href="{{ route('home') }}#orcamento" class="text-slate-300 hover:text-orange-400 transition-colors">Simulador de Orçamento</a>
                <a href="{{ route('home') }}#galeria" class="text-slate-300 hover:text-orange-400 transition-colors">Fotos e Instalações</a>
                <a href="{{ route('home') }}#contato" class="text-slate-300 hover:text-orange-400 transition-colors">Fale Conosco</a>
                <a href="{{ route('admin.dashboard') }}" class="text-xs text-slate-500 hover:text-slate-300 pt-4 border-t border-slate-800/80">Painel Operacional</a>
            </nav>
        </div>

        <div class="pt-6 border-t border-slate-800 flex flex-col space-y-3">
            <a href="tel:37999673426" class="flex items-center justify-center w-full py-3 rounded-xl bg-slate-800 hover:bg-slate-700 text-white font-semibold text-sm">
                Ligar: (37) 99967-3426
            </a>
            <a href="https://wa.me/5537999673426?text=Ol%C3%A1!%20Gostaria%20de%20um%20or%C3%A7amento%20da%20Atlas%20Seguran%C3%A7a." target="_blank" class="flex items-center justify-center w-full py-3 rounded-xl bg-emerald-600 hover:bg-emerald-500 text-white font-bold text-sm shadow-lg shadow-emerald-600/30">
                Falar no WhatsApp
            </a>
        </div>
    </div>

    <!-- MAIN BODY CONTENT -->
    <main>
        @yield('content')
    </main>

    <!-- Global Tactical Service Modal -->
    <div id="service-modal" class="fixed inset-0 z-50 hidden items-center justify-center bg-black/80 backdrop-blur-md p-4 transition-all duration-300">
        <div class="relative w-full max-w-3xl rounded-2xl bg-[#0e131f] border border-slate-700/80 shadow-2xl overflow-hidden flex flex-col max-h-[90vh]">
            <!-- Header with Image & Close -->
            <div class="relative h-60 w-full bg-slate-900 overflow-hidden">
                <img id="modal-service-img" src="" alt="Serviço Atlas" class="w-full h-full object-cover">
                <div class="absolute inset-0 bg-gradient-to-t from-[#0e131f] via-[#0e131f]/40 to-transparent"></div>
                <button type="button" class="close-service-modal absolute top-4 right-4 p-2 rounded-full bg-black/60 text-white hover:bg-orange-600 transition-colors">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
                <div class="absolute bottom-4 left-6">
                    <span id="modal-service-badge" class="px-2.5 py-1 rounded bg-orange-500/20 text-orange-400 font-bold text-xs uppercase tracking-wider border border-orange-500/30">Atlas</span>
                    <h3 id="modal-service-title" class="text-2xl sm:text-3xl font-extrabold text-white mt-1"></h3>
                </div>
            </div>

            <!-- Content Area -->
            <div class="p-6 overflow-y-auto space-y-5">
                <div>
                    <h4 class="text-xs font-bold text-orange-400 uppercase tracking-widest mb-1">Descrição Técnica</h4>
                    <p id="modal-service-desc" class="text-slate-300 leading-relaxed text-sm"></p>
                </div>

                <div>
                    <h4 class="text-xs font-bold text-slate-400 uppercase tracking-widest mb-2.5">Destaques e Procedimentos</h4>
                    <ul id="modal-service-features" class="grid grid-cols-1 sm:grid-cols-2 gap-2.5"></ul>
                </div>
            </div>

            <!-- Modal Footer CTA -->
            <div class="p-5 bg-[#090c14] border-t border-slate-800 flex flex-col sm:flex-row items-center justify-between gap-3">
                <div class="text-xs text-slate-400 text-center sm:text-left">
                    Atendimento imediato para <span class="text-white font-semibold">Arcos - MG e região</span>
                </div>
                <div class="flex items-center space-x-3 w-full sm:w-auto">
                    <button type="button" class="close-service-modal px-4 py-2 rounded-xl text-slate-300 hover:text-white bg-slate-800 hover:bg-slate-700 text-xs font-semibold w-1/2 sm:w-auto">Fechar</button>
                    <a id="modal-service-wa" href="" target="_blank" class="px-5 py-2.5 rounded-xl bg-emerald-600 hover:bg-emerald-500 text-white text-xs font-bold flex items-center justify-center space-x-1.5 shadow-lg shadow-emerald-600/30 w-1/2 sm:w-auto">
                        <span>Contratar no WhatsApp</span>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- FLOATING WHATSAPP BUTTON (COM LOGO OFICIAL DO WHATSAPP E EFEITO PULSANTE) -->
    <aside aria-label="Atendimento WhatsApp" class="fixed bottom-6 right-6 z-50 flex items-center group">
        <!-- Floating Label/Badge on Hover -->
        <div class="hidden md:flex items-center mr-3 px-4 py-2 rounded-full bg-slate-900/90 border border-emerald-500/40 text-xs font-bold text-white shadow-xl backdrop-blur-md opacity-0 group-hover:opacity-100 transition-opacity duration-300 pointer-events-none transform translate-x-2 group-hover:translate-x-0">
            <span class="w-2 h-2 rounded-full bg-emerald-400 mr-2 animate-ping"></span>
            Plantão Tático em Arcos MG - Online
        </div>

        <!-- Official WhatsApp Floating Action Button -->
        <a href="https://wa.me/5537999673426?text=Ol%C3%A1!%20Gostaria%20de%20solicitar%20um%20or%C3%A7amento%20com%20a%20Atlas%20Seguran%C3%A7a%20e%20Zeladoria." 
           target="_blank" 
           rel="noopener noreferrer" 
           aria-label="Falar no WhatsApp com Atlas Segurança"
           class="relative flex items-center justify-center w-16 h-16 rounded-full bg-[#25D366] text-white shadow-2xl hover:scale-110 transition-transform duration-300 animate-wa-pulse focus:outline-none focus:ring-4 focus:ring-emerald-400">
            
            <!-- Official WhatsApp Logo Vector -->
            <svg class="w-9 h-9 fill-current" viewBox="0 0 24 24">
                <path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/>
            </svg>

            <!-- Notification indicator dot -->
            <span class="absolute top-1 right-1 w-3.5 h-3.5 rounded-full bg-orange-500 border-2 border-white"></span>
        </a>
    </aside>

    <!-- Professional Tactical Footer -->
    <footer class="bg-[#05070a] border-t border-slate-800 text-slate-400 pt-16 pb-12 relative overflow-hidden">
        <div class="absolute inset-0 cyber-grid opacity-20 pointer-events-none"></div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-10 pb-12 border-b border-slate-800/80">
                <!-- Column 1: Brand Info -->
                <div class="space-y-4">
                    <div class="flex items-center space-x-3">
                        <img src="{{ asset('images/atlas/emblem.png') }}" class="w-10 h-10 object-contain" alt="Atlas Logo">
                        <div>
                            <span class="text-xl font-black text-white tracking-wider block">ATLAS</span>
                            <span class="text-[10px] uppercase font-bold text-orange-400 tracking-wider">Segurança e Zeladoria LTDA</span>
                        </div>
                    </div>
                    <p class="text-xs text-slate-400 leading-relaxed">
                        Referência em segurança privada, equipes de apoio, brigada de emergência, controle de acesso e monitoramento 24h na cidade de <strong>Arcos - MG</strong> e em todo o Centro-Oeste Mineiro.
                    </p>
                    <div class="pt-2">
                        <span class="text-xs font-semibold text-slate-300 block mb-1">Central de Operações:</span>
                        <a href="tel:37999673426" class="text-lg font-extrabold text-orange-400 hover:text-orange-300 transition-colors flex items-center">
                            <svg class="w-5 h-5 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                            </svg>
                            (37) 99967-3426
                        </a>
                    </div>
                </div>

                <!-- Column 2: Soluções Especializadas -->
                <div>
                    <h4 class="text-xs font-bold text-white uppercase tracking-widest mb-4 flex items-center">
                        <span class="w-2 h-2 rounded bg-orange-500 mr-2"></span>
                        Soluções Especializadas
                    </h4>
                    <ul class="space-y-2 text-xs">
                        <li><a href="{{ route('home') }}#servicos" class="hover:text-orange-400 transition-colors">Segurança Privada Armada & Desarmada</a></li>
                        <li><a href="{{ route('home') }}#servicos" class="hover:text-orange-400 transition-colors">Equipe de Apoio para Eventos & Shows</a></li>
                        <li><a href="{{ route('home') }}#servicos" class="hover:text-orange-400 transition-colors">Brigadista & Prevenção de Incêndios</a></li>
                        <li><a href="{{ route('home') }}#servicos" class="hover:text-orange-400 transition-colors">Segurança Hospitalar & Clínicas</a></li>
                        <li><a href="{{ route('home') }}#servicos" class="hover:text-orange-400 transition-colors">Portaria & Controle de Acesso Biométrico</a></li>
                        <li><a href="{{ route('home') }}#servicos" class="hover:text-orange-400 transition-colors">Vigia & Usinas Fotovoltaicas</a></li>
                        <li><a href="{{ route('home') }}#servicos" class="hover:text-orange-400 transition-colors">Sala CFTV & Vídeo-Monitoramento 24h</a></li>
                    </ul>
                </div>

                <!-- Column 3: Região & Atendimento -->
                <div>
                    <h4 class="text-xs font-bold text-white uppercase tracking-widest mb-4 flex items-center">
                        <span class="w-2 h-2 rounded bg-orange-500 mr-2"></span>
                        Base Operacional
                    </h4>
                    <ul class="space-y-3 text-xs text-slate-400">
                        <li class="flex items-start">
                            <svg class="w-4 h-4 text-orange-400 mr-2 shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                            <span><strong>Cidade:</strong> Arcos - MG<br>Atendimento em todo o polo industrial, usinas solares e condomínios da região.</span>
                        </li>
                        <li class="flex items-center">
                            <svg class="w-4 h-4 text-orange-400 mr-2 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                            </svg>
                            <span>contato@segurancaatlas.com.br</span>
                        </li>
                        <li class="flex items-center">
                            <svg class="w-4 h-4 text-emerald-400 mr-2 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <span>Central Operacional 24/7/365</span>
                        </li>
                    </ul>
                </div>

                <!-- Column 4: Certificações & Gestão -->
                <div>
                    <h4 class="text-xs font-bold text-white uppercase tracking-widest mb-4 flex items-center">
                        <span class="w-2 h-2 rounded bg-orange-500 mr-2"></span>
                        Compromisso & Gestão
                    </h4>
                    <p class="text-xs text-slate-400 leading-relaxed mb-4">
                        Operações em total conformidade com a legislação federal, registro nos órgãos competentes e seguro de responsabilidade civil para máxima tranquilidade da sua organização.
                    </p>
                    <a href="{{ route('admin.dashboard') }}" class="inline-flex items-center px-3 py-1.5 rounded-lg bg-slate-900 border border-slate-800 text-slate-400 hover:text-white hover:border-orange-500 text-[11px] font-medium transition-colors">
                        <svg class="w-3.5 h-3.5 mr-1.5 text-orange-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                        </svg>
                        Acessar Painel de Operações
                    </a>
                </div>
            </div>

            <!-- Bottom Copyright & Details -->
            <div class="pt-8 flex flex-col sm:flex-row items-center justify-between text-xs text-slate-500">
                <p>&copy; {{ date('Y') }} Atlas Segurança e Zeladoria LTDA. Todos os direitos reservados. Arcos - MG.</p>
                <div class="flex items-center space-x-6 mt-4 sm:mt-0">
                    <span>Telefone: (37) 99967-3426</span>
                    <span>•</span>
                    <span>Arcos - Minas Gerais</span>
                </div>
            </div>
        </div>
    </footer>

</body>
</html>
