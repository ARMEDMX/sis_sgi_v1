<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Periodos;
use App\Models\HorariosMaterias;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Horarios extends Model
{
    use HasFactory;

    protected $fillable = ['fecha', 'periodos_id','personals_id'];

    public function periodos() 
    {
        return $this->belongsTo(Periodos::class, 'periodos_id');
    }

    public function personal() 
    {
        return $this->belongsTo(Personal::class, 'personals_id');
    }

    public function horariosmaterias(): HasMany
    {
        return $this->hasMany(HorariosMaterias::class);
    }
}
