<form id="inspectionForm">
  <div class="modal-header">
    <h5 class="modal-title" id="inspectionFormModalLabel">Registrar Inspección Técnica</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  <div class="modal-body">

    <!-- Sección: Vehículo -->
    <h6 class="mb-3 border-bottom pb-1">🚗 Datos del Vehículo</h6>
    <div class="form-row mb-4">
      <div class="form-group col-md-6">
        <label>Tipo</label>
        <input type="text" class="form-control" name="type" >
      </div>
      <div class="form-group col-md-6">
        <label>Placa de rodaje</label>
        <input type="text" class="form-control" name="license_plate" required>
      </div>
      
      <div class="form-group col-md-6">
        <label>Marca</label>
        <input type="text" class="form-control" name="make">
      </div>
      <div class="form-group col-md-6">
        <label>Modelo</label>
        <input type="text" class="form-control" name="model">
      </div>
      <!--
      <div class="form-group col-md-6">
        <label>Año</label>
        <input type="text" class="form-control" name="year">
      </div>
      <div class="form-group col-md-4">
        <label>Asientos</label>
        <input type="text" class="form-control" name="seat_count" >
      </div>
-->
    </div>

    <!-- Sección: Conductor -->
    <h6 class="mb-3 border-bottom pb-1">🧑 Datos del Conductor</h6>
    <div class="form-row mb-4">
      <div class="form-group col-md-4">
        <label>DNI</label>
        <input type="text" class="form-control" name="driver_dni" required>
      </div>
      <div class="form-group col-md-4">
        <label>Nombre</label>
        <input type="text" class="form-control" name="driver_name" required>
      </div>
      <div class="form-group col-md-2">
        <label>Licencia</label>
        <input type="text" class="form-control" name="license_number" required>
      </div>
      <div class="form-group col-md-2">
        <label>Categoría</label>
        <input type="text" class="form-control" name="license_category" required>
      </div>
    </div>

    <!-- Sección: Facturación -->
    <h6 class="mb-3 border-bottom pb-1">💼 Datos de Revision Tecnica</h6>
    <div class="form-row mb-4">
      <div class="form-group col-md-6">
        <label>Clase</label> 
              <select class="form-control" name="inspection_class" required>
                <option value="">Seleccionar estado</option>
                <option value="aprobado">Ordinaria</option>
                <option value="desaprobado">Complementaria</option>
                <option value="segunda_revision">Ordinaria + Complementaria</option>
              </select>
      </div>
      <div class="form-group col-md-6">
        <label>Servicio</label>
        <select class="form-control" name="inspection_servicio" required>
                <option value="">Seleccionar estado</option>
                <option value="aprobado">Transporte Privado</option>
                <option value="aprobado">Transporte Regular de Pasajeros</option>
                <option value="desaprobado">Transporte de Carga Pesada</option>
                
              </select>
      </div>
       
    </div>

  </div>
  <div class="modal-footer">
    @csrf
    <button type="button" class="btn btn-primary" id ="guardar-inspeccion">Guardar</button>
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
  </div>
</form>
