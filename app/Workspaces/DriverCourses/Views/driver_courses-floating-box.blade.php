{{------------------------   FloatingBox Status   -----------------------}}
<!-- FoBox Status -->
<div id="floating-box-status" class="position-absolute border bg-white shadow rounded p-3" style="display: none; z-index: 1050; width: 400px; max-width: 100%;">
  <form id="form-floating-status">

    <!-- Estado 1: REGISTRADO (completado) -->
    <div class="row g-2 align-items-center estado-row mb-2">
      <div class="col-4 d-flex align-items-center">
        <i class='bx bxs-flag-alt text-success fs-5 me-2'></i>
        <strong class="small">Registrado</strong>
      </div>
      <div class="col-4">
        <div class="form-control-plaintext small" id="box_created_date">10/08/2025</div>
      </div>
      <div class="col-4"> 
      </div>
    </div>

    <!-- Estado 2: MATRICULADO (activo) -->
    <div class="row g-2 align-items-center estado-row mb-2">
      <div class="col-4 d-flex align-items-center">
        <i class='bx bxs-flag-alt text-primary fs-5 me-2'></i>
        <strong class="small">Matriculado</strong>
      </div>
      <div class="col-4 box_status_info" id="box_enrolled_date">
        <input type="date" class="form-control form-control-sm" placeholder="Fecha">
      </div>
      <div class="col-4 box_status_info" id="box_enrolled_code">
        <input type="text" class="form-control form-control-sm " placeholder="N° Matricula">
      </div>
    </div>

    <!-- Estado 3: COMPLETADO (en espera) -->
    <div class="row g-2 align-items-center estado-row mb-2  ">
      <div class="col-4 d-flex align-items-center">
        <i class='bx bxs-flag-alt text-warning fs-5 me-2'></i>
        <strong class="small">Completado</strong>
      </div>
      <div class="col-4 box_status_info" id="box_completed_date">
        <div class="form-control-plaintext small">En espera</div>
      </div>
      <div class="col-4 box_status_info" id="box_completed_date">
        <div class="form-control-plaintext small"></div>
      </div>
    </div>

    <!-- Estado 4: CERTIFICADO (en espera) -->
    <div class="row g-2 align-items-center estado-row mb-2 ">
      <div class="col-4 d-flex align-items-center">
        <i class='bx bxs-flag-alt text-info fs-5 me-2'></i>
        <strong class="small">Certificado</strong>
      </div>
      <div class="col-4 box_status_info" id="box_certified_date">
        <div class="form-control-plaintext small">En espera</div>
      </div>
      <div class="col-4 box_status_info" id="box_certified_code">
        <div class="form-control-plaintext small"></div>
      </div>
    </div>

    <!-- Estado 5: ENVIADO A PLANILLA (en espera) -->
    <div class="row g-2 align-items-center estado-row mb-2  ">
      <div class="col-4 d-flex align-items-center">
        <i class='bx bxs-flag-alt text-secondary fs-5 me-2'></i>
        <strong class="small">Enviado</strong>
      </div>
      <div class="col-4 box_status_info" id="box_submitted_date">
        <div class="form-control-plaintext small">En espera</div>
      </div>
      <div class="col-4 box_status_info" id="box_submitted_code">
        <div class="form-control-plaintext small"></div>
      </div>
    </div>

    <!-- Estado 6: CERRADO / FINALIZADO (en espera) -->
    <div class="row g-2 align-items-center estado-row mb-2  ">
      <div class="col-4 d-flex align-items-center">
        <i class='bx bxs-flag-alt text-dark fs-5 me-2'></i>
        <strong class="small">Cerrado</strong>
      </div>
      <div class="col-4 box_status_info" id="box_closed_date">
        <div class="form-control-plaintext small">En espera</div>
      </div>
      <div class="col-4 box_status_info" id="box_closed_code">
        <div class="form-control-plaintext small"></div>
      </div>
    </div>

    <div class="row g-2 align-items-center  ">
      <div class="col-4 d-flex align-items-center"> 
      </div>
      <div class="col-4">
        <input type="hidden" value="0" name="e_enroll_id" id="box_enroll_id">
        <input type="hidden" value="0" name="action_task" id="box_action">
        <button type="submit" class="btn btn-sm btn-primary w-100" id ="btn-save-status">Guardar</button>
      </div>
      <div class="col-4"> 
      </div>
    </div>

    <!-- Botón guardar -->
    <div class="mt-3">
      
    </div>

  </form>
