<?php

namespace escuela\Http\Controllers;

use Illuminate\Http\Request;

use escuela\Http\Requests;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use escuela\Http\Requests\AlumnoFormRequest;
use escuela\Alumno;
use escuela\Calificacion;
use DB;

class ReprobadosController extends Controller
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
          ->where('c.promedio','<','6')
          ->where('a.nombre','like','%'.$query.'%')
           ->orderBy('c.idcalificacion','asc')
           ->paginate(10);

          return view('reprobado.index',["calificaciones"=>$calificaciones,"searchText"=>$query]);
         }
       }


       public function show($id)
       {
        
        $alumno=DB::table('calificacion as c')
          ->join('alumno as a','c.idalumno','=','a.idalumno')
          ->select('c.idcalificacion','a.nombre','a.apellidos','a.responsable','a.emailresponsable','c.califuno','c.califdos','c.califtres','c.califcuatro','c.califcinco','c.promedio')
          ->where('c.condicion','=','1')
          ->where('idcalificacion','=',$id)
           ->orderBy('c.idcalificacion','asc')
           ->paginate(10);

       
         return view("reprobado.show",["alumno"=>$alumno]); 
       }
       
       public function store(AlumnoFormRequest $request){
        $alumno= new Alumno;
        $alumno->emailresponsable=$request->get('emailresponsable');
        
        $mail = $alumno->emailresponsable;
        $message = 'Alumno reprobado';
        
        $header = "De: escuelaprueba@gmail.com \r\n";
        $header .= "X-Mailer: PHP/" . phpversion() . " \r\n";
        $header .= "Mime-Version: 1.0 \r\n";
        $header .= "Content-Type: text/plain";
        
        $message .= "Su e-mail es: " . $mail . " \r\n";
        $message .= "Mensaje: Alumno reprobado \r\n";
        $message .= "Enviado el: " . date('d/m/Y', time());
        
        $para =  $alumno->emailresponsable;;
        $asunto = 'Mensaje Urgente';
        
        mail($para, $asunto, utf8_decode($message), $header);
        
        
        




        Session::flash('message','El alumno se guardo correctamente');
        return Redirect::to('alumno');

}
}
