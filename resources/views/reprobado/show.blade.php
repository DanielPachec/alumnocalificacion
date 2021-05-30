@extends ('layouts.admin')
@section ('contenido')
  <div class="row">
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
      @foreach ($alumno as $al)
      <h3>Enviar correo a responsable: {{$al->responsable}} </h3>
      
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

    {!!Form::open(array('url'=>'reprobados','method'=>'POST','autocomplete'=>'off','files'=>'true'))!!}

      {{Form::token()}}
      <div class="row">

        <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12"> 
          <div class="form-group">
          <label for="emailresponsable">Correo del responsable</label>
           <input type="text" name="emailresponsable" value="{{$al->emailresponsable}}"class="form-control">
        </div>
      </div>
             
    </div>
    @endforeach
      <div class="form-group">
        <input name="_token" value="{{ csrf_token() }}" type="hidden"></input>
        <button class="btn btn-primary" type="submit">Enviar</button>
      </div>
      

      {!!Form::close()!!}
   
@endsection