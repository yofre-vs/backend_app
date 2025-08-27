<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    {{-- CSRF token para JS y seguridad en formularios --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Bienvenido')</title>

    <!-- Bootstrap CSS 5.3.7-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" 
      rel="stylesheet" 
      integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr"
      crossorigin="anonymous">

    
      
    <link
      rel="stylesheet"
      href="{{ asset('assets/themes/workspace/app.css') }}"
      crossorigin="anonymous"
    />

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Mona+Sans:ital,wght@0,200..900;1,200..900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link href="{{ asset('assets/shared/css/icons.min.css') }}" rel="stylesheet">
  <link href='https://cdn.boxicons.com/fonts/basic/boxicons.min.css' rel='stylesheet'>
  </head>
<body class="min-vh-100">
  <div id="root" class="@yield('rootname') d-flex justify-content-between min-vh-100">
    {{-- Incluir el sidebar --}}
    @include('wslayout::layout-sidebar')

    {{-- Incluir el Content --}}
    @include('wslayout::layout-content')

  </div>

   
   

<script 
  src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" 
  integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" 
  crossorigin="anonymous"></script>
<script 
  src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.min.js" 
  integrity="sha384-7qAoOXltbVP82dhxHAUje59V5r2YsVfBafyUDxEdApLPmcdhBPg1DKg1ERo0BZlK" 
  crossorigin="anonymous"></script>

  <script type="module"
    src={{ asset( 'assets/themes/default-theme.js' ) }}></script>
    <script
    src={{ asset( 'assets/domains/' ) }}/@yield('domain_alias').js></script>
    <script src="https://kit.fontawesome.com/06d19625b3.js" crossorigin="anonymous"></script>
</body>
