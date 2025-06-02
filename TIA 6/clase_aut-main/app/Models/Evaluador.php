<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Evaluador extends Model
{
    protected $table = 'evaluadores';
    protected $fillable = ['nombre', 'correo'];
}
