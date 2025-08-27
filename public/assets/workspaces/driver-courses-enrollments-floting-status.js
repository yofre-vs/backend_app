import { ApiClient } from '/assets/global/js/utils/apiClient.js';
import { RenderEnrollmentTable } from './driver-courses-enrollments-render.js';
export class FloatingStatus {
  static floatingContainer = null;   // Contenedor general para elementos flotados
  static floatingElement = null;     // El div flotante específico con el formulario
  static form = null;
  static api = null;

  static init(baseUrl = '') {
    this.api = new ApiClient(baseUrl || window.location.origin);

    // Obtener o crear el contenedor general
    this.floatingContainer = document.getElementById('floating-container');
    if (!this.floatingContainer) {
      this.floatingContainer = document.createElement('div');
      this.floatingContainer.id = 'floating-container';
      document.body.appendChild(this.floatingContainer);
    }

    // Obtener o crear el floatingElement (div con id floating-box-status)
    this.floatingElement = document.getElementById('floating-box-status');
    if (!this.floatingElement) {
      this.floatingElement = document.createElement('div');
      this.floatingElement.id = 'floating-box-status';
      this.floatingElement.className = 'position-absolute border bg-white shadow rounded p-3';
      this.floatingElement.style.display = 'none';
      this.floatingElement.style.zIndex = '1050';
      this.floatingElement.style.width = '400px';
      this.floatingElement.style.maxWidth = '100%';
      this.floatingContainer.appendChild(this.floatingElement);
    }

    // Poner dentro del floatingElement el formulario y su contenido original (el que pusiste)
    this.floatingElement.innerHTML = `
      <form id="form-floating-status">

        <!-- Estado 1: REGISTRADO (completado) -->
        <div class="row g-2 align-items-center estado-row mb-2">
          <div class="col-4 d-flex align-items-center">
            <i class='bx bxs-flag-alt text-success fs-5 me-2'></i>
            <strong class="small">Registrado</strong>
          </div>
          <div class="col-4">
            <div class="form-control-plaintext small" id="box_created_date">---</div>
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
          <div class="col-4 box_status_info" id="box_completed_code">
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
      </form>
    `;

    this.form = this.floatingElement.querySelector('#form-floating-status');

    this.form.addEventListener('submit', this.handleFormSubmit.bind(this));
    document.body.addEventListener('click', this.handleBodyClick.bind(this));
  }

  static handleBodyClick(e) {
    const btn = e.target.closest('.open-floating-box');
    if (btn) {
      e.preventDefault();

      const tr = btn.closest('tr');
      const enrollId = tr.dataset.enrollId;

      // Buscar el objeto en window.dataEnrollments por enroll_id
      const data = window.dataEnrollments.find(item => item.enroll_id == enrollId);

      if (!data) {
        alert('Error: No se encontró la matrícula con ID ' + enrollId);
        return;
      }

     
      this.renderContent(data);

      const rect = btn.getBoundingClientRect();
      const boxHeight = this.floatingElement.offsetHeight || 200;
      const spaceBelow = window.innerHeight - rect.bottom;

      this.floatingElement.style.left = `${rect.left + window.scrollX}px`;
      if (spaceBelow >= boxHeight) {
        this.floatingElement.style.top = `${rect.bottom + window.scrollY}px`;
      } else {
        this.floatingElement.style.top = `${rect.top + window.scrollY - boxHeight}px`;
      }

      this.floatingElement.style.display = 'block';
    } else {
      if (!e.target.closest('#floating-box-status') && !e.target.closest('.open-floating-box')) {
        this.hide();
      }
    }
  }

