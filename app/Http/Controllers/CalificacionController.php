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

class CalificacionController extends Controller
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
          ->where('a.nombre','like','%'.$query.'%')
           ->orderBy('c.idcalificacion','asc')
           ->paginate(10);

          return view('calificacion.index',["calificaciones"=>$calificaciones,"searchText"=>$query]);
         }
       }


    public function create(){
     $alumnos=DB::table('alumno')->get();
     return view("calificacion.create",["alumnos"=>$alumnos]); 
   }

   public function store(CalificacionFormRequest $request){
    $calificacion= new Calificacion;
    $calificacion->idalumno=$request->get('idalumno');
    $calificacion->califuno=$request->get('califuno');
    $calificacion->califdos=$request->get('califdos');
    $calificacion->califtres=$request->get('califtres');
    $calificacion->califcuatro=$request->get('califcuatro');
    $calificacion->califcinco=$request->get('califcinco');
    
    $suma=floatval($calificacion->califuno)+floatval($calificacion->califdos)+floatval($calificacion->califtres)+floatval($calificacion->califcuatro)+floatval($calificacion->califcinco);
    $calif=5;
    $promedio=$suma/$calif;
    $calificacion->promedio=$promedio;
    $calificacion->condicion='1';
    $calificacion->save();
     Session::flash('message','La calificación se guardo correctamente');
     return Redirect::to('calificacion');
   }
   
   public function show($id)
   {
    $lider=Lider::findOrFail($id);
    $zonasescolar=DB::table('zonae')->get();
    $alumno=DB::table('alumno as a')
    ->join ('lider as l','a.idlider','=','l.idlider')
    ->select('a.idalumno','l.idlider','a.nombre','a.papellido','a.sapellido','a.ncontrol','a.nivel','a.grado','a.curp')
    ->where('l.idlider','=',$id)
    ->orderBy('l.idlider','asc')
    ->paginate(20);

    $calificacion=DB::table('calificacion')->get();
   /* $alumno=DB::table('alumno as a')
    ->join ('lider as l','a.idlider','=','l.idlider')
    ->join ('calificacion as c','c.idalumno',"=",'a.idalumno')
    ->select('l.idlider','a.nombre','a.papellido','a.sapellido','a.ncontrol','a.nivel','a.grado','a.curp')
    ->where('l.idlider','=',$id)
    ->orderBy('l.idlider','asc')
    ->paginate(20);
*/
    return view("calificacion.show",["lider"=>$lider,"zonasescolar"=>$zonasescolar,"alumno"=>$alumno,"calificacion"=>$calificacion]);
   }

//falta corregir
   
   public function edit($id)
    {
        $calificacion=Calificacion::findOrFail($id);
        $alumnos=DB::table('alumno')->get();
        return view("calificacion.edit",["calificacion"=>$calificacion,"alumnos"=>$alumnos]);
      
     }
       


     public function update(CalificacionFormRequest $request,$id)
     {
     $calificacion=Calificacion::findOrFail($id);
     $calificacion->idalumno=$request->get('idalumno');
     $calificacion->califuno=$request->get('califuno');
     $calificacion->califdos=$request->get('califdos');
     $calificacion->califtres=$request->get('califtres');
     $calificacion->califcuatro=$request->get('califcuatro');
     $calificacion->califcinco=$request->get('califcinco');
    
     $suma=floatval($calificacion->califuno)+floatval($calificacion->califdos)+floatval($calificacion->califtres)+floatval($calificacion->califcuatro)+floatval($calificacion->califcinco);
     $calif=5;
     $promedio=$suma/$calif;
     $calificacion->promedio=$promedio;
     $calificacion->update();
      Session::flash('message','La calificación se actualizo correctamente');
      return Redirect::to('calificacion');
     }
   
     public function destroy($id){
      $calificacion=Calificacion::findOrFail($id);
      $calificacion->condicion='0';
      $calificacion->update(); 
       Session::flash('message','La calificació se eliminó correctamente');
         return Redirect::to('calificacion');
     }
}
