<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    public function run(): void
    {
        $services = [
            [
                'title' => 'Segurança Privada',
                'slug' => 'seguranca-privada',
                'badge' => 'Proteção Estratégica',
                'icon' => 'shield-check',
                'short_description' => 'Vigilância ostensiva e preventiva personalizada com profissionais altamente treinados, armamento/equipamento regulamentado e postura tática exemplar.',
                'full_description' => 'A Atlas Segurança Privada desenvolve projetos integrados de segurança sob medida para indústrias, condomínios fechados, instituições financeiras e propriedades rurais. Nossos agentes contam com treinamento tático contínuo, defesa pessoal, gerenciamento de crises e suporte operacional 24 horas por dia.',
                'image' => 'images/atlas/usinas-vigia.jpg',
                'features' => [
                    'Vigilância armada e desarmada conforme diretrizes federais',
                    'Rondas motorizadas georreferenciadas com supervisão em tempo real',
                    'Análise de vulnerabilidade e elaboração de plano de segurança específico',
                    'Profissionais com antecedentes rigorosamente auditados e reciclagem contínua'
                ],
                'benefits' => [
                    'Mitigação preventiva de riscos e invasões',
                    'Pronta-resposta tática com apoio de central blindada',
                    'Tranquilidade absoluta para colaboradores, clientes e gestores'
                ],
                'display_order' => 1,
                'is_active' => true,
            ],
            [
                'title' => 'Equipe de Apoio',
                'slug' => 'equipe-de-apoio',
                'badge' => 'Eventos e Fluxo Tático',
                'icon' => 'users',
                'short_description' => 'Agentes de apoio operacional disciplinados para ordenamento de público, controle perimetral, camarotes, feiras e eventos corporativos de grande porte.',
                'full_description' => 'Nossa Equipe de Apoio atua com cortesia, firmeza e inteligência emocional em feiras comerciais, grandes eventos culturais, esportivos e exposições. Treinados em triagem de acessos, direcionamento de multidões, contenção de conflitos e comunicação via rádio criptografada.',
                'image' => 'images/atlas/equipe-de-apoio.jpg',
                'features' => [
                    'Controle de fluxo de entrada e saída de alta densidade',
                    'Comunicação integrada por rádio frequência ponto a ponto',
                    'Coordenação alinhada com órgãos públicos e segurança local',
                    'Padronização impecável de uniformes e apresentação pessoal'
                ],
                'benefits' => [
                    'Preservação do bem-estar e da experiência positiva do público',
                    'Prevenção de incidentes e contenção rápida de tumultos',
                    'Relatório pós-evento com métricas e apontamentos de segurança'
                ],
                'display_order' => 2,
                'is_active' => true,
            ],
            [
                'title' => 'Brigadista Profissional',
                'slug' => 'brigadista',
                'badge' => 'Emergência & Prevenção',
                'icon' => 'flame',
                'short_description' => 'Brigada de incêndio e emergências capacitada para salvamento, primeiros socorros, evacuação e combate a princípios de sinistros com certificação técnica.',
                'full_description' => 'Os Brigadistas da Atlas possuem formação rigorosa em prevenção e combate a princípios de incêndio, inspeção preventiva de hidrantes, extintores e saídas de emergência, além de primeiros socorros avançados (APH). Essenciais para adequação às normas do Corpo de Bombeiros e proteção à vida.',
                'image' => 'images/atlas/brigadista.jpg',
                'features' => [
                    'Inspeção diária dos sistemas de combate a incêndio e rotas de fuga',
                    'Suporte Básico de Vida (SBV) e atendimento pré-hospitalar ágil',
                    'Elaboração e execução de planos de evacuação e simulados periódicos',
                    'Atendimento pleno à IT e normas regulamentadoras vigentes'
                ],
                'benefits' => [
                    'Salvaguarda imediata da vida humana e patrimônio físico',
                    'Regularidade perante órgãos de fiscalização e seguradoras',
                    'Intervenção nos primeiros minutos críticos de qualquer emergência'
                ],
                'display_order' => 3,
                'is_active' => true,
            ],
            [
                'title' => 'Segurança Hospitalar',
                'slug' => 'seguranca-hospitalar',
                'badge' => 'Ambiente Crítico & Saúde',
                'icon' => 'activity',
                'short_description' => 'Segurança especializada para hospitais, clínicas e prontos-socorros, com conduta humanizada, contenção psicológica e proteção rigorosa de setores restritos.',
                'full_description' => 'O ambiente de saúde exige preparo diferenciado: nossos vigilantes hospitalares são capacitados para lidar com momentos de tensão, atendimento a pacientes e acompanhantes sob estresse agudo, proteção da equipe médica, controle de farmácias centrais e vigilância de enfermarias e UTIs.',
                'image' => 'images/atlas/seguranca-hospitalar-corporativa.jpg',
                'features' => [
                    'Abordagem humanizada voltada ao respeito ético e sanitário',
                    'Blindagem de áreas de acesso restrito (farmácias, UTIs, necrotérios)',
                    'Controle e revista de acessos em prontos-atendimentos 24h',
                    'Mediação pacífica de conflitos em salas de espera'
                ],
                'benefits' => [
                    'Ambiente seguro e protegido para médicos e profissionais de saúde',
                    'Preservação do patrimônio e dos insumos hospitalares de alto custo',
                    'Atendimento ágil a intercorrências sem perturbar o ambiente clínico'
                ],
                'display_order' => 4,
                'is_active' => true,
            ],
            [
                'title' => 'Portaria e Controle de Acesso',
                'slug' => 'portaria-controle-acesso',
                'badge' => 'Tecnologia & Triagem',
                'icon' => 'door-closed',
                'short_description' => 'Controle inteligente de pedestres, prestadores e veículos em condomínios e sedes corporativas com sistemas digitais de identificação biométrica e RFID.',
                'full_description' => 'A primeira barreira de segurança da sua empresa ou condomínio. Profissionais treinados em atendimento ao público, recebimento de correspondências, triagem de visitantes, operação de catracas eletrônicas, cancelas de veículos e verificação de documentos via software dedicado.',
                'image' => 'images/atlas/controle-acesso-portaria.jpg',
                'features' => [
                    'Cadastro biométrico, facial e documental informatizado',
                    'Gestão rigorosa de entrada de veículos e entregadores',
                    'Protocolos estritos de acionamento em caso de atitudes suspeitas',
                    'Atendimento cordial, com alta tecnologia e precisão de registro'
                ],
                'benefits' => [
                    'Eliminação de invasões por falha humana na portaria',
                    'Rastreabilidade total de quem entra e sai das instalações',
                    'Valorização patrimonial e satisfação comprovada dos moradores e usuários'
                ],
                'display_order' => 5,
                'is_active' => true,
            ],
            [
                'title' => 'Vigia e Segurança Patrimonial',
                'slug' => 'vigia-patrimonial',
                'badge' => 'Ronda & Proteção de Ativos',
                'icon' => 'eye',
                'short_description' => 'Vigilância contínua para usinas solares, galpões, canteiros de obras, depósitos e áreas industriais extensas, com rondas estratégicas diurnas e noturnas.',
                'full_description' => 'Especialistas na proteção de grandes perímetros vulneráveis, como usinas fotovoltaicas e polos de mineração em Arcos MG e região centro-oeste mineira. Nossos vigias realizam inspeção contínua de alambrados, monitoramento perimetral e fiscalização de maquinários pesados.',
                'image' => 'images/atlas/usinas-vigia.jpg',
                'features' => [
                    'Checkpoints eletrônicos de ronda (bastão de ronda com GPS)',
                    'Fiscalização de fechamento de portas, janelas e portões periféricos',
                    'Inspeção de iluminação perimetral e sistemas de alarme',
                    'Presença ostensiva inibidora de furtos e sabotagens'
                ],
                'benefits' => [
                    'Proteção de equipamentos de alto valor em locais remotos',
                    'Histórico digital auditável de todas as rondas efetuadas',
                    'Prevenção direta contra intrusões noturnas e furtos de cabos'
                ],
                'display_order' => 6,
                'is_active' => true,
            ],
            [
                'title' => 'Central CFTV e Monitoramento 24h',
                'slug' => 'cftv-monitoramento',
                'badge' => 'Inteligência Artificial & Sala Blindada',
                'icon' => 'video',
                'short_description' => 'Sala de operações ultramoderna com vídeo-monitoramento inteligente em alta definição, detecção de movimento analítica e despacho imediato.',
                'full_description' => 'Nossa central de monitoramento opera ininterruptamente com operadores dedicados inspecionando múltiplos canais de vídeo simultâneos. Integrada com inteligência artificial para detecção perimetral, reconhecimento de placas (LPR) e acionamento tático imediato de viaturas de apoio.',
                'image' => 'images/atlas/cftv-monitoramento.jpg',
                'features' => [
                    'Monitoramento 24 horas por dia, 365 dias por ano',
                    'Analíticos avançados de vídeo com inteligência artificial',
                    'Comunicação direta com viaturas de patrulhamento de campo',
                    'Armazenamento seguro em nuvem redundante com criptografia'
                ],
                'benefits' => [
                    'Visão panorâmica e detalhada de todos os pontos cegos',
                    'Ação preventiva antes que o sinistro seja consumado',
                    'Gravações com qualidade forense para perícia e respaldo legal'
                ],
                'display_order' => 7,
                'is_active' => true,
            ],
        ];

        foreach ($services as $data) {
            Service::updateOrCreate(['slug' => $data['slug']], $data);
        }
    }
}
