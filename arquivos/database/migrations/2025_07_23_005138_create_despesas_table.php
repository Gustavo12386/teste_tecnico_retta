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
        Schema::create('despesas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('deputado_id')->constrained('deputados')->onDelete('cascade');
            $table->integer('ano');
            $table->integer('mes');
            $table->string('tipo_despesa');
            $table->bigInteger('cod_documento')->unique();
            $table->string('tipo_documento');
            $table->integer('cod_tipo_documento');
            $table->date('data_documento');
            $table->string('num_documento');
            $table->decimal('valor_documento', 10, 2);
            $table->string('url_documento')->nullable();
            $table->string('nome_fornecedor');
            $table->string('cnpj_cpf_fornecedor');
            $table->decimal('valor_liquido', 10, 2);
            $table->decimal('valor_glosa', 10, 2);
            $table->string('num_ressarcimento')->nullable();
            $table->bigInteger('cod_lote');
            $table->integer('parcela');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('despesas');
    }
};
