@extends ('layouts.admin')
@section ('contenido')
  <div class="row">
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
      <h3>Editar Alumno: {{$alumno->nombre}} {{$alumno->papellido}} {{$alumno->sapellido}}</h3>
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

      {!!Form::model($alumno,['method'=>'PATCH','route'=>['alumno.update',$alumno->idalumno],'files'=>'true'])!!}

      {{Form::token()}}
      <div class="row">

        <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12"> 
          <div class="form-group">
          <label for="nombre">Nombre</label>
           <input type="text" name="nombre" value="{{$alumno->nombre}}"class="form-control" placeholder="Nombre">
        </div>
      </div>

      <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12"> 
          <div class="form-group">
           <label for="apellidos">Apellidos</label>
           <input type="text" name="apellidos" value="{{$alumno->apellidos}}"class="form-control" placeholder="Apellidos...">
        </div>
      </div>

     

      <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12"> 
          <div class="form-group">
          <label for="responsabble">Nombre del Responsable</label>
           <input type="text" name="responsable" value="{{$alumno->responsable}}"class="form-control" placeholder="Responsable...">
          </div>
      </div>

      <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12"> 
          <div class="form-group">
          <label for="emailresponsable">Correo electrónico del responsable</label>
           <input type="text" name="emailresponsable" value="{{$alumno->emailresponsable}}"class="form-control" placeholder="Correo del responsable...">
          </div>
      </div>
      
       
      </div>

      <div class="form-group">
        <button class="btn btn-primary" type="submit">Guardar</button>
        <button class="btn btn-danger" type="reset">Cancelar</button>
      </div>
      

      {!!Form::close()!!}
   
@endsection