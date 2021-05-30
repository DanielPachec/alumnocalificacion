<?php

namespace escuela;

use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
    protected $table='alumno';
    protected $primaryKey='idalumno';
    public $timestamps=false;

    protected $fillable =[
        'nombre',
        'apellidos',
        'responsable',
        'emailresponsabel',
        'condicion'

    ];

    protected $guarded=[

    ];
}
