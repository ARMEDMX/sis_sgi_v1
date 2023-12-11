<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Carrera; 
use App\Models\Personal; 


class Deptos extends Model
{
    use HasFactory;
    protected $fillable = ['nombre','nombrecorto','descripcion'];

    public function carreras(): HasMany
    {
        return $this->hasMany(Carrera::class);
    }

    public function personal(): HasMany
    {
        return $this->hasMany(Personal::class);
    }


}
