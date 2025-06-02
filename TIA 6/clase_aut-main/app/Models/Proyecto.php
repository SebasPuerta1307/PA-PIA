<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Proyecto extends Model
{
    protected $fillable = ['titulo', 'descripcion', 'tipo_proyecto_id'];

    public function tipo() {
        return $this->belongsTo(TiposProyecto::class, 'tipo_proyecto_id');
    }
}
