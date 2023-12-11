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
        Schema::create('materias', function (Blueprint $table) {
            $table->id();
            $table->string('nombreMateria', 200)->nullable;
            $table->char('nivel', 1)->nullable;
            $table->string('nombreMediano', 25)->nullable;
            $table->string('nombreCorto', 10)->nullable;
            $table->char('modalidad', 1)->nullable;
            
            // Llave foranea
            $table->foreignId('reticula_id')
                   ->constrained()
                   ->onUpdate('cascade')
                   ->onDelete('cascade');   
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('materias');
    }
};
