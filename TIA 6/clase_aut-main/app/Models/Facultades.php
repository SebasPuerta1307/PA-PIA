<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Facultades extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'institucion_id'];

    public function institucion()
    {
        return $this->belongsTo(Instituciones::class);
    }
}