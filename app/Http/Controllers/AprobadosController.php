<?php

namespace escuela\Http\Controllers;

use Illuminate\Http\Request;

use escuela\Http\Requests;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use escuela\Http\Requests\CalificacionFormRequest;
use escuela\Alumno;
use escuela\Calificacion;
use DB;

class AprobadosController extends Controller
{
    public function __construct()
    {
    
    }
     public function index(Request $request)
       {
        if($request)
   
        { 
          $query=trim($request->get('searchText'));
          $calificaciones=DB::table('calificacion as c')
          ->join('alumno as a','c.idalumno','=','a.idalumno')
          ->select('c.idcalificacion','a.nombre','a.apellidos','c.califuno','c.califdos','c.califtres','c.califcuatro','c.califcinco','c.promedio')
          ->where('c.condicion','=','1')
          ->where('c.promedio','>=','6')
          ->where('a.nombre','like','%'.$query.'%')
           ->orderBy('c.idcalificacion','asc')
           ->paginate(10);

          return view('aprobado.index',["calificaciones"=>$calificaciones,"searchText"=>$query]);
         }
       }
    
}
