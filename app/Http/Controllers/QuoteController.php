<?php

namespace App\Http\Controllers;

use App\Models\QuoteRequest;
use Illuminate\Http\Request;

class QuoteController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:120',
            'company' => 'nullable|string|max:150',
            'phone' => 'required|string|max:30',
            'email' => 'required|email|max:150',
            'service_type' => 'required|string|max:120',
            'segment' => 'nullable|string|max:100',
            'period' => 'nullable|string|max:80',
            'city' => 'nullable|string|max:100',
            'details' => 'nullable|string|max:3000',
            'urgency' => 'nullable|string|max:50',
        ]);

        $city = !empty($validated['city']) ? $validated['city'] : 'Arcos - MG';

        // Calculation simulation heuristic for estimation preview
        $basePrices = [
            'seguranca-privada' => 4500,
            'equipe-de-apoio' => 2800,
            'brigadista' => 3800,
            'seguranca-hospitalar' => 4800,
            'portaria-controle-acesso' => 3200,
            'vigia-patrimonial' => 3400,
            'cftv-monitoramento' => 1900,
        ];

        $serviceKey = strtolower(preg_replace('/[^a-zA-Z0-9]/', '', $validated['service_type']));
        $estimated = 3500;
        foreach ($basePrices as $key => $price) {
            if (str_contains($serviceKey, str_replace('-', '', $key))) {
                $estimated = $price;
                break;
            }
        }

        if (($validated['period'] ?? '') === '24 Horas') {
            $estimated *= 1.8;
        }

        $quote = QuoteRequest::create([
            'name' => $validated['name'],
            'company' => $validated['company'],
            'phone' => $validated['phone'],
            'email' => $validated['email'],
            'service_type' => $validated['service_type'],
            'segment' => $validated['segment'] ?? 'Geral / Corporativo',
            'period' => $validated['period'] ?? 'A Definir',
            'city' => $city,
            'details' => $validated['details'],
            'urgency' => $validated['urgency'] ?? 'Normal',
            'estimated_budget' => $estimated,
            'status' => 'pendente',
            'ip_address' => $request->ip(),
        ]);

        $phoneNum = '5537999673426';
        $companyStr = $validated['company'] ? " (Empresa: {$validated['company']})" : "";
        $waMsg = "🛡️ *Solicitação de Orçamento - Atlas Segurança e Zeladoria*\n\n"
            . "👤 *Nome:* {$validated['name']}{$companyStr}\n"
            . "📞 *Telefone:* {$validated['phone']}\n"
            . "📧 *E-mail:* {$validated['email']}\n"
            . "📍 *Cidade:* {$city}\n"
            . "🎯 *Serviço:* {$validated['service_type']}\n"
            . "🏢 *Segmento:* " . ($validated['segment'] ?? 'Não especificado') . "\n"
            . "⏰ *Escala/Período:* " . ($validated['period'] ?? 'A alinhar') . "\n"
            . "📝 *Detalhes:* " . ($validated['details'] ?? 'Gostaria de agendar uma vistoria técnica gratuita.');

        $waUrl = "https://wa.me/{$phoneNum}?text=" . rawurlencode($waMsg);

        if ($request->wantsJson() || $request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => 'Solicitação de orçamento registrada com sucesso! Nossos consultores entrarão em contato para validar os detalhes técnicos.',
                'quote_id' => $quote->id,
                'estimated_value' => number_format($estimated, 2, ',', '.'),
                'whatsapp_url' => $waUrl,
            ]);
        }

        return redirect()->back()->with('success', 'Solicitação de orçamento enviada com sucesso!');
    }
}
