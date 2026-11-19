@extends('layouts.app')

@section('title', 'Painel Operacional | Atlas Segurança e Zeladoria')

@section('content')
<div class="py-12 bg-[#07090e] min-h-screen">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-10">
        
        <!-- Header -->
        <div class="flex flex-col sm:flex-row sm:items-center justify-between pb-6 border-b border-slate-800 gap-4">
            <div>
                <div class="flex items-center space-x-2">
                    <span class="w-2.5 h-2.5 rounded-full bg-emerald-400 animate-pulse"></span>
                    <span class="text-xs font-bold text-orange-400 uppercase tracking-widest">Base de Dados MySQL Conectada</span>
                </div>
                <h1 class="text-3xl font-black text-white mt-1">Painel Operacional de Leads e Propostas</h1>
                <p class="text-xs text-slate-400">Atlas Segurança e Zeladoria LTDA • Arcos - MG</p>
            </div>

            <div class="flex items-center space-x-3">
                <a href="{{ route('home') }}" class="px-4 py-2 rounded-xl bg-slate-800 hover:bg-slate-700 text-xs font-semibold text-white border border-slate-700 transition-colors">
                    ← Voltar ao Site
                </a>
                <a href="https://wa.me/5537999673426" target="_blank" class="px-4 py-2 rounded-xl bg-emerald-600 hover:bg-emerald-500 text-xs font-bold text-white transition-colors">
                    WhatsApp Central
                </a>
            </div>
        </div>

        @if(session('success'))
        <div class="p-4 rounded-xl bg-emerald-500/10 border border-emerald-500/30 text-emerald-400 text-xs font-semibold flex items-center justify-between">
            <span>{{ session('success') }}</span>
        </div>
        @endif

        <!-- Metric Counter Cards -->
        <div class="grid grid-cols-2 lg:grid-cols-4 gap-6">
            
            <div class="p-6 rounded-2xl bg-[#0c101b] border border-slate-800 space-y-2">
                <span class="text-[11px] font-bold text-slate-400 uppercase tracking-wider block">Orçamentos Registrados</span>
                <div class="text-3xl font-black text-white">{{ $stats['total_quotes'] }}</div>
                <span class="text-[10px] text-orange-400 font-semibold">{{ $stats['pending_quotes'] }} pendentes de retorno</span>
            </div>

            <div class="p-6 rounded-2xl bg-[#0c101b] border border-slate-800 space-y-2">
                <span class="text-[11px] font-bold text-slate-400 uppercase tracking-wider block">Mensagens de Contato</span>
                <div class="text-3xl font-black text-white">{{ $stats['total_contacts'] }}</div>
                <span class="text-[10px] text-emerald-400 font-semibold">{{ $stats['unread_contacts'] }} novas mensagens</span>
            </div>

            <div class="p-6 rounded-2xl bg-[#0c101b] border border-slate-800 space-y-2">
                <span class="text-[11px] font-bold text-slate-400 uppercase tracking-wider block">Serviços Ativos</span>
                <div class="text-3xl font-black text-white">{{ $stats['total_services'] }}</div>
                <span class="text-[10px] text-slate-400 font-semibold">Portfólio cadastrado</span>
            </div>

            <div class="p-6 rounded-2xl bg-[#0c101b] border border-slate-800 space-y-2">
                <span class="text-[11px] font-bold text-slate-400 uppercase tracking-wider block">Sede Operacional</span>
                <div class="text-2xl font-black text-orange-400">Arcos - MG</div>
                <span class="text-[10px] text-slate-400 font-semibold">Plantão (37) 99967-3426</span>
            </div>

        </div>

        <!-- Recent Quote Requests Table -->
        <div class="p-6 sm:p-8 rounded-3xl bg-[#0c101b] border border-slate-800 space-y-6">
            <div class="flex items-center justify-between">
                <div>
                    <h3 class="text-lg font-bold text-white">Solicitações de Orçamento Recentes</h3>
                    <p class="text-xs text-slate-400">Propostas originadas via simulador online registradas no MySQL.</p>
                </div>
                <span class="text-xs font-semibold px-2.5 py-1 rounded bg-slate-800 text-slate-300">
                    {{ $quotes->count() }} exibidas
                </span>
            </div>

            @if($quotes->count() === 0)
            <div class="p-8 text-center text-slate-500 text-xs border border-dashed border-slate-800 rounded-2xl">
                Nenhum orçamento solicitado ainda. Use o simulador no site para testar a gravação no banco de dados.
            </div>
            @else
            <div class="overflow-x-auto">
                <table class="w-full text-left text-xs text-slate-300">
                    <thead class="bg-slate-900/80 text-[11px] text-slate-400 uppercase border-b border-slate-800">
                        <tr>
                            <th class="py-3 px-4">Data</th>
                            <th class="py-3 px-4">Cliente / Empresa</th>
                            <th class="py-3 px-4">Serviço / Escala</th>
                            <th class="py-3 px-4">Cidade</th>
                            <th class="py-3 px-4">Estimativa</th>
                            <th class="py-3 px-4">Status</th>
                            <th class="py-3 px-4 text-right">Ações</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-800/60">
                        @foreach($quotes as $quote)
                        <tr class="hover:bg-slate-900/40 transition-colors">
                            <td class="py-3 px-4 font-mono text-[11px] text-slate-400">
                                {{ $quote->created_at->format('d/m/Y H:i') }}
                            </td>
                            <td class="py-3 px-4">
                                <div class="font-bold text-white">{{ $quote->name }}</div>
                                <div class="text-[11px] text-slate-400">{{ $quote->company ?? 'Pessoa Física' }} • {{ $quote->phone }}</div>
                            </td>
                            <td class="py-3 px-4">
                                <span class="text-orange-400 font-semibold">{{ $quote->service_type }}</span>
                                <div class="text-[10px] text-slate-400">{{ $quote->period ?? '24h' }} ({{ $quote->segment ?? 'Geral' }})</div>
                            </td>
                            <td class="py-3 px-4 font-semibold text-slate-300">
                                {{ $quote->city ?? 'Arcos - MG' }}
                            </td>
                            <td class="py-3 px-4 font-bold text-emerald-400">
                                @if($quote->estimated_budget)
                                    R$ {{ number_format($quote->estimated_budget, 2, ',', '.') }}
                                @else
                                    Sob Consulta
                                @endif
                            </td>
                            <td class="py-3 px-4">
                                <form action="{{ route('admin.quote.update', $quote->id) }}" method="POST" class="inline">
                                    @csrf
                                    @method('PATCH')
                                    <select name="status" onchange="this.form.submit()" class="bg-slate-900 border border-slate-700 text-[11px] rounded px-2 py-1 text-slate-200">
                                        <option value="pendente" {{ $quote->status == 'pendente' ? 'selected' : '' }}>Pendente</option>
                                        <option value="analisado" {{ $quote->status == 'analisado' ? 'selected' : '' }}>Analisado</option>
                                        <option value="proposta_enviada" {{ $quote->status == 'proposta_enviada' ? 'selected' : '' }}>Proposta Enviada</option>
                                        <option value="fechado" {{ $quote->status == 'fechado' ? 'selected' : '' }}>Fechado</option>
                                    </select>
                                </form>
                            </td>
                            <td class="py-3 px-4 text-right">
                                @php
                                    $cleanPhone = preg_replace('/[^0-9]/', '', $quote->phone);
                                    if(strlen($cleanPhone) <= 11) $cleanPhone = '55' . $cleanPhone;
                                @endphp
                                <a href="https://wa.me/{{ $cleanPhone }}?text=Ol%C3%A1%20{{ urlencode($quote->name) }},%20aqui%20%C3%A9%20da%20Atlas%20Seguran%C3%A7a.%20Recebemos%20sua%20solicita%C3%A7%C3%A3o%20de%20or%C3%A7amento." target="_blank" class="px-2.5 py-1 rounded bg-emerald-600/20 hover:bg-emerald-600 text-emerald-400 hover:text-white border border-emerald-500/40 text-[11px] font-bold transition-all">
                                    WhatsApp
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @endif
        </div>

        <!-- Recent Contact Messages Table -->
        <div class="p-6 sm:p-8 rounded-3xl bg-[#0c101b] border border-slate-800 space-y-6">
            <div class="flex items-center justify-between">
                <div>
                    <h3 class="text-lg font-bold text-white">Mensagens do Formulário de Contato</h3>
                    <p class="text-xs text-slate-400">Leads e dúvidas diretas enviadas através do site.</p>
                </div>
                <span class="text-xs font-semibold px-2.5 py-1 rounded bg-slate-800 text-slate-300">
                    {{ $contacts->count() }} mensagens
                </span>
            </div>

            @if($contacts->count() === 0)
            <div class="p-8 text-center text-slate-500 text-xs border border-dashed border-slate-800 rounded-2xl">
                Nenhuma mensagem de contato recebida ainda.
            </div>
            @else
            <div class="overflow-x-auto">
                <table class="w-full text-left text-xs text-slate-300">
                    <thead class="bg-slate-900/80 text-[11px] text-slate-400 uppercase border-b border-slate-800">
                        <tr>
                            <th class="py-3 px-4">Data</th>
                            <th class="py-3 px-4">Remetente</th>
                            <th class="py-3 px-4">Assunto / Serviço</th>
                            <th class="py-3 px-4">Mensagem</th>
                            <th class="py-3 px-4">Status</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-800/60">
                        @foreach($contacts as $msg)
                        <tr class="hover:bg-slate-900/40 transition-colors">
                            <td class="py-3 px-4 font-mono text-[11px] text-slate-400">
                                {{ $msg->created_at->format('d/m/Y H:i') }}
                            </td>
                            <td class="py-3 px-4">
                                <div class="font-bold text-white">{{ $msg->name }}</div>
                                <div class="text-[11px] text-slate-400">{{ $msg->email }} • {{ $msg->phone }}</div>
                            </td>
                            <td class="py-3 px-4">
                                <span class="text-orange-400 font-semibold">{{ $msg->service ?? 'Geral' }}</span>
                            </td>
                            <td class="py-3 px-4 text-slate-300 max-w-xs truncate">
                                {{ $msg->message }}
                            </td>
                            <td class="py-3 px-4">
                                <form action="{{ route('admin.contact.update', $msg->id) }}" method="POST" class="inline">
                                    @csrf
                                    @method('PATCH')
                                    <select name="status" onchange="this.form.submit()" class="bg-slate-900 border border-slate-700 text-[11px] rounded px-2 py-1 text-slate-200">
                                        <option value="nova" {{ $msg->status == 'nova' ? 'selected' : '' }}>Nova</option>
                                        <option value="em_atendimento" {{ $msg->status == 'em_atendimento' ? 'selected' : '' }}>Em Atendimento</option>
                                        <option value="respondida" {{ $msg->status == 'respondida' ? 'selected' : '' }}>Respondida</option>
                                    </select>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @endif
        </div>

    </div>
</div>
@endsection
