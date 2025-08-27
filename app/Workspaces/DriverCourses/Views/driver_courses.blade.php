@php
  $layoutOptions['module_active'] = "orders-cs";
  $layoutOptions["headline"]["headline"] = "Ordenes OC - OS";
  $layoutOptions["headline"]["upper_headline"] = "Listado de";
  $layoutOptions["headline"]["next_headline"] = null;
  $layoutOptions["headline"]["button-new"] = true;
@endphp
@extends('ws::Layouts.workspace.app')

@section('title', 'Bienvenido')
@section('domain_alias', 'driver-courses') 
@section('module_active', 'driver-courses')
@section('workspace_page', 'driver-courses-enrollments') 

@section('content')

<section class="section-page d-flex flex-column flex-grow-1" style="min-height: 0;">

  <!-- Encabezado fijo -->
  <div style="height: 60px; flex-shrink: 0;">
    <div class="px-3">Listado de Conductores</div>
    <div class="px-3">
      <!--     filtro -->
      <div id="tag-filter">
  <button type="button" data-tag="*" class="tag-btn active">Todos</button>
  <button type="button" data-tag="#camilo" class="tag-btn">#camilo</button>
  <button type="button" data-tag="#pasco" class="tag-btn">#pasco</button>
  <button type="button" data-tag="#wantar" class="tag-btn">#wantar</button>
  
  <button type="button" data-tag="#luz" class="tag-btn">#luz</button>
  <button type="button" data-tag="#jazmin" class="tag-btn">#jazmin</button>
</div>

<script   type="module" >  
  document.addEventListener('DOMContentLoaded', () => {
    const botones = document.querySelectorAll(".tag-btn");
    botones.forEach(boton => {
      boton.addEventListener("click", () => {
        
        const contenedor = document.getElementById("enrollment-container");
        const filas = contenedor.querySelectorAll("tr");
        const tag = boton.getAttribute("data-tag");
        //alert(tag+":"+filas.length);
        filas.forEach(tr => {
          const rowTags = (tr.getAttribute('data-enroll-tags') || '')
            .split(',')
            .map(t => t.trim().toLowerCase())
            .filter(Boolean);
            console.log(tr.getAttribute('data-enroll-tags')+"-"+rowTags);

            let show;

            if (tag === '*') {
              // Mostrar todas las filas sin filtrar
              show = true;
            } else if (tag === 'sin-tag') {
              // Mostrar solo filas sin tags
              show = rowTags.length === 0;
            } else {
              // Mostrar solo filas que tengan el tag seleccionado
              show = rowTags.includes(tag.toLowerCase());
            }

          tr.style.display = show ? '' : 'none';
        });
      });
    });
  });

</script>
    </div>
  </div>

  <!-- Contenedor de scroll -->
  <div class="viewer-app px-3 flex-grow-1 d-flex" id="viewerApp" style="overflow: auto; min-height: 0; min-width: 0;">

    <div class="tabla-wrapper" id="tablaWrapper" style="display: none;">
      <div class="tabla-inner" id="tablaInner" style="min-width: 1800px;">
        <style>
          .table-driver-courses button{
            border:  1px solid transparent;
          }
          .table-driver-courses tr:hover button {
            border: 1px solid #6c757d;
          }
        </style>
        <table class="table table-sm  table-hover table-driver-courses  w-100" >
          <thead>
            <tr class="text-center">
              <th colspan="4">Conductor</th> 
              <th>Curso</th>
              <th>Estado</th>
              <th>Teoria</th>
              <th>Practica</th>
              <th>Hrs</th>
              <th>Registro</th>
              <th colspan="2">Matricula</th>
              <th colspan="2">Planilla</th>
              <th colspan="2">Certificado</th>
              <th>Pagos</th>
              <th>Tags</th>
            </tr>
          </thead>
          <tbody class="table-driver-courses-item" id="enrollment-container">
            {{--  contenido generado con JS --}}
          </tbody>
        </table>
        <body>
        <div id="floating-container"></div> 
        
      </div>
    </div>

  </div>

</section>
<script>
        window.dataEnrollments = @json($enrollment);
</script>

<script>

  function forzarTamañoContenedor() {
    const viewerApp = document.getElementById('viewerApp');
    const tablaWrapper = document.getElementById('tablaWrapper');

    if (!viewerApp || !tablaWrapper) return;

    // Medimos ancho y alto disponibles
    const anchoDisponible = viewerApp.clientWidth;
    const altoDisponible = viewerApp.clientHeight;

    // Fijamos tamaño fijo al contenedor
    viewerApp.style.width = anchoDisponible + 'px';
    viewerApp.style.height = altoDisponible + 'px';

    // Mostramos tabla (antes oculta)
    tablaWrapper.style.display = 'block';
  }

  window.addEventListener('load', forzarTamañoContenedor);
  window.addEventListener('resize', forzarTamañoContenedor);
</script>


{{-- @include('drivercourses::driver_courses-floating-box')  --}}

@include('drivercourses::driver_courses-modals')   
@include('drivercourses::driver_courses-modal-detail') 
@endsection