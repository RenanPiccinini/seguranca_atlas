@extends('admin.layouts.app')

@section('title', 'Diferenciais Operacionais')
@section('page-title', 'Diferenciais & Pilares do Site')
@section('page-subtitle', 'Controle os cards de diferenciais e métricas de destaque que aparecem na página principal')

@section('content')
<div class="space-y-8">

    <!-- Add New Form -->
    <div class="p-6 sm:p-8 rounded-3xl bg-[#0c101b] border border-slate-800 shadow-2xl">
        <h3 class="text-base font-extrabold text-white mb-4 flex items-center">
            <span class="w-2.5 h-2.5 rounded-full bg-orange-500 mr-2"></span>
            Adicionar Novo Diferencial
        </h3>

        <form action="{{ route('admin.differentials.store') }}" method="POST" class="space-y-4">
            @csrf

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                <div>
                    <label class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-2">Título Principal *</label>
                    <input type="text" name="title" required placeholder="Ex: Monitoramento 24h" class="w-full px-4 py-2.5 rounded-xl bg-slate-900 border border-slate-700 text-white text-xs focus:border-orange-500 focus:outline-none">
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-2">Subtítulo / Categoria</label>
                    <input type="text" name="subtitle" placeholder="Ex: Tecnologia Operacional" class="w-full px-4 py-2.5 rounded-xl bg-slate-900 border border-slate-700 text-white text-xs focus:border-orange-500 focus:outline-none">
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-2">Destaque Numérico (ex: 24/7, 100%, < 8min)</label>
                    <input type="text" name="highlight_number" placeholder="Ex: 100%" class="w-full px-4 py-2.5 rounded-xl bg-slate-900 border border-slate-700 text-white text-xs focus:border-orange-500 focus:outline-none">
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                <div class="sm:col-span-2">
                    <label class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-2">Texto Explicativo *</label>
                    <input type="text" name="description" required placeholder="Ex: Rondas com bastão eletrônico georreferenciado e supervisão contínua..." class="w-full px-4 py-2.5 rounded-xl bg-slate-900 border border-slate-700 text-white text-xs focus:border-orange-500 focus:outline-none">
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-2">Rótulo do Destaque</label>
                    <input type="text" name="highlight_label" placeholder="Ex: Eficácia Comprovada" class="w-full px-4 py-2.5 rounded-xl bg-slate-900 border border-slate-700 text-white text-xs focus:border-orange-500 focus:outline-none">
                </div>
            </div>

            <div class="pt-2 flex justify-end">
                <button type="submit" class="px-6 py-2.5 rounded-xl bg-orange-600 hover:bg-orange-500 text-white font-bold text-xs uppercase tracking-wider shadow-lg shadow-orange-600/20 transition-all">
                    Adicionar Diferencial
                </button>
            </div>
        </form>
    </div>

    <!-- Differentials List -->
    <div class="space-y-4">
        <h3 class="text-sm font-bold text-white uppercase tracking-wider">Diferenciais Ativos no Site ({{ $differentials->count() }})</h3>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            @foreach($differentials as $diff)
            <div class="p-6 rounded-2xl bg-[#0c101b] border border-slate-800 shadow-xl flex flex-col justify-between space-y-4">
                <div class="space-y-2">
                    <div class="flex items-center justify-between">
                        <span class="text-[10px] font-bold text-orange-400 uppercase tracking-wider">{{ $diff->subtitle ?? 'Diferencial' }}</span>
                        <span class="text-xl font-black text-white font-mono">{{ $diff->highlight_number }}</span>
                    </div>

                    <h4 class="text-base font-bold text-white">{{ $diff->title }}</h4>
                    <p class="text-xs text-slate-400 leading-relaxed">{{ $diff->description }}</p>
                    <div class="text-[11px] text-slate-500 font-semibold pt-1">
                        • Rótulo: <span class="text-slate-300">{{ $diff->highlight_label }}</span>
                    </div>
                </div>

                <div class="pt-4 border-t border-slate-800 flex justify-end">
                    <form action="{{ route('admin.differentials.destroy', $diff->id) }}" method="POST" onsubmit="return confirm('Deseja excluir este diferencial?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="px-3 py-1.5 rounded-lg bg-rose-500/10 hover:bg-rose-500 text-rose-400 hover:text-white text-xs font-semibold transition-colors">
                            Excluir
                        </button>
                    </form>
                </div>
            </div>
            @endforeach
        </div>
    </div>

</div>
@endsection