</div>
<script>
  document.addEventListener('DOMContentLoaded', () => {
    const box = document.getElementById('floating-box-status');

    // Función para armar el contenido HTML del box
    function renderFloatingBoxContent(data) {
      const statusBoxes = document.querySelectorAll('.box_status_info');
      statusBoxes.forEach(el => el.innerHTML = '---');

      
      //hidden inputs
      const box_enroll_id = document.getElementById('box_enroll_id');
      box_enroll_id.value = data.id;
      const box_action = document.getElementById('box_action'); 


      var alredyInputs= false;
      //registered 
      const box_created_date = document.getElementById('box_created_date');
      box_created_date.innerHTML = data.registered;

      //matriculado
      const box_enrolled_date = document.getElementById('box_enrolled_date');
      const box_enrolled_code = document.getElementById('box_enrolled_code');
      if(data.status=='registrado'){
        box_enrolled_date.innerHTML = `<input type="date" class="form-control form-control-sm" placeholder="Fecha" name="e_enrolled_date">`;
        box_enrolled_code.innerHTML = `<input type="text" class="form-control form-control-sm" placeholder="N° Matricula" name="e_enrolled_code">`
        alredyInputs = true;
        box_action.value = "matricular"
      }else{
        box_enrolled_date.innerHTML = data.enrolled_date;
        box_enrolled_code.innerHTML = "N° "+data.enrolled_code;
      } 

      //Completado
      const box_completed_date = document.getElementById('box_completed_date');
      const box_completed_code = document.getElementById('box_completed_code');
      if(data.status=='matriculado'){
        box_completed_date.innerHTML = `<input type="date" class="form-control form-control-sm" placeholder="Fecha" name="e_completed_date">`;
         alredyInputs = true;
         box_action.value = "completar"
      }else if(alredyInputs ==false ){ 
        box_completed_date.innerHTML = data.completed_date; 
      } 

      //Certificado
      const box_certified_date = document.getElementById('box_certified_date');
      const box_certified_code = document.getElementById('box_certified_code');
      if(data.status=='completado'){
        box_certified_date.innerHTML = `<input type="date" class="form-control form-control-sm" placeholder="Fecha" name="e_certified_date">`;
        box_certified_code.innerHTML = `<input type="text" class="form-control form-control-sm" placeholder="N° Matricula" name="e_certified_code">`
         alredyInputs = true;
         box_action.value = "certificar"
      }else if(alredyInputs ==false ){ 
        box_certified_date.innerHTML = data.certified_date; 
        box_certified_code.innerHTML = data.certified_code;
      }

      //Enviado
      const box_submited_date = document.getElementById('box_submited_date');
      const box_submited_code = document.getElementById('box_submited_code');
      if(data.status=='certificado'){
        box_certified_date.innerHTML = `<input type="date" class="form-control form-control-sm" placeholder="Fecha" name="e_submited_date">`;
        box_certified_code.innerHTML = `<input type="text" class="form-control form-control-sm" placeholder="N° Matricula" name="e_submited_code">`
         alredyInputs = true;
         box_action.value = "enviar"
      }else if(alredyInputs ==false ){ 
        box_certified_date.innerHTML = data.certified_date; 
        box_certified_code.innerHTML = data.certified_code;
      }

      //cerrado
      const box_closed_date = document.getElementById('box_closed_date');
      const box_closedcode = document.getElementById('box_closed_code');
      if(data.status=='enviado'){
        box_closed_date.innerHTML = `<input type="date" class="form-control form-control-sm" placeholder="Fecha" name="e_certified_date">`;
        box_closed_code.innerHTML = `<input type="text" class="form-control form-control-sm" placeholder="N° Matricula" name="e_certified_code">`
         alredyInputs = true;
         box_action.value = "cerrar"
      }else if(alredyInputs == false ){ 
        box_closed_date.innerHTML = data.closed_date; 
        box_closed_code.innerHTML = data.closed_date;
      }

         
    }

    document.body.addEventListener('click', function (e) {
      const btn = e.target.closest('.open-floating-box');

      if (btn) {
        e.preventDefault();

        const tr = btn.closest('tr');
        const data = tr.dataset;

        // Reemplazar contenido del box con HTML generado
        renderFloatingBoxContent(data);

        // Posicionar el box cerca del botón
        const rect = btn.getBoundingClientRect();
        const boxHeight = 140; // ajusta si cambia el contenido
        const espacioDisponible = window.innerHeight - rect.bottom;

        box.style.left = `${rect.left + window.scrollX}px`;

        if (espacioDisponible >= boxHeight) {
          box.style.top = `${rect.bottom + window.scrollY}px`;
        } else {
          box.style.top = `${rect.top + window.scrollY - boxHeight}px`;
        }
        box.style.display = 'block';
      } else {
        // Clic fuera del menú y botón: ocultar el box
        if (!e.target.closest('#floating-box-status') && !e.target.closest('.open-floating-box')) {
          box.style.display = 'none';
        }
      }
    });
  });
