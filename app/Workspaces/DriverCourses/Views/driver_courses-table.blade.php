
      <table class="table table-sm  table-hover table-driver-courses  w-100" id="Dinamic-enrolled-list">
        <thead>
          <tr class="text-center">
            <th colspan="4">Conductor</th> 
            <th>Curso</th>
            <th>Estado</th>
            <th>Teoria</th>
            <th>Practica</th>
            
            <th>Hrs</th>
            <th>Registro</th>
            <th colspan="2">Matricula</th>
            <th colspan="2">Planilla</th>
            <th colspan="2">Certificado</th>
            
            <th>Pagos</th>
            
            <th>Tags</th>
          </tr>
        </thead>
        
        <!-- Grupo 1 -->
        <tbody class="table-driver-courses-item" >
        @foreach ($enrollment as $enroll)
          <tr 
          id=" {{$enroll->enroll_id}}" 
          data-id="{{$enroll->enroll_id}}" 
          data-doc="{{$enroll->enroll_doc}}"
          data-fullname="{{$enroll->enroll_fullname}}"
          data-course="{{$enroll->enroll_course}}"
          data-course_hours="{{$enroll->enroll_course_hours}}"
          data-status="{{$enroll->enroll_status}}"
          data-registered="{{$enroll->created_at}}"
          data-enrolled_date="{{$enroll->enroll_enrolled_date}}"
          
          data-enrolled_code="{{$enroll->enroll_snc_enroll_code}}"
          data-tags="{{$enroll->enroll_tags}}"
          >
            <td>sss
              -
            </td>
            <td>
              <strong> {{$enroll->enroll_doc}} ss</strong> 
            </td> 
            <td>
              <strong>{{$enroll->enroll_fullname}}d</strong> 
            </td>
            <td>
              e 
            </td>
            <td><strong>{{$enroll->enroll_course}} </strong> - {{$enroll->enroll_course_hours}}h </td>
            <td> 
              <button type="button" class="btn btn-outline-secondary btn-sm open-floating-box">{{$enroll->enroll_status}}</button>
            </td>
            <td> 
                <div class="btn-group btn-group-sm" role="group" aria-label="Small button group">
                  <button type="button" class="btn btn-outline-secondary">8</button>
                  <button type="button" class="btn btn-outline-secondary">8</button>
                  <button type="button" class="btn btn-outline-secondary">8</button>
                  <button type="button" class="btn btn-outline-secondary">8</button>
                  <button type="button" class="btn btn-outline-secondary">8</button>
                  <button type="button" class="btn btn-outline-secondary">?</button>
                </div> 
            </td>
            <td>
                
                <div class="btn-group btn-group-sm" role="group" aria-label="Small button group">
                  <button type="button" class="btn btn-outline-secondary">8</button>
                  <button type="button" class="btn btn-outline-secondary">8</button>
                  <button type="button" class="btn btn-outline-secondary">8</button>
                  <button type="button" class="btn btn-outline-secondary">8</button>
                  <button type="button" class="btn btn-outline-secondary">8</button>
                  <button type="button" class="btn btn-outline-secondary">?</button>
                </div>  
            </td>
            <td> {{$enroll->enroll_course_hours}}h   </td>
            
            <td>{{$enroll->created_at}} </td>

            <td>{{$enroll->enroll_snc_enroll_code}} </td>
            <td>{{$enroll->enroll_enrolled_date}} </td>  

            <td>{{$enroll->enroll_snc_certificate_code}} </td>
            <td>{{$enroll->enroll_certified_date}} </td>  

            <td>{{$enroll->enroll_submitted_date}} </td>
            <td>{{$enroll->enroll_snc_submitted_code}} </td>  

  
            <td> {{$enroll->enroll_payment_status}}% </td>
            <td > 
              
              <button type="button" class="btn btn-outline-secondary btn-sm">
                {{ ( $enroll->enroll_tags != null ) ? $enroll->enroll_tags : '--tags--' }}
            
              </button>
            </td>
          </tr> 
        @php //break;
        @endphp
        @endforeach 


      </table>
          