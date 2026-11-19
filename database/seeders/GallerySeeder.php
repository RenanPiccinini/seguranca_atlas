<?php

namespace Database\Seeders;

use App\Models\GalleryItem;
use Illuminate\Database\Seeder;

class GallerySeeder extends Seeder
{
    public function run(): void
    {
        $photos = [
            [
                'title' => 'Central CFTV & Sala de Monitoramento 24h',
                'category' => 'Central CFTV',
                'image' => 'images/atlas/cftv-monitoramento.jpg',
                'description' => 'Mural de videomonitoramento de alta resolução com operadores dedicados 24h.',
                'display_order' => 1,
                'is_active' => true,
            ],
            [
                'title' => 'Segurança em Usinas Fotovoltaicas & Frota Tática',
                'category' => 'Usinas Solares',
                'image' => 'images/atlas/usinas-vigia.jpg',
                'description' => 'Vigilância ostensiva e ronda perimetral com viaturas em complexos solares de Arcos e região.',
                'display_order' => 2,
                'is_active' => true,
            ],
            [
                'title' => 'Brigadista Credenciado em Grandes Eventos',
                'category' => 'Brigada de Emergência',
                'image' => 'images/atlas/brigadista.jpg',
                'description' => 'Profissionais capacitados para prevenção, combate a princípios de incêndio e APH.',
                'display_order' => 3,
                'is_active' => true,
            ],
            [
                'title' => 'Equipe de Apoio & Triagem de Multidões',
                'category' => 'Equipe de Apoio',
                'image' => 'images/atlas/equipe-de-apoio.jpg',
                'description' => 'Controle de fluxo de entrada, camarotes e ordenamento de público em eventos.',
                'display_order' => 4,
                'is_active' => true,
            ],
            [
                'title' => 'Portaria Inteligente & Controle de Catracas',
                'category' => 'Portaria & Acesso',
                'image' => 'images/atlas/controle-acesso-portaria.jpg',
                'description' => 'Triagem biométrica e identificação informatizada para empresas e condomínios.',
                'display_order' => 5,
                'is_active' => true,
            ],
            [
                'title' => 'Segurança Hospitalar & Recepção Corporativa',
                'category' => 'Hospitalar & Clínicas',
                'image' => 'images/atlas/seguranca-hospitalar-corporativa.jpg',
                'description' => 'Proteção em ambientes de saúde, clínicas e recepções executivas de alto padrão.',
                'display_order' => 6,
                'is_active' => true,
            ],
        ];

        foreach ($photos as $item) {
            GalleryItem::updateOrCreate(['title' => $item['title']], $item);
        }
    }
}
