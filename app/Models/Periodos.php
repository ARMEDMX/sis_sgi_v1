<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Horarios;

class Periodos extends Model
{
    use HasFactory;

    protected $fillable = ['periodo','descCorta', 'fechaIni','fechaFin'];

    public function horarios(): HasMany
    {
        return $this->hasMany(Horarios::class);
    }
}
