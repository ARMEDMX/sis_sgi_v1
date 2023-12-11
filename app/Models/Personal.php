<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Puestos; 
use App\Models\Deptos;
use App\Models\Horarios;
use Illuminate\Database\Eloquent\Relations\HasMany; 


class Personal extends Model
{
    use HasFactory;

    protected $fillable = ['RFC','Nombres', 'apellidoP', 'apellidoM', 'licenciatura', 'licPasTit', 'especializacion', 'espPasTit', 'maestria', 'maePasTit', 'doctorado', 'docPasTit', 'deptos_id', 'fechaIngSep', 'fechaIngIns', 'puestos_id'];

    public function deptos() 
    {
        return $this->belongsTo(Deptos::class, 'deptos_id');
    }

    public function puestos() 
    {
        return $this->belongsTo(Puestos::class, 'puestos_id');
    }

    public function personalplazas(): HasMany
    {
        return $this->hasMany(PersonalPlazas::class);
    }

    public function horarios(): HasMany
    {
        return $this->hasMany(Horarios::class);
    }
}

