{{-- ----------------------   NEW ENROLL FORM   ---------------------- --}}
<!-- Modal -->
<div class="modal fade" id="newEnrollFormModal" tabindex="-1" aria-labelledby="newEnrollFormModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="newEnrollFormModalLabel">Registar Matricula</h1>
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
            <input name='e_tags'  id="enrollTagsInput" class='form-control tagify--custom-dropdown enrollTagsInput' placeholder='Type an English letter' value='css, html, javascript'>
            
          </div> 
          <div class="col-md-12">
            <label for="inputEmail4" class=" ">Observaciones</label>
            <textarea class="form-control" id="e_obs" name="e_obs" rows="4" placeholder="Escribe tus comentarios aquí..." ></textarea>
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

<!-- Tagify CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@yaireo/tagify/dist/tagify.css">

<!-- Tagify JS -->
<script src="https://cdn.jsdelivr.net/npm/@yaireo/tagify"></script>
<script   type="module" >
  import { ApiClient } from '/assets/global/js/utils/apiClient.js';
  import { RenderEnrollmentTable } from '/assets/workspaces/driver-courses-enrollments-render.js';
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
            const enrollmentTableBody = document.getElementById('enrollment-container');
            const newEnrollment = response.data;

            // 🔹 Añadir al array global (si existe)
            window.dataEnrollments = window.dataEnrollments || [];
            window.dataEnrollments.push(newEnrollment);

            // 🔹 Agregar al DOM
            RenderEnrollmentTable.addEnrollment(newEnrollment, enrollmentTableBody, true);

            // 🔹 Aplicar resaltado (si tienes la clase CSS)
            const newRow = document.getElementById(`enrollment-${newEnrollment.enroll_id}`);
            if (newRow) {
              newRow.classList.add('highlighted-row');
              setTimeout(() => newRow.classList.remove('highlighted-row'), 3000);
            }

            // 🔹 Cerrar modal
            const modalEl = document.getElementById('newEnrollFormModal');
            if (modalEl) {
              const modal = bootstrap.Modal.getInstance(modalEl);
              if (modal) modal.hide();
            }

            // 🔹 Resetear formulario (opcional)
            form.reset();
          }
        })
        .catch((error) => {
          console.error('Error:', error);
          alert("Error al guardar ❌");
        });
    });
 
  //Tagify : FOR TAG's ------>  
  var input = document.querySelector('.enrollTagsInput'),
    // init Tagify script on the above inputs
    tagify = new Tagify(input, {
        whitelist: ["A# .NET", "A# (Axiom)", "A-0 System", "A+", "A++", "ABAP", "ABC", "ABC ALGOL", "ABSET", "ABSYS", "ACC", "Accent", "Ace DASL", "ACL2", "Avicsoft", "ACT-III", "Action!", "ActionScript", "Ada", "Adenine", "Agda", "Agilent VEE", "Agora", "AIMMS", "Alef", "ALF", "ALGOL 58", "ALGOL 60", "ALGOL 68", "ALGOL W", "Alice", "Alma-0", "AmbientTalk", "Amiga E", "AMOS", "AMPL", "Apex (Salesforce.com)", "APL", "AppleScript", "Arc", "ARexx", "Argus", "AspectJ", "Assembly language", "ATS", "Ateji PX", "AutoHotkey", "Autocoder", "AutoIt", "AutoLISP / Visual LISP", "Averest", "AWK", "Axum", "Active Server Pages", "ASP.NET", "B", "Babbage", "Bash", "BASIC", "bc", "BCPL", "BeanShell", "Batch (Windows/Dos)", "Bertrand", "BETA", "Bigwig", "Bistro", "BitC", "BLISS", "Blockly", "BlooP", "Blue", "Boo", "Boomerang", "Bourne shell (including bash and ksh)", "BREW", "BPEL", "B", "C--", "C++ – ISO/IEC 14882", "C# – ISO/IEC 23270", "C/AL", "Caché ObjectScript", "C Shell", "Caml", "Cayenne", "CDuce", "Cecil", "Cesil", "Céu", "Ceylon", "CFEngine", "CFML", "Cg", "Ch", "Chapel", "Charity", "Charm", "Chef", "CHILL", "CHIP-8", "chomski", "ChucK", "CICS", "Cilk", "Citrine (programming language)", "CL (IBM)", "Claire", "Clarion", "Clean", "Clipper", "CLIPS", "CLIST", "Clojure", "CLU", "CMS-2", "COBOL – ISO/IEC 1989", "CobolScript – COBOL Scripting language", "Cobra", "CODE", "CoffeeScript", "ColdFusion", "COMAL", "Combined Programming Language (CPL)", "COMIT", "Common Intermediate Language (CIL)", "Common Lisp (also known as CL)", "COMPASS", "Component Pascal", "Constraint Handling Rules (CHR)", "COMTRAN", "Converge", "Cool", "Coq", "Coral 66", "Corn", "CorVision", "COWSEL", "CPL", "CPL", "Cryptol", "csh", "Csound", "CSP", "CUDA", "Curl", "Curry", "Cybil", "Cyclone", "Cython", "Java", "Javascript", "M2001", "M4", "M#", "Machine code", "MAD (Michigan Algorithm Decoder)", "MAD/I", "Magik", "Magma", "make", "Maple", "MAPPER now part of BIS", "MARK-IV now VISION:BUILDER", "Mary", "MASM Microsoft Assembly x86", "MATH-MATIC", "Mathematica", "MATLAB", "Maxima (see also Macsyma)", "Max (Max Msp – Graphical Programming Environment)", "Maya (MEL)", "MDL", "Mercury", "Mesa", "Metafont", "Microcode", "MicroScript", "MIIS", "Milk (programming language)", "MIMIC", "Mirah", "Miranda", "MIVA Script", "ML", "Model 204", "Modelica", "Modula", "Modula-2", "Modula-3", "Mohol", "MOO", "Mortran", "Mouse", "MPD", "Mathcad", "MSIL – deprecated name for CIL", "MSL", "MUMPS", "Mystic Programming L"],
        maxTags: 10,
        dropdown: {
            maxItems: 20,           // <- mixumum allowed rendered suggestions
            classname: 'tags-look', // <- custom classname for this dropdown, so it could be targeted
            enabled: 0,             // <- show suggestions on focus
            closeOnSelect: false    // <- do not hide the suggestions dropdown once an item has been selected
        }
    })
 });
 
</script>


{{---Confirm delete---}}
<!-- Modal Confirmación Eliminar -->
<div class="modal fade" id="deleteConfirmModal" tabindex="-1" aria-labelledby="deleteConfirmModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="deleteConfirmModalLabel">Confirmar eliminación</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
      </div>
      <div class="modal-body">
        ¿Estás seguro que deseas eliminar este registro?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-danger" id="confirmDeleteBtn">Eliminar</button>
      </div>
    </div>
  </div>
</div>
