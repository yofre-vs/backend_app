export class RenderEnrollmentTable { 

  static safeText(value, placeholder = '') {
    return value != null && value !== 'null' ? value : placeholder;
  }

  static renderEnrollmentRow(enrollment) {
    const row = document.createElement('tr');
    row.id = `enrollment-${enrollment.enroll_id}`;
    row.dataset.enrollId = enrollment.enroll_id;
    row.dataset.enrollTags = enrollment.enroll_tags;
    let htmlTheory = "";
    let htmlPractice = "";

    if (enrollment.enroll_status !== "registrado") { 
      if (enrollment.enroll_course_theory && enrollment.enroll_course_theory.items) {
        for (const key in enrollment.enroll_course_theory.items) {
          let txt = enrollment.enroll_course_theory.items[key].h;
          htmlTheory += `<button type="button" class="btn btn-outline-secondary open-floating-box2" data-order="${key}" data-type="t">${txt}</button>`;
        }
      }
      htmlTheory += `<button type="button" class="btn btn-outline-secondary open-floating-box2" data-order="new" data-type="t"><i class='bx  bx-plus'  ></i> </button>`;
      htmlTheory = `<div class="btn-group btn-group-sm" role="group" aria-label="Small button group">${htmlTheory}</div>`;

      if (enrollment.enroll_course_practice && enrollment.enroll_course_practice.items) {
        for (const key in enrollment.enroll_course_practice.items) {
          let txt = enrollment.enroll_course_practice.items[key].h;
          htmlPractice += `<button type="button" class="btn btn-outline-secondary open-floating-box2" data-order="${key}" data-type="t">${txt}</button>`;
        }
      }
      htmlPractice += `<button type="button" class="btn btn-outline-secondary open-floating-box2" data-order="new" data-type="p"><i class='bx  bx-plus'  ></i> </button>`;
      htmlPractice = `<div class="btn-group btn-group-sm" role="group" aria-label="Small button group">${htmlPractice}</div>`;
    }else{
         htmlTheory = "---";
         htmlPractice = "---";
    }

    //for tags
    const rawTags =  enrollment.enroll_tags; // tu string JSON
    let tagsArray = [];
    try {
      tagsArray = JSON.parse(rawTags);
      if (!Array.isArray(tagsArray)) {
        tagsArray = [];
      }
    } catch (e) {
      console.error('Error parsing tags:', e);
      tagsArray = [];
    }
    let htmlTags="";
    tagsArray.forEach(tagObj => {
      htmlTags += ` <span class="btn btn-secondary btn-sm" style="cursor: default !important;">${tagObj.value}</span> ` ;
    });

    row.innerHTML = `
      <td><i class='bx bx-star'></i></td>
      <td><strong>${this.safeText(enrollment.enroll_doc)}</strong></td>
      <td><strong>${this.safeText(enrollment.enroll_fullname)}</strong></td>
      <td>
        <div class="dropdown enrollmentDropdown">
          <button class="btn btn-outline-secondary btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
            <i class='bx  bx-dots-vertical'  ></i> 
          </button>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item open-detail-modal" href="#"><i class='bx bx-pencil'></i> Editar</a></li>
            <li><a class="dropdown-item btn-delete-enroll" href="#" data-bs-toggle="modal" data-bs-target="#deleteConfirmModal"><i class='bx bx-trash'></i> Eliminar </a></li> 
          </ul>
        </div>
      </td>
      <td><strong>${this.safeText(enrollment.enroll_course)}</strong> - ${this.safeText(enrollment.enroll_course_hours)}h</td>
      <td>
        <button type="button" class="btn btn-outline-secondary btn-sm open-floating-box">${this.safeText(enrollment.enroll_status)}</button>
      </td>
      <td>${htmlTheory}</td>
      <td>${htmlPractice}</td>
      <td>${this.safeText(enrollment.enroll_course_hours)}h</td>
      <td>${this.safeText(enrollment.created_at)}</td>
      <td>${this.safeText(enrollment.enroll_snc_enroll_code)}</td>
      <td>${this.safeText(enrollment.enroll_enrolled_date)}</td>
      <td>${this.safeText(enrollment.enroll_snc_certificate_code)}</td>
      <td>${this.safeText(enrollment.enroll_certified_date)}</td>
      <td>${this.safeText(enrollment.enroll_submitted_date)}</td>
      <td>${this.safeText(enrollment.enroll_snc_submitted_code)}</td>
      <td>${this.safeText(enrollment.enroll_payment_status)}%</td>
      <td>${htmlTags}</td>
    `;

    


     

    return row;
  }

  static render(container, enrollments) {
    container.innerHTML = ''; // Limpia el contenedor

    if (!Array.isArray(enrollments) || enrollments.length === 0) {
      container.innerHTML = `
        <tr>
          <td colspan="18" style="text-align: center;">No hay inscripciones registradas.</td>
        </tr>
      `;
      
      return;
    }

    enrollments.forEach(enrollment => {
      container.appendChild(this.renderEnrollmentRow(enrollment));
    });
    RenderEnrollmentTable.initDeleteModal();
  }

  static updateEnrollment(enrollment) {
    const newRow = this.renderEnrollmentRow(enrollment);
    const oldRow = document.getElementById(`enrollment-${enrollment.enroll_id}`);

    if (oldRow && oldRow.parentNode) {
        oldRow.parentNode.replaceChild(newRow, oldRow);
        this.highlightRow(newRow);
    }
  }


  static addEnrollment(enrollment, container, prepend = false, highlight = false) {
    const row = this.renderEnrollmentRow(enrollment);

    if (prepend) {
        container.prepend(row);
    } else {
        container.appendChild(row);
    }

    if (highlight) {
        this.highlightRow(row);
    }
  }
  static highlightRow(row) {
    if (!row) return;
    row.classList.add('highlighted-row');
    row.scrollIntoView({ behavior: 'smooth', block: 'center' });
    setTimeout(() => {
        row.classList.remove('highlighted-row');
    }, 3000);
  }
  static initDeleteModal() {
  let enrollIdToDelete = null;
  console.log('try initDeleteModal.');

  // Cuando se hace click en el botón eliminar, capturamos el enrollId
  document.addEventListener('click', (event) => {
    const deleteBtn = event.target.closest('.btn-delete-enroll');
    if (!deleteBtn) return;

    const tr = deleteBtn.closest('tr');
    if (!tr) return;

    const enrollId = tr.dataset.enrollId;
    if (!enrollId) return;

    enrollIdToDelete = enrollId;
    // Aquí podrías abrir el modal si quieres
  });

  const confirmBtn = document.getElementById('confirmDeleteBtn');
  if (confirmBtn) {
    confirmBtn.addEventListener('click', async () => {  // <-- async aquí

      if (!enrollIdToDelete) {
        console.error('No enrollId to delete.');
        return;
      }

      try {
        const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

        const userUUID = document.body.dataset.uuid || '';
        const response = await fetch(`/w/${userUUID}/driver-courses/small-detail/${enrollIdToDelete}`, {  // usa enrollIdToDelete
          method: 'DELETE',
          headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': csrfToken, // si usas token CSRF
          },
        });

        if (!response.ok) {
          throw new Error(`HTTP error! status: ${response.status}`);
        }

        const result = await response.json();

        if (result.success) {
          console.log('Eliminado correctamente:', result);
          const row = document.getElementById(`enrollment-${enrollIdToDelete}`);
          if (row) row.remove();
        } else {
          alert('Error al eliminar: ' + result.message);
        }
      } catch (error) {
        //console.error('Error en la llamada delete:', error);
        alert('Error en la comunicación con el servidor');
      }

      // Cerrar modal
      const modalEl = document.getElementById('deleteConfirmModal');
      const modal = bootstrap.Modal.getInstance(modalEl);
      if (modal) modal.hide();

      enrollIdToDelete = null;
    });
  }
}

}
