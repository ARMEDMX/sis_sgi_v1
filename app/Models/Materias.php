<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\HorariosMaterias;
use App\Models\Reticula;

class Materias extends Model
{
    use HasFactory;

    protected $fillable = ['nombreMateria','nivel', 'nombreMediano','nombreCorto','modalidad', 'reticula_id'];

    public function reticulas(): BelongsTo
    {
        return $this->belongsTo(Reticula::class, 'reticula_id');
    }

    public function horariosmaterias(): HasMany
    {
        return $this->hasMany(HorariosMaterias::class);
    }
}
