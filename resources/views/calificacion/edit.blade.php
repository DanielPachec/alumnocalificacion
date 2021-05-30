@extends ('layouts.admin')
@section ('contenido')
  <div class="row">
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
      <h3>Editar calificación</h3>
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

      {!!Form::model($calificacion,['method'=>'PATCH','route'=>['calificacion.update',$calificacion->idcalificacion],'files'=>'true'])!!}

      {{Form::token()}}
      <div class="row">
       
      <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12"> 
      <label for="idalumno">Nombre del alumno</label>
           <select name="idalumno" id="idalumno" class="form-control">
           @foreach($alumnos as $al)
           @if ($al->idalumno==$calificacion->idalumno)
            <option value="{{$al->idalumno}}">{{$al->nombre}} {{$al->apellidos}}</option>
           @endif
            @endforeach
           </select>
      </div>
   

      <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12"> 
          <div class="form-group">
          <label for="califuno">Calificación uno</label>
           <input type="number" name="califuno" value="{{$calificacion->califuno}}"class="form-control">
          </div>
      </div>

      <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12"> 
          <div class="form-group">
          <label for="califdos">Calificación dos</label>
           <input type="number" name="califdos" value="{{$calificacion->califdos}}"class="form-control">
          </div>
      </div>
      <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12"> 
          <div class="form-group">
          <label for="califtres">Calificación tres</label>
           <input type="number" name="califtres" value="{{$calificacion->califtres}}"class="form-control">
          </div>
      </div>
      <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12"> 
          <div class="form-group">
          <label for="califcuatro">Calificación cuatro</label>
           <input type="number" name="califcuatro" value="{{$calificacion->califcuatro}}"class="form-control">
          </div>
      </div>
      <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12"> 
          <div class="form-group">
          <label for="califcinco">Calificación cinco</label>
           <input type="number" name="califcinco" value="{{$calificacion->califcinco}}"class="form-control">
          </div>
      </div>
      </div>

      <div class="form-group">
        <button class="btn btn-primary" type="submit">Guardar</button>
        <button class="btn btn-danger" type="reset">Cancelar</button>
      </div>
      

      {!!Form::close()!!}
   
@endsection