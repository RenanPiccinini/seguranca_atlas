@extends('admin.layouts.app')

@section('title', 'Configurações do Site')
@section('page-title', 'Configurações & Textos do Site')
@section('page-subtitle', 'Altere os telefones, WhatsApp, endereços, textos da página inicial e sobre nós em tempo real')

@section('content')
<div class="max-w-4xl space-y-8">

    <form action="{{ route('admin.settings.update') }}" method="POST" class="space-y-8">
        @csrf

        <!-- Group 1: Contatos & Telefones -->
        <div class="p-6 sm:p-8 rounded-3xl bg-[#0c101b] border border-slate-800 shadow-2xl space-y-6">
            <h3 class="text-base font-extrabold text-white flex items-center">
                <span class="w-2.5 h-2.5 rounded-full bg-emerald-400 mr-2"></span>
                Contatos, WhatsApp & Localização
            </h3>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                <div>
                    <label class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-2">Telefone de Exibição</label>
                    <input type="text" name="phone_display" value="{{ \App\Models\SiteSetting::get('phone_display', '(37) 99967-3426') }}" class="w-full px-4 py-3 rounded-xl bg-slate-900 border border-slate-700 text-white text-sm focus:border-orange-500 focus:outline-none">
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-2">Número WhatsApp (somente dígitos com DDI e DDD)</label>
                    <input type="text" name="phone_raw" value="{{ \App\Models\SiteSetting::get('phone_raw', '5537999673426') }}" class="w-full px-4 py-3 rounded-xl bg-slate-900 border border-slate-700 text-white text-sm focus:border-orange-500 focus:outline-none font-mono">
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                <div>
                    <label class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-2">E-mail Comercial</label>
                    <input type="email" name="email" value="{{ \App\Models\SiteSetting::get('email', 'contato@segurancaatlas.com.br') }}" class="w-full px-4 py-3 rounded-xl bg-slate-900 border border-slate-700 text-white text-sm focus:border-orange-500 focus:outline-none">
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-2">Cidade da Base</label>
                    <input type="text" name="city" value="{{ \App\Models\SiteSetting::get('city', 'Arcos - MG') }}" class="w-full px-4 py-3 rounded-xl bg-slate-900 border border-slate-700 text-white text-sm focus:border-orange-500 focus:outline-none">
                </div>
            </div>

            <div>
                <label class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-2">Endereço Completo</label>
                <input type="text" name="address" value="{{ \App\Models\SiteSetting::get('address', 'Centro Empresarial de Arcos, Minas Gerais') }}" class="w-full px-4 py-3 rounded-xl bg-slate-900 border border-slate-700 text-white text-sm focus:border-orange-500 focus:outline-none">
            </div>

            <div>
                <label class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-2">Região de Cobertura</label>
                <input type="text" name="coverage" value="{{ \App\Models\SiteSetting::get('coverage', 'Arcos, Formiga, Pains, Iguatama, Lagoa da Prata e região Centro-Oeste de MG') }}" class="w-full px-4 py-3 rounded-xl bg-slate-900 border border-slate-700 text-white text-sm focus:border-orange-500 focus:outline-none">
            </div>

            <div>
                <label class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-2">Horário / Plantão</label>
                <input type="text" name="working_hours" value="{{ \App\Models\SiteSetting::get('working_hours', 'Central de Monitoramento & Plantão Tático 24 horas') }}" class="w-full px-4 py-3 rounded-xl bg-slate-900 border border-slate-700 text-white text-sm focus:border-orange-500 focus:outline-none">
            </div>
        </div>

        <!-- Group 2: Informações Institucionais -->
        <div class="p-6 sm:p-8 rounded-3xl bg-[#0c101b] border border-slate-800 shadow-2xl space-y-6">
            <h3 class="text-base font-extrabold text-white flex items-center">
                <span class="w-2.5 h-2.5 rounded-full bg-orange-500 mr-2"></span>
                Dados Institucionais
            </h3>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                <div>
                    <label class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-2">Nome Comercial da Empresa</label>
                    <input type="text" name="company_name" value="{{ \App\Models\SiteSetting::get('company_name', 'Atlas Segurança e Zeladoria') }}" class="w-full px-4 py-3 rounded-xl bg-slate-900 border border-slate-700 text-white text-sm focus:border-orange-500 focus:outline-none">
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-2">Razão Social</label>
                    <input type="text" name="company_cnpj" value="{{ \App\Models\SiteSetting::get('company_cnpj', 'Atlas Segurança e Zeladoria LTDA') }}" class="w-full px-4 py-3 rounded-xl bg-slate-900 border border-slate-700 text-white text-sm focus:border-orange-500 focus:outline-none">
                </div>
            </div>

            <div>
                <label class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-2">Slogan Institucional</label>
                <input type="text" name="company_slogan" value="{{ \App\Models\SiteSetting::get('company_slogan', 'Proteção Estratégica, Inteligência Operacional e Confiança Absoluta') }}" class="w-full px-4 py-3 rounded-xl bg-slate-900 border border-slate-700 text-white text-sm focus:border-orange-500 focus:outline-none">
            </div>
        </div>

        <!-- Group 3: Textos do Hero & Sobre Nós -->
        <div class="p-6 sm:p-8 rounded-3xl bg-[#0c101b] border border-slate-800 shadow-2xl space-y-6">
            <h3 class="text-base font-extrabold text-white flex items-center">
                <span class="w-2.5 h-2.5 rounded-full bg-sky-400 mr-2"></span>
                Textos Principais do Site
            </h3>

            <div>
                <label class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-2">Título do Hero (Banner Inicial)</label>
                <input type="text" name="hero_title" value="{{ \App\Models\SiteSetting::get('hero_title', 'Segurança de Elite, Inteligência Tática e Proteção Absoluta.') }}" class="w-full px-4 py-3 rounded-xl bg-slate-900 border border-slate-700 text-white text-sm focus:border-orange-500 focus:outline-none">
            </div>

            <div>
                <label class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-2">Subtítulo do Hero</label>
                <textarea name="hero_subtitle" rows="2" class="w-full px-4 py-3 rounded-xl bg-slate-900 border border-slate-700 text-white text-sm focus:border-orange-500 focus:outline-none">{{ \App\Models\SiteSetting::get('hero_subtitle', 'Soluções completas e integradas para empresas, usinas solares, condomínios, hospitais e eventos em Arcos MG e região.') }}</textarea>
            </div>

            <div>
                <label class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-2">Seção Sobre Nós - Parágrafo 1</label>
                <textarea name="about_text_p1" rows="3" class="w-full px-4 py-3 rounded-xl bg-slate-900 border border-slate-700 text-white text-sm focus:border-orange-500 focus:outline-none">{{ \App\Models\SiteSetting::get('about_text_p1', 'Com sede em Arcos - MG, a Atlas Segurança e Zeladoria LTDA nasceu para elevar o padrão dos serviços de vigilância patrimonial, apoio operacional, brigadas de emergência e zeladoria em Minas Gerais.') }}</textarea>
            </div>

            <div>
                <label class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-2">Seção Sobre Nós - Parágrafo 2</label>
                <textarea name="about_text_p2" rows="3" class="w-full px-4 py-3 rounded-xl bg-slate-900 border border-slate-700 text-white text-sm focus:border-orange-500 focus:outline-none">{{ \App\Models\SiteSetting::get('about_text_p2', 'Compreendemos as particularidades e os desafios de segurança de indústrias de calcário e mineração, usinas fotovoltaicas (solares), hospitais, condomínios residenciais e grandes eventos culturais da região centro-oeste mineira.') }}</textarea>
            </div>
        </div>

        <div class="flex justify-end pt-2">
            <button type="submit" class="px-8 py-3.5 rounded-xl bg-gradient-to-r from-orange-600 to-amber-500 hover:from-orange-500 hover:to-amber-400 text-white font-black text-xs uppercase tracking-wider shadow-xl shadow-orange-600/30 transition-all">
                Salvar Todas as Configurações
            </button>
        </div>

    </form>

</div>
@endsection
