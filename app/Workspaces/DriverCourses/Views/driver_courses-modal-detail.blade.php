{{-- ----------------------   DETAIL ENROLLED DRIVER   ---------------------- --}}

<!-- Modal Detalle -->
<div class="modal fade" id="enrollmentDetailModal" tabindex="-1" aria-labelledby="enrollmentDetailModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="enrollmentDetailModalLabel">Detalle de la matrícula</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
      </div>
      <div class="modal-body">
        <!-- Aquí se cargará el contenido dinámico -->
        <div id="modal-enrollment-content">
          Cargando...
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Tagify CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@yaireo/tagify/dist/tagify.css">

<!-- Tagify JS -->
<script src="https://cdn.jsdelivr.net/npm/@yaireo/tagify"></script>
<script type="module">
  
  import { RenderEnrollmentTable } from '/assets/workspaces/driver-courses-enrollments-render.js';
 
  document.addEventListener('click', async function (e) {
    const btn = e.target.closest('.open-detail-modal');
    if (!btn) return;

    const tr = btn.closest('tr');
    const enrollId = tr?.dataset.enrollId;
    if (!enrollId) return;

    const contentBox = document.getElementById('modal-enrollment-content');
    contentBox.innerHTML = `<div class="text-center text-muted">Cargando...</div>`;

    const modal = new bootstrap.Modal(document.getElementById('enrollmentDetailModal'));
    modal.show();

    try {
      const userUUID = document.body.dataset.uuid || '';
      const response = await fetch(`/w/${userUUID}/driver-courses/small-detail/${enrollId}`);
      const html = await response.text();

      contentBox.innerHTML = html;
       //Tagify : FOR TAG's ------>  
      var input = document.querySelector('.enrollTagsEditInput'),
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
      setupFormSubmitListener(modal, userUUID, enrollId );

    } catch (err) {
      contentBox.innerHTML = `<div class="alert alert-danger">Error al cargar el contenido.${err}</div>` ;
    }
    //Update enrollment
      
    function setupFormSubmitListener(modalEl, userUUID, enrollId) {
      const formEdit = document.getElementById('editEnrollForm');
       
      if (!formEdit) return;
 
      formEdit.addEventListener('submit', async (e) => {
        e.preventDefault();
        //alert("dd");

        const formData = new FormData(formEdit);

        try {
          const response = await fetch(`/w/${userUUID}/driver-courses/small-detail/${enrollId}`, {
            method: 'POST',
            headers: {
              'Accept': 'application/json',
              'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
            },
            body: formData,
          });

          const result = await response.json();

          if (result.success) {
            window.dataEnrollments = window.dataEnrollments || [];

            const index = window.dataEnrollments.findIndex(enroll => enroll.enroll_id === result.data.enroll_id);

            if (index !== -1) {
              window.dataEnrollments[index] = result.data;
              RenderEnrollmentTable.updateEnrollment(result.data);
            } else {
              window.dataEnrollments.push(result.data);
              RenderEnrollmentTable.addEnrollment(result.data, document.getElementById('enrollment-container'), true);
            }

            const modalInstance = bootstrap.Modal.getInstance(modalEl);
            if (modalInstance) modalInstance.hide();

            formEdit.reset();
          } else {
            alert('Error: ' + (result.message || 'No se pudo guardar'));
          }
        } catch (err) {
          console.error(err);
          alert('Error inesperado al enviar el formulario.');
        }
      });
    }


  });
</script>
