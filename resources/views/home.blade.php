@extends('layouts.app')

@section('title', $company['name'] . ' | Segurança Privada, Portaria e Vigia em Arcos MG')

@section('content')

<!-- ============================================================
     HERO SECTION COM CANVAS 3D, PARALLAX & TACTICAL DISPLAY
     ============================================================ -->
<section id="inicio" class="relative min-h-[92vh] flex items-center justify-center overflow-hidden pt-12 pb-20 cyber-grid">
    <!-- 3D Particle & Radar Interactive Canvas -->
    <canvas id="hero-3d-canvas" class="absolute inset-0 w-full h-full pointer-events-auto z-0"></canvas>

    <!-- Tactical Radial Glow Overlays -->
    <div class="absolute -top-32 left-1/4 w-96 h-96 rounded-full radial-glow-orange pointer-events-none blur-3xl"></div>
    <div class="absolute -bottom-32 right-1/4 w-96 h-96 rounded-full radial-glow-blue pointer-events-none blur-3xl"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 w-full">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
            
            <!-- Left Hero Text (7 cols) -->
            <div class="lg:col-span-7 space-y-6 text-center lg:text-left">
                <!-- Location & Badge -->
                <div class="inline-flex items-center space-x-2 px-3.5 py-1.5 rounded-full bg-slate-900/90 border border-orange-500/40 text-xs font-semibold text-orange-400 shadow-lg backdrop-blur-md">
                    <span class="w-2 h-2 rounded-full bg-orange-500 animate-ping"></span>
                    <span>{{ strtoupper($company['name']) }}</span>
                    <span class="text-slate-500">•</span>
                    <span class="text-slate-200">{{ strtoupper($company['city']) }}</span>
                </div>

                <!-- Main Headline -->
                <h1 class="text-4xl sm:text-5xl lg:text-6xl font-black tracking-tight text-white leading-tight">
                    Segurança de Elite, <br class="hidden sm:inline">
                    Inteligência Tática e <br class="hidden sm:inline">
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-orange-400 via-amber-400 to-orange-500 text-glow-orange">Proteção Absoluta.</span>
                </h1>

                <!-- Subheadline with dynamic texts -->
                <p class="text-base sm:text-lg text-slate-300 max-w-2xl leading-relaxed">
                    {{ $company['hero_subtitle'] }}
                </p>

                <!-- Tags of Provided Services -->
                <div class="flex flex-wrap gap-2 justify-center lg:justify-start pt-1">
                    <span class="px-3 py-1 rounded-lg bg-slate-900/80 border border-slate-800 text-xs text-slate-300 font-medium">🛡️ Segurança Privada</span>
                    <span class="px-3 py-1 rounded-lg bg-slate-900/80 border border-slate-800 text-xs text-slate-300 font-medium">👥 Equipe de Apoio</span>
                    <span class="px-3 py-1 rounded-lg bg-slate-900/80 border border-slate-800 text-xs text-slate-300 font-medium">🚒 Brigadista</span>
                    <span class="px-3 py-1 rounded-lg bg-slate-900/80 border border-slate-800 text-xs text-slate-300 font-medium">🏥 Segurança Hospitalar</span>
                    <span class="px-3 py-1 rounded-lg bg-slate-900/80 border border-slate-800 text-xs text-slate-300 font-medium">🚪 Portaria & Acesso</span>
                    <span class="px-3 py-1 rounded-lg bg-slate-900/80 border border-slate-800 text-xs text-slate-300 font-medium">👁️ Vigia & Usinas</span>
                </div>

                <!-- Call to Action Buttons -->
                <div class="pt-4 flex flex-col sm:flex-row items-center justify-center lg:justify-start gap-4">
                    <a href="#orcamento" class="w-full sm:w-auto px-8 py-4 rounded-xl bg-gradient-to-r from-orange-600 via-orange-500 to-amber-500 hover:from-orange-500 hover:to-amber-400 text-white font-extrabold text-sm uppercase tracking-wider shadow-xl shadow-orange-600/30 transition-all duration-300 transform hover:-translate-y-1 text-center flex items-center justify-center space-x-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                        </svg>
                        <span>Simular Orçamento Online</span>
                    </a>

                    <a href="https://wa.me/{{ $company['phone_raw'] }}?text=Ol%C3%A1!%20Vim%20pelo%20site%20da%20Atlas%20Seguran%C3%A7a%20e%20gostaria%20de%20falar%20com%20um%20especialista." target="_blank" class="w-full sm:w-auto px-7 py-4 rounded-xl bg-slate-900/90 hover:bg-slate-800 border border-emerald-500/40 text-emerald-400 hover:text-emerald-300 font-bold text-sm tracking-wide transition-all duration-300 text-center flex items-center justify-center space-x-2 shadow-lg">
                        <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24">
                            <path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/>
                        </svg>
                        <span>WhatsApp {{ $company['phone'] }}</span>
                    </a>
                </div>

                <!-- Operational Metrics Quick Line -->
                <div class="pt-4 flex items-center justify-center lg:justify-start space-x-6 text-xs text-slate-400">
                    <span class="flex items-center">
                        <svg class="w-4 h-4 text-emerald-400 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        Base em {{ $company['city'] }}
                    </span>
                    <span class="flex items-center">
                        <svg class="w-4 h-4 text-emerald-400 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        Pronta-Resposta 24h
                    </span>
                </div>
            </div>

            <!-- Right Hero Visual: 3D Interactive Card Display (5 cols) -->
            <div class="lg:col-span-5 relative flex justify-center">
                <div class="tilt-card relative w-full max-w-md rounded-3xl p-1 bg-gradient-to-b from-orange-500/40 via-slate-800/50 to-slate-900 border border-orange-500/30 shadow-2xl shadow-orange-500/20 backdrop-blur-xl">
                    <div class="relative rounded-[22px] bg-[#090d16] p-6 overflow-hidden">
                        <div class="flex items-center justify-between pb-4 border-b border-slate-800 text-xs text-slate-400">
                            <div class="flex items-center space-x-2">
                                <span class="w-2.5 h-2.5 rounded-full bg-emerald-500 animate-ping"></span>
                                <span class="font-bold text-white tracking-widest text-[11px]">SISTEMA ATLAS CFTV 24H</span>
                            </div>
                            <span class="font-mono text-orange-400">{{ strtoupper($company['city']) }}</span>
                        </div>

                        <!-- Official Logo Photo Embed with 3D reflection -->
                        <div class="relative my-4 rounded-xl overflow-hidden border border-slate-800 bg-black flex items-center justify-center p-3 group">
                            <img src="{{ asset('images/atlas/logo.jpg') }}" alt="Atlas Segurança e Zeladoria LTDA" class="w-full object-contain rounded-lg transform group-hover:scale-105 transition-transform duration-500">
                            <div class="sheen absolute inset-0 pointer-events-none"></div>
                        </div>

                        <!-- Live Tactical Telemetry HUD -->
                        <div class="grid grid-cols-2 gap-3 pt-2 text-xs">
                            <div class="p-3 rounded-xl bg-slate-900/80 border border-slate-800/80">
                                <span class="text-[10px] text-slate-400 uppercase tracking-wider block">Central Operacional</span>
                                <span class="text-emerald-400 font-bold flex items-center mt-0.5">
                                    <span class="w-1.5 h-1.5 rounded-full bg-emerald-400 mr-1.5"></span>
                                    100% ONLINE
                                </span>
                            </div>
                            <div class="p-3 rounded-xl bg-slate-900/80 border border-slate-800/80">
                                <span class="text-[10px] text-slate-400 uppercase tracking-wider block">Plantão Telefônico</span>
                                <span class="text-orange-400 font-bold block mt-0.5">{{ $company['phone'] }}</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Tactical Badges (100% Responsivo: Flutuante no Desktop e Grid Tático no Mobile) -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 mt-4 sm:mt-0 sm:block">
                    <!-- Badge 1 -->
                    <div data-parallax-speed="0.12" class="sm:absolute sm:-bottom-6 sm:-left-8 p-3.5 rounded-2xl bg-[#0d121f]/95 border border-orange-500/40 shadow-2xl backdrop-blur-md flex items-center space-x-3 z-20 animate-float">
                        <div class="w-10 h-10 rounded-xl bg-orange-500/20 text-orange-400 flex items-center justify-center font-bold shrink-0">
                            🛡️
                        </div>
                        <div>
                            <span class="text-[10px] uppercase tracking-wider text-slate-400 font-semibold block">Vigilância Ostensiva</span>
                            <span class="text-xs font-extrabold text-white">Equipes Treinadas</span>
                        </div>
                    </div>

                    <!-- Badge 2 -->
                    <div data-parallax-speed="0.18" class="sm:absolute sm:-top-6 sm:-right-6 p-3.5 rounded-2xl bg-[#0d121f]/95 border border-emerald-500/40 shadow-2xl backdrop-blur-md flex items-center space-x-3 z-20 animate-float-delay">
                        <div class="w-10 h-10 rounded-xl bg-emerald-500/20 text-emerald-400 flex items-center justify-center font-bold shrink-0">
                            ⚡
                        </div>
                        <div>
                            <span class="text-[10px] uppercase tracking-wider text-slate-400 font-semibold block">Usinas & Indústrias</span>
                            <span class="text-xs font-extrabold text-emerald-400">Proteção Perimetral</span>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>


