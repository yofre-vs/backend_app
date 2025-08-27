
import { ApiClient } from '../global/js/utils/apiClient.js';
import { RenderEnrollmentTable } from './driver-courses-enrollments-render.js';
export class FloatingAttendance {
  static menu = null;
  static container = null;
  static api = new ApiClient('/w'); // ajusta el baseUrl si es necesario

  static init() {
    // Crear contenedor si no existe
    this.container = document.getElementById('floating-container');
    if (!this.container) {
      this.container = document.createElement('div');
      this.container.id = 'floating-container';
      document.body.appendChild(this.container);
    }

    if (this.menu) return;

    this.menu = document.createElement('form');
    this.menu.id = 'floating-menu';
    this.menu.style.position = 'absolute';
    this.menu.style.background = '#fff';
    this.menu.style.border = '1px solid #ccc';
    this.menu.style.padding = '10px';
    this.menu.style.display = 'none';
    this.menu.style.zIndex = '1000';

    this.menu.innerHTML = `
        <input type="hidden" name="enroll_id" />
        <input type="hidden" name="order" />
        
        <input type="hidden" name="type" />
        <label>
            Número: <input type="number" name="attendance_hours" min="0" value ="8" required />
        </label>
        <br/>
        <label>
            Fecha: <input type="date" name="attendance_date" required />
        </label>
        <br/>
        <button type="submit">Guardar</button>
        `;


    const dateInput = this.menu.querySelector('input[name="attendance_date"]');
    dateInput.value = new Date().toISOString().split('T')[0];

    this.container.appendChild(this.menu);
    this.menu.addEventListener('submit', this.handleFormSubmit.bind(this));
    document.addEventListener('click', this.handleClickEvent.bind(this));
  }
  static handleClickEvent(e) {
    const btn = e.target.closest('.open-floating-box2');
    if (btn) {
        const order = btn.dataset.order;
        const type = btn.dataset.type;
        const row = btn.closest('tr');
        const enroll_id = row?.dataset.enrollId; 
        // 👉 Asignar valores al form
        this.menu.querySelector('input[name="order"]').value = order;
        
        this.menu.querySelector('input[name="type"]').value = type;
        this.menu.querySelector('input[name="enroll_id"]').value = enroll_id;

        const rect = btn.getBoundingClientRect(); // usa `btn`, no `e.target`
        const menuHeight = 120;
        const spaceBelow = window.innerHeight - rect.bottom;
        let top = window.scrollY + rect.bottom;
        if (spaceBelow < menuHeight) {
        top = window.scrollY + rect.top - menuHeight;
        }
        const left = window.scrollX + rect.left;
        this.show(left, top);
    } else if (this.menu && !this.menu.contains(e.target)) {
        this.hide();
    }
  }


  // Método 2: Manejo del envío del formulario
  static async handleFormSubmit(e) {
    const userUUID = document.body.dataset.uuid;
 
    e.preventDefault(); 
    
    const formData = new FormData(this.menu);
    const data = Object.fromEntries(formData.entries());
    data.action = 'save-attendance';


    try {
      const response = await this.api.post("/"+userUUID+'/driver-courses', data, true);
      this.handleServerResponse(response);
    } catch (error) {
      alert(`❌ Error al guardar: ${error.data?.message || 'Error desconocido'}`);
    }

    this.hide();
  }

  // Método 3: Manejo de la respuesta del servidor
  static handleServerResponse(responseData) {

    
  RenderEnrollmentTable.updateEnrollment(responseData.data);
    alert(`✅ Guardado con éxito.\nRespuesta del servidor:\n${JSON.stringify(responseData, null, 2)}`);
    // Aquí puedes actualizar el UI, limpiar campos, etc.
  }

  static show(x, y) {
    if (!this.menu) return;
    this.menu.style.left = x + 'px';
    this.menu.style.top = y + 'px';
    this.menu.style.display = 'block';
  }

  static hide() {
    if (!this.menu) return;
    this.menu.style.display = 'none';
  }
}
