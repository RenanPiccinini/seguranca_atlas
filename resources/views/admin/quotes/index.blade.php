@extends('admin.layouts.app')

@section('title', 'Solicitações de Orçamento')
@section('page-title', 'Solicitações de Orçamento & Leads')
@section('page-subtitle', 'Gerencie as propostas geradas no simulador e acione os clientes diretamente no WhatsApp')

@section('content')
<div class="space-y-6">

    <!-- Counters Row -->
    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
        
        <a href="{{ route('admin.quotes.index') }}" class="p-4 rounded-2xl bg-[#0c101b] border {{ empty($status) ? 'border-orange-500' : 'border-slate-800' }} hover:border-slate-700 transition-colors">
            <span class="text-[11px] font-bold text-slate-400 uppercase tracking-wider block">Total de Propostas</span>
            <div class="text-2xl font-black text-white mt-1">{{ $counts['total'] }}</div>
        </a>

        <a href="{{ route('admin.quotes.index', ['status' => 'pendente']) }}" class="p-4 rounded-2xl bg-[#0c101b] border {{ $status === 'pendente' ? 'border-orange-500' : 'border-slate-800' }} hover:border-slate-700 transition-colors">
            <span class="text-[11px] font-bold text-orange-400 uppercase tracking-wider block">Pendentes de Retorno</span>
            <div class="text-2xl font-black text-orange-400 mt-1">{{ $counts['pendente'] }}</div>
        </a>

        <a href="{{ route('admin.quotes.index', ['status' => 'lida']) }}" class="p-4 rounded-2xl bg-[#0c101b] border {{ $status === 'lida' ? 'border-orange-500' : 'border-slate-800' }} hover:border-slate-700 transition-colors">
            <span class="text-[11px] font-bold text-sky-400 uppercase tracking-wider block">Lidas / Em Contato</span>
            <div class="text-2xl font-black text-sky-400 mt-1">{{ $counts['lida'] }}</div>
        </a>

        <a href="{{ route('admin.quotes.index', ['status' => 'concluida']) }}" class="p-4 rounded-2xl bg-[#0c101b] border {{ $status === 'concluida' ? 'border-orange-500' : 'border-slate-800' }} hover:border-slate-700 transition-colors">
            <span class="text-[11px] font-bold text-emerald-400 uppercase tracking-wider block">Concluídas / Fechadas</span>
            <div class="text-2xl font-black text-emerald-400 mt-1">{{ $counts['concluida'] }}</div>
        </a>

    </div>

    <!-- Filter & Search Toolbar -->
    <div class="flex flex-col sm:flex-row items-center justify-between gap-4 p-4 rounded-2xl bg-[#0c101b] border border-slate-800">
        <!-- Filter Tabs -->
        <div class="flex flex-wrap items-center gap-2">
            <a href="{{ route('admin.quotes.index') }}" class="px-3 py-1.5 rounded-xl text-xs font-bold transition-colors {{ empty($status) ? 'bg-orange-600 text-white' : 'bg-slate-800 text-slate-300 hover:text-white' }}">
                Todas ({{ $counts['total'] }})
            </a>
            <a href="{{ route('admin.quotes.index', ['status' => 'pendente']) }}" class="px-3 py-1.5 rounded-xl text-xs font-bold transition-colors {{ $status === 'pendente' ? 'bg-orange-600 text-white' : 'bg-slate-800 text-slate-300 hover:text-white' }}">
                Pendentes ({{ $counts['pendente'] }})
            </a>
            <a href="{{ route('admin.quotes.index', ['status' => 'lida']) }}" class="px-3 py-1.5 rounded-xl text-xs font-bold transition-colors {{ $status === 'lida' ? 'bg-orange-600 text-white' : 'bg-slate-800 text-slate-300 hover:text-white' }}">
                Lidas ({{ $counts['lida'] }})
            </a>
            <a href="{{ route('admin.quotes.index', ['status' => 'concluida']) }}" class="px-3 py-1.5 rounded-xl text-xs font-bold transition-colors {{ $status === 'concluida' ? 'bg-orange-600 text-white' : 'bg-slate-800 text-slate-300 hover:text-white' }}">
                Concluídas ({{ $counts['concluida'] }})
            </a>
        </div>

        <!-- Search Bar -->
        <form method="GET" action="{{ route('admin.quotes.index') }}" class="flex items-center space-x-2 w-full sm:w-auto">
            @if($status)
                <input type="hidden" name="status" value="{{ $status }}">
            @endif
            <input type="text" name="search" value="{{ $search ?? '' }}" placeholder="Buscar por cliente, empresa ou fone..." class="px-3.5 py-2 rounded-xl bg-slate-900 border border-slate-700 text-white text-xs focus:border-orange-500 focus:outline-none w-full sm:w-64">
            <button type="submit" class="px-4 py-2 rounded-xl bg-slate-800 hover:bg-slate-700 text-white text-xs font-bold transition-colors">
                Buscar
            </button>
        </form>
    </div>

    <!-- Quotes List Table -->
    <div class="rounded-2xl bg-[#0c101b] border border-slate-800 shadow-2xl overflow-hidden">
        @if($quotes->isEmpty())
        <div class="p-12 text-center space-y-3">
            <div class="w-12 h-12 rounded-full bg-slate-800 text-slate-400 flex items-center justify-center mx-auto text-xl">
                📋
            </div>
            <h3 class="text-base font-bold text-white">Nenhuma solicitação encontrada</h3>
            <p class="text-xs text-slate-400 max-w-sm mx-auto">Não há solicitações registradas com os filtros selecionados.</p>
        </div>
        @else
        <div class="overflow-x-auto">
            <table class="w-full text-left text-xs text-slate-300">
                <thead class="bg-slate-900/90 text-[11px] text-slate-400 uppercase tracking-wider border-b border-slate-800">
                    <tr>
                        <th class="py-3.5 px-4">Data / Hora</th>
                        <th class="py-3.5 px-4">Cliente / Contato</th>
                        <th class="py-3.5 px-4">Serviço / Detalhes</th>
                        <th class="py-3.5 px-4">Local / Estimativa</th>
                        <th class="py-3.5 px-4">Status</th>
                        <th class="py-3.5 px-4 text-center">Atendimento WhatsApp</th>
                        <th class="py-3.5 px-4 text-right">Ações</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-800/60">
                    @foreach($quotes as $quote)
                    @php
                        // Clean phone for WhatsApp
                        $rawPhone = preg_replace('/[^0-9]/', '', $quote->phone);
                        if (strlen($rawPhone) <= 11) {
                            $rawPhone = '55' . $rawPhone;
                        }
                        $msgText = "Olá {$quote->name}! Aqui é da Atlas Segurança e Zeladoria em Arcos MG.\n\nRecebemos sua solicitação de proposta para o serviço de *{$quote->service_type}* ({$quote->period}).\nEstamos à disposição para alinhar os detalhes operacionais e agendar uma vistoria técnica!";
                        $waUrl = "https://wa.me/{$rawPhone}?text=" . rawurlencode($msgText);
                    @endphp
                    <tr class="hover:bg-slate-900/40 transition-colors">
                        
                        <!-- Date -->
                        <td class="py-3.5 px-4 font-mono text-[11px] text-slate-400">
                            {{ $quote->created_at->format('d/m/Y') }}<br>
                            <span class="text-[10px] text-slate-500">{{ $quote->created_at->format('H:i') }}</span>
                        </td>

                        <!-- Client -->
                        <td class="py-3.5 px-4">
                            <div class="font-extrabold text-white text-sm">{{ $quote->name }}</div>
                            @if($quote->company)
                                <div class="text-xs text-orange-400 font-semibold">{{ $quote->company }}</div>
                            @endif
                            <div class="text-[11px] text-slate-400 mt-0.5">{{ $quote->phone }} • {{ $quote->email }}</div>
                        </td>

                        <!-- Service Details -->
                        <td class="py-3.5 px-4">
                            <span class="inline-block px-2 py-0.5 rounded bg-orange-500/10 text-orange-400 font-bold text-xs border border-orange-500/30">
                                {{ $quote->service_type }}
                            </span>
                            <div class="text-[11px] text-slate-300 mt-1 font-semibold">
                                {{ $quote->period ?? '24 Horas' }} • {{ $quote->segment ?? 'Geral' }}
                            </div>
                            @if($quote->details)
                            <p class="text-[11px] text-slate-400 mt-1 italic max-w-xs truncate" title="{{ $quote->details }}">
                                "{{ $quote->details }}"
                            </p>
                            @endif
                        </td>

                        <!-- City & Value -->
                        <td class="py-3.5 px-4">
                            <div class="text-white font-semibold">{{ $quote->city ?? 'Arcos - MG' }}</div>
                            <div class="text-xs font-black text-emerald-400 mt-0.5">
                                @if($quote->estimated_budget)
                                    R$ {{ number_format($quote->estimated_budget, 2, ',', '.') }}
                                @else
                                    Sob Consulta
                                @endif
                            </div>
                        </td>

                        <!-- Status Badge & Form -->
                        <td class="py-3.5 px-4">
                            <form action="{{ route('admin.quotes.status', $quote->id) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <select name="status" onchange="this.form.submit()" class="text-xs font-bold rounded-lg px-2.5 py-1.5 focus:outline-none transition-colors border {{ $quote->status === 'pendente' ? 'bg-orange-500/20 text-orange-400 border-orange-500/40' : ($quote->status === 'lida' ? 'bg-sky-500/20 text-sky-400 border-sky-500/40' : 'bg-emerald-500/20 text-emerald-400 border-emerald-500/40') }}">
                                    <option value="pendente" {{ $quote->status === 'pendente' ? 'selected' : '' }}>⏳ Pendente</option>
                                    <option value="lida" {{ $quote->status === 'lida' ? 'selected' : '' }}>👁️ Lida / Em Análise</option>
                                    <option value="concluida" {{ $quote->status === 'concluida' ? 'selected' : '' }}>✅ Concluída</option>
                                </select>
                            </form>
                        </td>

                        <!-- WhatsApp Action Button -->
                        <td class="py-3.5 px-4 text-center">
                            <a href="{{ $waUrl }}" target="_blank" class="inline-flex items-center space-x-1.5 px-3.5 py-2 rounded-xl bg-[#25D366] hover:bg-[#20ba59] text-white font-bold text-xs shadow-md shadow-emerald-500/20 transition-all transform hover:scale-105">
                                <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24">
                                    <path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/>
                                </svg>
                                <span>Abrir WhatsApp</span>
                            </a>
                        </td>

                        <!-- Delete / Actions -->
                        <td class="py-3.5 px-4 text-right">
                            <form action="{{ route('admin.quotes.destroy', $quote->id) }}" method="POST" onsubmit="return confirm('Deseja realmente excluir esta solicitação de {{ $quote->name }}?');" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="p-2 rounded-lg bg-rose-500/10 hover:bg-rose-500 text-rose-400 hover:text-white transition-colors" title="Excluir">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                    </svg>
                                </button>
                            </form>
                        </td>

                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        @if($quotes->hasPages())
        <div class="p-4 border-t border-slate-800">
            {{ $quotes->links() }}
        </div>
        @endif
        @endif
    </div>

</div>
@endsection
