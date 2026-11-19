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
                'title' => 'Monitoramento por Drone com Inteligência Artificial',
                'subtitle' => 'Vigilância Aérea Autônoma',
                'description' => 'Patrulhamento aéreo tático com drones de alta precisão e visão computacional por IA integrada: identificação instantânea de movimentações suspeitas, varredura térmica e sobrevoo perimetral em usinas, indústrias e eventos.',
                'icon' => 'radar',
                'highlight_number' => 'Drone + IA',
                'highlight_label' => 'Reconhecimento Aéreo 4K',
                'display_order' => 1,
                'is_active' => true,
            ],
            [
                'title' => 'Monitoramento & Rondas Georreferenciadas',
                'subtitle' => 'Tecnologia Operacional',
                'description' => 'Acompanhamento por telemetria e GPS dos pontos de ronda em tempo real, garantindo presença contínua, eficácia e supervisão tática preventiva.',
                'icon' => 'crosshair',
                'highlight_number' => '24/7',
                'highlight_label' => 'Monitoramento Contínuo',
                'display_order' => 2,
                'is_active' => true,
            ],
            [
                'title' => 'Pronta Resposta em Arcos - MG',
                'subtitle' => 'Agilidade Regional',
                'description' => 'Base operacional estratégica em Arcos MG, permitindo deslocamento rápido de viaturas e supervisores para qualquer ponto da cidade e região.',
                'icon' => 'map-pin',
                'highlight_number' => '< 8min',
                'highlight_label' => 'Tempo Médio de Resposta',
                'display_order' => 3,
                'is_active' => true,
            ],
            [
                'title' => 'Equipe Rigorosamente Selecionada',
                'subtitle' => 'Capital Humano de Elite',
                'description' => 'Investigação social completa, avaliação psicológica, antecedentes criminais e treinamento contínuo de inteligência preventiva e postura exemplar.',
                'icon' => 'shield',
                'highlight_number' => '100%',
                'highlight_label' => 'Profissionais Auditados',
                'display_order' => 4,
                'is_active' => true,
            ],
            [
                'title' => 'Zeladoria & Gestão Integrada',
                'subtitle' => 'Solução Completa',
                'description' => 'União perfeita entre vigilância ostensiva, portaria qualificada e zelo patrimonial para máxima conservação e harmonia do seu ambiente.',
                'icon' => 'check-circle',
                'highlight_number' => '+99%',
                'highlight_label' => 'Satisfação de Clientes',
                'display_order' => 5,
                'is_active' => true,
            ],
        ];

        foreach ($differentials as $data) {
            Differential::updateOrCreate(['title' => $data['title']], $data);
        }
    }
}
