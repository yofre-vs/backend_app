import ApiClient from '../shared/js/utils/apiClient.js';

// Inicialización general (como tooltips, etc.)
document.addEventListener('DOMContentLoaded', function () {
  const tooltipTriggerList = Array.from(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
  tooltipTriggerList.forEach(el => new bootstrap.Tooltip(el));
});

// Instancia de API
const api = new ApiClient( ); 
// ... tu código previo ...
window.enviarFormulario = async function enviarFormulario(
  formId, 
  endpoint, 
  {
    useJson = false,
    extraData = {},  
    onSuccess = () => {},
    onError = () => {}
  } = {}
) {
  const form = document.getElementById(formId);
  if (!form) {
    console.warn(`No se encontró el formulario con ID "${formId}"`);
    return;
  }

  const formData = new FormData(form);

  // Agregar extraData a formData
  for (const [key, value] of Object.entries(extraData)) {
    if (value !== undefined && value !== null) {
      formData.append(key, value);
    }
  }

  // Preparar datos a enviar
  const data = useJson ? Object.fromEntries(formData) : formData;

  try {
    const res = await api.post(endpoint, data, useJson); // asumo que api.post es async
    console.log('✅ Respuesta del servidor:', res);
    onSuccess(res);
  } catch (err) {
    console.error('❌ Error en envío:', err);
    onError(err);
  } finally {
    if (submitBtn) {
      submitBtn.disabled = false;
      submitBtn.innerText = originalText;
    }
  }
};
