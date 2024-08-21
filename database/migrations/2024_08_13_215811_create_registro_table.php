<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('registro', function (Blueprint $table) {
            $table->id();
            $table->string('empresa');
            $table->unsignedBigInteger('users_id');
            $table->foreign('users_id')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('equipos_id');
            $table->foreign('equipos_id')->references('id')->on('equipos')->onDelete('cascade');
            $table->string('recibe');
            $table->string('entrega')->nullable();
            $table->boolean('estado')->default(1);
            $table->date('fecha_salida')->nullable();
            $table->string('observacion_entrada')->nullable();
            $table->string('observacion_salida')->nullable();
            $table->string('tc_recibe')->nullable();
            $table->timestamps();
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('registro');
    }
};
