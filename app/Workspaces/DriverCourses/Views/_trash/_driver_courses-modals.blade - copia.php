<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Registar Matricula</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form class="row g-3" id="form-new-enroll">
          
          <div class="col-md-4">
            <label for="inputEmail4" class=" ">Tipo Documento</label>
            <select class="form-select form-select-sm" aria-label="Small select example" name="e_doc_type">
              <option value="DNI">Dni</option>
              <option value="CE">Carnet Extranjeria</option>
              <option value="Pas">Pasaporte</option>
            </select>
          </div>
          <div class="col-md-8">
            <label for="inputEmail4" class=" ">N° Documento</label>
            <input type="email" class="form-control form-control-sm" id="in_plate_license" value="123456"  name="e_doc">
          </div>
          <div class="col-md-12">
            <label for="inputEmail4" class=" ">Nombre Completo</label>
            <input type="email" class="form-control form-control-sm" id="in_plate_license" value="123456" name="e_fullname" >
          </div>  
          <div class="col-md-6">
            <label for="inputEmail2" class=" ">Curso</label>
            <input type="email" class="form-control form-control-sm" id="in_plate_license" value="123456" name="e_course"  >
          </div> 
          <div class="col-md-12">
            <label for="inputEmail4" class=" ">Tags</label>
            <textarea class="form-control" id="comentarios" name="e_tags" rows="4" placeholder="Escribe tus comentarios aquí..." ></textarea>
          </div>    
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="save-enroll">Save changes</button>
      </div>
    </div>
  </div>
</div>

<script   type="module" >
  
  import ApiClient from '/assets/global/js/utils/apiClient.js';
document.addEventListener('DOMContentLoaded', () => {
  const btn = document.getElementById('save-enroll');
  const form = document.getElementById('form-new-enroll');
  btn.addEventListener('click', async (e) => {
    e.preventDefault();

    const formData = new FormData(form);
    const data = Object.fromEntries(formData.entries());
    @php
      $uuid = request()->route('uuid');
    @endphp
    data.action = 'new-enroll';
    const api = new ApiClient("{{ url('/') }}");
    api.post(`/w/{{$uuid}}/driver-courses`, data, true)
    .then((response) => {
       if (response.success) {
        const enroll = response.data;
alert("listo para agregar");
          alert(enroll.enroll_doc_type);
          const table = document.getElementById('Dinamic-enrolled-list');
          const thead = table.querySelector('thead');
          const firstTbody = table.querySelector('tbody');
          const temp = document.createElement('table');
              temp.innerHTML = `
              <tbody class="table-driver-courses-item">
                <tr>
                  <td>
                    <strong>`+enroll.enroll_fullname+`</strong><br><span>`+enroll.enroll_doc_type+`: `+enroll.enroll_doc+` </span>
                  </td> 
                  <td><strong>`+enroll.enroll_course+`</strong></td>
                  <td>
                    <div>
                      0h completadas de `+enroll.enroll_course_hours+`h  
                    </div>
                    <div>
                      <span>T:</span>
                      <div class="btn-group btn-group-sm" role="group" aria-label="Small button group">
                        <button type="button" class="btn btn-outline-secondary">?</button>
                      </div>

                      <span>P:</span>
                      <div class="btn-group btn-group-sm" role="group" aria-label="Small button group">
                        <button type="button" class="btn btn-outline-secondary">?</button>
                      </div> 
                    </div>
                  </td>
                  <td>Registrado </td>
                  
                  <td> 0% </td>
                </tr>
                <tr>
                  <td colspan="5" class="more">
                    <button type="button" class="btn btn-outline-secondary btn-sm">Matrícula: N° ---- </button>
                    <button type="button" class="btn btn-outline-secondary btn-sm">Planilla: N° ---- </button>
                    <button type="button" class="btn btn-outline-secondary btn-sm">Certificado: N° ---- </button>

                    <button type="button" class="btn btn-outline-secondary btn-sm">`+enroll.enroll_tags+`</button>
                      
                  </td> 
                </tr>
              </tbody>`;
              
          const newTbody = temp.querySelector('tbody');
          
          // Insertarlo justo antes del primer <tbody>
          if (firstTbody) {
            table.insertBefore(newTbody, firstTbody);
          } else {
            table.appendChild(newTbody); // si no hay ninguno, lo agrega al final
          }

          alert(response.message);
          form.reset();
        }
    })
    .catch((error) => {
      
      console.error('Error:', error);
      alert("Error al guardar ❌");
    });
    
    
  });
});
</script>
