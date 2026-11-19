<?php

use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\Admin\ContactMessageController;
use App\Http\Controllers\Admin\DifferentialController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\QuoteRequestController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\QuoteController;
use Illuminate\Support\Facades\Route;

// Website Public Routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/servicos/{slug}', [HomeController::class, 'serviceDetail'])->name('service.detail');
Route::post('/contato', [ContactController::class, 'store'])->name('contact.store');
Route::post('/orcamento', [QuoteController::class, 'store'])->name('quote.store');

// Operational Management & CMS Panel (Menus na Esquerda)
Route::prefix('painel')->name('admin.')->group(function () {
    // Dashboard Overview
    Route::get('/', [AdminDashboardController::class, 'index'])->name('dashboard');

    // Leads / Solicitações de Orçamento
    Route::get('/orcamentos', [QuoteRequestController::class, 'index'])->name('quotes.index');
    Route::get('/orcamentos/{id}', [QuoteRequestController::class, 'show'])->name('quotes.show');
    Route::patch('/orcamentos/{id}/status', [QuoteRequestController::class, 'updateStatus'])->name('quotes.status');
    Route::delete('/orcamentos/{id}', [QuoteRequestController::class, 'destroy'])->name('quotes.destroy');

    // Mensagens de Contato
    Route::get('/mensagens', [ContactMessageController::class, 'index'])->name('messages.index');
    Route::patch('/mensagens/{id}/status', [ContactMessageController::class, 'updateStatus'])->name('messages.status');
    Route::delete('/mensagens/{id}', [ContactMessageController::class, 'destroy'])->name('messages.destroy');

    // Gerenciar Serviços (CRUD Completo)
    Route::resource('servicos', ServiceController::class)->names('services');

    // Gerenciar Galeria de Fotos (CRUD)
    Route::get('/galeria', [GalleryController::class, 'index'])->name('gallery.index');
    Route::post('/galeria', [GalleryController::class, 'store'])->name('gallery.store');
    Route::put('/galeria/{id}', [GalleryController::class, 'update'])->name('gallery.update');
    Route::delete('/galeria/{id}', [GalleryController::class, 'destroy'])->name('gallery.destroy');

    // Gerenciar Diferenciais (CRUD)
    Route::get('/diferenciais', [DifferentialController::class, 'index'])->name('differentials.index');
    Route::post('/diferenciais', [DifferentialController::class, 'store'])->name('differentials.store');
    Route::put('/diferenciais/{id}', [DifferentialController::class, 'update'])->name('differentials.update');
    Route::delete('/diferenciais/{id}', [DifferentialController::class, 'destroy'])->name('differentials.destroy');

    // Configurações Gerais & Textos do Site
    Route::get('/configuracoes', [SettingController::class, 'index'])->name('settings.index');
    Route::post('/configuracoes', [SettingController::class, 'update'])->name('settings.update');
});
