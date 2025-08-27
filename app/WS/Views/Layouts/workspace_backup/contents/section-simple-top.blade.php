    <div class="content-top  d-flex align-items-end justify-content-between px-4 pt-4 pb-2">
        <div class="headline d-flex">
            <div class="text">
                  @php 
                        $slug = ($layoutOptions['module_active']) ? $layoutOptions['module_active']:'';
                        $headline = ( isset($layoutOptions["headline"]["headline"])) ? $layoutOptions["headline"]["headline"]:'';

                        $upper_headline = ( isset($layoutOptions["headline"]["upper_headline"])) ? $layoutOptions["headline"]["upper_headline"]:'';
                        
                        $next_headline = ( isset($layoutOptions["headline"]["next_headline"])) ? $layoutOptions["headline"]["next_headline"]:'';
                        
                        
                  @endphp 
                  <span>{{  $upper_headline }}  </span> <br>
                  <h3>  {{  $headline }}  
                        @if( $next_headline != null )
                              <span class="lead"> &mdash;  $next_headline</span>  
                        @endif
                  </h3> 
            </div>
            
        </div>
        <div class="tools d-flex flex-wrap gap-2 align-items-center">
            <!--<div class="conexion d-flex align-items-center">
                   <div class="dropdown">
                              <button type="button" class="btn btn-ghost-secondary btn-conexion" 
                                    type="button" data-bs-toggle="dropdown" aria-expanded="false"> 
                                    <i class="bx bx-radio-circle-marked"></i>
                              </button>
                              <div class="dropdown-menu">
                                     <div class="d-flex justify-content-center">
                                          <div class="text-center pb-5">
                                                <i class="fa-solid fa-circle-check fs-2 text-success p-3" style="font-size:60px !important;"></i>
                                                <h3>Conecion establecida</h3>
                                                <p>Se ha optenido el token de acceso<strong> <?php /*echo $viewData["serviceCITVLastOpen"]["code"]*/?></strong><br>
                                                      <span>Actualizado el <?php /*echo WorkspaceDateHelper :: large($viewData["serviceCITVLastOpen"]["date"])*/?> por <?php /*echo /*$viewData["serviceCITVLastOpen"]["user"]*/?></span>
                                                </p>
                                                <div>
                                                      <button type="button" class="btn btn-outline-primary">Cerrar atenciones diarias</button>
                                                </div>
                                          </div> 
                                          </div>
                              </div>
                        </div>
            
                  <strong class="text-success">conexion activa </strong>
            </div>-->
            @if(  isset($layoutOptions["headline"]["button-back"]) && $layoutOptions["headline"]["button-back"] != null )
            <span class="separator"></span>
            <a  href="{{$layoutOptions['headline']['button-back-to']}}" class="btn  btn-ghost-outline-primary px-5">
                  ← Regresar
            </a>
            
            @endif
            @if(  isset($layoutOptions["headline"]["button-new"]) && $layoutOptions["headline"]["button-new"] != null )
            <span class="separator"></span>
            <a href="{{ url("workspace/".$layoutOptions["module_active"]."/create") }}" type="button" class="btn btn-primary px-5">Nuevo</a>
            @endif
            
            <!-- <button type="button" class="btn btn-outline-primary">Primary</button>
            <button type="button" class="btn btn-secondary">Secondary</button>
            <button type="button" class="btn btn-outline-secondary">Secondary</button>

            <button type="button" class="btn btn-ghost-primary">Gosth 1</button>
            <button type="button" class="btn btn-ghost-outline-primary">Gosth 1</button>
            
            <button type="button" class="btn btn-ghost-secondary">Gosth 2</button>
            <button type="button" class="btn btn-ghost-outline-secondary">Gosth 2</button> -->
        </div>
    </div>
    <!-- <div class="content-top   px-4 pt-4 pb-2">
        <a href="#">Items de Requerimientos</a><span class="px-2"> | </span>
        <a href="#">Modelos</a><span class="px-2"> | </span>
        <a href="#">Marcas</a><span class="px-2"> | </span>
        
        
    </div>-->
    <!--<div class="content-top  d-flex align-items-end justify-content-between px-4 pt-4 pb-2">
        
        <div>125 Resultados encontrados</div> 
        <div class=" d-flex align-items-center justify-content-between  ">
            <span class="form-control form-control-sm me-2 d-flex align-items-center " >
                  <i class="bx bx-search" ></i>
                  <input type="text" class="border-0"  id="exampleFormControlInput1" placeholder="Buscar Usuario" style="box-shadow:none; border-color:transparent; outline:none;"> 
            </span>
            
            <select class="form-select form-select-sm me-2" aria-label=".form-select-sm example">
                  <option selected>Open this select menu</option>
                  <option value="1">One</option>
                  <option value="2">Two</option>
                  <option value="3">Three</option>
            </select> <div> <button class="btn btn-outline-secondary btn-sm">Descargar</button></div> 
        </div>
        
    </div>-->
