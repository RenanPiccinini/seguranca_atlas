<?php

namespace Database\Seeders;

use App\Models\Differential;
use Illuminate\Database\Seeder;

class DifferentialSeeder extends Seeder
{
    public function run(): void
    {
        $differentials = [
            [
                'title' => 'Monitoramento & Rondas Georreferenciadas',
                'subtitle' => 'Tecnologia Operacional',
                'description' => 'Acompanhamento por telemetria e GPS dos pontos de ronda em tempo real, garantindo presença e eficácia operacional comprovada.',
                'icon' => 'crosshair',
                'highlight_number' => '24/7',
                'highlight_label' => 'Monitoramento Contínuo',
                'display_order' => 1,
                'is_active' => true,
            ],
            [
                'title' => 'Pronta Resposta em Arcos - MG',
                'subtitle' => 'Agilidade Regional',
                'description' => 'Base operacional estratégica em Arcos MG, permitindo deslocamento rápido de viaturas e supervisores para qualquer ponto da cidade e região.',
                'icon' => 'map-pin',
                'highlight_number' => '< 8min',
                'highlight_label' => 'Tempo Médio de Resposta',
                'display_order' => 2,
                'is_active' => true,
            ],
            [
                'title' => 'Equipe Rigorosamente Selecionada',
                'subtitle' => 'Capital Humano de Elite',
                'description' => 'Investigação social completa, avaliação psicológica, antecedentes criminais e treinamento tático contínuo com instrutores credenciados.',
                'icon' => 'shield',
                'highlight_number' => '100%',
                'highlight_label' => 'Profissionais Auditados',
                'display_order' => 3,
                'is_active' => true,
            ],
            [
                'title' => 'Zeladoria & Gestão Integrada',
                'subtitle' => 'Solução Completa',
                'description' => 'União perfeita entre vigilância ostensiva, portaria qualificada e zelo patrimonial para máxima conservação e harmonia do seu ambiente.',
                'icon' => 'check-circle',
                'highlight_number' => '+99%',
                'highlight_label' => 'Satisfação de Clientes',
                'display_order' => 4,
                'is_active' => true,
            ],
        ];

        foreach ($differentials as $data) {
            Differential::updateOrCreate(['title' => $data['title']], $data);
        }
    }
}
