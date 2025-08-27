$(document).ready(function() {
  $(document).on('show.bs.modal', '#modalFormulario', function (e) {
  /*const button = $(e.relatedTarget); // el botón que abrió el modal
  const vehiculoId = button.data('id'); // obtenemos el ID*/

});
$(document).on('show.bs.modal', '#modalAjax', function (e) {
  const button = $(e.relatedTarget);        // Botón que activó el modal
  const url = button.data('url');           // Ruta AJAX (data-url)
  const modalContent = $('#modalAjaxContent');

  // Mostrar "cargando"
  modalContent.html('<div class="modal-body text-center text-muted">Cargando...</div>');

  // Cargar contenido desde el servidor
  $.get(url, function (html) {
    modalContent.html(html);
  }).fail(function () {
    modalContent.html('<div class="modal-body text-danger text-center">Error al cargar el contenido.</div>');
  });
});
$(document).on('show.bs.modal', '#modalFacturar', function (e) {
  const button = $(e.relatedTarget);        // Botón que activó el modal
  const url = button.data('url');           // Ruta AJAX (data-url)
  const modalContent = $('#modalAjaxContentfacture');

  // Mostrar "cargando"
  modalContent.html('<div class="modal-body text-center text-muted">Cargando...</div>');

  // Cargar contenido desde el servidor
  $.get(url, function (html) {
    modalContent.html(html);
  }).fail(function () {
    modalContent.html('<div class="modal-body text-danger text-center">Error al cargar el contenido.</div>');
  });
});

$(document).on('click', '#guardar-inspeccion', function () {
 console.log("Hello world!");
 const $form = $('#inspectionForm');   // objeto jQuery
  const form = $form[0];                 // elemento DOM nativo para checkValidity()

  if (!form.checkValidity()) {
    form.reportValidity();
    return false;
  }

  const datos = $form.serialize();       // OK: serialize es método jQuery


  const csrfToken = $('meta[name="csrf-token"]').attr('content');

  $.ajax({
    url: '/citv/inspection-center/create',
    type: 'POST',
    data: datos,
    headers: {
      'X-CSRF-TOKEN': csrfToken
    },
    success:function (resp) {
      if (resp.ok) {
        
        // Cerrar modal
        $('#modalFormulario').modal('hide');
  
        // Crear y agregar <li> a la lista
        const nuevoItem = `
          
          <li class="revision">
        <div class="revision-info">
          <div class="vehicle-icon">🚗 </div>
          <div class="revision-title">${resp.license_plate}</div>
          <div class="revision-meta">Conductor: ${resp.driver_name}</div>
          <div class="revision-meta">Inicio: 08:45</div>
          <div class="estado en-espera">En espera</div>
        </div>
        
        <button type="button"
              class="btn-actualizar"
              data-toggle="modal"
              data-target="#modalAjax"
              data-url="/citv/inspection-center/edit/${resp.inspectionId} ">
              Actualizar
            </button>
            
              
            <span id="boxBtnFature_${resp.inspectionId}">
                <button type="button"
                  class="btn-facturar"
                  data-toggle="modal"
                  data-target="#modalAjax"
                  data-url="/citv/inspection-center/invoice/${resp.inspectionId}"
                  >
                  facturar
                </button>
              </span> 
      </li>      `;
        $('#lista-vehiculos').prepend(nuevoItem);

      } else {
        alert('Error al guardar');
      }
    }}); 
});


  $(document).on('click', '#update-inspeccion', function () {
    
    const $form = $('#InspectionUpdateForm');   // objeto jQuery
    const form = $form[0];                 // elemento DOM nativo para checkValidity()

    if (!form.checkValidity()) {
      form.reportValidity();
      return false;
    }

    const datos = $form.serialize();       // OK: serialize es método jQuery


     
    $.post('/citv/inspection-center/modify', datos, function (resp) {
      //console.log ("modificado");
      if (resp.ok) {
        
        // Cerrar modal
        $('#modalAjax').modal('hide');
  
         

      } else {
        alert('Error al guardar');
      }
    }, 'json'); 
    return false;
  });

  //Facturar
  $(document).on('click', '#btn_facure_inspeccion', function () {
    
    const $form = $('#factureForm');   // objeto jQuery
    const form = $form[0];                 // elemento DOM nativo para checkValidity()

    if (!form.checkValidity()) {
      form.reportValidity();
      return false;
    }

    const datos = $form.serialize();       // OK: serialize es método jQuery


     
    $.post('/citv/inspection-center/invoicegenerate', datos, function (resp) {
      if (resp.ok) {
        //alert(resp.inspection_id);
        // Cerrar modal

        const nuevoItem = `
              <button type="button"
                class="btn-factureview"
                data-toggle="modal"
                data-target="#modalAjax" 
                data-url="/citv/inspection-center/invoice/`+resp.inspection_id+`"
                
                 >
                ver comprobante
              </button>`;
        $('#boxBtnFature_'+resp.inspection_id).html(nuevoItem);
  
         
        $('#modalAjax').modal('hide');

      } else {
        alert('Error al guardar');
      }
    }, 'json'); 
    return false;
  });

});

//modal view
$(document).on('show.bs.modal', '#modalViewFacture', function (e) {
  const button = $(e.relatedTarget);        // Botón que activó el modal
  const url = button.data('url');           // Ruta AJAX (data-url)
  const modalContent = $('#modalAjaxContentViewFacture');

  // Mostrar "cargando"
  modalContent.html('<div class="modal-body text-center text-muted">Cargando...</div>');

  // Cargar contenido desde el servidor
  $.get(url, function (html) {
    modalContent.html(html);
  }).fail(function () {
    modalContent.html('<div class="modal-body text-danger text-center">Error al cargar el contenido.</div>');
  });
});