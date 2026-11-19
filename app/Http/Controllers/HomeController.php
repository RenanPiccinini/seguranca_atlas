<?php

namespace App\Http\Controllers;

use App\Models\Differential;
use App\Models\GalleryItem;
use App\Models\Service;
use App\Models\SiteSetting;
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

        $gallery = GalleryItem::where('is_active', true)
            ->orderBy('display_order', 'asc')
            ->get();

        $company = [
            'name' => SiteSetting::get('company_name', 'Atlas Segurança e Zeladoria'),
            'slogan' => SiteSetting::get('company_slogan', 'Proteção Estratégica, Inteligência Operacional e Confiança Absoluta'),
            'city' => SiteSetting::get('city', 'Arcos - MG'),
            'state' => 'Minas Gerais',
            'phone' => SiteSetting::get('phone_display', '(37) 99967-3426'),
            'phone_raw' => SiteSetting::get('phone_raw', '5537999673426'),
            'whatsapp_link' => 'https://wa.me/' . SiteSetting::get('phone_raw', '5537999673426'),
            'email' => SiteSetting::get('email', 'contato@segurancaatlas.com.br'),
            'address' => SiteSetting::get('address', 'Centro Empresarial de Arcos, MG'),
            'coverage' => SiteSetting::get('coverage', 'Arcos, Formiga, Pains, Iguatama, Lagoa da Prata e região Centro-Oeste de MG'),
            'working_hours' => SiteSetting::get('working_hours', 'Central de Monitoramento & Plantão Tático 24 horas'),
            'hero_title' => SiteSetting::get('hero_title', 'Segurança de Elite, Inteligência Tática e Proteção Absoluta.'),
            'hero_subtitle' => SiteSetting::get('hero_subtitle', 'Soluções completas e integradas para empresas, usinas solares, condomínios, hospitais e eventos em Arcos MG e região.'),
            'about_text_p1' => SiteSetting::get('about_text_p1', 'Com sede em Arcos - MG, a Atlas Segurança e Zeladoria LTDA nasceu para elevar o padrão dos serviços de vigilância patrimonial, apoio operacional, brigadas de emergência e zeladoria em Minas Gerais.'),
            'about_text_p2' => SiteSetting::get('about_text_p2', 'Compreendemos as particularidades e os desafios de segurança de indústrias de calcário e mineração, usinas fotovoltaicas (solares), hospitais, condomínios residenciais e grandes eventos culturais da região centro-oeste mineira.'),
        ];

        return view('home', compact('services', 'differentials', 'gallery', 'company'));
    }

    public function serviceDetail($slug)
    {
        $service = Service::where('slug', $slug)->where('is_active', true)->firstOrFail();
        $relatedServices = Service::where('is_active', true)
            ->where('id', '!=', $service->id)
            ->take(3)
            ->get();

        $company = [
            'name' => SiteSetting::get('company_name', 'Atlas Segurança e Zeladoria'),
            'city' => SiteSetting::get('city', 'Arcos - MG'),
            'phone' => SiteSetting::get('phone_display', '(37) 99967-3426'),
            'phone_raw' => SiteSetting::get('phone_raw', '5537999673426'),
            'whatsapp_link' => 'https://wa.me/' . SiteSetting::get('phone_raw', '5537999673426'),
            'email' => SiteSetting::get('email', 'contato@segurancaatlas.com.br'),
        ];

        return view('service-detail', compact('service', 'relatedServices', 'company'));
    }
}
