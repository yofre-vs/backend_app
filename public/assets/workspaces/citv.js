document.addEventListener('DOMContentLoaded', () => {
    const step1NextBtn = document.getElementById('step1NextBtn');

    const step2NextBtn = document.getElementById('step2NextBtn');
    const step2BackBtn = document.getElementById('step2BackBtn');

    const step3NextBtn = document.getElementById('step3NextBtn');
    const step3BackBtn = document.getElementById('step3BackBtn');

    const stepsWrapper = document.getElementById('stepsWrapper');
    
    //const backBtn = document.getElementById('backBtn');
    //const confirmBtn = document.getElementById('confirmBtn');
    //const vehiculoInfo = document.getElementById('vehiculoInfo');
    //const api = new ApiClient('/api');
    step1NextBtn.addEventListener('click', async () => {

        const placa = document.getElementById('in_plate_license').value.trim();
        if (!placa) {
            alert("Debe ingresar una placa.");
            return;
        }

        enviarFormulario('formNewInspectionS1', '/workspace/43c9f32a-2ad4-43ab-a0cc-1748ef5609a7/inspections', {
            useJson: false,
             extraData: {
              action: 'saveInsS1'
            },
            onSuccess: (res) => {
              //alert('¡Formulario enviado!');
              console.log('Servidor dijo:', res);
            },
            onError: (err) => {
              alert('Ocurrió un error al enviar el formulario');
            }
        });
        

    //stepsWrapper.style.transform = 'translateX(-33%)';
  });
  step2NextBtn.addEventListener('click', async () => {
    stepsWrapper.style.transform = 'translateX(-66%)';
  });

  step2BackBtn.addEventListener('click', () => {
    stepsWrapper.style.transform = 'translateX(0)';
  });
  step3NextBtn.addEventListener('click',   () => {
    
   
    const div = document.getElementById('InspectionsContainer');

    // Crear nuevo elemento
    div.insertAdjacentHTML (
      'beforeend', `
            <button class="btn-inspection"> 
              <div  class="d-flex align-items-center">
                <h3>D1W148</h3>
                <div>
                  <span>Toyota - Corolla</span>
                  <span> </span>
                </div>
              </div>
              <div class="d-flex align-items-center"> 
                <span class="badge rounded-pill bg-secondary"><i class="fas fa-clock me-1"></i>En espera</span>
              </div>
            </button>`); 
            const modal = bootstrap.Modal.getInstance(document.getElementById('NewInspection'));
    
            modal.hide();
  
  });

  step3BackBtn.addEventListener('click', () => {
    stepsWrapper.style.transform = 'translateX(-33%)';
  });

 /* confirmBtn.addEventListener('click', () => {
    alert('Vehículo confirmado. Registro de inspección exitoso.');
    const modal = bootstrap.Modal.getInstance(document.getElementById('inspeccionModal'));
    modal.hide();
  });*/

  // Simulación de datos de la BD
  async function fetchVehiculo(placa) {
    return new Promise(resolve => {
      setTimeout(() => {
        if (placa.toUpperCase() === "ABC123") {
          resolve({
            placa: placa.toUpperCase(),
            marca: "Nissan",
            modelo: "Frontier 2023"
          });
        } else {
          resolve(null);
        }
      }, 700);
    });
  }
      
});