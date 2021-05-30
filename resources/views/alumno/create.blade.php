@extends ('layouts.admin')
@section ('contenido')
  <div class="row">
  	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
  		<h3>Nuevo Alumno</h3>
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
  
  	{!!Form::open(array('url'=>'alumno','method'=>'POST','autocomplete'=>'off','files'=>'true'))!!}
    {{Form::token()}}

    <div class="row">
    

      <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12"> 
          <div class="form-group">
          <label for="nombre">Nombre</label>
           <input type="text" name="nombre" value="{{old('nombre')}}"class="form-control" placeholder="Nombre">
        </div>
      </div>

      <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12"> 
          <div class="form-group">
           <label for="apellidos">Apellidos</label>
           <input type="text" name="apellidos" value="{{old('apellidos')}}"class="form-control" placeholder="Apellidos...">
        </div>
      </div>

     

      <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12"> 
          <div class="form-group">
          <label for="responsabble">Nombre del Responsable</label>
           <input type="text" name="responsable" value="{{old('responsable')}}"class="form-control" placeholder="Responsable...">
          </div>
      </div>

      <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12"> 
          <div class="form-group">
          <label for="emailresponsable">Correo electrónico del responsable</label>
           <input type="text" name="emailresponsable" value="{{old('emailresponsable')}}"class="form-control" placeholder="Correo del responsable...">
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