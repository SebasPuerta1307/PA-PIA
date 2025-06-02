<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Estudiante extends Model
{
   protected $fillable = ['nombre', 'correo', 'programa_id'];

    public function programa() {
        return $this->belongsTo(Programa::class);
    }
}
