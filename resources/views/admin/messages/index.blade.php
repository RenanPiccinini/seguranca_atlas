@extends('admin.layouts.app')

@section('title', 'Mensagens de Contato')
@section('page-title', 'Mensagens de Contato')
@section('page-subtitle', 'Mensagens enviadas através do formulário de contato do site')

@section('content')
<div class="space-y-6">

    <!-- Counters Row -->
    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
        
        <a href="{{ route('admin.messages.index') }}" class="p-4 rounded-2xl bg-[#0c101b] border {{ empty($status) ? 'border-orange-500' : 'border-slate-800' }} hover:border-slate-700 transition-colors">
            <span class="text-[11px] font-bold text-slate-400 uppercase tracking-wider block">Total de Mensagens</span>
            <div class="text-2xl font-black text-white mt-1">{{ $counts['total'] }}</div>
        </a>

        <a href="{{ route('admin.messages.index', ['status' => 'nova']) }}" class="p-4 rounded-2xl bg-[#0c101b] border {{ $status === 'nova' ? 'border-orange-500' : 'border-slate-800' }} hover:border-slate-700 transition-colors">
            <span class="text-[11px] font-bold text-emerald-400 uppercase tracking-wider block">Novas / Não Lidas</span>
            <div class="text-2xl font-black text-emerald-400 mt-1">{{ $counts['nova'] }}</div>
        </a>

        <a href="{{ route('admin.messages.index', ['status' => 'lida']) }}" class="p-4 rounded-2xl bg-[#0c101b] border {{ $status === 'lida' ? 'border-orange-500' : 'border-slate-800' }} hover:border-slate-700 transition-colors">
            <span class="text-[11px] font-bold text-sky-400 uppercase tracking-wider block">Lidas</span>
            <div class="text-2xl font-black text-sky-400 mt-1">{{ $counts['lida'] }}</div>
        </a>

        <a href="{{ route('admin.messages.index', ['status' => 'respondida']) }}" class="p-4 rounded-2xl bg-[#0c101b] border {{ $status === 'respondida' ? 'border-orange-500' : 'border-slate-800' }} hover:border-slate-700 transition-colors">
            <span class="text-[11px] font-bold text-purple-400 uppercase tracking-wider block">Respondidas</span>
            <div class="text-2xl font-black text-purple-400 mt-1">{{ $counts['respondida'] }}</div>
        </a>

    </div>

    <!-- Messages Table -->
    <div class="rounded-2xl bg-[#0c101b] border border-slate-800 shadow-2xl overflow-hidden">
        @if($messages->isEmpty())
        <div class="p-12 text-center space-y-3">
            <div class="w-12 h-12 rounded-full bg-slate-800 text-slate-400 flex items-center justify-center mx-auto text-xl">
                💬
            </div>
            <h3 class="text-base font-bold text-white">Nenhuma mensagem encontrada</h3>
            <p class="text-xs text-slate-400 max-w-sm mx-auto">Não há mensagens registradas para os filtros selecionados.</p>
        </div>
        @else
        <div class="overflow-x-auto">
            <table class="w-full text-left text-xs text-slate-300">
                <thead class="bg-slate-900/90 text-[11px] text-slate-400 uppercase tracking-wider border-b border-slate-800">
                    <tr>
                        <th class="py-3.5 px-4">Data</th>
                        <th class="py-3.5 px-4">Remetente</th>
                        <th class="py-3.5 px-4">Serviço / Assunto</th>
                        <th class="py-3.5 px-4">Mensagem</th>
                        <th class="py-3.5 px-4">Status</th>
                        <th class="py-3.5 px-4 text-center">WhatsApp</th>
                        <th class="py-3.5 px-4 text-right">Ações</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-800/60">
                    @foreach($messages as $msg)
                    @php
                        $cleanPhone = preg_replace('/[^0-9]/', '', $msg->phone);
                        if (strlen($cleanPhone) <= 11) $cleanPhone = '55' . $cleanPhone;
                        $replyText = "Olá {$msg->name}! Aqui é da Atlas Segurança e Zeladoria em Arcos MG. Recebemos sua mensagem enviada pelo site.";
                        $waUrl = "https://wa.me/{$cleanPhone}?text=" . rawurlencode($replyText);
                    @endphp
                    <tr class="hover:bg-slate-900/40 transition-colors">
                        
                        <td class="py-3.5 px-4 font-mono text-[11px] text-slate-400">
                            {{ $msg->created_at->format('d/m/Y') }}<br>
                            <span class="text-[10px] text-slate-500">{{ $msg->created_at->format('H:i') }}</span>
                        </td>

                        <td class="py-3.5 px-4">
                            <div class="font-extrabold text-white text-sm">{{ $msg->name }}</div>
                            <div class="text-[11px] text-slate-400">{{ $msg->phone }} • {{ $msg->email }}</div>
                        </td>

                        <td class="py-3.5 px-4">
                            <span class="px-2 py-0.5 rounded bg-orange-500/10 text-orange-400 font-bold text-xs border border-orange-500/30">
                                {{ $msg->service ?? 'Geral' }}
                            </span>
                            @if($msg->subject)
                            <div class="text-[11px] text-slate-300 font-semibold mt-1">{{ $msg->subject }}</div>
                            @endif
                        </td>

                        <td class="py-3.5 px-4 text-slate-300 max-w-sm">
                            <p class="line-clamp-2">{{ $msg->message }}</p>
                        </td>

                        <td class="py-3.5 px-4">
                            <form action="{{ route('admin.messages.status', $msg->id) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <select name="status" onchange="this.form.submit()" class="text-xs font-bold rounded-lg px-2.5 py-1.5 focus:outline-none transition-colors border {{ $msg->status === 'nova' ? 'bg-emerald-500/20 text-emerald-400 border-emerald-500/40' : ($msg->status === 'lida' ? 'bg-sky-500/20 text-sky-400 border-sky-500/40' : 'bg-purple-500/20 text-purple-400 border-purple-500/40') }}">
                                    <option value="nova" {{ $msg->status === 'nova' ? 'selected' : '' }}>🟢 Nova</option>
                                    <option value="lida" {{ $msg->status === 'lida' ? 'selected' : '' }}>👁️ Lida</option>
                                    <option value="respondida" {{ $msg->status === 'respondida' ? 'selected' : '' }}>💬 Respondida</option>
                                </select>
                            </form>
                        </td>

                        <td class="py-3.5 px-4 text-center">
                            <a href="{{ $waUrl }}" target="_blank" class="inline-flex items-center space-x-1.5 px-3 py-1.5 rounded-xl bg-[#25D366] hover:bg-[#20ba59] text-white font-bold text-xs shadow-md shadow-emerald-500/20 transition-all">
                                <span>WhatsApp</span>
                            </a>
                        </td>

                        <td class="py-3.5 px-4 text-right">
                            <form action="{{ route('admin.messages.destroy', $msg->id) }}" method="POST" onsubmit="return confirm('Deseja excluir esta mensagem?');" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="p-2 rounded-lg bg-rose-500/10 hover:bg-rose-500 text-rose-400 hover:text-white transition-colors">
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

        @if($messages->hasPages())
        <div class="p-4 border-t border-slate-800">
            {{ $messages->links() }}
        </div>
        @endif
        @endif
    </div>

</div>
@endsection
