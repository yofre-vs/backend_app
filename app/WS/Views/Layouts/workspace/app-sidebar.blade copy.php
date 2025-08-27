

<aside class="sidebar d-flex flex-column  justify-content-between">
    <div>
        <!-- Logo -->
        <div class="p-3 d-flex"><!--
            <img src="{{ asset('assets/images/logo.jpg') }}" style="width:50px" ><br>
            <div class="ps-2">
                <span class="text-truncate">CENTRO DE INSPECCIONES TECNICAS VEHICULARES</span></br>
                <strong  class="text-truncate">VIRGEN DE CHAPI E.I.R.L. - C.I.T.V. VIRGEN DE CHAPI EIRL</STRONG> 
                 
            </div>-->
            <div class="w-100 d-flex justify-content-between">
                    <span class="logo-text">citvmax</span>
                    <button type="button" class="btn btn-ghost-outline-secondary btn-sm"><i class="bx bx-menu"></i></button>
           </div>
        </div>
<!--
        <div class="ps-3 module-text">MODULOS</div>
        <h5>CITV's</h5>-->
        <ul class="nav flex-column">
           @foreach($layoutOptions['modules'] as $slug => $module)
                @php
                    $active = ($layoutOptions['module_active'] == $slug) ? 'active' : '';
                    $url =  url("/workspace/".$slug ) ;
                   
                @endphp
                <li class="nav-item w-100">
                    <a href="{{ $url }}" class="nav-link w-100 d-flex align-items-center {{ $active }}" data-bs-toggle="tooltip" data-bs-placement="right" title="En Inspección">
                        <i class="{{ $module['icon'] ?? 'fa fa-default' }}"></i>
                        <span>{{ $module['name'] ?? 'Unnamed Module' }}</span>
                    </a>
                </li>
            @endforeach

            <!--
            <li class="nav-item">
                <a href="#" class="nav-link " data-bs-toggle="tooltip" data-bs-placement="right" title="Inspecciones">
                    <i class="lnil lnil-car-alt"></i> Inspeciones
                </a>
            </li> 
            <li class="nav-item">
                <a href="#" class="nav-link " data-bs-toggle="tooltip" data-bs-placement="right" title="Facturacion">
                    <i class="lnil lnil-file-name"></i> Facturación
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link " data-bs-toggle="tooltip" data-bs-placement="right" title="Reportes">
                    <i class="lnil lnil-graph"></i> Reportes
                </a>
            </li> --->
        </ul>
    </div>

    <div>
        <ul class="nav flex-column"> 
            <!--
            <li class="nav-item">
                <a href="#" class="nav-link " data-bs-toggle="tooltip" data-bs-placement="right" title="Notificaciones">
                    <i class="lnil lnil-alarm-2"></i> Notificaciones
                </a>
            </li>-->
            <li class="nav-item pb-3">
                {{-- Botón de logout (enlace) --}}
                <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="nav-link" data-bs-toggle="tooltip" data-bs-placement="right" title="Ajustes">
                    <i class="bx bx-arrow-out-left-square-half"></i> Cerrar Sesión
                </a>

                {{-- Formulario oculto de logout --}}
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>

            </li>  
        
        </ul>
    </div>
  </aside>