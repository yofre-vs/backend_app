<form id="factureForm">
        <div class="modal-header">
          <h5 class="modal-title" id="inspectionFormModalLabel">Facturar </h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <div class="modal-body">
       


          <!-- Sección: Datos del Vehículo -->
          <h6 class="mb-3 border-bottom pb-1">🚗 Datos del Vehículo</h6>
          <div class="form-group row">
            <label for="staticEmail" class="col-sm-3 col-form-label">Placa de rodaje</label>
            <p class="col-sm-3 form-control-plaintext fw-bold "><strong><?php echo  $inspection->vehicle_license_plate?></strong></p>

            <label for="staticEmail" class="col-sm-3 col-form-label">Marca</label>
            <p class="col-sm-3 form-control-plaintext fw-bold "><strong><?php echo  $inspection->vehicle_make?></strong></p>

            <label for="staticEmail" class="col-sm-3 col-form-label">Model</label>
            <p class="col-sm-3 form-control-plaintext fw-bold "><strong><?php echo  $inspection->vehicle_model?></strong></p>
            
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
            <label for="staticEmail" class="col-sm-3 col-form-label">Tipo de Comprobante </label>
            <p class="col-sm-3 form-control-plaintext fw-bold "><strong><?php echo  $invoice->invoice_type?></strong></p>

            <label for="staticEmail" class="col-sm-3 col-form-label">Estado</label>
            <p class="col-sm-3 form-control-plaintext fw-bold "><strong><?php echo  $invoice->status?></strong></p>

            <label for="staticEmail" class="col-sm-3 col-form-label">Tipo Documento</label>
            <p class="col-sm-3 form-control-plaintext fw-bold "><strong><?php echo  $inspection->driver_license_number?></strong></p>
            
            <label for="staticEmail" class="col-sm-3 col-form-label">N° Documento</label>
            <p class="col-sm-3 form-control-plaintext fw-bold "><strong><?php echo  $inspection->driver_license_number?></strong></p>
            
            <label for="staticEmail" class="col-sm-3 col-form-label">Apellidos, Nombre / Denominacion Comercial</label>
            <p class="col-sm-3 form-control-plaintext fw-bold "><strong><?php echo  $inspection->driver_license_number?></strong></p>
            
            <label for="staticEmail" class="col-sm-3 col-form-label">Fecha de Inspección</label>
            <p class="col-sm-3 form-control-plaintext fw-bold "><strong><?php echo  $inspection->driver_license_number?></strong></p>
            
            <label for="staticEmail" class="col-sm-3 col-form-label">Número de Certificado  MTC</label>
            <p class="col-sm-3 form-control-plaintext fw-bold "><strong><?php echo  $inspection->driver_license_number?></strong></p>
            
            <label for="staticEmail" class="col-sm-3 col-form-label">Clase</label>
            <p class="col-sm-3 form-control-plaintext fw-bold "><strong><?php echo  $inspection->driver_license_number?></strong></p>
            
            <label for="staticEmail" class="col-sm-3 col-form-label">Servicio</label>
            <p class="col-sm-3 form-control-plaintext fw-bold "><strong><?php echo  $inspection->driver_license_number?></strong></p>
            
            <label for="staticEmail" class="col-sm-3 col-form-label">Monto</label>
            <p class="col-sm-3 form-control-plaintext fw-bold "><strong><?php echo  $inspection->driver_license_number?></strong></p>
            
          </div> 

          <h6 class="mb-3 border-bottom pb-1">💼 Datos  Nota de Credito</h6>
          <div class="form-row mb-3">
            
            <div class="form-group col-md-6">
              <label>Tipo de Nota de Credito</label>
              <select class="form-control" name="client_document" required>
                <option value="">Seleccionar tipo</option>
                <option value="Anulacion de la Operacion">Anulacion de la Operacion</option>
                <option value="Anulacion por error en el Ruc">Anulacion por error en el Ruc</option>
                <option value="Descuento Global">Descuento Global</option>
                <option value="Devolucion total">Devolucion total</option>
                <option value="Correccion por error en la descripcion">Correccion por error en la descripcion</option>
              </select>
            </div>
            <label for="staticEmail" class="col-md-3 col-form-label">Número de FE respecto de la cual se emite la Nota de Crédito</label>
            <p class="col-md-3 form-control-plaintext fw-bold "><strong><?php echo  $inspection->driver_license_number?></strong></p>
            
            <div class="form-group col-md-12">
              <label>Motivo o sustento por el cual se emitirá la Nota de Crédito</label>
              <input type="text" class="form-control" name="client_document_number" required>
            </div>
              
          </div>
        </div>
        @csrf
        <div class="modal-footer">
          <input type="hidden" class="form-control" name="inspection_id" value="<?php echo  $inspection->inspection_id?>" >
          <button type="button" class="btn btn-primary" id ="btn_facure_inspeccion">Guardar</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        </div>
      </form>