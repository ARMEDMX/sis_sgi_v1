<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;


class Reticula extends Model
{
    use HasFactory;

    protected $fillable = ['descripcion','fechaenvigor', 'carrera_id'];
    protected $table = 'reticulas';

   
    public function carreras(): BelongsTo
    {
        return $this->belongsTo(Carrera::class, 'carrera_id');
    }

    public function materias(): HasMany
    {
        return $this->hasMany(Materias::class);
    }
    
   
   
}
