<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

use App\Models\Reticula;

class Carrera extends Model
{
    use HasFactory;

    protected $fillable = ['nombre','nombrecorto', 'deptos_id'];

    public function depto() 
    {
        return $this->belongsTo(Deptos::class, 'deptos_id');
    }

    // public function depto(): BelongsTo
    // {
    //     return $this->belongsTo(Deptos::class);
    // }
    
    public function reticulas(): HasMany
    {
        return $this->hasMany(Reticula::class);
    }

    

    
}
