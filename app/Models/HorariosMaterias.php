<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Horarios;

class HorariosMaterias extends Model
{
    use HasFactory;
    protected $fillable = ['grupos', 'totalEstudiantes', 'tipoLugar', 'lunes', 'martes', 'miercoles', 'jueves', 'viernes', 'horarios_id','materias_id'];

    public function horarios() 
    {
        return $this->belongsTo(Horarios::class, 'horarios_id');
    }

    public function materias() 
    {
        return $this->belongsTo(Materias::class, 'materias_id');
    }

}
