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
        Schema::create('TIP_TIPO_DOC', function (Blueprint $table) {
            $table->increments('TIP_ID');
            $table->string('TIP_NOMBRE');
            $table->string('TIP_PREFIJO');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('TIP_TIPO_DOC');
    }
};
