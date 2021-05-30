@extends ('layouts.admin')
@section ('contenido')

<div class="row">
  <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12"> 
          <div class="form-group">
           <p>{{$lider->nombre}} {{$lider->apellido}} </p>
              <p> Lider para la Educación Comunitaria</p>
              <p>{{$lider->nivel}}</p>
              @foreach($zonasescolar as $zon)
                      @if ($zon->idzonae==$lider->idzonae)
                    <p> {{$zon->cct}}</p>
              <p> {{$zon->cvezona}}</p>
                    @endif
                    @endforeach
        </div>
      </div>
</div>

<div class="box-body">
 	       <div class="table-responsive">
 			      <table class="table table-striped table-bordered table-condensed table-hover" >
						<thead>
						<th>Nombre</th>
						<th>Apellidos</th>
						<th>Num.Control</th>
						<th>Nivel</th>
						<th>Grado</th>
						<th>CURP</th>
            <th>Calificación</th>
            <th>Boleta</th>
						<th>Opciones</th>
				</thead>
              @foreach($alumno as $al)
					<tr>
						  <td>{{$al->nombre}}</td>
							<td>{{$al->papellido}} {{$al->sapellido}}</td>
							<td>{{$al->ncontrol}}</td>
							<td>{{$al->nivel}}</td>
							<td>{{$al->grado}}</td>
							<td>{{$al->curp}}</td>
              
              <td>
              @foreach($calificacion as $cal)
              @if($cal->idalumno==$al->idalumno)
                {{$cal->calificacion}}
              </td>
              <td>
						      <img src="{{asset('calificaciones/boleta/'.$cal->imagen)}}" alt="{{$cal->imagen}}" height="60px" width="60px" class="img-thumbnail">
					    </td>
              @endif
              @endforeach
              <td>
							  <a href="{{URL::action('ACalificacionController@show',$al->idalumno)}}"><button class="btn btn-success">Agregar calificación</button></a>	 
 					         </td>
               
						  </tr>
                @endforeach
 			   </table>
          {{$alumno->appends(Request::all(['nombre','papellido']))->render()}}
				
 	   	</div>
 	 </div>

     
@endsection