<!-- ============================================================
     LIVE STATS & TACTICAL METRICS BAR (COUNTERS)
     ============================================================ -->
<section class="relative z-20 -mt-8 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="rounded-2xl bg-[#0d1322]/90 border border-slate-800 shadow-2xl backdrop-blur-lg p-6 sm:p-8">
        <div class="grid grid-cols-2 lg:grid-cols-4 gap-6 text-center">
            
            <div class="space-y-1">
                <div class="text-3xl sm:text-4xl font-black text-orange-400 counter-val" data-target="100" data-suffix="%">0%</div>
                <div class="text-xs font-semibold text-slate-400 uppercase tracking-wider">Profissionais Auditados</div>
                <p class="text-[11px] text-slate-500">Rigorosa investigação social e capacitação</p>
            </div>

            <div class="space-y-1 border-l border-slate-800/80">
                <div class="text-3xl sm:text-4xl font-black text-white counter-val" data-target="24" data-suffix="/7">0/7</div>
                <div class="text-xs font-semibold text-slate-400 uppercase tracking-wider">Monitoramento Contínuo</div>
                <p class="text-[11px] text-slate-500">Central de Operações em plantão 365 dias</p>
            </div>

            <div class="space-y-1 border-t lg:border-t-0 lg:border-l border-slate-800/80 pt-4 lg:pt-0">
                <div class="text-3xl sm:text-4xl font-black text-emerald-400 counter-val" data-target="8" data-prefix="< " data-suffix=" min">< 8 min</div>
                <div class="text-xs font-semibold text-slate-400 uppercase tracking-wider">Tempo Pronta-Resposta</div>
                <p class="text-[11px] text-slate-500">Deslocamento tático ágil em Arcos MG</p>
            </div>

            <div class="space-y-1 border-t lg:border-t-0 lg:border-l border-slate-800/80 pt-4 lg:pt-0">
                <div class="text-3xl sm:text-4xl font-black text-amber-400 counter-val" data-target="100" data-suffix="%">0%</div>
                <div class="text-xs font-semibold text-slate-400 uppercase tracking-wider">Conformidade Legal</div>
                <p class="text-[11px] text-slate-500">Normas da PF, Bombeiros e Seguros</p>
            </div>

        </div>
    </div>
</section>


<!-- ============================================================
     SERVICES SECTION COM FOTOS REAIS E 3D TILT CARDS
     ============================================================ -->
<section id="servicos" class="py-24 relative overflow-hidden">
    <div class="absolute inset-0 cyber-grid-orange opacity-15 pointer-events-none"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        
        <div class="text-center max-w-3xl mx-auto space-y-4 mb-16">
            <div class="inline-flex items-center space-x-2 px-3 py-1 rounded-full bg-orange-500/10 border border-orange-500/30 text-orange-400 text-xs font-bold uppercase tracking-wider">
                <span>🛡️ Portfólio Operacional</span>
            </div>
            <h2 class="text-3xl sm:text-4xl lg:text-5xl font-black text-white tracking-tight">
                Serviços Especializados para Sua <span class="text-transparent bg-clip-text bg-gradient-to-r from-orange-400 to-amber-400">Total Segurança</span>
            </h2>
            <p class="text-slate-400 text-sm sm:text-base leading-relaxed">
                Cada operação é planejada sob medida, combinando profissionais de alto padrão comportamental, uniformização impecável, armamento/equipamento homologado e tecnologia de supervisão.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($services as $service)
            <div class="tilt-card group relative rounded-2xl bg-[#0c101b] border border-slate-800 hover:border-orange-500/50 transition-all duration-300 shadow-xl overflow-hidden flex flex-col justify-between">
                
                <div>
                    <div class="relative h-56 w-full overflow-hidden bg-slate-900">
                        <img src="{{ asset($service->image) }}" alt="{{ $service->title }} - Atlas Segurança" class="w-full h-full object-cover transform group-hover:scale-108 transition-transform duration-700">
                        <div class="absolute inset-0 bg-gradient-to-t from-[#0c101b] via-[#0c101b]/40 to-transparent"></div>
                        
                        <div class="tilt-badge absolute top-4 left-4">
                            <span class="px-2.5 py-1 rounded-md bg-black/75 border border-orange-500/40 text-[11px] font-bold text-orange-400 uppercase tracking-wider backdrop-blur-md">
                                {{ $service->badge ?? 'Atlas Especializado' }}
                            </span>
                        </div>
                    </div>

                    <div class="p-6 space-y-4">
                        <h3 class="text-xl font-extrabold text-white group-hover:text-orange-400 transition-colors">
                            {{ $service->title }}
                        </h3>

                        <p class="text-slate-400 text-xs sm:text-sm leading-relaxed line-clamp-3">
                            {{ $service->short_description }}
                        </p>

                        @if(!empty($service->features))
                        <ul class="space-y-1.5 pt-2 border-t border-slate-800/80">
                            @foreach(array_slice($service->features, 0, 3) as $feat)
                            <li class="flex items-center text-xs text-slate-300">
                                <svg class="w-4 h-4 text-orange-500 mr-2 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                                <span>{{ $feat }}</span>
                            </li>
                            @endforeach
                        </ul>
                        @endif
                    </div>
                </div>

                <div class="p-6 pt-0 border-t border-slate-800/60 mt-4 flex items-center justify-between gap-3">
                    <button type="button" 
                            class="open-service-modal text-xs font-bold text-slate-300 hover:text-orange-400 transition-colors flex items-center" 
                            data-service="{{ json_encode($service) }}">
                        <span>Ver Detalhes</span>
                        <svg class="w-3.5 h-3.5 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </button>

                    <a href="#orcamento" 
                       onclick="document.querySelector('[name=service_type]').value='{{ $service->title }}';"
                       class="px-4 py-2 rounded-xl bg-orange-600/20 hover:bg-orange-600 border border-orange-500/40 text-orange-400 hover:text-white text-xs font-bold transition-all duration-200">
                        Cotar Agora
                    </a>
                </div>

            </div>
            @endforeach
        </div>

    </div>
</section>


<!-- ============================================================
     SOBRE A ATLAS & SEDE EM ARCOS MG (PARALLAX SPLIT)
     ============================================================ -->
<section id="sobre" class="py-20 relative bg-[#090d16] border-y border-slate-800/80">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
            
            <div class="lg:col-span-5 relative">
                <div class="relative rounded-2xl overflow-hidden border border-slate-800 shadow-2xl">
                    <img src="{{ asset('images/atlas/usinas-vigia.jpg') }}" alt="Vigia em Usinas Atlas" class="w-full h-96 object-cover">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-transparent to-transparent"></div>
                    <div class="absolute bottom-6 left-6 right-6">
                        <span class="px-2.5 py-1 rounded bg-orange-500/20 text-orange-400 text-xs font-bold border border-orange-500/30">BASE {{ strtoupper($company['city']) }}</span>
                        <h4 class="text-xl font-bold text-white mt-1">Presença Estratégica Regional</h4>
                        <p class="text-xs text-slate-300 mt-1">Patrulhamento ostensivo e vigilância integrada.</p>
                    </div>
                </div>

                <div class="sm:absolute sm:-bottom-8 sm:-right-8 w-full sm:w-56 h-48 sm:h-56 mt-4 sm:mt-0 rounded-2xl overflow-hidden border-2 border-orange-500/40 shadow-2xl z-20">
                    <img src="{{ asset('images/atlas/cftv-monitoramento.jpg') }}" alt="Sala CFTV Atlas" class="w-full h-full object-cover">
                </div>
            </div>

            <div class="lg:col-span-7 space-y-6">
                <div class="inline-flex items-center space-x-2 px-3 py-1 rounded-full bg-slate-800 border border-slate-700 text-orange-400 text-xs font-bold uppercase tracking-wider">
                    <span>🏢 Quem Somos</span>
                </div>

                <h2 class="text-3xl sm:text-4xl font-black text-white leading-tight">
                    {{ $company['name'] }}:<br>
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-orange-400 to-amber-400">Excelência Tática e Rigor Operacional</span>
                </h2>

                <p class="text-slate-300 text-sm sm:text-base leading-relaxed">
                    {{ $company['about_text_p1'] }}
                </p>

                <p class="text-slate-400 text-xs sm:text-sm leading-relaxed">
                    {{ $company['about_text_p2'] }}
                </p>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 pt-2">
                    <div class="flex items-start space-x-3 p-3 rounded-xl bg-slate-900/60 border border-slate-800">
                        <div class="text-orange-500 font-bold text-lg">✓</div>
                        <div>
                            <h4 class="text-xs font-bold text-white uppercase tracking-wider">Rondas com Bastão GPS</h4>
                            <p class="text-[11px] text-slate-400">Relatórios digitais auditáveis de presença.</p>
                        </div>
                    </div>

                    <div class="flex items-start space-x-3 p-3 rounded-xl bg-slate-900/60 border border-slate-800">
                        <div class="text-orange-500 font-bold text-lg">✓</div>
                        <div>
                            <h4 class="text-xs font-bold text-white uppercase tracking-wider">Comunicação Criptografada</h4>
                            <p class="text-[11px] text-slate-400">Rádio HT integrado à central 24h.</p>
                        </div>
                    </div>

                    <div class="flex items-start space-x-3 p-3 rounded-xl bg-slate-900/60 border border-slate-800">
                        <div class="text-orange-500 font-bold text-lg">✓</div>
                        <div>
                            <h4 class="text-xs font-bold text-white uppercase tracking-wider">Equipe Uniformizada</h4>
                            <p class="text-[11px] text-slate-400">Postura, respeito e apresentação exemplar.</p>
                        </div>
                    </div>

                    <div class="flex items-start space-x-3 p-3 rounded-xl bg-slate-900/60 border border-slate-800">
                        <div class="text-orange-500 font-bold text-lg">✓</div>
                        <div>
                            <h4 class="text-xs font-bold text-white uppercase tracking-wider">Pronta Resposta em Arcos</h4>
                            <p class="text-[11px] text-slate-400">Apoio tático rápido em qualquer ocorrência.</p>
                        </div>
                    </div>
                </div>

                <div class="pt-4 flex items-center space-x-4">
                    <a href="tel:{{ preg_replace('/[^0-9]/', '', $company['phone']) }}" class="px-6 py-3 rounded-xl bg-slate-800 hover:bg-slate-700 text-white font-bold text-xs uppercase tracking-wider border border-slate-700 transition-colors flex items-center space-x-2">
                        <svg class="w-4 h-4 text-orange-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                        </svg>
                        <span>{{ $company['phone'] }}</span>
                    </a>

                    <a href="https://wa.me/{{ $company['phone_raw'] }}?text=Ol%C3%A1!%20Gostaria%20de%20agendar%20uma%20visita%20t%C3%A9cnica%20da%20Atlas." target="_blank" class="px-6 py-3 rounded-xl bg-emerald-600 hover:bg-emerald-500 text-white font-bold text-xs uppercase tracking-wider transition-colors shadow-lg shadow-emerald-600/30">
                        Agendar Vistoria Técnica Gratuita
                    </a>
                </div>
            </div>

        </div>
    </div>
</section>


<!-- ============================================================
     SIMULADOR INTERATIVO DE ORÇAMENTO (GRAVA NO MYSQL)
     ============================================================ -->
<section id="orcamento" class="py-24 relative overflow-hidden">
    <div class="absolute inset-0 cyber-grid opacity-25 pointer-events-none"></div>

    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        
        <div class="text-center max-w-2xl mx-auto space-y-3 mb-12">
            <span class="px-3 py-1 rounded-full bg-orange-500/10 border border-orange-500/30 text-orange-400 text-xs font-bold uppercase tracking-wider">
                ⚡ Cotação Expressa Online
            </span>
            <h2 class="text-3xl sm:text-4xl font-black text-white">
                Simulador de Segurança & Zeladoria
            </h2>
            <p class="text-slate-400 text-xs sm:text-sm">
                Selecione os parâmetros desejados abaixo para obter uma prévia estimada e registrar sua solicitação em nossa central para retorno em minutos.
            </p>
        </div>

        <div class="rounded-3xl bg-[#0c101b] border border-slate-800 shadow-2xl p-6 sm:p-10 relative overflow-hidden">
            
            <!-- Success Panel -->
            <div id="quote-success-panel" class="hidden text-center py-10 space-y-6">
                <div class="w-20 h-20 rounded-full bg-emerald-500/20 text-emerald-400 border border-emerald-500/40 flex items-center justify-center mx-auto text-4xl animate-bounce">
                    ✓
                </div>
                <div class="space-y-2">
                    <h3 class="text-2xl font-extrabold text-white">Solicitação de Orçamento Registrada!</h3>
                    <p class="text-slate-300 text-sm max-w-lg mx-auto">
                        Seus dados foram salvos com sucesso em nossa base operacional. Para agilizar seu atendimento, você pode iniciar o diálogo diretamente com nosso plantonista agora pelo WhatsApp:
                    </p>
                </div>
                <div>
                    <a id="quote-whatsapp-direct" href="#" target="_blank" class="inline-flex items-center space-x-2 px-8 py-4 rounded-xl bg-[#25D366] hover:bg-[#20ba59] text-white font-extrabold text-sm uppercase tracking-wider shadow-xl shadow-emerald-500/30 transition-transform transform hover:scale-105">
                        <svg class="w-6 h-6 fill-current" viewBox="0 0 24 24">
                            <path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/>
                        </svg>
                        <span>Abrir Detalhes no WhatsApp</span>
                    </a>
                </div>
            </div>

            <!-- Form -->
            <form id="quote-form" action="{{ route('quote.store') }}" method="POST" class="space-y-6">
                @csrf

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div>
                        <label class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-2">Serviço Desejado *</label>
                        <select name="service_type" required class="w-full px-4 py-3 rounded-xl bg-slate-900 border border-slate-700 text-white text-sm focus:border-orange-500 focus:outline-none transition-colors">
                            @foreach($services as $s)
                                <option value="{{ $s->title }}">{{ $s->title }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-2">Segmento / Local</label>
                        <select name="segment" class="w-full px-4 py-3 rounded-xl bg-slate-900 border border-slate-700 text-white text-sm focus:border-orange-500 focus:outline-none transition-colors">
                            <option value="Usina Fotovoltaica / Solar">Usina Fotovoltaica (Solar)</option>
                            <option value="Indústria / Mineração">Indústria / Mineração</option>
                            <option value="Hospital / Clínica Médica">Hospital / Clínica</option>
                            <option value="Condomínio Residencial">Condomínio Residencial</option>
                            <option value="Evento / Show / Exposição">Evento / Show / Feira</option>
                            <option value="Comércio / Varejo">Comércio / Centro Logístico</option>
                            <option value="Outro Segmento">Outro Segmento</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-2">Regime / Escala *</label>
                        <select name="period" class="w-full px-4 py-3 rounded-xl bg-slate-900 border border-slate-700 text-white text-sm focus:border-orange-500 focus:outline-none transition-colors">
                            <option value="24 Horas">24 Horas Ininterrupto (Escala 12x36)</option>
                            <option value="Noturno (12h)">Noturno (12 Horas)</option>
                            <option value="Diurno (12h)">Diurno (12 Horas)</option>
                            <option value="Evento / Pontual">Cobertura Pontual de Evento</option>
                        </select>
                    </div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 pt-2">
                    <div>
                        <label class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-2">Seu Nome *</label>
                        <input type="text" name="name" required placeholder="Nome completo" class="w-full px-4 py-3 rounded-xl bg-slate-900 border border-slate-700 text-white text-sm focus:border-orange-500 focus:outline-none">
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-2">Empresa / Condomínio</label>
                        <input type="text" name="company" placeholder="Razão social ou condomínio" class="w-full px-4 py-3 rounded-xl bg-slate-900 border border-slate-700 text-white text-sm focus:border-orange-500 focus:outline-none">
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-2">Telefone / WhatsApp *</label>
                        <input type="text" name="phone" required placeholder="(37) 99999-9999" class="w-full px-4 py-3 rounded-xl bg-slate-900 border border-slate-700 text-white text-sm focus:border-orange-500 focus:outline-none">
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-2">E-mail Comercial *</label>
                        <input type="email" name="email" required placeholder="seu@email.com" class="w-full px-4 py-3 rounded-xl bg-slate-900 border border-slate-700 text-white text-sm focus:border-orange-500 focus:outline-none">
                    </div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-3 gap-6 pt-2">
                    <div>
                        <label class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-2">Cidade do Posto</label>
                        <input type="text" name="city" value="{{ $company['city'] }}" class="w-full px-4 py-3 rounded-xl bg-slate-900 border border-slate-700 text-white text-sm focus:border-orange-500 focus:outline-none">
                    </div>

                    <div class="sm:col-span-2">
                        <label class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-2">Observações / Detalhes Específicos</label>
                        <input type="text" name="details" placeholder="Quantidade de postos, data de início pretendida ou armamento..." class="w-full px-4 py-3 rounded-xl bg-slate-900 border border-slate-700 text-white text-sm focus:border-orange-500 focus:outline-none">
                    </div>
                </div>

                <div class="p-6 rounded-2xl bg-gradient-to-r from-slate-900 via-orange-950/20 to-slate-900 border border-orange-500/30 flex flex-col sm:flex-row items-center justify-between gap-4 mt-6">
                    <div>
                        <span class="text-xs font-bold text-orange-400 uppercase tracking-wider block">Estimativa de Investimento Mensal</span>
                        <div class="flex items-baseline space-x-2">
                            <span id="calc-estimate-display" class="text-3xl font-black text-white">R$ 5.920,00</span>
                            <span class="text-xs text-slate-400 font-normal">/posto estimado base</span>
                        </div>
                        <span class="text-[11px] text-slate-400 block mt-0.5">*Valor referencial sujeito a alinhamento de escala e vistoria técnica em {{ $company['city'] }}.</span>
                    </div>

                    <button type="submit" class="w-full sm:w-auto px-8 py-4 rounded-xl bg-gradient-to-r from-orange-600 to-amber-500 hover:from-orange-500 hover:to-amber-400 text-white font-black text-sm uppercase tracking-wider shadow-lg shadow-orange-600/30 transition-all duration-300 transform hover:-translate-y-0.5 flex items-center justify-center space-x-2">
                        <span>Receber Proposta Formal</span>
                        <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                        </svg>
                    </button>
                </div>

            </form>

        </div>

    </div>
</section>


<!-- ============================================================
     DIFERENCIAIS ESTRATÉGICOS (3D GLASS CARDS)
     ============================================================ -->
<section id="diferenciais" class="py-20 relative bg-[#07090e]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="text-center max-w-3xl mx-auto space-y-3 mb-16">
            <span class="px-3 py-1 rounded-full bg-orange-500/10 border border-orange-500/30 text-orange-400 text-xs font-bold uppercase tracking-wider">
                🛡️ Pilares Operacionais
            </span>
            <h2 class="text-3xl sm:text-4xl font-black text-white">
                Por que a Atlas é a Escolha Certa em Arcos e Região?
            </h2>
            <p class="text-slate-400 text-xs sm:text-sm">
                Unimos inteligência de segurança corporativa com o zelo genuíno que seu patrimônio merece.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach($differentials as $diff)
            <div class="tilt-card rounded-2xl bg-[#0d121d] border border-slate-800 p-6 space-y-4 shadow-xl flex flex-col justify-between hover:border-orange-500/50 transition-all">
                <div class="space-y-3">
                    <div class="flex items-center justify-between">
                        <div class="w-12 h-12 rounded-xl bg-orange-500/10 border border-orange-500/30 text-orange-400 flex items-center justify-center font-bold text-xl">
                            🛡️
                        </div>
                        <span class="text-xl font-black text-white font-mono">{{ $diff->highlight_number }}</span>
                    </div>

                    <span class="text-[10px] uppercase font-bold text-orange-400 tracking-wider block">{{ $diff->subtitle }}</span>
                    <h3 class="text-lg font-bold text-white">{{ $diff->title }}</h3>
                    <p class="text-xs text-slate-400 leading-relaxed">{{ $diff->description }}</p>
                </div>

                <div class="pt-4 border-t border-slate-800/80 text-[11px] text-slate-400 font-semibold flex items-center">
                    <span class="w-1.5 h-1.5 rounded-full bg-emerald-400 mr-2"></span>
                    {{ $diff->highlight_label }}
                </div>
            </div>
            @endforeach
        </div>

    </div>
</section>


<!-- ============================================================
     GALERIA TÁTICA OFICIAL (DINÂMICA VIA MYSQL)
     ============================================================ -->
<section id="galeria" class="py-20 relative bg-[#090d16] border-t border-slate-800">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="flex flex-col md:flex-row md:items-end justify-between mb-12 gap-4">
            <div>
                <span class="px-3 py-1 rounded-full bg-orange-500/10 border border-orange-500/30 text-orange-400 text-xs font-bold uppercase tracking-wider">
                    📸 Galeria Operacional
                </span>
                <h2 class="text-3xl sm:text-4xl font-black text-white mt-2">
                    Operações em Campo & Sala CFTV
                </h2>
                <p class="text-slate-400 text-xs sm:text-sm mt-1">
                    Conheça nossa estrutura, veículos, uniformização e equipamentos em ação.
                </p>
            </div>
            <div>
                <a href="https://wa.me/{{ $company['phone_raw'] }}?text=Ol%C3%A1!%20Gostaria%20de%20receber%20a%20apresenta%C3%A7%C3%A3o%20completa%20da%20Atlas." target="_blank" class="text-xs font-bold text-orange-400 hover:text-orange-300 flex items-center">
                    <span>Solicitar Apresentação em PDF</span>
                    <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                    </svg>
                </a>
            </div>
        </div>

        <!-- Dynamic Photos Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($gallery as $photo)
            <div class="tilt-card group relative h-72 rounded-2xl overflow-hidden border border-slate-800 shadow-xl">
                <img src="{{ asset($photo->image) }}" alt="{{ $photo->title }}" class="w-full h-full object-cover transform group-hover:scale-108 transition-transform duration-500">
                <div class="absolute inset-0 bg-gradient-to-t from-black/85 via-black/20 to-transparent"></div>
                <div class="absolute bottom-4 left-4 right-4">
                    <span class="text-[10px] font-bold text-orange-400 uppercase tracking-widest block">{{ $photo->category }}</span>
                    <h3 class="text-base font-extrabold text-white">{{ $photo->title }}</h3>
                </div>
            </div>
            @endforeach
        </div>

    </div>
</section>


<!-- ============================================================
     CONTATO & ATENDIMENTO DIRETO EM ARCOS MG
     ============================================================ -->
<section id="contato" class="py-24 relative bg-[#07090e]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12">
            
            <div class="lg:col-span-5 space-y-6">
                <span class="px-3 py-1 rounded-full bg-orange-500/10 border border-orange-500/30 text-orange-400 text-xs font-bold uppercase tracking-wider">
                    📞 Canais de Atendimento
                </span>

                <h2 class="text-3xl sm:text-4xl font-black text-white leading-tight">
                    Fale com Nosso Plantão Tático em {{ $company['city'] }}
                </h2>

                <p class="text-slate-400 text-sm leading-relaxed">
                    Estamos prontos para atender sua solicitação de segurança, consultoria de risco ou visita técnica em qualquer horário do dia ou da noite.
                </p>

                <div class="space-y-4 pt-2">
                    
                    <a href="tel:{{ preg_replace('/[^0-9]/', '', $company['phone']) }}" class="p-4 rounded-2xl bg-slate-900 border border-slate-800 hover:border-orange-500/50 flex items-center space-x-4 transition-colors group">
                        <div class="w-12 h-12 rounded-xl bg-orange-500/10 border border-orange-500/30 text-orange-400 flex items-center justify-center shrink-0 group-hover:bg-orange-500 group-hover:text-white transition-colors">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                            </svg>
                        </div>
                        <div>
                            <span class="text-[10px] uppercase font-bold text-slate-400 tracking-wider block">Central Telefônica Direta</span>
                            <span class="text-lg font-extrabold text-white group-hover:text-orange-400 transition-colors">{{ $company['phone'] }}</span>
                        </div>
                    </a>

                    <a href="https://wa.me/{{ $company['phone_raw'] }}?text=Ol%C3%A1!%20Gostaria%20de%20um%20or%C3%A7amento%20da%20Atlas." target="_blank" class="p-4 rounded-2xl bg-slate-900 border border-slate-800 hover:border-emerald-500/50 flex items-center space-x-4 transition-colors group">
                        <div class="w-12 h-12 rounded-xl bg-emerald-500/10 border border-emerald-500/30 text-emerald-400 flex items-center justify-center shrink-0 group-hover:bg-[#25D366] group-hover:text-white transition-colors">
                            <svg class="w-6 h-6 fill-current" viewBox="0 0 24 24">
                                <path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/>
                            </svg>
                        </div>
                        <div>
                            <span class="text-[10px] uppercase font-bold text-slate-400 tracking-wider block">Plantão WhatsApp 24 Horas</span>
                            <span class="text-lg font-extrabold text-emerald-400">{{ $company['phone'] }}</span>
                        </div>
                    </a>

                    <div class="p-4 rounded-2xl bg-slate-900 border border-slate-800 flex items-center space-x-4">
                        <div class="w-12 h-12 rounded-xl bg-slate-800 text-orange-400 flex items-center justify-center shrink-0">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                        </div>
                        <div>
                            <span class="text-[10px] uppercase font-bold text-slate-400 tracking-wider block">Localização / Sede</span>
                            <span class="text-sm font-bold text-white">{{ $company['city'] }}</span>
                        </div>
                    </div>

                </div>
            </div>

            <div class="lg:col-span-7">
                <div class="p-8 sm:p-10 rounded-3xl bg-[#0c101b] border border-slate-800 shadow-2xl relative">
                    <h3 class="text-2xl font-black text-white mb-2">Envie uma Mensagem</h3>
                    <p class="text-xs text-slate-400 mb-6">Preencha o formulário para receber contato de nossa equipe técnica.</p>

                    <form id="contact-form" action="{{ route('contact.store') }}" method="POST" class="space-y-4">
                        @csrf

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-1.5">Seu Nome *</label>
                                <input type="text" name="name" required placeholder="Como podemos lhe chamar?" class="w-full px-4 py-3 rounded-xl bg-slate-900 border border-slate-700 text-white text-sm focus:border-orange-500 focus:outline-none">
                            </div>
                            <div>
                                <label class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-1.5">Telefone / WhatsApp *</label>
                                <input type="text" name="phone" required placeholder="(37) 99999-9999" class="w-full px-4 py-3 rounded-xl bg-slate-900 border border-slate-700 text-white text-sm focus:border-orange-500 focus:outline-none">
                            </div>
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-1.5">E-mail *</label>
                                <input type="email" name="email" required placeholder="seu@email.com" class="w-full px-4 py-3 rounded-xl bg-slate-900 border border-slate-700 text-white text-sm focus:border-orange-500 focus:outline-none">
                            </div>
                            <div>
                                <label class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-1.5">Serviço de Interesse</label>
                                <select name="service" class="w-full px-4 py-3 rounded-xl bg-slate-900 border border-slate-700 text-white text-sm focus:border-orange-500 focus:outline-none">
                                    @foreach($services as $s)
                                        <option value="{{ $s->title }}">{{ $s->title }}</option>
                                    @endforeach
                                    <option value="Outros Assuntos">Outros Assuntos</option>
                                </select>
                            </div>
                        </div>

                        <div>
                            <label class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-1.5">Mensagem / Demanda *</label>
                            <textarea name="message" rows="4" required placeholder="Descreva brevemente sua necessidade..." class="w-full px-4 py-3 rounded-xl bg-slate-900 border border-slate-700 text-white text-sm focus:border-orange-500 focus:outline-none"></textarea>
                        </div>

                        <button type="submit" class="w-full py-4 rounded-xl bg-gradient-to-r from-orange-600 to-amber-500 hover:from-orange-500 hover:to-amber-400 text-white font-black text-sm uppercase tracking-wider shadow-lg shadow-orange-600/30 transition-all duration-300">
                            Enviar Mensagem para Central Atlas
                        </button>
                    </form>
                </div>
            </div>

        </div>

    </div>
</section>

@endsection
