@extends('layouts.app')

@section('title', $service->title . ' em Arcos MG | Atlas Segurança e Zeladoria')

@section('content')
<div class="py-16 bg-[#07090e]">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 space-y-12">
        
        <!-- Breadcrumb & Header -->
        <div class="space-y-4">
            <a href="{{ route('home') }}#servicos" class="inline-flex items-center text-xs font-bold text-orange-400 hover:text-orange-300 transition-colors">
                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
                Voltar a todos os serviços
            </a>
            
            <div class="flex flex-wrap items-center gap-2">
                <span class="px-2.5 py-0.5 rounded bg-orange-500/20 text-orange-400 font-bold text-xs uppercase border border-orange-500/30">
                    {{ $service->badge ?? 'Atlas Especializado' }}
                </span>
                <span class="text-xs text-slate-400">Atendimento em Arcos MG e Centro-Oeste</span>
            </div>

            <h1 class="text-4xl sm:text-5xl font-black text-white">{{ $service->title }}</h1>
        </div>

        <!-- Main Content Grid -->
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-10">
            
            <!-- Left: Image & Description (8 cols) -->
            <div class="lg:col-span-8 space-y-8">
                <div class="rounded-3xl overflow-hidden border border-slate-800 shadow-2xl relative h-96 bg-slate-900">
                    <img src="{{ asset($service->image) }}" alt="{{ $service->title }}" class="w-full h-full object-cover">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-transparent to-transparent"></div>
                </div>

                <div class="p-8 rounded-3xl bg-[#0c101b] border border-slate-800 space-y-6">
                    <h3 class="text-xl font-bold text-white">Sobre a Operação</h3>
                    <p class="text-slate-300 leading-relaxed text-sm sm:text-base">
                        {{ $service->full_description }}
                    </p>

                    @if(!empty($service->features))
                    <div class="pt-4 border-t border-slate-800">
                        <h4 class="text-xs font-bold text-orange-400 uppercase tracking-widest mb-4">Procedimentos & Diferenciais Técnicos</h4>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                            @foreach($service->features as $item)
                            <div class="flex items-start space-x-2 text-xs text-slate-300">
                                <svg class="w-4 h-4 text-emerald-400 shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                                <span>{{ $item }}</span>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    @endif

                    @if(!empty($service->benefits))
                    <div class="pt-4 border-t border-slate-800">
                        <h4 class="text-xs font-bold text-emerald-400 uppercase tracking-widest mb-4">Vantagens para Sua Organização</h4>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                            @foreach($service->benefits as $benefit)
                            <div class="flex items-start space-x-2 text-xs text-slate-300">
                                <span class="text-orange-500 font-bold">★</span>
                                <span>{{ $benefit }}</span>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    @endif
                </div>
            </div>

            <!-- Right: Fast Quote & Direct Contact Card (4 cols) -->
            <div class="lg:col-span-4 space-y-6">
                
                <div class="p-6 rounded-3xl bg-[#0e1322] border border-orange-500/30 shadow-2xl space-y-5">
                    <div class="flex items-center space-x-3">
                        <img src="{{ asset('images/atlas/emblem.png') }}" class="w-10 h-10 object-contain" alt="Atlas Emblem">
                        <div>
                            <span class="text-xs font-bold text-orange-400 uppercase tracking-wider block">Plantão Tático 24h</span>
                            <span class="text-sm font-extrabold text-white">Solicitar Cotação</span>
                        </div>
                    </div>

                    <p class="text-xs text-slate-400 leading-relaxed">
                        Atendimento imediato em Arcos MG com elaboração de plano operacional em até 24 horas úteis.
                    </p>

                    <div class="space-y-3 pt-2">
                        <a href="https://wa.me/5537999673426?text=Ol%C3%A1!%20Gostaria%20de%20um%20or%C3%A7amento%20para%20o%20servi%C3%A7o%20de%20{{ urlencode($service->title) }}." target="_blank" class="w-full py-3.5 rounded-xl bg-emerald-600 hover:bg-emerald-500 text-white font-bold text-xs uppercase tracking-wider flex items-center justify-center space-x-2 shadow-lg shadow-emerald-600/30 transition-all">
                            <span>Chamar no WhatsApp</span>
                        </a>

                        <a href="tel:37999673426" class="w-full py-3 rounded-xl bg-slate-800 hover:bg-slate-700 text-white font-semibold text-xs flex items-center justify-center space-x-2 border border-slate-700 transition-colors">
                            <span>Ligar: (37) 99967-3426</span>
                        </a>

                        <a href="{{ route('home') }}#orcamento" class="w-full py-3 rounded-xl bg-orange-600/20 hover:bg-orange-600 text-orange-400 hover:text-white font-bold text-xs flex items-center justify-center border border-orange-500/40 transition-colors">
                            <span>Simular Custos Online</span>
                        </a>
                    </div>
                </div>

                <!-- Related Services -->
                @if($relatedServices->count())
                <div class="p-6 rounded-3xl bg-[#0c101b] border border-slate-800 space-y-4">
                    <h4 class="text-xs font-bold text-white uppercase tracking-wider">Outros Serviços Atlas</h4>
                    <div class="space-y-3">
                        @foreach($relatedServices as $rel)
                        <a href="{{ route('service.detail', $rel->slug) }}" class="flex items-center space-x-3 p-2.5 rounded-xl hover:bg-slate-800/60 transition-colors group">
                            <img src="{{ asset($rel->image) }}" class="w-12 h-12 rounded-lg object-cover" alt="{{ $rel->title }}">
                            <div>
                                <span class="text-xs font-bold text-white group-hover:text-orange-400 transition-colors block">{{ $rel->title }}</span>
                                <span class="text-[10px] text-slate-400">Ver detalhes →</span>
                            </div>
                        </a>
                        @endforeach
                    </div>
                </div>
                @endif

            </div>

        </div>

    </div>
</div>
@endsection
