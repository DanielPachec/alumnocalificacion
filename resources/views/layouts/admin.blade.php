<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    
        
    <title>SISTEMA</title>
    
   

    <!-- Barra de carga --> 
    <link rel="stylesheet" href="{{asset('barra/barra.css')}}">
    <!-- Responsivo -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/bootstrap-select.min.css')}}">
    <!-- Fuente -->
    <link rel="stylesheet" href="{{asset('css/font-awesome.css')}}">
    <!-- Estilo -->
    <link rel="stylesheet" href="{{asset('css/AdminLTE.css')}}">
    <link rel="stylesheet" href="{{asset('css/_all-skins.css')}}">
    <!-- Icono de la pagina -->
    <link rel="apple-touch-icon" href="{{asset('img/apple-touch-iconn.png')}}">
    <link rel="shortcut icon" href="{{asset('img/antena.ico')}}">
    
    <!-- Script de la barra de carga -->
    <script src="{{asset('barra/pace.min.js')}}"></script>
  </head>
  <body class="hold-transition skin-green sidebar-mini">
    <div class="wrapper">

       <!-- Cabecera -->
      <header class="main-header">

        <!-- Link a donde manda el Logo -->
        <a href="/escuela/public/alumno" class="logo">
          <!-- Logo para barra latera -->
          <span class="logo-mini"><b>Sistema</b></span>
          <!-- logo para dispositivos y móviles -->
          <span class="logo-lg"><b>Sistema</b></span>
        </a>

        <!-- Navbar -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Botón de desplazamiento de la barra lateral-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Navegación</span>
          </a>
          <!-- Menú derecho de la barra de navegación -->
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">

              <li class="dropdown user user-menu">
                 <ul class="nav navbar-nav navbar-right">
                    <!-- Autentificación -->
                   
                        <li><a href="{{ url('/login') }}">Login</a></li>
                    
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{url('/logout')}}"><i class="fa fa-btn fa-sign-out"></i>Cerrar sesión</a></li>
                            </ul>
                        </li>
                  
                </ul>
              </li>
              
            </ul>
          </div>
        </nav>
      </header>
          
      <!-- Catálogos -->
      <aside class="main-sidebar">
        <section class="sidebar">
           <ul class="sidebar-menu">
            <li class="header"></li>
      
            
            <li class="treeview">
              <a href="#">
                <i class="fa fa-user" ></i>
                <span>Alumnos</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="/escuela/public/alumno/create"><i class="fa fa-user-plus"></i> Nuevo alumno</a></li>
                <li><a href="/escuela/public/alumno"><i class="fa fa-users"></i> Listado de alumnos</a></li>
              </ul>
            </li>
            
            
            <li class="treeview">
              <a href="#">
                <i class="fa fa-pencil-square-o"></i>
                <span>Calificaciones</span>
                 <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="/escuela/public/calificacion"><i class="fa fa-pencil-square-o"></i>Lista de calificaciones</a></li>
                 </ul>
            </li>  
          </ul>
        </section>
      </aside>

       <!--Contenido-->
      <div class="content-wrapper">
        
        <!-- Contenido principal -->
        <section class="content">
          
          <div class="row">
            <div class="col-md-12">
              <div class="box">
                <div class="box-header with-border">
                
                  <h3 class="box-title">SISTEMA DE CONTROL </h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
    
                  </div>
                 
                </div>
                <div class="box-body">
                  	<div class="row">
	                  	<div class="col-md-12">
		                          <!--Contenido segun la clase-->
                              @yield('contenido')
		                          <!--Fin Contenido-->
                           </div>
                        </div>
		                    
                  		</div>
                  	</div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>

      <!--Pie de página-->
      <footer class="main-footer" >
        <div class="pull-right hidden-xs">
          <b></b> 
        </div>
       
      
      </footer>

  <!-- JavaScripts -->    
    <!-- jQuery 2.1.4 -->
    <script src="{{asset('js/jQuery-2.1.4.min.js')}}"></script>
    @stack('scripts')
    <!-- Bootstrap 3.3.5 -->
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/bootstrap-select.min.js')}}"></script>
    <!-- AdminLTE App -->
    <script src="{{asset('js/app.min.js')}}"></script>
    
  </body>
</html>
