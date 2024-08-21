<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('lotes', function (Blueprint $table) {
            $table->id();
            $table->string('empresa');
            $table->boolean('paga');
            $table->integer('n_cuotas_n')->nullable();
            $table->integer('n_cuotas_f')->nullable();
            $table->integer('can_equipos')->nullable();
            $table->date('fecha_termino');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lotes');
    }
};
