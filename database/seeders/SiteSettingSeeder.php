<?php

namespace Database\Seeders;

use App\Models\SiteSetting;
use Illuminate\Database\Seeder;

class SiteSettingSeeder extends Seeder
{
    public function run(): void
    {
        $settings = [
            // General
            [
                'key' => 'company_name',
                'value' => 'Atlas Segurança e Zeladoria',
                'label' => 'Nome da Empresa',
                'group' => 'general',
                'type' => 'text',
            ],
            [
                'key' => 'company_slogan',
                'value' => 'Proteção Estratégica, Inteligência Operacional e Confiança Absoluta',
                'label' => 'Slogan Institucional',
                'group' => 'general',
                'type' => 'text',
            ],
            [
                'key' => 'company_cnpj',
                'value' => 'Atlas Segurança e Zeladoria LTDA',
                'label' => 'Razão Social',
                'group' => 'general',
                'type' => 'text',
            ],

            // Contacts
            [
                'key' => 'phone_display',
                'value' => '(37) 99967-3426',
                'label' => 'Telefone Exibição',
                'group' => 'contact',
                'type' => 'text',
            ],
            [
                'key' => 'phone_raw',
                'value' => '5537999673426',
                'label' => 'Número WhatsApp (com DDI e DDD)',
                'group' => 'contact',
                'type' => 'text',
            ],
            [
                'key' => 'email',
                'value' => 'contato@segurancaatlas.com.br',
                'label' => 'E-mail Comercial',
                'group' => 'contact',
                'type' => 'text',
            ],
            [
                'key' => 'city',
                'value' => 'Arcos - MG',
                'label' => 'Cidade Sede',
                'group' => 'contact',
                'type' => 'text',
            ],
            [
                'key' => 'address',
                'value' => 'Centro Empresarial de Arcos, Minas Gerais',
                'label' => 'Endereço da Base',
                'group' => 'contact',
                'type' => 'text',
            ],
            [
                'key' => 'coverage',
                'value' => 'Arcos, Formiga, Pains, Iguatama, Lagoa da Prata e região Centro-Oeste de MG',
                'label' => 'Região de Cobertura',
                'group' => 'contact',
                'type' => 'text',
            ],
            [
                'key' => 'working_hours',
                'value' => 'Central de Monitoramento & Plantão Tático 24 horas',
                'label' => 'Horário de Atendimento',
                'group' => 'contact',
                'type' => 'text',
            ],

            // Hero & About texts
            [
                'key' => 'hero_title',
                'value' => 'Segurança de Elite, Inteligência Tática e Proteção Absoluta.',
                'label' => 'Título Principal do Hero',
                'group' => 'texts',
                'type' => 'text',
            ],
            [
                'key' => 'hero_subtitle',
                'value' => 'Soluções completas e integradas para empresas, usinas solares, condomínios, hospitais e eventos em Arcos MG e região.',
                'label' => 'Subtítulo do Hero',
                'group' => 'texts',
                'type' => 'textarea',
            ],
            [
                'key' => 'about_text_p1',
                'value' => 'Com sede em Arcos - MG, a Atlas Segurança e Zeladoria LTDA nasceu para elevar o padrão dos serviços de vigilância patrimonial, apoio operacional, brigadas de emergência e zeladoria em Minas Gerais.',
                'label' => 'Sobre Nós - Parágrafo 1',
                'group' => 'texts',
                'type' => 'textarea',
            ],
            [
                'key' => 'about_text_p2',
                'value' => 'Compreendemos as particularidades e os desafios de segurança de indústrias de calcário e mineração, usinas fotovoltaicas (solares), hospitais, condomínios residenciais e grandes eventos culturais da região centro-oeste mineira. Nossos profissionais passam por investigação social profunda, reciclagens técnicas e possuem supervisão motorizada constante.',
                'label' => 'Sobre Nós - Parágrafo 2',
                'group' => 'texts',
                'type' => 'textarea',
            ],
        ];

        foreach ($settings as $setting) {
            SiteSetting::updateOrCreate(['key' => $setting['key']], $setting);
        }
    }
}