</script>
<script   type="module" >
  import {ApiClient} from '/assets/global/js/utils/apiClient.js';
  document.addEventListener('DOMContentLoaded', () => {
    const btn = document.getElementById('btn-save-status');
    const form = document.getElementById('form-floating-status');
    btn.addEventListener('click', async (e) => {
      e.preventDefault();

      const formData = new FormData(form);
      const data = Object.fromEntries(formData.entries());
      @php
        $uuid = request()->route('uuid');
      @endphp
      data.action = 'save-status';
      const api = new ApiClient("{{ url('/') }}");
      api.post(`/w/{{$uuid}}/driver-courses`, data, true)
      .then((response) => {
        
        alert("exito");
        if (response.success) {
          
          const enroll = response.data;   
          const tr = document.getElementById('enrolled-item'+enroll.enroll_id); 
          const enrolldata = tr.dataset;
          enrolldata.status = enroll.enroll_status;
          alert(enroll.action_task);
          const boton = tr.cells[5].querySelector('button'); 
          switch(enroll.action_task){
            case "matricular": 
               enrolldata.enrolled_date = enroll.enroll_snc_enroll_code;
               enrolldata.enrolled_code = enroll.enroll_enrolled_date;
               tr.cells[10].innerText = enroll.enroll_snc_enroll_code; 
               tr.cells[11].innerText = enroll.enroll_enrolled_date; 
               boton.innerText = 'matriculado';   
              break; 
            case "completar": 
               enrolldata.enrolled_date = enroll.enroll_snc_enroll_code;
               enrolldata.enrolled_code = enroll.enroll_enrolled_date;
               tr.cells[10].innerText = enroll.enroll_snc_enroll_code; 
               tr.cells[11].innerText = enroll.enroll_enrolled_date;  
               boton.innerText = 'completado';   
              break; 

          }
            
   
            const modalEl = document.getElementById('newEnrollFormModal');
            if (modalEl) {
              const modal = bootstrap.Modal.getInstance(modalEl);
              if (modal) {
                modal.hide();
              }
            }
          }
      })
      .catch((error) => {
        
        console.error('Error:', error);
        alert("Error al guardar ❌");
      });
      
      
    });
  });
</script>

