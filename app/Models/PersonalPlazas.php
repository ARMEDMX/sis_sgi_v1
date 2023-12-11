<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersonalPlazas extends Model
{
    use HasFactory;

    protected $fillable = ['tipoNombramiento','plazas_id','personals_id'];

    public function plazas() 
    {
        return $this->belongsTo(Plazas::class, 'plazas_id');
    }

    public function personal() 
    {
        return $this->belongsTo(Personal::class, 'personals_id');
    }

}
