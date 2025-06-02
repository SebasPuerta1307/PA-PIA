<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Instituciones extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre'
    ];
    
    public function facultades()
{
    return $this->hasMany(Facultad::class);
}
}

