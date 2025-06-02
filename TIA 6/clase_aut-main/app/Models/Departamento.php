<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'facultad_id']; // Asegúrate que 'facultad_id' esté aquí

    // Relación: Un Departamento pertenece a una Facultad
    public function facultad()
    {
        return $this->belongsTo(Facultades::class);
    }

    // Relación: Un Departamento puede tener muchos Programas
    public function programas()
    {
        return $this->hasMany(Programa::class);
    }
}
