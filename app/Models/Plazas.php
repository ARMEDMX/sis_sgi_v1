<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Plazas extends Model
{
    use HasFactory;
    protected $fillable = ['nombrePlaza'];

    public function personalplazas(): HasMany
    {
        return $this->hasMany(PersonalPlazas::class);
    }

}
