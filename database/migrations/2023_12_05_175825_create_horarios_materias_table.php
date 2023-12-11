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
        Schema::create('horarios_materias', function (Blueprint $table) {
            $table->id();
            $table->string('grupos', 50);
            $table->integer('totalEstudiantes')->length(2);
            
            $table->foreignId('horarios_id')
                   ->constrained()
                   ->onUpdate('cascade')
                   ->onDelete('cascade');  
 
            $table->string('tipoLugar', 50);

            $table->foreignId('materias_id')
                   ->constrained()
                   ->onUpdate('cascade')
                   ->onDelete('cascade'); 

            $table->string('lunes', 5);
            $table->string('martes', 5);
            $table->string('miercoles', 5);
            $table->string('jueves', 5);
            $table->string('viernes', 5);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('horarios_materias');
    }
};
