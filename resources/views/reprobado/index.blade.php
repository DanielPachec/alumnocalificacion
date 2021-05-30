@extends ('layouts.admin')
@section ('contenido')
 <div class="row">
 	<div class="col-lg-10 col-md-8 col-sm-8 col-xs-12">
 	  <h3 align="center">Alumnos reprobados</h3>
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
							<a href="{{URL::action('ReprobadosController@show',$cal->idcalificacion)}}"><button class="btn btn-warning">Enviar correo</button></a>	
						    </td>
							</tr>
						  @endforeach
 			   </table>
				{{$calificaciones->appends(Request::all(['nombre','apellidos']))->render()}}
				
 		</div>
 	 </div>
@endsection
 

