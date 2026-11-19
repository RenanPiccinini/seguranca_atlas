<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('quote_requests', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('company')->nullable();
            $table->string('phone');
            $table->string('email');
            $table->string('service_type');
            $table->string('segment')->nullable(); // Industrial, Hospitalar, Usina Fotovoltaica, Comercial, Condomínio, Evento
            $table->string('period')->nullable(); // 24 Horas, Diurno, Noturno, Eventual
            $table->string('city')->default('Arcos - MG');
            $table->text('details')->nullable();
            $table->string('urgency')->default('normal'); // urgente, essa_semana, planejando
            $table->decimal('estimated_budget', 12, 2)->nullable();
            $table->string('status')->default('pendente'); // pendente, analisado, proposta_enviada, fechado
            $table->string('ip_address', 45)->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('quote_requests');
    }
};
