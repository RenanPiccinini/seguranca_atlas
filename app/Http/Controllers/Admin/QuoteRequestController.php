<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\QuoteRequest;
use Illuminate\Http\Request;

class QuoteRequestController extends Controller
{
    public function index(Request $request)
    {
        $status = $request->query('status');
        $search = $request->query('search');

        $query = QuoteRequest::orderBy('created_at', 'desc');

        if ($status && in_array($status, ['pendente', 'lida', 'concluida'])) {
            $query->where('status', $status);
        }

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('company', 'like', "%{$search}%")
                  ->orWhere('phone', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%")
                  ->orWhere('service_type', 'like', "%{$search}%");
            });
        }

        $quotes = $query->paginate(15)->withQueryString();

        $counts = [
            'total' => QuoteRequest::count(),
            'pendente' => QuoteRequest::where('status', 'pendente')->count(),
            'lida' => QuoteRequest::where('status', 'lida')->count(),
            'concluida' => QuoteRequest::where('status', 'concluida')->count(),
        ];

        return view('admin.quotes.index', compact('quotes', 'counts', 'status', 'search'));
    }

    public function show($id)
    {
        $quote = QuoteRequest::findOrFail($id);
        return response()->json($quote);
    }

    public function updateStatus(Request $request, $id)
    {
        $quote = QuoteRequest::findOrFail($id);
        $newStatus = $request->input('status', 'lida');
        $quote->update(['status' => $newStatus]);

        return redirect()->back()->with('success', "Status da solicitação de {$quote->name} atualizado para '{$newStatus}'!");
    }

    public function destroy($id)
    {
        $quote = QuoteRequest::findOrFail($id);
        $name = $quote->name;
        $quote->delete();

        return redirect()->back()->with('success', "Solicitação de {$name} excluída com sucesso.");
    }
}
