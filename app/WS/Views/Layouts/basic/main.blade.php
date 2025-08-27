<!DOCTYPE html>
<html lang="en"
  data-color-mode="auto" data-light-theme="light" data-dark-theme="dark"
  data-a11y-animated-images="system" data-a11y-link-underlines="true"
>
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title> Logueate    </title>

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
        <!-- Contenido principal a la derecha -->
        <section class="col-md-9 col-lg-10 ml-sm-auto section">
            <div class="clearfix my-3 px-2">
              <!-- Izquierda: Botón registrar -->
            </div>
            <div class="content">
                @yield('content')
            <div>
        </section>
      </main>
      <footer>
        <!-- Pie de página -->
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