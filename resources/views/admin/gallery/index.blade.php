@extends('admin.layouts.app')

@section('title', 'Galeria de Fotos')
@section('page-title', 'Galeria de Fotos do Site')
@section('page-subtitle', 'Faça upload de novas fotos, altere títulos, categorias e gerencie as fotos exibidas no site')

@section('content')
<div class="space-y-8">

    <!-- Upload Card -->
    <div class="p-6 sm:p-8 rounded-3xl bg-[#0c101b] border border-slate-800 shadow-2xl">
        <h3 class="text-base font-extrabold text-white mb-1 flex items-center">
            <span class="w-2.5 h-2.5 rounded-full bg-orange-500 mr-2"></span>
            Adicionar Nova Foto à Galeria
        </h3>
        <p class="text-xs text-slate-400 mb-6">Suba novas fotos da base operacional, veículos, equipes ou rondas.</p>

        <form action="{{ route('admin.gallery.store') }}" method="POST" enctype="multipart/form-data" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 items-end">
            @csrf

            <div>
                <label class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-2">Título da Imagem *</label>
                <input type="text" name="title" required placeholder="Ex: Patrulhamento Perimetral" class="w-full px-4 py-2.5 rounded-xl bg-slate-900 border border-slate-700 text-white text-xs focus:border-orange-500 focus:outline-none">
            </div>

            <div>
                <label class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-2">Categoria *</label>
                <select name="category" required class="w-full px-4 py-2.5 rounded-xl bg-slate-900 border border-slate-700 text-white text-xs focus:border-orange-500 focus:outline-none">
                    <option value="Central CFTV">Central CFTV</option>
                    <option value="Usinas Solares">Usinas Solares</option>
                    <option value="Brigada de Emergência">Brigada de Emergência</option>
                    <option value="Equipe de Apoio">Equipe de Apoio</option>
                    <option value="Portaria & Acesso">Portaria & Acesso</option>
                    <option value="Hospitalar & Clínicas">Hospitalar & Clínicas</option>
                    <option value="Geral">Geral</option>
                </select>
            </div>

            <div>
                <label class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-2">Arquivo de Imagem *</label>
                <input type="file" name="image" accept="image/*" required class="w-full px-3 py-2 rounded-xl bg-slate-900 border border-slate-700 text-slate-300 text-xs focus:outline-none">
            </div>

            <div>
                <button type="submit" class="w-full py-2.5 rounded-xl bg-orange-600 hover:bg-orange-500 text-white font-bold text-xs uppercase tracking-wider shadow-lg shadow-orange-600/20 transition-all flex items-center justify-center space-x-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"></path>
                    </svg>
                    <span>Fazer Upload</span>
                </button>
            </div>
        </form>
    </div>

    <!-- Gallery Grid -->
    <div class="space-y-4">
        <h3 class="text-sm font-bold text-white uppercase tracking-wider">Fotos Atualmente no Site ({{ $photos->count() }})</h3>
        
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($photos as $photo)
            <div class="rounded-2xl bg-[#0c101b] border border-slate-800 overflow-hidden shadow-xl flex flex-col justify-between group">
                <div>
                    <div class="h-48 w-full relative bg-slate-900 overflow-hidden">
                        <img src="{{ asset($photo->image) }}" alt="{{ $photo->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                        <div class="absolute top-3 left-3">
                            <span class="px-2 py-0.5 rounded bg-black/80 border border-orange-500/40 text-[10px] font-bold text-orange-400 uppercase">
                                {{ $photo->category }}
                            </span>
                        </div>
                    </div>

                    <div class="p-4 space-y-1">
                        <h4 class="text-sm font-extrabold text-white">{{ $photo->title }}</h4>
                        @if($photo->description)
                            <p class="text-xs text-slate-400 line-clamp-2">{{ $photo->description }}</p>
                        @endif
                    </div>
                </div>

                <div class="p-4 bg-slate-900/60 border-t border-slate-800 flex items-center justify-between">
                    <span class="text-[10px] text-slate-500 font-mono">ID: #{{ $photo->id }}</span>

                    <form action="{{ route('admin.gallery.destroy', $photo->id) }}" method="POST" onsubmit="return confirm('Deseja excluir esta foto?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="px-3 py-1.5 rounded-lg bg-rose-500/10 hover:bg-rose-500 text-rose-400 hover:text-white text-xs font-semibold transition-colors">
                            Excluir Foto
                        </button>
                    </form>
                </div>
            </div>
            @endforeach
        </div>
    </div>

</div>
@endsection
