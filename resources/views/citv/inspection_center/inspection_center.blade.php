@extends('themes.default.main')

@section('title', 'Bienvenido')

@section('content')



 
    <h2>Vehiculos registrados para  inspeccion</h2> 
     
    <?php //var_dump ($data["inspections"]); ?>
    <ul class="revision-list" id="lista-vehiculos">
      <?php  foreach($inspections as $inspection){?>
        <li class="revision">
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
          </button>
          <?php
            if( trim($inspection["invoice_status"].$inspection["invoice_id"])==0 ){?>
           <span id="boxBtnFature_<?php echo $inspection["inspection_id"]?>">
              <button type="button"
                class="btn-facturar"
                data-toggle="modal"
                data-target="#modalAjax"
                data-url="/citv/inspection-center/invoice/<?php echo $inspection["inspection_id"]?>"
                 >
                facturar
              </button>
            </span> 
          <?php  }else { ?>
            <button type="button"
                class="btn-factureview"
                data-toggle="modal"
                data-target="#modalAjax" 
                data-url="/citv/inspection-center/invoice/<?php echo $inspection["inspection_id"]?>"
                 >
                ver comprobante
              </button>
          <?php }
          ?>
          
        </li>
      
      <?php

      }?>
    

    
    </ul>

 @endsection