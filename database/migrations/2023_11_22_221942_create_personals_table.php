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
        Schema::create('personals', function (Blueprint $table) {
            $table->id();
            $table->string('RFC', 13)->unique();
            $table->string('Nombres', 50);
            $table->string('apellidoP', 50);
            $table->string('apellidoM', 50);
            $table->string('licenciatura', 200);
            $table->char('licPasTit', 1);
            $table->string('especializacion', 200);
            $table->char('espPasTit', 1);
            $table->string('maestria', 200);
            $table->char('maePasTit', 1);
            $table->string('doctorado', 200);
            $table->char('docPasTit', 1);

            $table->foreignId('deptos_id')
                   ->constrained()
                   ->onUpdate('cascade')
                   ->onDelete('cascade');  
            
            $table->date('fechaIngSep');
            $table->date('fechaIngIns');

            $table->foreignId('puestos_id')
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
        Schema::dropIfExists('personals');
    }
};
