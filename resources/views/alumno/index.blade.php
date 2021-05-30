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
 	  <h3 align="center">Lista de alumnos. <a href="alumno/create"> <button class="btn btn-success">Nuevo Alumno </button></a></h3>
 	   @include('alumno.search')
 	 </div>
</div>

<div class="box-body">
 	       <div class="table-responsive">
 			  <table class="table table-striped table-bordered table-condensed table-hover" >
						<thead>
						<th>Id Alumno</th>
						<th>Nombre</th>
						<th>Apellidos</th>
						<th>Nombre del responsable</th>
						<th>Correo electrónico del reponsable</th>
						<th>Opciones</th>
							</thead>
						  @foreach($alumnos as $al)
						   <tr>
						    <td>{{$al->idalumno}}</td>
							<td>{{$al->nombre}}</td> 
							<td>{{$al->apellidos}}</td>
							<td>{{$al->responsable}}</td>
							<td>{{$al->emailresponsable}}</td>
							
							<td>
							 		<a href="{{URL::action('AlumnoController@edit',$al->idalumno)}}"><button class="btn btn-info">Editar</button></a>
									 <a href="{{URL::action('AlumnoController@show',$al->idalumno)}}"><button class="btn btn-primary">Asignar calificaciones</button></a>
									<a href="" data-target="#modal-delete-{{$al->idalumno}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
 					         </td>
						    </tr>
						   @include('alumno.modal')
						  @endforeach
 			   </table>
				{{$alumnos->appends(Request::all(['nombre','apellidos']))->render()}}
				
 		</div>
 	 </div>
@endsection
 