  static renderContent(data) {
    // Reseteamos cajas de estado a contenido estático
    const boxes = {
      created_date: this.floatingElement.querySelector('#box_created_date'),
      enrolled_date: this.floatingElement.querySelector('#box_enrolled_date'),
      enrolled_code: this.floatingElement.querySelector('#box_enrolled_code'),
      completed_date: this.floatingElement.querySelector('#box_completed_date'),
      completed_code: this.floatingElement.querySelector('#box_completed_code'),
      certified_date: this.floatingElement.querySelector('#box_certified_date'),
      certified_code: this.floatingElement.querySelector('#box_certified_code'),
      submitted_date: this.floatingElement.querySelector('#box_submitted_date'),
      submitted_code: this.floatingElement.querySelector('#box_submitted_code'),
      closed_date: this.floatingElement.querySelector('#box_closed_date'),
      closed_code: this.floatingElement.querySelector('#box_closed_code'),
    };

    // Poner por defecto el contenido en modo texto o '---'
    boxes.created_date.innerHTML = data.created_at || `${data.enrolled_code}`;

    boxes.enrolled_date.innerHTML = data.enrolled_date || '---';
    boxes.enrolled_code.innerHTML = data.enrolled_code ? `N° ${data.enrolled_code}` : '---';

    boxes.completed_date.innerHTML = data.completed_date || '---';
    boxes.completed_code.innerHTML = data.completed_code ? `N° ${data.completed_code}` : '---';

    boxes.certified_date.innerHTML = data.certified_date || '---';
    boxes.certified_code.innerHTML = data.certified_code ? `N° ${data.certified_code}` : '---';

    boxes.submitted_date.innerHTML = data.submitted_date || '---';
    boxes.submitted_code.innerHTML = data.submitted_code ? `N° ${data.submitted_code}` : '---';

    boxes.closed_date.innerHTML = data.closed_date || '---';
    boxes.closed_code.innerHTML = data.closed_code ? `N° ${data.closed_code}` : '---';

    // Ocultar inputs por defecto
    // El valor para acción va en el hidden input
    const box_action = this.floatingElement.querySelector('#box_action');
    box_action.value = "";

    // Mostrar inputs solo para el siguiente estado en función del estado actual
    //alert(data.enroll_status);
    switch (data.enroll_status) {
      case 'registrado': 
        boxes.enrolled_date.innerHTML = `<input type="date" class="form-control form-control-sm" name="e_enrolled_date" required>`;
        boxes.enrolled_code.innerHTML = `<input type="text" class="form-control form-control-sm" name="e_enrolled_code" required placeholder="N° Matrícula">`;
        box_action.value = "matricular";
        break;

      case 'matriculado':
        boxes.completed_date.innerHTML = `<input type="date" class="form-control form-control-sm" name="e_completed_date" required>`;
        boxes.completed_code.innerHTML = `<input type="text" class="form-control form-control-sm hidden" name="e_completed_code" value="" placeholder="N° Comprobante">`;
        box_action.value = "completar";
        break;

      case 'completado':
        boxes.certified_date.innerHTML = `<input type="date" class="form-control form-control-sm" name="e_certified_date" required>`;
        boxes.certified_code.innerHTML = `<input type="text" class="form-control form-control-sm" name="e_certified_code" required placeholder="N° Certificado">`;
        box_action.value = "certificar";
        break;

      case 'certificado':
        boxes.submitted_date.innerHTML = `<input type="date" class="form-control form-control-sm" name="e_submitted_date" required>`;
        boxes.submitted_code.innerHTML = `<input type="text" class="form-control form-control-sm" name="e_submitted_code" required placeholder="N° Comprobante">`;
        box_action.value = "enviar";
        break;

      case 'submitted':
        boxes.closed_date.innerHTML = `<input type="date" class="form-control form-control-sm" name="e_closed_date" required>`;
        boxes.closed_code.innerHTML = `<input type="text" class="form-control form-control-sm" name="e_closed_code" required placeholder="N° Orden">`;
        box_action.value = "cerrar";
        break;

      case 'cerrado':
        // Ya no se puede avanzar, no mostramos inputs
        box_action.value = "";
        break;

      default:
        // Estado desconocido, no hacer nada
        box_action.value = "";
        break;
    }

    // Actualizar el hidden input de enroll_id
    this.floatingElement.querySelector('#box_enroll_id').value = data.enroll_id || 0;
  }


  static async handleFormSubmit(e) {
    e.preventDefault();

    const formData = new FormData(this.form);
    const data = Object.fromEntries(formData.entries());
    data.action = 'save-status';

    const userUUID = document.body.dataset.uuid || '';

    try {
      const response = await this.api.post(`/w/${userUUID}/driver-courses`, data, true);

      if (response.success) {
        
        
        this.handleServerResponse(response.data);
        this.hide();
      } else {
        alert('❌ Error: ' + (response.message || 'Error desconocido'));
      }
    } catch (error) {
      console.error(error);
      alert('❌ Error al guardar.');
    }
  }
static handleServerResponse(enroll) {  
  if (enroll) {
    RenderEnrollmentTable.updateEnrollment(enroll);
    alert(`Guardado con éxito.\nEstado actualizado a: ${enroll.enroll_status}`);
  } else {
    alert("No se recibió la inscripción actualizada.");
  }
}

  static hide() {
    if (this.floatingElement) {
      this.floatingElement.style.display = 'none';
    }
  }
}
