<!DOCTYPE html>
<html lang="en"
  data-color-mode="auto" data-light-theme="light" data-dark-theme="dark"
  data-a11y-animated-images="system" data-a11y-link-underlines="true"
>
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>@yield('title', 'Bienvenidos')</title>

    <!-- Bootstrap CSS -->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
      integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N"
      crossorigin="anonymous"
    />
    <link
      rel="stylesheet"
      href="{{ asset('assets/themes/account-theme.css') }}"
      crossorigin="anonymous"
    />

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Mona+Sans:ital,wght@0,200..900;1,200..900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link href="{{ asset('assets/shared/css/icons.min.css') }}" rel="stylesheet">
  
  </head>
<body class="basiclyt-single body-domain">
  <div class="domain account container-fluid d-flex flex-column justify-content-between  h-100 w-100">
      <header class="d-flex justify-content-between pt-3 w-100">
        <div>
           <img src="{{ asset('assets/shared/images/logo.png') }}" class="w-50">
           
        </div> 
        <div>
          <div class="dropdown">
              <button class="btn btn-primary dropdown-toggle rounded-circle text-white d-flex align-items-center justify-content-center bg-secondary"
                      type="button" 
                      id="dropdownMenuButton" 
                      data-toggle="dropdown" 
                      aria-haspopup="true" 
                      aria-expanded="false"
                      style="width: 30px; height: 30px; font-weight: bold;">
                A
              </button>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item" href="#">Perfil</a>
                <a class="dropdown-item" href="#">Configuración</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">Cerrar sesión</a>
              </div>
            </div>

        </div> 
      </header>
      <main class="row" >
        <!-- Contenido principal a la derecha -->
        <section class="col-12">
            
            <div class="content">
                @yield('content')
            <div>
        </section>
      </main>
      <footer class="w-100">
        <p>Citv's Upgrade se encuentra en su version de desarrollo.</p>
      </footer>
      
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
</html>