<?php

namespace App\Http\Controllers;

use App\Models\ContactMessage;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:120',
            'email' => 'required|email|max:150',
            'phone' => 'required|string|max:30',
            'service' => 'nullable|string|max:100',
            'subject' => 'nullable|string|max:150',
            'message' => 'required|string|max:3000',
        ]);

        $contact = ContactMessage::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'],
            'service' => $validated['service'] ?? 'Geral',
            'subject' => $validated['subject'] ?? 'Contato pelo Site Atlas',
            'message' => $validated['message'],
            'status' => 'nova',
            'ip_address' => $request->ip(),
        ]);

        // Build prefilled WhatsApp URL
        $phoneNum = '5537999673426';
        $serviceText = $validated['service'] ? " para o serviço: " . $validated['service'] : "";
        $waMsg = "Olá! Me chamo {$validated['name']} e enviei uma mensagem pelo site Atlas{$serviceText}.\nContato: {$validated['phone']}\n\nAssunto: " . ($validated['subject'] ?? 'Informações Gerais') . "\n\nMensagem: {$validated['message']}";
        $waUrl = "https://wa.me/{$phoneNum}?text=" . rawurlencode($waMsg);

        if ($request->wantsJson() || $request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => 'Sua mensagem foi enviada com sucesso! Nossa equipe entrará em contato prontamente.',
                'id' => $contact->id,
                'whatsapp_url' => $waUrl,
            ]);
        }

        return redirect()->back()->with('success', 'Mensagem enviada com sucesso! Em breve entraremos em contato.');
    }
}
