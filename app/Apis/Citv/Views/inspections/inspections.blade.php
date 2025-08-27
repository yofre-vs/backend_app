@php
use App\Domains\Citv\Services\MTC\SoapDataList;
use App\Domains\Workspace\Helpers\WorkspaceDateHelper;
@endphp
@extends('ws::Layouts.default.main')

@section('title', 'Bienvenido')
@section('domain_alias', 'citv') 
@section('content')
<section class="section-container">
  <div class="s-top d-flex justify-content-between">
    <h2><i class="lnil lnil-diagnosis-alt"></i> En cola de Inspeccion</h2>
    <div>
      <span>Domingo 29 junio del 2025</span>
        <button class="button button-main mx-3" data-bs-toggle="modal" data-bs-target="#NewInspection">
            Aperturar Inspección
        </button> 
        <!-- <button class="button button-status-mtc boton-desconectado"  id ="ButtonStatusMtc" data-bs-toggle="modal" data-bs-target="#StatusServiceMTC"></button> -->
        <button class="button button-status-mtc boton-conectado" id ="button-status-mtc" data-bs-toggle="modal" data-bs-target="#StatusServiceMTC"></button> 
        <!--<button class="button button-status-mtc boton-fuera-horario" id ="button-status-mtc"></button> 
-->
    </div>
  </div>
  <div class="row s-middle">
    <div class="col-4 s-left"> 
      <!-- search-->
      <div class= "search">
          <form>
            <div class="input-with-icon mb-3">
              <i class="fas fa-search"></i>
              <input type="text" class="form-control" placeholder="Buscar...">
            </div>
          </form>


          <ul class="nav nav-pills bg-light px-2 mb-3 rounded">
            <li class="nav-item">
              <a class="nav-link active" href="#">Todos</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Registrados</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">En Inspección</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Terminadas</a>
            </li>
          </ul>
      </div>
      
      <div class= "inspections pb-3" id ="InspectionsContainer">
          <?php  foreach($inspections as $inspection){?>
            <button class="btn-inspection"> 
              <div  class="d-flex align-items-center">
                <h3><?php echo $inspection["vehicle_license_plate"]?></h3>
                <div>
                  <span><?php echo $inspection["vehicle_make"]?>  <?php echo $inspection["vehicle_model"]?></span>
                  <span>  <?php echo $inspection["driver_full_name"]?> </span>
                </div>
              </div>
              <div class="d-flex align-items-center"> 
                <span class="badge rounded-pill bg-secondary"><i class="fas fa-clock me-1"></i>En espera</span>
                <!--<br>
<span class="badge rounded-pill bg-warning text-dark"><i class="fas fa-tools me-1"></i>En atención</span><br>
<span class="badge rounded-pill bg-success"><i class="fas fa-check-circle me-1"></i>Terminado</span>-->
              </div>
            </button>
            <!--<li class="revision">
              <div class="revision-info">
                <div class="vehicle-icon">🚗 </div>
                <div class="revision-title"><?php echo $inspection["vehicle_license_plate"]?> &nbsp;</div>
                <div class="revision-meta">&nbsp;Marca: <strong><?php echo $inspection["vehicle_make"]?> &nbsp;</strong></div>
                <div class="revision-meta">&nbsp;Modelo: <strong><?php echo $inspection["vehicle_model"]?> &nbsp;</strong></div>
                <div class="revision-meta">&nbsp;Conductor: <strong><?php echo $inspection["driver_full_name"]?> &nbsp;</strong></div>
                <div class="revision-meta">&nbsp;Inicio: 08:45 &nbsp;</div>
                <div class="estado en-espera">&nbsp;En espera </div>
              </div>
              
              
              <button type="button"
                class="btn-actualizar"
                data-toggle="modal"
                data-target="#modalAjax"
                data-url="/citv/inspection-center/edit/<?php echo $inspection["inspection_id"]?>">
                Actualizar
              </button>-->
              <?php
                if( trim($inspection["invoice_status"].$inspection["invoice_id"])==0 ){?>
              <!--<span id="boxBtnFature_<?php echo $inspection["inspection_id"]?>">
                  <button type="button"
                    class="btn-facturar"
                    data-toggle="modal"
                    data-target="#modalAjax"
                    data-url="/citv/inspection-center/invoice/<?php echo $inspection["inspection_id"]?>"
                    >
                    facturar
                  </button>
                </span> -->
              <?php  }else { ?>
                <!-- <button type="button"
                    class="btn-factureview"
                    data-toggle="modal"
                    data-target="#modalAjax" 
                    data-url="/citv/inspection-center/invoice/<?php echo $inspection["inspection_id"]?>"
                    >
                    ver comprobante
                  </button>-->
              <?php }
              ?>
              
            
          
          <?php

          }?>
      </div>



    </div>
    <div class="col-8 s-right"> detalle</div>
  <div> 
  <div class="s-bottom">

  </div>
  
</section>
 


<!-- Modal -->
 @include('citv::inspections.partials.partialModalRegisterForm')
 

<!-- Modal Servicio -->
<div class="modal fade" id="StatusServiceMTC" tabindex="-1" aria-labelledby="NewInspectionLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content overflow-hidden">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="StatusServiceMTCLabel">Estado de la Interoperatibilidad MTC</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="d-flex justify-content-center">
          <div class="text-center pb-5">
                <i class="fa-solid fa-circle-check fs-2 text-success p-3" style="font-size:60px !important;"></i>
                <h3>Conecion establecida</h3>

                
                <p>Se ha optenido el token de acceso<strong> <?php echo $viewData["serviceCITVLastOpen"]["code"]?></strong><br>
                  <span>Actualizado el <?php echo WorkspaceDateHelper :: large($viewData["serviceCITVLastOpen"]["date"])?> por <?php echo $viewData["serviceCITVLastOpen"]["user"]?></span>
                </p>
                <div>
                  <button type="button" class="btn btn-outline-primary">Cerrar atenciones diarias</button>
                </div>
          </div> 
          <!-- <div>
                <i class="fa-solid fa-circle-xmark"></i>
                <h3>Conecion establecida</h3>
                <p>Se ha optenido el token <strong>Xf-s55444-sssse7</strong></p>
                <div>
                  <button>Cerrar atenciones diarias</button>
                </div>
          </div> 
        -->
        </div>
             
 
      </div>
    </div>
  </div>
</div>
 
   
 @endsection