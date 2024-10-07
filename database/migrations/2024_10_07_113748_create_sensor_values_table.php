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
        Schema::create('sensor_values', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('id_alat')->nullable();
            $table->float('nilai');
            $table->string('tipe');
            $table->timestamps();

            $table->foreign('id_alat')->references('id_alat')->on('alat')
                ->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sensor_values');
    }
};
