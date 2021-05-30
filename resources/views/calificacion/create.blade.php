@extends ('layouts.admin')
@section ('contenido')
  <div class="row">
  	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
  		<h3>Asignar calificación al alumno</h3>
  		@if (count($errors)>0)
  		<div class="alert alert-danger">
  			<ul>
  				@foreach ($errors->all() as $error)
  				<li>{{$error}}</li>
  				@endforeach
  			</ul>
  		</div>
  		@endif

    </div>
  </div>
  
  	{!!Form::open(array('url'=>'calificacion','method'=>'POST','autocomplete'=>'off','files'=>'true'))!!}
    {{Form::token()}}

    <div class="row">
    <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12"> 
          <div class="form-group">
           <label for="idzonae">Lider para la educación cumunitaria</label>
           <select name="idlider" id="idlider" class="form-control selectpicker" data-Live-search="true"  >
            @foreach($lideres as $lid)
            <option value="{{$lid->idlider}}">{{$lid->nombre}} {{$lid->apellido}}</option>
            @endforeach
           </select>
        </div>
      </div>

      <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12"> 
          <div class="form-group">
          <label for="fecha">Fecha</label>
          <input type="datetime-local" name="fecha" required value="{{old('fecha')}}" min="2021-01-01" max="2080-12-31" class="form-control" placeholder="Fecha...">
        </div>
      </div>

      <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
            <div class="form-group">
            <label for="fotouno">Asistencia inicial (foto)</label>
            <input type="file" name="fotouno" class="form-control" >
             </div>
             </div>

      <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
          <div class="form-group">
            <label for="fotodos">Asistencia final (foto)</label>
            <input type="file" name="fotodos" class="form-control" >
         </div>
         </div>

     </div>
         
     <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12" id="guardar"> 
        <div class="form-group">
        <input name="_token" value="{{ csrf_token() }}" type="hidden"></input>
          <button class="btn btn-primary" type="submit">Guardar</button>
          <button class="btn btn-danger" type="reset">Cancelar</button>
        </div>
    </div>

  
  		{!!Form::close()!!}
    	
@endsection