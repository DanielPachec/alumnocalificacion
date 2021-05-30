@extends ('layouts.admin')
@section ('contenido')

{!!Form::open(array('url'=>'calificacion','method'=>'POST','autocomplete'=>'off','files'=>'true'))!!}
{{Form::token()}}

<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
      <h3 align="center">Perfil del Alumno</h3>
      
      <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12"> 
      <label for="idalumno">Nombre del alumno</label>
           <select name="idalumno" id="idalumno" class="form-control">
           @foreach($alumno as $al)
            <option value="{{$al->idalumno}}">{{$al->nombre}} {{$al->apellidos}}</option>
            @endforeach
           </select>
      </div>
    

    <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12"> 
          <div class="form-group">
          <label for="califuno">Calificación uno</label>
           <input type="number" name="califuno" value="{{old('califuno')}}"class="form-control">
          </div>
      </div>

      <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12"> 
          <div class="form-group">
          <label for="califdos">Calificación dos</label>
           <input type="number" name="califdos" value="{{old('califdos')}}"class="form-control">
          </div>
      </div>
      <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12"> 
          <div class="form-group">
          <label for="califtres">Calificación tres</label>
           <input type="number" name="califtres" value="{{old('califtres')}}"class="form-control">
          </div>
      </div>
      <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12"> 
          <div class="form-group">
          <label for="califcuatro">Calificación cuatro</label>
           <input type="number" name="califcuatro" value="{{old('califcuatro')}}"class="form-control">
          </div>
      </div>
      <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12"> 
          <div class="form-group">
          <label for="califcinco">Calificación cinco</label>
           <input type="number" name="califcinco" value="{{old('califcinco')}}"class="form-control">
          </div>
      </div>
      <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
      <div class="form-group">
        <input name="_token" value="{{ csrf_token() }}" type="hidden"></input>
          <button class="btn btn-primary" type="submit">Guardar</button>
          <button class="btn btn-danger" type="reset">Cancelar</button>
        </div>
     </div>

</div>


       
{!!Form::close()!!}

     
@endsection