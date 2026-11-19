<?php

namespace App\Http\Controllers;

use App\Models\ContactMessage;
use App\Models\Differential;
use App\Models\GalleryItem;
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
            'read_quotes' => QuoteRequest::where('status', 'lida')->count(),
            'concluded_quotes' => QuoteRequest::where('status', 'concluida')->count(),
            'total_differentials' => Differential::count(),
            'total_services' => Service::count(),
            'total_photos' => GalleryItem::count(),
        ];

        $recentQuotes = QuoteRequest::orderBy('created_at', 'desc')->take(8)->get();

        return view('admin.dashboard', compact('stats', 'recentQuotes'));
    }
}
