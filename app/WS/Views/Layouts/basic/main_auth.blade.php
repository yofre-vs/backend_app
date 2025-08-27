<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
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
      href="{{ asset('assets/themes/auth/style.css') }}"
      crossorigin="anonymous"
    />

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Mona+Sans:ital,wght@0,200..900;1,200..900&display=swap" rel="stylesheet">

</head>
<body class="basiclyt-single body-domain">
  <div class="domain auth">
    <header class="domain-header"></header>
    <main class="domain-main">
      
  @yield('content')

    </main>
    <footer class="domain-footer">
      <p>Al continuar, reconoces que entiendes y aceptas los 
        <a href="#">Términos y Condiciones</a> y la <a href="#">Política de Privacidad</a>.</p>
    </footer>
  </div>
</body>
</html>
