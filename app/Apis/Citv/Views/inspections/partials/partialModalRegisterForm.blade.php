@php 
use App\Domains\Citv\Services\MTC\SoapServices\MTCSoapData;
@endphp
<div class="modal fade" id="NewInspection" tabindex="-1" aria-labelledby="NewInspectionLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content overflow-hidden">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="NewInspectionLabel">Nueva Inspection Técnica</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="d-flex transition-container" id="stepsWrapper">
          <div class="p-4 step  1 w-100" id="registerStep1">
            <h3>Datos de Registro</h3>
            <form class="row g-3" id="formNewInspectionS1">
                @csrf
                <div class="col-md-6">
                  <label for="inputEmail4" class=" ">N° Placa</label>
                  <input type="email" class="form-control  form-control-sm" id="in_plate_license" name="inspVehiclePlate" value="123456">
                </div>
            
                <div class="col-md-6"> 
                </div> 
                <div class="col-md-6">
                  <label for="inputPassword4" class=" ">Servicio</label>
                  <select id="inputState" class="form-select form-control-sm" name="inspType">
                    <option selected>Elige un  servicio</option>
                    @php 
//dd( MTCSoapData::get('services') );
@endphp
                    @foreach(MTCSoapData::get('vehicleServiceTypes') as $key => $label)
                        <option value="{{ $key }}">{{ $label }}</option>
                    @endforeach
                    
                    
                  </select>
                </div>
                <div class="col-6">
                  <label for="inputAddress" class=" ">Ambito</label>
                  <select id="inputState" class="form-select form-control-sm" name="inspScope">
                    <option selected>Elige un Ambito</option>
                    @foreach(MTCsoapData::get('vehicleServiceAreas') as $key => $label)
                        <option value="{{ $key }}">{{ $label }}</option>
                    @endforeach
                     
                  </select>
                </div>
                <div class="col-6">
                  <label for="inputAddress2" class=" ">Clase</label>
                  <select id="inputState" class="form-select form-control-sm" name="inspClass">
                    <option selected>Elige un  Clase</option>
                    
                     @foreach(MTCsoapData::get('inspectionTypes') as $key => $label)
                        <option value="{{ $key }}">{{ $label }}</option>
                     @endforeach  
                  </select>
                </div>
                <div class="col-6">
                  <label for="inputCity" class=" ">Sub clase</label>
                  <select id="inputState" class="form-select form-control-sm" name="inspSub">
                    <option selected>Elige una sub clase</option>
                     @foreach(MTCsoapData::get('inspectionTypes') as $key => $label)
                        <option value="{{ $key }}">{{ $label }}</option>
                     @endforeach     
                  </select>
                </div>
                <div class="col-12">
                  <label for="inpsCategory" class=" ">Categoria</label>
                  <select id="inpsCategory" class="form-select form-control-sm" name ="inpsCategory"> 
                    <option selected>Elige una categoria vehicular</option>
                    @foreach(MTCsoapData::get('vehicleCategories') as $key => $label)
                        <option value="{{ $key }}">{{ $label }}</option>
                     @endforeach  
                  </select>
                </div>
                
            </form>
            <div class="d-flex justify-content-end pt-4">
              <button class="btn btn-primary " id="step1NextBtn">Siguiente</button>
            </div>

          </div>
          <div class="p-4 step w-100" id="formNewInspectionVehicle">
            <div>
              
            <h3>Datos del vehiculo</h3>
            <form class="row g-3">
              
              <div class="col-md-4">
                <label for="inputEmail4" class=" ">N° Placa</label>
                <input type="email" class="form-control form-control-sm" id="in_plate_license" value="123456" aria-label="readonly input example" readonly>
              </div>
              <div class="col-md-4">
                <label for="inputEmail4" class=" ">Marca</label>
                <input type="email" class="form-control form-control-sm" id="in_plate_license" value="123456"  >
              </div>
              <div class="col-md-4">
                <label for="inputEmail4" class=" ">Modelo</label>
                <input type="email" class="form-control form-control-sm" id="in_plate_license" value="123456"  >
              </div>  
              <div class="col-md-2">
                <label for="inputEmail2" class=" ">Año Fab.</label>
                <input type="email" class="form-control form-control-sm" id="in_plate_license" value="123456"  >
              </div>
              <div class="col-md-3">
                <label for="inputEmail4" class=" ">VIN</label>
                <input type="email" class="form-control form-control-sm" id="in_plate_license" value="123456"  >
              </div>  
              <div class="col-md-4">
                <label for="inputEmail4" class=" ">N° Serie/Chasis</label>
                <input type="email" class="form-control form-control-sm" id="in_plate_license" value="123456"  >
              </div>
              <div class="col-md-3">
                <label for="inputEmail4" class=" ">Combustible</label>
                <input type="email" class="form-control form-control-sm" id="in_plate_license" value="123456"  >
              </div>  
              <div class="col-md-2">
                <label for="inputEmail4" class=" ">N° Motor</label>
                <input type="email" class="form-control form-control-sm" id="in_plate_license" value="123456"  >
              </div>
              <div class="col-md-2">
                <label for="inputEmail4" class=" ">Cilindros</label>
                <input type="email" class="form-control form-control-sm" id="in_plate_license" value="123456"  >
              </div>
              <div class="col-md-2">
                <label for="inputEmail4" class=" ">Ejes</label>
                <input type="email" class="form-control form-control-sm" id="in_plate_license" value="123456"  >
              </div>
              <div class="col-md-2">
                <label for="inputEmail4" class=" ">Ruedas</label>
                <input type="email" class="form-control form-control-sm" id="in_plate_license" value="123456"  >
              </div>
              <div class="col-md-2">
                <label for="inputEmail4" class=" ">Asientos</label>
                <input type="email" class="form-control form-control-sm" id="in_plate_license" value="123456"  >
              </div>
              <div class="col-md-2">
                <label for="inputEmail4" class=" ">Pasajeros</label>
                <input type="email" class="form-control form-control-sm" id="in_plate_license" value="123456"  >
              </div>
              <div class="col-md-4">
                <label for="inputEmail4" class=" ">Color</label>
                <input type="email" class="form-control form-control-sm" id="in_plate_license" value="123456"  >
              </div>
              <div class="col-md-2">
                <label for="inputEmail4" class=" ">Alto</label>
                <input type="email" class="form-control form-control-sm" id="in_plate_license" value="123456"  >
              </div>
              <div class="col-md-2">
                <label for="inputEmail4" class=" ">Ancho</label>
                <input type="email" class="form-control form-control-sm" id="in_plate_license" value="123456"  >
              </div>
              <div class="col-md-2">
                <label for="inputEmail4" class=" ">Largo</label>
                <input type="email" class="form-control form-control-sm" id="in_plate_license" value="123456"  >
              </div>
              <div class="col-md-2">
                <label for="inputEmail4" class=" ">P. Neto</label>
                <input type="email" class="form-control form-control-sm" id="in_plate_license" value="123456"  >
              </div>
              <div class="col-md-2">
                <label for="inputEmail4" class=" ">P Bruto</label>
                <input type="email" class="form-control form-control-sm" id="in_plate_license" value="123456"  >
              </div>
              <div class="col-md-2">
                <label for="inputEmail4" class=" ">C. Util</label>
                <input type="email" class="form-control form-control-sm" id="in_plate_license" value="123456"  >
              </div>
              <div class="col-md-4">
                <label for="inputEmail4" class=" ">Tipo Carroceria</label>
                <input type="email" class="form-control form-control-sm" id="in_plate_license" value="123456"  >
              </div>
              <div class="col-md-4">
                <label for="inputEmail4" class=" ">Modelo Carroceria</label>
                <input type="email" class="form-control form-control-sm" id="in_plate_license" value="123456"  >
              </div>


              </form>
               
            </div> 
            <div class="d-flex justify-content-between pt-4">
              <a   id="step2BackBtn">&#x2B05; Regresar</a>
              <button class="btn btn-primary " id="step2NextBtn">Siguiente</button>
            </div>
          </div>
          <div class="p-4 step w-100" id="formNewInspectionDriver">
            
            <h3>Datos del conductor</h3>
            <form class="row g-3">
              
                <div class="col-md-4">
                  <label for="inputEmail4" class=" ">Tipo de Documento</label>
                  <select id="inputState" class="form-select form-select-sm" name="zzzz">
                    <option selected>Elige un tipo de documento</option>
                    <option value="Ordinaria">Dni</option>
                    <option value="Ordinaria y Complementaria">Carnet Extranjeria</option>
                    <option value="Extraordinaria">Passaporte</option>
                    
                  </select>
                </div> 
                <div class="col-md-6">
                  <label for="inputPassword4" class=" ">N° Documento</label>
                  <input type="email" class="form-control form-control-sm" id="in_plate_license" value=""  >
           
                </div>
                <div class="col-6">
                  <label for="inputAddress" class=" ">Nombres</label>
                  <input type="email" class="form-control form-control-sm" id="in_plate_license" value=""  >
           
                </div>
                <div class="col-6">
                  <label for="inputAddress2" class=" ">Apellidos</label>
                  <input type="email" class="form-control form-control-sm" id="in_plate_license" value=""  >
                </div>
                <div class="col-6">
                  <label for="inputCity" class=" ">Direccion</label>
                  <input type="email" class="form-control form-control-sm" id="in_plate_license" value="" >
           
                </div>
                <div class="col-6">
                  <label for="inputState" class=" ">Ubigeo</label>
                  <input type="email" class="form-control form-control-sm" id="in_plate_license" value=""  >
                </div>
                <div class="col-6">
                  <label for="inputCity" class="">Cell.</label>
                  <input type="email" class="form-control form-control-sm" id="in_plate_license" value="" >
           
                </div>
                <div class="col-6">
                  <label for="inputState" class=" ">Email</label>
                  <input type="email" class="form-control form-control-sm" id="in_plate_license" value=""  >
                </div>
                
            </form>
            <div class="d-flex justify-content-between pt-4">
              <a   id="step3BackBtn">&#x2B05; Regresar</a>
              <button class="btn btn-primary " id="step3NextBtn">Siguiente</button>
            </div>

          </div>
        </div>
      </div>

    </div>
  </div>
</div>