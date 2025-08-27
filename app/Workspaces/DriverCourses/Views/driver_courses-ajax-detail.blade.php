<form id="editEnrollForm">
  <div class="row">
    <!-- Columna 1 -->
    <div class="col-5">
      <div class="pb-3">
        <label for="dni" class="form-label m-0"><i class='bx  bx-card-view-tiles'  ></i>  &nbsp;Tipo Documento </label>
        <input type="text" class="form-control form-control-sm" id="dni" name="e_doc_type" value ="{{$enrollment->enroll_doc_type}}">
      </div>
      <div class="pb-3">
        <label for="telefono" class="form-label m-0"><i class='bx  bx-user-id-card'  ></i>  &nbsp;Documento</label>
        <input type="text" class="form-control form-control-sm" id="telefono" name="e_doc" value ="{{$enrollment->enroll_doc}}">
      </div>
      <div class="pb-3">
        <label for="nombre" class="form-label m-0"><i class='bx  bx-user'  ></i>  &nbsp;Conductor</label>
        <input type="text" class="form-control form-control-sm" id="nombre" name="e_fullname" value ="{{$enrollment->enroll_fullname}}">
      </div>
      <div class="pb-3">
        <label for="apellido" class="form-label m-0"><i class='bx  bx-book'  ></i>  &nbsp;Curso</label>
        <input type="text" class="form-control form-control-sm" id="apellido" name="e_course" value ="{{$enrollment->enroll_course}}">
      </div>
      <div class="pb-3">
        <label for="apellido" class="form-label m-0"><i class='bx  bx-price-tag-alt'  ></i>  &nbsp;Tags</label>
        <input name='e_tags'  id="enrollTagsEditInput" class='form-control tagify--custom-dropdown enrollTagsEditInput' placeholder='Type an English letter'  value ="{{$enrollment->enroll_tags}}">
            
      </div>
      
      <div class="pb-3">
        <label for="apellido" class="form-label m-0"><i class='bx  bx-note'  ></i>  &nbsp;Observaciones</label>
        <textarea class="form-control" id="e_obs" name="e_obs" rows="4" placeholder="Escribe tus comentarios aquí..." >{{$enrollment->enroll_obs}}</textarea>
     </div>
    </div>

    <!-- Columna 3 -->
    <div class="col-7">

<style>
  .accordion-button{
    padding:5px;
  }
    .accordion-button:not(.collapsed) {
    background-color: background-color: rgba(0, 0, 0, 0.075); 
    --bs-accordion-active-bg:  rgba(0, 0, 0, 0.075);
  }
  .accordion-button:focus {
    box-shadow: none !important;
    outline: none !important;
  }
