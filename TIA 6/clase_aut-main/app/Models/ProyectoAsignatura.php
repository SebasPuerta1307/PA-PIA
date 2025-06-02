<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProyectoAsignatura extends Model
{
    protected $fillable = ['proyecto_id', 'asignatura_id', 'grupo', 'docente_id'];

    public function proyecto() {
        return $this->belongsTo(Proyecto::class);
    }

    public function asignatura() {
        return $this->belongsTo(Asignatura::class);
    }

    public function docente() {
        return $this->belongsTo(Docente::class);
    }
}

