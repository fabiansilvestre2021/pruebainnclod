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
        Schema::create('DOC_DOCUMENTO', function (Blueprint $table) {
            $table->increments('DOC_ID');
            $table->string('DOC_NOMBRE');
            $table->string('DOC_CODIGO');
            $table->string('DOC_CONTENIDO');
            $table->unsignedInteger('DOC_ID_TIPO');
            $table->unsignedInteger('DOC_ID_PROCESO');
            $table->timestamps();
            
            $table->foreign('DOC_ID_PROCESO')
     ->references('PRO_ID')->on('PRO_PROCESO')->onDelete('cascade');

            $table->foreign('DOC_ID_TIPO')
     ->references('TIP_ID')->on('TIP_TIPO_DOC')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('DOC_DOCUMENTO');
    }
};
