<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Asignatura extends Model
{
    use HasFactory;

    protected $fillable = ['nombre','programa_id'];

    public function programa() {
        return $this->belongsTo(Programa::class);
    }
}
