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
        Schema::create('PRO_PROCESO', function (Blueprint $table) {
            $table->increments('PRO_ID');
            $table->string('PRO_PREFIJO');
            $table->string('PRO_NOMBRE');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('PRO_PROCESO');
    }
};
