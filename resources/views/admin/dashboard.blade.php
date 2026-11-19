@extends('admin.layouts.app')

@section('title', 'Painel Geral')
@section('page-title', 'Visão Geral das Operações')
@section('page-subtitle', 'Acompanhamento em tempo real de solicitações de orçamento e gestão de conteúdo')

@section('content')
<div class="space-y-8">

    <!-- KPI Metric Cards (100% Responsivo) -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-6">
        
        <!-- 1. Quotes -->
        <a href="{{ route('admin.quotes.index') }}" class="p-5 sm:p-6 rounded-3xl bg-[#0c101b] border border-slate-800 hover:border-orange-500/50 shadow-xl space-y-3 transition-all group">
            <div class="flex items-center justify-between">
                <span class="text-[11px] font-bold text-slate-400 uppercase tracking-wider block">Orçamentos Recebidos</span>
                <span class="w-2.5 h-2.5 rounded-full bg-orange-500 animate-pulse"></span>
            </div>
            <div class="text-3xl font-black text-white group-hover:text-orange-400 transition-colors">{{ $stats['total_quotes'] }}</div>
            <div class="flex items-center space-x-2 text-[11px] flex-wrap gap-y-1">
                <span class="px-2 py-0.5 rounded bg-orange-500/10 text-orange-400 font-bold border border-orange-500/30">
                    {{ $stats['pending_quotes'] }} pendentes
                </span>
                <span class="text-slate-400">• {{ $stats['concluded_quotes'] }} concluídos</span>
            </div>
        </a>

        <!-- 2. Services -->
        <a href="{{ route('admin.services.index') }}" class="p-5 sm:p-6 rounded-3xl bg-[#0c101b] border border-slate-800 hover:border-sky-500/50 shadow-xl space-y-3 transition-all group">
            <div class="flex items-center justify-between">
                <span class="text-[11px] font-bold text-slate-400 uppercase tracking-wider block">Serviços no Site</span>
                <span class="w-2.5 h-2.5 rounded-full bg-sky-400"></span>
            </div>
            <div class="text-3xl font-black text-white group-hover:text-sky-400 transition-colors">{{ $stats['total_services'] }}</div>
            <div class="text-[11px] text-slate-400">
                Portfólio 100% gerenciável
            </div>
        </a>

        <!-- 3. Photos -->
        <a href="{{ route('admin.gallery.index') }}" class="p-5 sm:p-6 rounded-3xl bg-[#0c101b] border border-slate-800 hover:border-purple-500/50 shadow-xl space-y-3 transition-all group">
            <div class="flex items-center justify-between">
                <span class="text-[11px] font-bold text-slate-400 uppercase tracking-wider block">Fotos na Galeria</span>
                <span class="w-2.5 h-2.5 rounded-full bg-purple-400"></span>
            </div>
            <div class="text-3xl font-black text-white group-hover:text-purple-400 transition-colors">{{ $stats['total_photos'] }}</div>
            <div class="text-[11px] text-slate-400">
                Imagens operacionais ativas
            </div>
        </a>

        <!-- 4. Differentials -->
        <a href="{{ route('admin.differentials.index') }}" class="p-5 sm:p-6 rounded-3xl bg-[#0c101b] border border-slate-800 hover:border-amber-500/50 shadow-xl space-y-3 transition-all group">
            <div class="flex items-center justify-between">
                <span class="text-[11px] font-bold text-slate-400 uppercase tracking-wider block">Diferenciais Ativos</span>
                <span class="w-2.5 h-2.5 rounded-full bg-amber-400"></span>
            </div>
            <div class="text-3xl font-black text-white group-hover:text-amber-400 transition-colors">{{ $stats['total_differentials'] }}</div>
            <div class="text-[11px] text-slate-400">
                Qualificações e garantias
            </div>
        </a>

    </div>

    <!-- Quick Action Shortcuts -->
    <div class="p-5 sm:p-6 rounded-3xl bg-[#0c101b] border border-slate-800 flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4">
        <div>
            <h4 class="text-xs font-bold text-white uppercase tracking-wider">Ações Rápidas de Gerenciamento</h4>
            <p class="text-[11px] text-slate-400">Acesse com 1 clique os recursos principais do sistema.</p>
        </div>

        <div class="flex flex-wrap gap-2.5 w-full sm:w-auto">
            <a href="{{ route('admin.quotes.index', ['status' => 'pendente']) }}" class="px-4 py-2 rounded-xl bg-orange-600/20 hover:bg-orange-600 text-orange-400 hover:text-white border border-orange-500/40 text-xs font-bold transition-all">
                Ver Cotações Pendentes
            </a>
            <a href="{{ route('admin.services.create') }}" class="px-4 py-2 rounded-xl bg-slate-800 hover:bg-slate-700 text-white text-xs font-bold transition-all">
                + Novo Serviço
            </a>
            <a href="{{ route('admin.gallery.index') }}" class="px-4 py-2 rounded-xl bg-slate-800 hover:bg-slate-700 text-white text-xs font-bold transition-all">
                + Subir Foto
            </a>
            <a href="{{ route('admin.settings.index') }}" class="px-4 py-2 rounded-xl bg-slate-800 hover:bg-slate-700 text-white text-xs font-bold transition-all">
                Editar Textos & Contatos
            </a>
        </div>
    </div>

    <!-- Recent Quotes Table (Mobile Friendly Card/Table) -->
    <div class="p-5 sm:p-8 rounded-3xl bg-[#0c101b] border border-slate-800 shadow-2xl space-y-4">
        <div class="flex items-center justify-between pb-2 border-b border-slate-800 flex-wrap gap-2">
            <div>
                <h3 class="text-base font-extrabold text-white">Últimas Solicitações de Orçamento</h3>
                <p class="text-xs text-slate-400">Leads gerados no simulador de custos salvos diretamente no MySQL.</p>
            </div>

            <a href="{{ route('admin.quotes.index') }}" class="text-xs font-bold text-orange-400 hover:text-orange-300">
                Ver Todas ({{ $stats['total_quotes'] }}) →
            </a>
        </div>

        @if($recentQuotes->isEmpty())
        <div class="py-8 text-center text-slate-500 text-xs">
            Nenhuma solicitação de orçamento registrada ainda.
        </div>
        @else
        <div class="overflow-x-auto -mx-5 sm:mx-0">
            <div class="inline-block min-w-full align-middle px-5 sm:px-0">
                <table class="min-w-full text-left text-xs text-slate-300">
                    <thead class="bg-slate-900/80 text-[11px] text-slate-400 uppercase border-b border-slate-800">
                        <tr>
                            <th class="py-3 px-4">Data</th>
                            <th class="py-3 px-4">Cliente / Empresa</th>
                            <th class="py-3 px-4">Serviço</th>
                            <th class="py-3 px-4">Local</th>
                            <th class="py-3 px-4">Status</th>
                            <th class="py-3 px-4 text-center">WhatsApp Direto</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-800/60">
                        @foreach($recentQuotes as $quote)
                        @php
                            $rawPhone = preg_replace('/[^0-9]/', '', $quote->phone);
                            if(strlen($rawPhone) <= 11) $rawPhone = '55' . $rawPhone;
                            $msgText = "Olá {$quote->name}! Aqui é da Atlas Segurança e Zeladoria em Arcos MG. Recebemos sua solicitação de orçamento para {$quote->service_type}.";
                            $waUrl = "https://wa.me/{$rawPhone}?text=" . rawurlencode($msgText);
                        @endphp
                        <tr class="hover:bg-slate-900/40 transition-colors">
                            <td class="py-3 px-4 font-mono text-[11px] text-slate-400 whitespace-nowrap">{{ $quote->created_at->format('d/m/Y H:i') }}</td>
                            <td class="py-3 px-4 min-w-[180px]">
                                <span class="font-bold text-white text-sm block">{{ $quote->name }}</span>
                                <span class="text-[11px] text-slate-400">{{ $quote->company ?? 'Pessoa Física' }} • {{ $quote->phone }}</span>
                            </td>
                            <td class="py-3 px-4 min-w-[140px]">
                                <span class="text-orange-400 font-semibold">{{ $quote->service_type }}</span>
                                <div class="text-[10px] text-slate-400">{{ $quote->period ?? '24 Horas' }}</div>
                            </td>
                            <td class="py-3 px-4 whitespace-nowrap">{{ $quote->city ?? 'Arcos - MG' }}</td>
                            <td class="py-3 px-4 whitespace-nowrap">
                                <span class="px-2.5 py-1 rounded-full text-[10px] font-bold {{ $quote->status === 'pendente' ? 'bg-orange-500/20 text-orange-400 border border-orange-500/30' : ($quote->status === 'lida' ? 'bg-sky-500/20 text-sky-400 border border-sky-500/30' : 'bg-emerald-500/20 text-emerald-400 border border-emerald-500/30') }}">
                                    {{ ucfirst($quote->status) }}
                                </span>
                            </td>
                            <td class="py-3 px-4 text-center whitespace-nowrap">
                                <a href="{{ $waUrl }}" target="_blank" class="inline-flex items-center space-x-1.5 px-3 py-1.5 rounded-xl bg-[#25D366] hover:bg-[#20ba59] text-white text-xs font-bold transition-transform transform hover:scale-105">
                                    <span>Chamar</span>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        @endif
    </div>

</div>
@endsection
