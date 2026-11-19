<?php

namespace Tests\Feature;

use Database\Seeders\DatabaseSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    use RefreshDatabase;

    public function test_the_application_returns_a_successful_response(): void
    {
        $this->seed(DatabaseSeeder::class);

        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertSee('ATLAS');
        $response->assertSee('Arcos - MG');
        $response->assertSee('37999673426');
    }

    public function test_contact_form_saves_to_database(): void
    {
        $response = $this->postJson('/contato', [
            'name' => 'Renan Teste',
            'email' => 'renan@exemplo.com',
            'phone' => '37999673426',
            'service' => 'Segurança Privada',
            'message' => 'Solicito contato para segurança patrimonial em Arcos.',
        ]);

        $response->assertStatus(200);
        $response->assertJson(['success' => true]);

        $this->assertDatabaseHas('contact_messages', [
            'email' => 'renan@exemplo.com',
            'phone' => '37999673426',
        ]);
    }

    public function test_quote_simulation_saves_to_database(): void
    {
        $response = $this->postJson('/orcamento', [
            'name' => 'Empresa Teste',
            'company' => 'Mineração Atlas',
            'phone' => '37999673426',
            'email' => 'contato@mineracao.com',
            'service_type' => 'Segurança Privada',
            'segment' => 'Indústria / Mineração',
            'period' => '24 Horas',
            'city' => 'Arcos - MG',
            'details' => 'Contratação para 2 postos.',
        ]);

        $response->assertStatus(200);
        $response->assertJson(['success' => true]);

        $this->assertDatabaseHas('quote_requests', [
            'phone' => '37999673426',
            'service_type' => 'Segurança Privada',
        ]);
    }

    public function test_service_detail_page_loads(): void
    {
        $this->seed(DatabaseSeeder::class);

        $response = $this->get('/servicos/seguranca-privada');

        $response->assertStatus(200);
        $response->assertSee('Segurança Privada');
        $response->assertSee('Arcos - MG');
    }

    public function test_admin_dashboard_loads(): void
    {
        $this->seed(DatabaseSeeder::class);

        $response = $this->get('/painel');

        $response->assertStatus(200);
        $response->assertSee('Painel Operacional');
        $response->assertSee('Arcos - MG');
    }
}
