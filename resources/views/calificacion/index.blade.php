@extends ('layouts.admin')
@section ('contenido')
 <div class="row">
 	  @if(Session::has('message'))
	  <div class="alert alert-success alert-dismissible" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <center>{{Session::get('message')}}</center>
      </div>
	  <script>
 window.setTimeout(function(){
	 $(".alert").fadeTo(1500,0).slideDown(1000, 
	 function(){
		 $(this).remove();
	 });
 }, 2000);
 </script>
      @endif
 	<div class="col-lg-10 col-md-8 col-sm-8 col-xs-12">
 	  <h3 align="center">Calficaciones de alumnos  <a href="escuela/public/alumno/"> <button class="btn btn-success">Volver al listado de alumnos </button></a>
	   <a href="escuela/public/aprobados/"> <button class="btn btn-info">Alumnos Aprobados </button></a>
	   <a href="escuela/public/reprobados/"> <button class="btn btn-danger">Alumnos Reprobados </button></a>
	   </h3>
 	   @include('calificacion.search')
 	 </div>
</div>

<div class="box-body">
 	       <div class="table-responsive">
 			  <table class="table table-striped table-bordered table-condensed table-hover" >
						<thead>
						<th>Nombre</th>
						<th>Apellidos</th>
						<th>Calificación uno</th>
						<th>Calificación dos</th>
						<th>Calificación tres</th>
						<th>Calificación cuatro</th>
						<th>Calificación cinco</th>
						<th>Promedio</th>
						<th>Opciones</th>
							</thead>
						  @foreach($calificaciones as $cal)
						   <tr>
						   <td>{{$cal->nombre}}</td>
							<td>{{$cal->apellidos}}</td> 
							<td>{{$cal->califuno}}</td>
							<td>{{$cal->califdos}}</td>
							<td>{{$cal->califtres}}</td>
							<td>{{$cal->califcuatro}}</td>
							<td>{{$cal->califcinco}}</td>
							<td>{{$cal->promedio}}</td>
							<td>
							
							  <a href="{{URL::action('CalificacionController@edit',$cal->idcalificacion)}}"><button class="btn btn-primary">Editar</button></a>
							  <a href="" data-target="#modal-delete-{{$cal->idcalificacion}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
							</td>
							
						    </tr>
						   @include('calificacion.modal')
						  @endforeach
 			   </table>
				{{$calificaciones->appends(Request::all(['nombre','apellidos']))->render()}}
				
 		</div>
 	 </div>
@endsection
 

