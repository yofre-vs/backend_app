
<main class="w-100 d-flex flex-column" style="height: 100vh;">

    <!-- Encabezado -->
    <div class="content-top border-bottom border-secondary d-flex align-items-end justify-content-between px-4 pt-4 pb-2">
        <div class="headline d-flex">
            <!--<div class="icon">
                  <i class="bx bx-radio-circle-marked"></i>
            </div>-->
            <div class="text">
                  <span>Tablero de Control</span> <br>
                  <h3> Inspecciones en Alta   <span class="lead"> &mdash;  Miércoles, 09 junio del 2025</span> </h3> 
            </div>
            
        </div>
        <div class="tools d-flex flex-wrap gap-2 align-items-center">
            <div class="conexion d-flex align-items-center">
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
                                          <!-- <div>
                                                <i class="fa-solid fa-circle-xmark"></i>
                                                <h3>Conecion establecida</h3>
                                                <p>Se ha optenido el token <strong>Xf-s55444-sssse7</strong></p>
                                                <div>
                                                      <button>Cerrar atenciones diarias</button>
                                                </div>
                                          </div> 
                                          -->
                                          </div>
                              </div>
                        </div>
            
                  <strong class="text-success">conexion activa </strong>
            </div>
            <span class="separator"></span>
            <button type="button" class="btn btn-primary px-5">Dar de Alta</button>
            
            <!-- <button type="button" class="btn btn-outline-primary">Primary</button>
            <button type="button" class="btn btn-secondary">Secondary</button>
            <button type="button" class="btn btn-outline-secondary">Secondary</button>

            <button type="button" class="btn btn-ghost-primary">Gosth 1</button>
            <button type="button" class="btn btn-ghost-outline-primary">Gosth 1</button>
            
            <button type="button" class="btn btn-ghost-secondary">Gosth 2</button>
            <button type="button" class="btn btn-ghost-outline-secondary">Gosth 2</button> -->
        </div>
    </div>

    <!-- Contenido principal dividido en 2 columnas -->
    <div class="content-section  d-flex flex-grow-1 " style="min-height: 0;">
        <!-- Lado izquierdo (filtros + lista) -->
        <div class="isnpections border-end border-secondary-subtle d-flex flex-column" style="width: 480px;">
            
            <!-- Filtros -->
            <div class="d-flex px-4 py-2 border-bottom border-secondary">
                <div class="w-100 me-1">
                    <input class="form-control form-control-sm" type="text" placeholder="Buscar por Placa">
                </div>
                <div class="btn-group">
                    <button type="button" class="btn btn-outline-secondary btn-sm dropdown-toggle" data-bs-toggle="dropdown">
                        <i class="bx bx-menu-filter"></i>
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Mostrar Todos</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="#"><span class="status-grey"></span> En alta </a></li>
                        <li><a class="dropdown-item" href="#"><span class="status-yellow"></span> En inspección</a></li>
                        <li><a class="dropdown-item" href="#">  <span class="status-green"></span> Terminado</a></li>
                    </ul>
                </div>
            </div> 

            <!-- Lista con scroll interno -->
            <ul class="list-unstyled overflow-y-scroll  " style="flex-grow: 1; min-height: 0;">
                @for ($i = 0; $i < 30; $i++)
                <li class="inspection-item align-items-center">
                  <div>
                    
                    <div>
                        <strong>Messi Ronaldiño Duarte</strong> 
                        <span><i class="bx bx-clock-4"></i> 10:35 a. m.</span> 
                    </div> 
                  </div>
                  <h5>D1W123 <span class="status-green"></span></h5>
                </li>
                @endfor
            </ul>
        </div>

        <!-- Lado derecho (detalle) -->
        <div class="w-100 ps-4">
            detalle
        </div>
    </div>
</main>
