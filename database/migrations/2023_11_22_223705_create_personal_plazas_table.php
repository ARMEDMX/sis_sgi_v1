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
        Schema::create('personal_plazas', function (Blueprint $table) {
            $table->id();
            $table->integer('tipoNombramiento')->length(3);
            
            $table->foreignId('plazas_id')
                   ->constrained()
                   ->onUpdate('cascade')
                   ->onDelete('cascade');  

            $table->foreignId('personals_id')
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
        Schema::dropIfExists('personal_plazas');
    }
};
