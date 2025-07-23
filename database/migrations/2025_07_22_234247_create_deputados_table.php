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
        Schema::create('deputados', function (Blueprint $table) {
            $table->id();
            $table->integer('deputado_id')->unique(); // ID da API
            $table->string('nome');
            $table->string('partido')->nullable(); // siglaPartido
            $table->string('uf')->nullable(); // siglaUf
            $table->integer('id_legislatura')->nullable();
            $table->string('url_foto')->nullable();
            $table->string('email')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('deputados');
    }
};
