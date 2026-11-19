@extends('admin.layouts.app')

@section('title', 'Gerenciar Serviços')
@section('page-title', 'Gerenciar Serviços do Site')
@section('page-subtitle', 'Adicione, edite ou remova os serviços exibidos na página inicial e nas páginas detalhadas')

@section('content')
<div class="space-y-6">

    <!-- Top Action Toolbar -->
    <div class="flex items-center justify-between p-4 rounded-2xl bg-[#0c101b] border border-slate-800">
        <div>
            <h3 class="text-sm font-bold text-white">Serviços Cadastrados ({{ $services->count() }})</h3>
            <p class="text-xs text-slate-400">Controle total sobre títulos, fotos, descrições e itens operacionais.</p>
        </div>

        <a href="{{ route('admin.services.create') }}" class="px-5 py-2.5 rounded-xl bg-orange-600 hover:bg-orange-500 text-white font-bold text-xs uppercase tracking-wider flex items-center space-x-2 shadow-lg shadow-orange-600/20 transition-all">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
            </svg>
            <span>Novo Serviço</span>
        </a>
    </div>

    <!-- Services Grid / Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($services as $srv)
        <div class="rounded-2xl bg-[#0c101b] border border-slate-800 overflow-hidden flex flex-col justify-between shadow-xl hover:border-slate-700 transition-all">
            <div>
                <!-- Image -->
                <div class="h-44 w-full relative bg-slate-900 overflow-hidden">
                    <img src="{{ asset($srv->image) }}" alt="{{ $srv->title }}" class="w-full h-full object-cover">
                    <div class="absolute top-3 left-3">
                        <span class="px-2 py-0.5 rounded bg-black/75 border border-orange-500/40 text-[10px] font-bold text-orange-400 uppercase">
                            {{ $srv->badge ?? 'Atlas' }}
                        </span>
                    </div>
                    <div class="absolute top-3 right-3">
                        <span class="px-2 py-0.5 rounded text-[10px] font-bold {{ $srv->is_active ? 'bg-emerald-500/80 text-white' : 'bg-rose-500/80 text-white' }}">
                            {{ $srv->is_active ? 'Ativo' : 'Oculto' }}
                        </span>
                    </div>
                </div>

                <!-- Info -->
                <div class="p-5 space-y-2">
                    <div class="text-[10px] text-slate-400 font-mono">Ordem de exibição: #{{ $srv->display_order }}</div>
                    <h4 class="text-base font-extrabold text-white">{{ $srv->title }}</h4>
                    <p class="text-xs text-slate-400 line-clamp-2 leading-relaxed">{{ $srv->short_description }}</p>
                </div>
            </div>

            <!-- Card Actions -->
            <div class="p-4 bg-slate-900/60 border-t border-slate-800 flex items-center justify-between">
                <a href="{{ route('service.detail', $srv->slug) }}" target="_blank" class="text-xs text-slate-400 hover:text-white flex items-center">
                    <span>Ver no site</span>
                    <svg class="w-3 h-3 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path>
                    </svg>
                </a>

                <div class="flex items-center space-x-2">
                    <a href="{{ route('admin.services.edit', $srv->id) }}" class="px-3 py-1.5 rounded-lg bg-slate-800 hover:bg-slate-700 text-xs font-semibold text-white transition-colors">
                        Editar
                    </a>

                    <form action="{{ route('admin.services.destroy', $srv->id) }}" method="POST" onsubmit="return confirm('Tem certeza que deseja excluir o serviço {{ $srv->title }}?');" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="px-3 py-1.5 rounded-lg bg-rose-500/20 hover:bg-rose-500 text-xs font-semibold text-rose-300 hover:text-white transition-colors">
                            Excluir
                        </button>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    </div>

</div>
@endsection