</style>
<div class="accordion" id="accordionPanelsStayOpenExample">
  <div class="accordion-item">
    <h2 class="accordion-header">
      <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
        <i class='bx  bx-flag-alt-2'  ></i>   &nbsp; &nbsp;Estado del curso
      </button>
    </h2>
    <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show">
      <div class="accordion-body">
        <div class="table-responsive d-flex justify-content-center">  
        
          <table  class="m-2">
            <thead>
              
              <tr class="text-center">
                <th scope="col" style="width: 120px; " colspan="2">Estado</th>
                <th scope="col" style="width: 100px;">Fecha</th>  
                <th scope="col" style="width: 100px;">Nro</th>
              </tr>
            </thead>
            <tbody>
              
              <tr>
                <td> <i class='bx  bxs-flag-alt-2'  style="color:#F6BB43;font-size:1.2rem" ></i>   Registrado</td>
                <td><input class="form-check-input" type="radio" name="e_enrolled_status" id="flexRadioDefault1" value="registrado"></td>
                <td><input type="text" class="form-control form-control-sm"  name="e_created_at"  value ="{{$enrollment->created_at}}"></td>
                <td> </td>
              </tr>
              <tr>
                <td><i class='bx  bxs-flag-alt-2'  style="color:#48CFAE;font-size:1.2rem" ></i> Matriculado</td>
                <td><input class="form-check-input" type="radio" name="e_enrolled_status" id="flexRadioDefault2" value="matriculado"></td>
                <td><input type="text" class="form-control form-control-sm"  name="e_enrolled_date"  value ="{{$enrollment->enroll_enrolled_date}}"></td>
                <td><input type="text" class="form-control form-control-sm"  name="e_snc_enroll_code"  value ="{{$enrollment->enroll_snc_enroll_code}}"></td>
              </tr>
              <tr>
                <td><i class='bx  bxs-flag-alt-2'  style="color:#5D9CEC;font-size:1.2rem" ></i>  Completado</td>
                <td><input class="form-check-input" type="radio" name="e_enrolled_status" id="flexRadioDefault3" value="completado"></td>
                <td><input type="text" class="form-control form-control-sm"  name="e_course_completed"  value ="{{$enrollment->enroll_course_completed}}"></td>
                <td> </td>
              </tr>
              <tr>
                <td><i class='bx  bxs-flag-alt-2'  style="color:#A0D468;font-size:1.2rem" ></i>  Certificado</td>
                <td><input class="form-check-input" type="radio" name="e_enrolled_status" id="flexRadioDefault4" value="certificado"></td>
                <td><input type="text" class="form-control form-control-sm"  name="e_certified_date"  value ="{{$enrollment->enroll_certified_date}}"></td>
                <td><input type="text" class="form-control form-control-sm" name="e_snc_certificate_code"  value ="{{$enrollment->enroll_snc_certificate_code}}"></td>
              </tr>
              <tr>
                <td><i class='bx  bxs-flag-alt-2'  style="color:#8CC051;font-size:1.2rem" ></i>  Enviado</td>
                <td><input class="form-check-input" type="radio" name="e_enrolled_status" id="flexRadioDefault5" value="enviado"></td>
                <td><input type="text" class="form-control form-control-sm"  name="e_submitted_date"  value ="{{$enrollment->enroll_submitted_date}}"></td>
                <td><input type="text" class="form-control form-control-sm"  name="e_snc_submit_code"  value ="{{$enrollment->enroll_snc_submit_code}}"></td>
              </tr>
              <tr>
                <td><i class='bx  bxs-flag-alt-2'  style="color:#656D78;font-size:1.2rem" ></i> Archivado</td>
                <td><input class="form-check-input" type="radio" name="e_enrolled_status" id="flexRadioDefault6" value="archivado"></td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  <div class="accordion-item">
    <h2 class="accordion-header">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false" aria-controls="panelsStayOpen-collapseTwo">
       <i class='bx  bx-clock-3'  ></i>  &nbsp; &nbsp; Asistencia
      </button>
    </h2>
    <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse">
      <div class="accordion-body">
        <div class="table-responsive d-flex justify-content-center"> 
          
          <table  class="m-2">
            <thead>
              <tr class="text-center">
                <th colspan="2"> Teoria</th>
                <th scope="col"> </th>
                <th colspan="2"> Practica</th>
              </tr>
              <tr class="text-center">
                <th scope="col" style="width: 40px;">Hrs</th>
                <th scope="col" style="width: 100px;">Fechas</th>
                <th > </th>
                <th scope="col" style="width: 40px;">Hrs</th>
                <th scope="col" style="width: 100px;">Fechas</th>
              </tr>
            </thead>
            @php
          if (!$enrollment->enroll_course_theory){$enrollment->enroll_course_theory = []; };
          if (!$enrollment->enroll_course_practice){$enrollment->enroll_course_practice = []; };
          // dd ($enrollment->enroll_course_practice,$enrollment->enroll_course_theory );
          /*{"hours":"8","items":{"1":{"d":"2025-08-18","h":"8"},"2":{"d":"2025-08-18","h":"8"}}}*/
            $t = $enrollment->enroll_course_theory;
            $p = $enrollment->enroll_course_practice;
             //dd ($t,$p, dd($t['items'][1]['d']) );
          @endphp
            <tbody>
              @for ($i = 1; $i <= 10; $i++)
                <tr>
                  <td>
                    <input type="text" class="form-control form-control-sm" name="e_thours[{{ $i }}][h]" value="{{ $t['items'][$i]['h'] ?? '' }}">
                  </td>
                  <td>
                    <input type="text" class="form-control form-control-sm" name="e_thours[{{ $i }}][d]" value="{{ $t['items'][$i]['d'] ?? '' }}">
                  </td>
                  <td> </td>
                  <td>
                    <input type="text" class="form-control form-control-sm" name="e_phours[{{ $i }}][h]" value="{{ $p['items'][$i]['h'] ?? '' }}">
                  </td>
                  <td>
                    <input type="text" class="form-control form-control-sm" name="e_phours[{{ $i }}][d]" value="{{ $p['items'][$i]['d'] ?? '' }}">
                  </td>
                </tr>
                @endfor
               
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  <div class="accordion-item">
    <h2 class="accordion-header">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="false" aria-controls="panelsStayOpen-collapseThree">
        <i class='bx  bx-wallet-note'  ></i>  &nbsp; &nbsp; Pagos
      </button>
    </h2>
    <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse">
      <div class="accordion-body text-center">
        <div class="table-responsive d-flex justify-content-center">  
         <table  class="m-2">
          <thead>
             
            <tr class="text-center">
              <th scope="col" style="width: 40px;">Monto</th>
              <th scope="col" style="width: 100px;">Medio</th>  
              <th scope="col" style="width: 100px;">Fecha</th>
            </tr>
          </thead>
          <tbody>
            @for ($i = 1; $i <= 5; $i++)
            <tr>
              <td><input type="text" class="form-control form-control-sm"  name="e_payment[{{$i}}][amount]" ></td>
              <td><input type="text" class="form-control form-control-sm"  name="e_payment[{{$i}}][method]" ></td>
              <td><input type="text" class="form-control form-control-sm"  name="e_payment[{{$i}}][date]" ></td>
            </tr>
            @endfor
             
          </tbody>
         </table>
        </div>
      </div>
    </div>
  </div>
</div>


 

  <div class="text-end mt-3">
    <button type="submit" class="btn btn-sm btn-primary">Guardar</button>
  </div>
</form>
