<!--<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>@ yield('title', 'Mi Proyecto Laravel')</title>
    <link rel="stylesheet" href="{{ asset('css/estilos.css') }}">
</head>
<body>
    <header>
        <h1>Mi Encabezado</h1>
        @ include('themes.default.header')
    </header>

    <main>
       
    </main>

    <footer>
        <p>&copy; 2025 Mi Empresa</p>
    </footer>
</body>
</html>-->


<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title> titllo    </title>

  <!-- Bootstrap CSS -->
  <link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
    integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N"
    crossorigin="anonymous"
  />
  <link
    rel="stylesheet"
    href="{{ asset('css/default.css') }}"
    crossorigin="anonymous"
  />

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Mona+Sans:ital,wght@0,200..900;1,200..900&display=swap" rel="stylesheet">
</head>
<body>
  

<div class="container-fluid ">
  <header>
    <!-- Aquí puedes poner un navbar superior si quieres -->
  </header>

  <main class="row">
    <!-- Sidebar izquierdo -->
    <nav class="col-md-3 col-lg-2 d-none d-md-block   sidebar">
      <div class="sidebar-sticky pt-3">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link active" href="{{ asset('citv') }}" >
              <span data-feather="home"></span>
            Centro de Inspeccion
          </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ asset('citv/inspections') }}">
              Inspeciones
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ asset('citv/reports') }}">
              Reportes
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ asset('citv/help') }}">
              Configuracion
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              Ayuda
            </a>
          </li>
        </ul>
      </div>
    </nav>

    <!-- Contenido principal a la derecha -->
    <section class="col-md-9 col-lg-10 ml-sm-auto section">
        <div class="content-header">
            
            
            

<div class="clearfix my-3 px-2">
  <!-- Izquierda: Botón registrar -->
  <div style="float: left;">
    
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalFormulario" data-id="123">
  +Registrar nueva Inspección
</button>
  </div>

  <!-- Derecha: Notificación + Usuario + Flecha -->
  <div style="float: right;">
    <!-- Campanita -->
    <button class="btn btn-light mr-2" style="display: inline-block;">
      🔔
    </button>
    <!-- Separador vertical -->
    <span style="border-left: 1px solid #ccc; height: 30px; display: inline-block; vertical-align: middle; margin-right: 10px;"></span>

    <!-- Info del usuario -->
    <div style="display: inline-block; vertical-align: middle;">
      <img src="#" alt="Usuario" style="border-radius: 50%; vertical-align: middle; margin-right: 8px;">
    </div>
    <div style="display: inline-block; vertical-align: middle; text-align: left; margin-right: 6px;">
      <strong>Juan Pérez</strong><br />
      <small class="text-muted">Empresa XYZ S.A.</small>
    </div>

    <!-- Flecha desplegable -->
    <button class="btn" style="background: transparent; border: none; padding: 0; vertical-align: middle;">
      ▼
    </button>
  </div>
</div>

        </div>
        <div class="content">
             @yield('content')
        <div>
        
    </section>
  </main>

  <footer>
    <!-- Pie de página -->
  </footer>
  <!-- Modal registro  -->
  <div class="modal fade" id="modalFormulario" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content" id="modalContenido">
        <div class="modal-body text-center text-muted">
          @include('citv.inspection_center.partials.register_form')
        </div>
      </div>
    </div>
  </div>

  <!-- Modal actualizar  -->
  <div class="modal fade" id="modalAjax" tabindex="-1" role="dialog" aria-labelledby="modalAjaxLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg " role="document">
      <div class="modal-content" id="modalAjaxContent">
        <div class="modal-header">
          <h5 class="modal-title" id="modalAjaxLabel">Vamos a conectarnos</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body text-center text-muted">
          Cargando contenido...
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
  </div>

  
 
</div>


  <!-- jQuery  -->

  <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>


  <!-- Bootstrap Bundle JS (incluye Popper.js) -->
  <script
    src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct"
    crossorigin="anonymous"
  ></script>

  <script
    src={{ asset('js/default.js') }}
  ></script>
</body>
