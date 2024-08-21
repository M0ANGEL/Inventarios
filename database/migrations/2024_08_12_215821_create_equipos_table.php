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
        Schema::create('equipos', function (Blueprint $table) {
            $table->id();
            $table->string('serial');
            $table->string('marca');
            $table->string('equipo');
            $table->boolean('estado')->default(0);
            $table->unsignedBigInteger('users_id'); // Clave foránea
            // Configuración de la clave foránea
            $table->foreign('users_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('proveedor');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('equipos');
    }
};
