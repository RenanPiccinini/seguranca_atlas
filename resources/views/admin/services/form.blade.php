@extends('admin.layouts.app')

@section('title', $service->id ? 'Editar Serviço' : 'Novo Serviço')
@section('page-title', $service->id ? 'Editar Serviço: ' . $service->title : 'Cadastrar Novo Serviço')
@section('page-subtitle', 'Preencha os campos para atualizar as informações no site da Atlas')

@section('content')
<div class="max-w-4xl">
    
    <div class="p-8 rounded-3xl bg-[#0c101b] border border-slate-800 shadow-2xl">
        <form action="{{ $service->id ? route('admin.services.update', $service->id) : route('admin.services.store') }}" 
              method="POST" 
              enctype="multipart/form-data" 
              class="space-y-6">
            @csrf
            @if($service->id)
                @method('PUT')
            @endif

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                <!-- Title -->
                <div>
                    <label class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-2">Título do Serviço *</label>
                    <input type="text" name="title" value="{{ old('title', $service->title) }}" required placeholder="Ex: Segurança Privada" class="w-full px-4 py-3 rounded-xl bg-slate-900 border border-slate-700 text-white text-sm focus:border-orange-500 focus:outline-none">
                </div>

                <!-- Badge -->
                <div>
                    <label class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-2">Selo / Badge</label>
                    <input type="text" name="badge" value="{{ old('badge', $service->badge) }}" placeholder="Ex: Proteção Estratégica" class="w-full px-4 py-3 rounded-xl bg-slate-900 border border-slate-700 text-white text-sm focus:border-orange-500 focus:outline-none">
                </div>
            </div>

            <!-- Short Description -->
            <div>
                <label class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-2">Descrição Curta (Exibida no Card) *</label>
                <textarea name="short_description" rows="2" required placeholder="Breve resumo..." class="w-full px-4 py-3 rounded-xl bg-slate-900 border border-slate-700 text-white text-sm focus:border-orange-500 focus:outline-none">{{ old('short_description', $service->short_description) }}</textarea>
            </div>

            <!-- Full Description -->
            <div>
                <label class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-2">Descrição Completa (Exibida na Página e no Modal) *</label>
                <textarea name="full_description" rows="4" required placeholder="Texto detalhado sobre a operação, abrangência..." class="w-full px-4 py-3 rounded-xl bg-slate-900 border border-slate-700 text-white text-sm focus:border-orange-500 focus:outline-none">{{ old('full_description', $service->full_description) }}</textarea>
            </div>

            <!-- Photo Upload & Preview -->
            <div>
                <label class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-2">Foto Ilustrativa do Serviço</label>
                @if($service->image)
                <div class="mb-3 flex items-center space-x-4 p-3 rounded-xl bg-slate-900 border border-slate-800">
                    <img src="{{ asset($service->image) }}" class="w-16 h-16 rounded-lg object-cover" alt="Foto atual">
                    <div class="text-xs text-slate-400">
                        <span class="text-white font-semibold block">Imagem Atual:</span>
                        {{ $service->image }}
                    </div>
                </div>
                @endif
                <input type="file" name="image" accept="image/*" class="w-full px-4 py-2.5 rounded-xl bg-slate-900 border border-slate-700 text-slate-300 text-xs focus:outline-none">
                <span class="text-[11px] text-slate-500 mt-1 block">Formatos aceitos: JPG, PNG, WEBP. Tamanho máx: 8MB.</span>
            </div>

            <!-- Features & Benefits (1 per line) -->
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                <div>
                    <label class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-2">Destaques / Procedimentos (1 por linha)</label>
                    <textarea name="features" rows="4" placeholder="Vigilância armada e desarmada&#10;Rondas motorizadas com GPS&#10;Reciclagem tática periódica" class="w-full px-4 py-3 rounded-xl bg-slate-900 border border-slate-700 text-white text-xs focus:border-orange-500 focus:outline-none font-mono">@if($service->features){{ implode("\n", $service->features) }}@endif</textarea>
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-2">Benefícios para o Cliente (1 por linha)</label>
                    <textarea name="benefits" rows="4" placeholder="Mitigação de invasões&#10;Pronta resposta tática 24h&#10;Tranquilidade absoluta" class="w-full px-4 py-3 rounded-xl bg-slate-900 border border-slate-700 text-white text-xs focus:border-orange-500 focus:outline-none font-mono">@if($service->benefits){{ implode("\n", $service->benefits) }}@endif</textarea>
                </div>
            </div>

            <!-- Display Order & Active Toggle -->
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 pt-2">
                <div>
                    <label class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-2">Ordem de Exibição</label>
                    <input type="number" name="display_order" value="{{ old('display_order', $service->display_order ?? 0) }}" class="w-full px-4 py-3 rounded-xl bg-slate-900 border border-slate-700 text-white text-sm focus:border-orange-500 focus:outline-none">
                </div>

                <div class="flex items-center pt-8">
                    <label class="relative flex items-center cursor-pointer">
                        <input type="checkbox" name="is_active" value="1" {{ old('is_active', $service->is_active ?? true) ? 'checked' : '' }} class="sr-only peer">
                        <div class="w-11 h-6 bg-slate-800 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-orange-500"></div>
                        <span class="ml-3 text-xs font-bold text-slate-300">Serviço Ativo e Visível no Site</span>
                    </label>
                </div>
            </div>

            <!-- Buttons -->
            <div class="pt-6 border-t border-slate-800 flex items-center justify-between">
                <a href="{{ route('admin.services.index') }}" class="px-5 py-2.5 rounded-xl bg-slate-800 hover:bg-slate-700 text-slate-300 text-xs font-semibold transition-colors">
                    Cancelar
                </a>

                <button type="submit" class="px-8 py-3 rounded-xl bg-orange-600 hover:bg-orange-500 text-white text-xs font-black uppercase tracking-wider shadow-lg shadow-orange-600/30 transition-all">
                    {{ $service->id ? 'Salvar Alterações' : 'Cadastrar Serviço' }}
                </button>
            </div>

        </form>
    </div>

</div>
@endsection
