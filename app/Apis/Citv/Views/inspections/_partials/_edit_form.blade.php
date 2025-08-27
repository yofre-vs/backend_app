<form id="InspectionUpdateForm">
        <div class="modal-header">
          <h5 class="modal-title" id="inspectionFormModalLabel">Registrar Inspección Técnica</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <div class="modal-body">
          <!-- Sección: Datos de la Revisión -->
          <!-- Sección: Resultados de la Revisión -->
          <h6 class="mb-3 border-bottom pb-1">📋 Resultados de la Revisión</h6>
          <div class="form-row mb-3">
            <div class="form-group col-md-6">
              <label>Fecha de Inspección</label>
              <input type="date" class="form-control" name="inspection_date" required value="<?php echo $inspection->inspection_date;?>">
            </div>
            
            <div class="form-group col-md-6">
              <label>Resultados</label><?php echo $inspection->inspection_resultado;?>
              <select class="form-control" name="inspection_status" >
                <option value="">Seleccionar estado</option>
                <option value="aprobado">✅ Aprobado</option>
                <option value="desaprobado">❌ Desaprobado</option>
                <option value="segunda_revision">🔄 2da Revisión</option>
              </select>
            </div>
            <div class="form-group col-md-6">
              <label>Anotaciones</label>
              <textarea class="form-control" name="inspection_notes" rows="3" placeholder="Ingrese observaciones, hallazgos u otros datos relevantes..."><?php echo $inspection->inspection_notes; ?></textarea>
            </div>
            <div class="form-group col-md-6">
              <label>Número de Certificado  MTC</label>
              <input type="text" class="form-control" name="inspection_certificate" value="<?php echo $inspection->inspection_certification; ?>">
            </div>
          </div> 

          <!-- Sección: Datos del Vehículo -->
          <h6 class="mb-3 border-bottom pb-1">🚗 Datos del Vehículo</h6>
          <div class="form-row mb-3">
            <div class="form-group col-md-6">
              <label>Placa de rodaje</label>_
              <input type="text" class="form-control" name="license_plate" required value="<?php echo  $inspection->vehicle_license_plate?>">
            </div>
            <div class="form-group col-md-6">
              <label>Marca</label>
              <input type="text" class="form-control" name="make" value="<?php echo  $inspection->vehicle_license_plate?>">
            </div>
            <div class="form-group col-md-6">
              <label>Modelo</label>
              <input type="text" class="form-control" name="model" value="<?php echo  $inspection->vehicle_license_plate?>">
            </div>
            
            <div class="form-group col-md-6">
              <label>Tipo</label>
              <input type="text" class="form-control" name="type"   value="<?php echo  $inspection->vehicle_license_plate?>">
            </div>
            <!--
            <div class="form-group col-md-4">
              <label>Año</label>
              <input type="text" class="form-control" name="year" value="<?php echo  $inspection->vehicle_license_plate?>">
            </div>
            <div class="form-group col-md-4">
              <label>Asientos</label>
              <input type="number" class="form-control" name="seat_count" min="1" value="<?php echo  $inspection->vehicle_license_plate?>">
            </div>
          </div>-->

          <!-- Sección: Datos del Conductor -->
          <h6 class="mb-3 border-bottom pb-1">🧑‍✈️ Datos del Conductor</h6>
          <div class="form-row mb-3">
            <div class="form-group col-md-3">
              <label>DNI</label>
              <input type="text" class="form-control" name="driver_dni" value="<?php echo  $inspection->driver_dni?>">
            </div>
            <div class="form-group col-md-4">
              <label>Nombre</label>
              <input type="text" class="form-control" name="driver_name" value="<?php echo  $inspection->driver_fullname?>">
            </div>
            <div class="form-group col-md-3">
              <label>Licencia</label>
              <input type="text" class="form-control" name="license_numero" value="<?php echo  $inspection->driver_license_number?>">
            </div>
            <div class="form-group col-md-2">
              <label>Categoria</label>
              <input type="text" class="form-control" name="license_category" value="<?php //echo  $inspection->vehicle_license_plate?>">
            </div>
          </div>

          <input type="hidden"   name="id" required value="<?php echo  $inspection->inspection_id?>">
          @csrf
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" id ="update-inspeccion">Guardar</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        </div>
      </form>