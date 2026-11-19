<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactMessage;
use Illuminate\Http\Request;

class ContactMessageController extends Controller
{
    public function index(Request $request)
    {
        $status = $request->query('status');
        $query = ContactMessage::orderBy('created_at', 'desc');

        if ($status) {
            $query->where('status', $status);
        }

        $messages = $query->paginate(15)->withQueryString();

        $counts = [
            'total' => ContactMessage::count(),
            'nova' => ContactMessage::where('status', 'nova')->count(),
            'lida' => ContactMessage::where('status', 'lida')->count(),
            'respondida' => ContactMessage::where('status', 'respondida')->count(),
        ];

        return view('admin.messages.index', compact('messages', 'counts', 'status'));
    }

    public function updateStatus(Request $request, $id)
    {
        $message = ContactMessage::findOrFail($id);
        $newStatus = $request->input('status', 'lida');
        $message->update(['status' => $newStatus]);

        return redirect()->back()->with('success', "Status da mensagem atualizado para '{$newStatus}'!");
    }

    public function destroy($id)
    {
        $message = ContactMessage::findOrFail($id);
        $message->delete();

        return redirect()->back()->with('success', "Mensagem de contato excluída com sucesso.");
    }
}
