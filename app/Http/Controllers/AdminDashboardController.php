<?php

namespace App\Http\Controllers;

use App\Models\ContactMessage;
use App\Models\Differential;
use App\Models\QuoteRequest;
use App\Models\Service;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'total_quotes' => QuoteRequest::count(),
            'pending_quotes' => QuoteRequest::where('status', 'pendente')->count(),
            'total_contacts' => ContactMessage::count(),
            'unread_contacts' => ContactMessage::where('status', 'nova')->count(),
            'total_services' => Service::count(),
        ];

        $quotes = QuoteRequest::orderBy('created_at', 'desc')->take(20)->get();
        $contacts = ContactMessage::orderBy('created_at', 'desc')->take(20)->get();
        $services = Service::orderBy('display_order', 'asc')->get();

        return view('admin.dashboard', compact('stats', 'quotes', 'contacts', 'services'));
    }

    public function updateQuoteStatus(Request $request, $id)
    {
        $quote = QuoteRequest::findOrFail($id);
        $quote->update(['status' => $request->input('status', 'analisado')]);

        return redirect()->back()->with('success', 'Status da proposta atualizado!');
    }

    public function updateContactStatus(Request $request, $id)
    {
        $contact = ContactMessage::findOrFail($id);
        $contact->update(['status' => $request->input('status', 'respondida')]);

        return redirect()->back()->with('success', 'Status da mensagem atualizado!');
    }
}
