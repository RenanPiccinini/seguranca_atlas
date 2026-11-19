<?php

namespace App\Http\Controllers;

use App\Models\Differential;
use App\Models\Service;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $services = Service::where('is_active', true)
            ->orderBy('display_order', 'asc')
            ->get();

        $differentials = Differential::where('is_active', true)
            ->orderBy('display_order', 'asc')
            ->get();

        $company = [
            'name' => 'Atlas Segurança e Zeladoria',
            'slogan' => 'Proteção Estratégica, Inteligência Operacional e Confiança Absoluta',
            'city' => 'Arcos - MG',
            'state' => 'Minas Gerais',
            'phone' => '(37) 99967-3426',
            'phone_raw' => '5537999673426',
            'whatsapp_link' => 'https://wa.me/5537999673426',
            'email' => 'contato@segurancaatlas.com.br',
            'address' => 'Centro Empresarial de Arcos, MG',
            'coverage' => 'Arcos, Formiga, Pains, Iguatama, Lagoa da Prata e região Centro-Oeste de MG',
            'working_hours' => 'Central de Monitoramento & Plantão Tático 24 horas',
        ];

        return view('home', compact('services', 'differentials', 'company'));
    }

    public function serviceDetail($slug)
    {
        $service = Service::where('slug', $slug)->where('is_active', true)->firstOrFail();
        $relatedServices = Service::where('is_active', true)
            ->where('id', '!=', $service->id)
            ->take(3)
            ->get();

        $company = [
            'name' => 'Atlas Segurança e Zeladoria',
            'city' => 'Arcos - MG',
            'phone' => '(37) 99967-3426',
            'phone_raw' => '5537999673426',
            'whatsapp_link' => 'https://wa.me/5537999673426',
            'email' => 'contato@segurancaatlas.com.br',
        ];

        return view('service-detail', compact('service', 'relatedServices', 'company'));
    }
}
