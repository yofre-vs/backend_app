<form id="factureForm">
        <div class="modal-header">
          <h5 class="modal-title" id="inspectionFormModalLabel">Vista de la factura </h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <div class="modal-body">
       


          <!-- Sección: Datos del Vehículo -->
          <h6 class="mb-3 border-bottom pb-1">🚗 Datos del Vehículo</h6>
          <div class="form-group row">
            <label for="staticEmail" class="col-sm-3 col-form-label">Placa de rodaje</label>
            <p class="col-sm-3 form-control-plaintext fw-bold "><strong><?php echo  $inspection->vehicle_license_plate ?></strong></p>

            <label for="staticEmail" class="col-sm-3 col-form-label">Marca</label>
            <p class="col-sm-3 form-control-plaintext fw-bold "><strong><?php echo  $inspection->vehicle_make?></strong></p>

            <label for="staticEmail" class="col-sm-3 col-form-label">Model</label>
            <p class="col-sm-3 form-control-plaintext fw-bold "><strong><?php echo  $inspection->vehicle_model?></strong></p>
            
            <label for="staticEmail" class="col-sm-3 col-form-label">Año</label>
            <p class="col-sm-3 form-control-plaintext fw-bold "><strong><?php echo  $inspection->vehicle_year?></strong></p>
            
            <label for="staticEmail" class="col-sm-3 col-form-label">Type</label>
            <p class="col-sm-3 form-control-plaintext fw-bold "><strong><?php echo  $inspection->vehicle_type?></strong></p>
        
          </div> 

          <!-- Sección: Datos del Conductor -->
          <h6 class="mb-3 border-bottom pb-1">🧑‍✈️ Datos del Conductor</h6>
          
          <div class="form-group row">
            <label for="staticEmail" class="col-sm-3 col-form-label">Dni</label>
            <p class="col-sm-3 form-control-plaintext fw-bold "><strong><?php echo  $inspection->driver_document_number?></strong></p>

            <label for="staticEmail" class="col-sm-3 col-form-label">Nombre</label>
            <p class="col-sm-3 form-control-plaintext fw-bold "><strong><?php echo  $inspection->driver_full_name?></strong></p>

            <label for="staticEmail" class="col-sm-3 col-form-label">Licencia</label>
            <p class="col-sm-3 form-control-plaintext fw-bold "><strong><?php echo  $inspection->driver_license_number?></strong></p>
            
          </div> 
 

          <!-- Sección: Datos de Facturación -->
          <h6 class="mb-3 border-bottom pb-1">💼 Datos de Facturación</h6>
          <div class="form-group row">
            <div class="col-sm-12 ">
              <label for="staticEmail" class="col-form-label">Tipo Documento</label>
              <p class="form-control-plaintext fw-bold "><strong><?php echo  $inspection->invoice_client_document_type?></strong></p>
            </div>
            <div class="col-sm-4 ">
              <label for="staticEmail" class=" col-form-label">N° Documento</label>
              <p class=" form-control-plaintext fw-bold "><strong><?php echo  $inspection->invoice_client_document_number?></strong></p>
            </div>
            <div class="col-sm-8 ">
              <label for="staticEmail" class=" col-form-label">Apellidos, Nombre / Denominacion Comercial</label>
              <p class="  form-control-plaintext fw-bold "><strong><?php echo  $inspection->invoice_client_name?></strong></p>
            </div>
            <div class="col-sm-6 ">
              <label for="staticEmail" class=" col-form-label">Fecha de Inspección</label>
              <p class="  form-control-plaintext fw-bold "><strong><?php echo  $inspection->invoice_created?></strong></p>
            </div>
            <div class="col-sm-6 ">
              <label for="staticEmail" class="  col-form-label">Número de Certificado  MTC</label>
              <p class="  form-control-plaintext fw-bold "><strong><?php echo  $inspection->invoice_certification?></strong></p>
            </div>
            <div class="col-sm-4 ">
              <label for="staticEmail" class=" col-form-label">Clase</label>
              <p class="  form-control-plaintext fw-bold "><strong><?php echo  $inspection->invoice_class?></strong></p>
            </div>
            <div class="col-sm-4 ">
              <label for="staticEmail" class="c col-form-label">Servicio</label>
              <p class="  form-control-plaintext fw-bold "><strong><?php echo  $inspection->invoice_service?></strong></p>
            </div>
            <div class="col-sm-4 ">
              <label for="staticEmail" class="  col-form-label">Monto</label>
              <p class="  form-control-plaintext fw-bold "><strong><?php echo  $inspection->invoice_amount_total?></strong></p>
            </div> 

            
        </div> 
        <!-- Sección: Datos de Facturación -->
          <h6 class="mb-3 border-bottom pb-1">💼 Sunat</h6>
          <div class="form-group row">
            <div class="col-sm-4 ">
              <label for="staticEmail" class="col-form-label">Archivo XML</label>
              <p class="form-control-plaintext fw-bold ">
                <a href="{{ url('citv/inspections/viewxml/F001-'.$inspection->invoice_id) }}"  target="ventana_xml" > Descargar</a>
              </p> 
            </div>
            <div class="col-sm-4 ">
              <label for="staticEmail" class=" col-form-label">Comprobante </label>
              <p><a href="{{ url('citv/inspections/viewpdf/F001-'.$inspection->invoice_id) }}"  target="ventana_pdf" > Revisar</a></p>
            </div>
            <div class="col-sm-4 ">
              <label for="staticEmail" class=" col-form-label">Anotaciones</label>
              <p class="  form-control-plaintext fw-bold ">Comprobante en espera de aprobacion de envío</strong></p>
            </div>
            

            
        </div> 

        <div class="modal-footer"> 
          @csrf
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        </div>
      </form>