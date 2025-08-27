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
          <div class="form-row mb-3">
            <div class="form-group col-md-12">
              <label>Tipo de Comprobante </label>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="invoice_type" id="radioBoleta" value="boleta" required>
                <label class="form-check-label" for="radioBoleta">Sin Comprobante</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="invoice_type" id="radioBoleta" value="boleta" required>
                <label class="form-check-label" for="radioBoleta">Boleta</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="invoice_type" id="radioFactura" value="factura" required>
                <label class="form-check-label" for="radioFactura">Factura</label>
              </div>
            </div>
            <div class="form-group col-md-3">
              <label>Tipo Documento</label>
              <select class="form-control" name="client_document" required>
                <option value="">Seleccionar tipo</option>
                <option value="DNI">DNI</option>
                <option value="RUC">RUC</option>
              </select>
            </div>
            <div class="form-group col-md-3">
              <label>N° Documento</label>
              <input type="text" class="form-control" name="client_document_number" required>
            </div>
            <div class="form-group col-md-6">
              <label>Apellidos, Nombre / Denominacion Comercial</label>
              <input type="text" class="form-control" name="client_name" required>
            </div>
            <div class="form-group col-md-12">
              <label>Dirección</label>
              <input type="text" class="form-control" name="client_address">
            </div>
            <div class="form-group col-md-6">
              <label>Fecha de Inspección</label>
              <input type="date" class="form-control" name="inspection_date"  required>
            </div>
            <div class="form-group col-md-6">
              <label>Número de Certificado  MTC</label>
              <input type="text" class="form-control" name="inspection_certification">
            </div>
            <div class="form-group col-md-4">
              <label>Clase</label> 
                    <select class="form-control" name="inspection_class" required>
                      <option value="">Seleccionar estado</option>
                      <option value="Ordinaria">Ordinaria</option>
                      <option value="Complementaria">Complementaria</option>
                      <option value="Ordinaria + Complementaria">Ordinaria + Complementaria</option>
                    </select>
            </div>
            <div class="form-group col-md-4">
              <label>Servicio</label>
              <select class="form-control" name="inspection_servicio" required>
                      <option value="">Seleccionar estado</option>
                      <option value="Transporte Privado">Transporte Privado</option>
                      <option value="Transporte Regular de Pasajeros">Transporte Regular de Pasajeros</option>
                      <option value="Transporte de Carga Pesada">Transporte de Carga Pesada</option>
                      
                    </select>
            </div>
            
            <div class="form-group col-md-4">
              <label>Monto (S/.)</label>
              <input type="number" class="form-control" name="inspection_cost" step="0.01">
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