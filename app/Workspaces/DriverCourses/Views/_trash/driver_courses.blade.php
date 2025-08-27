@php
  $layoutOptions['module_active'] = "orders-cs";
  $layoutOptions["headline"]["headline"] = "Ordenes OC - OS";
  $layoutOptions["headline"]["upper_headline"] = "Listado de";
  $layoutOptions["headline"]["next_headline"] = null;
  $layoutOptions["headline"]["button-new"] = true;
@endphp
@extends('ws::Layouts.workspace.app')

@section('title', 'Bienvenido')
@section('domain_alias', 'citv') 
@section('module_active', 'citv') 
@section('content')
<section class="section-page flex-grow-1 overflow-hidden">  
  <div class="px-3">Listado de Conductores</div>
  <div  class="px-3">Filtros</div>
  <div  class="px-3">
      <table class="table table-sm table-hover table-driver-courses" id="Dinamic-enrolled-list">
        <thead>
          <tr>
            <th>Conductor</th> 
            <th>Curso</th>
            <th>Asistencias</th>
            <th>Estado</th>
            <th>Pagos</th>
          </tr>
        </thead>
        @foreach ($enrollment as $enroll)
        <!-- Grupo 1 -->
        <tbody class="table-driver-courses-item">
          <tr>
            <td>
              <strong>{{$enroll->enroll_fullname}}</strong><br><span>{{$enroll->enroll_doc_type}}: {{$enroll->enroll_doc}} </span>
            </td> 
            <td><strong>{{$enroll->enroll_course}} </strong></td>
            <td>
              <div>
                 {{$enroll->enroll_course_completed}}h completadas de {{$enroll->enroll_course_hours}}h  
              </div>
              <div>
                <span>T:</span>
                <div class="btn-group btn-group-sm" role="group" aria-label="Small button group">
                  <button type="button" class="btn btn-outline-secondary">8</button>
                  <button type="button" class="btn btn-outline-secondary">8</button>
                  <button type="button" class="btn btn-outline-secondary">8</button>
                  <button type="button" class="btn btn-outline-secondary">8</button>
                  <button type="button" class="btn btn-outline-secondary">8</button>
                  <button type="button" class="btn btn-outline-secondary">?</button>
                </div>

                <span>P:</span>
                <div class="btn-group btn-group-sm" role="group" aria-label="Small button group">
                  <button type="button" class="btn btn-outline-secondary">8</button>
                  <button type="button" class="btn btn-outline-secondary">8</button>
                  <button type="button" class="btn btn-outline-secondary">8</button>
                  <button type="button" class="btn btn-outline-secondary">8</button>
                  <button type="button" class="btn btn-outline-secondary">8</button>
                  <button type="button" class="btn btn-outline-secondary">?</button>
                </div> 
              </div>
            </td>
            <td>registrado </td>
            
            <td > {{$enroll->enroll_payment_status}}% </td>
          </tr>
          <tr>
            <td colspan="5" class="more">
              
              <button type="button" class="btn btn-outline-secondary btn-sm">Matrícula: N° 
                {{ ( $enroll->enroll_snc_enroll_code != null ) ? $enroll->enroll_snc_enroll_code." - ". $enroll->enroll_enroll_date : '----' }}
              </button>
              <button type="button" class="btn btn-outline-secondary btn-sm">Planilla: N° 
                {{ ( $enroll->enroll_snc_submitted_code != null ) ? $enroll->enroll_snc_submitted_code." - ". $enroll->enroll_submitted_date : '----' }}
             
              </button>
              <button type="button" class="btn btn-outline-secondary btn-sm">Certificado: N° 
                {{ ( $enroll->enroll_snc_certified_code != null ) ? $enroll->enroll_snc_certified_code." - ". $enroll->enroll_certified_date : '----' }}
             
              </button>

              <button type="button" class="btn btn-outline-secondary btn-sm">
                {{ ( $enroll->enroll_tags != null ) ? $enroll->enroll_tags : '--tags--' }}
             
              </button>
                 
            </td> 
          </tr>
        </tbody>
        
        <!-- Separador -->
        <tbody class="separador"><tr ><td colspan="5"></td></tr></tbody>
        @endforeach 

 
      </table>


  </div>
</section>
 
@include('drivercourses::driver_courses-modals')    
@endsection