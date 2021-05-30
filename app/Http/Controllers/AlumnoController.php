<?php

namespace escuela\Http\Controllers;

use Illuminate\Http\Request;

use escuela\Http\Requests;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use escuela\Http\Requests\AlumnoFormRequest;
use escuela\Alumno;
use DB;


class AlumnoController extends Controller
{
    public function __construct()
    {
  
    }
     public function index(Request $request)
       {
           if($request)
   
               { 
                 $query=trim($request->get('searchText'));
                 $alumnos=DB::table('alumno')->where('nombre','like','%'.$query.'%')
                 ->where('condicion','=','1')
                 ->orderBy('idalumno','asc')
                  ->paginate(10);
   
                 return view('alumno.index',["alumnos"=>$alumnos,"searchText"=>$query]);
                }
       }

    public function create(){
     return view("alumno.create"); 
   }

   public function store(AlumnoFormRequest $request){
     $alumno= new Alumno;
     $alumno->nombre=$request->get('nombre');
     $alumno->apellidos=$request->get('apellidos');
     $alumno->responsable=$request->get('responsable');
     $alumno->emailresponsable=$request->get('emailresponsable');
     $alumno->condicion='1';
     $alumno->save();
     Session::flash('message','El alumno se guardo correctamente');
     return Redirect::to('alumno');
   }
   
   public function show($id)
   {
    $alumno=DB::table('alumno')
    ->where('idalumno','=',$id)
    ->get();
     return view("alumno.show",["alumno"=>$alumno]); 
   }
   
   public function edit($id)
    {
      return view("alumno.edit",["alumno"=>Alumno::findOrFail($id)]); 
     }
       
     public function update(AlumnoFormRequest $request,$id)
     {
     $alumno=Alumno::findOrFail($id);
     $alumno->nombre=$request->get('nombre');
     $alumno->apellidos=$request->get('apellidos');
     $alumno->responsable=$request->get('responsable');
     $alumno->emailresponsable=$request->get('emailresponsable');
     $alumno->condicion='1';
     $alumno->update();
      Session::flash('message','El alumno se actualizo correctamente');
      return Redirect::to('alumno');
     }
   
     public function destroy($id){
       $alumno=Alumno::findOrFail($id);
       $alumno->condicion='0';
       $alumno->update();
       Session::flash('message','El alumno se eliminó correctamente');
         return Redirect::to('alumno');
     }   
}
