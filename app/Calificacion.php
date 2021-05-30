<?php

namespace escuela;

use Illuminate\Database\Eloquent\Model;

class Calificacion extends Model
{
    protected $table='calificacion';
    protected $primaryKey='idcalificacion';
    public $timestamps=false;

    protected $fillable =[
        'idalumno',
        'califuno',
        'califdos',
        'califtres',
        'califcuatro',
        'califcinco',
        'promedio'    
    ];

    protected $guarded=[

    ];
}
