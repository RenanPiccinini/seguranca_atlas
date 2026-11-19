<?php

use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\QuoteController;
use Illuminate\Support\Facades\Route;

// Website Public Routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/servicos/{slug}', [HomeController::class, 'serviceDetail'])->name('service.detail');
Route::post('/contato', [ContactController::class, 'store'])->name('contact.store');
Route::post('/orcamento', [QuoteController::class, 'store'])->name('quote.store');

// Operational Leads & Inquiries Dashboard
Route::prefix('painel')->group(function () {
    Route::get('/', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
    Route::patch('/orcamentos/{id}', [AdminDashboardController::class, 'updateQuoteStatus'])->name('admin.quote.update');
    Route::patch('/mensagens/{id}', [AdminDashboardController::class, 'updateContactStatus'])->name('admin.contact.update');
});
