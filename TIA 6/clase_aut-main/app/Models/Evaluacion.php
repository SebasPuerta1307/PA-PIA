<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evaluacion extends Model
{
    use HasFactory;
    protected $table = 'evaluaciones';
    public $timestamps = true;
    protected $casts = [
    'fecha' => 'datetime',
    ];
    protected $fillable = [
        'proyecto_id',
        'evaluador_id',
        'fecha',
        'criterio1',
        'criterio2',
        'criterio3',
        'observaciones',
    ];

    public function proyecto()
    {
        return $this->belongsTo(Proyecto::class);
    }

    public function evaluador()
    {
        return $this->belongsTo(Evaluador::class);
    }
}
