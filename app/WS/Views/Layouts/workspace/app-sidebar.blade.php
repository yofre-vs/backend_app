<aside class="app-sidebar  border-end" style="width: 250px; overflow-y: auto; background-color:#f9f9f9">
    <div>
         
        <div class="p-3 d-flex"> 
            <div class="w-100 d-flex justify-content-between align-items-center">
                <div class="dropdown">
                    <button class="btn  btn-gdrive dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-plus"></i> Nuevo
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#newEnrollFormModal">Matricula</a></li>
                        <li><a class="dropdown-item" href="#">Factua</a></li>
                        <li><a class="dropdown-item" href="#">Usuario</a></li>
                    </ul>
                </div>
                    
                <button type="button" class="btn btn-ghost-outline-secondary btn-sm"><i class='bx  bxs-arrow-from-right-stroke  '  ></i> </button>
           </div>
        </div>
         
        <ul class="nav flex-column">
            @php
            $uuid = request()->route('uuid');
            @endphp
           @foreach($layoutOptions['modules'] as $slug => $module)
                @php
                    $active = ($layoutOptions['module_active'] == $slug) ? 'active' : '';
                    $url =  url("/w/".$uuid."/".$slug ) ;
                   
                @endphp
                <li class="nav-item w-100">
                    <a href="{{ $url }}" class="nav-link w-100 d-flex align-items-center {{ $active }}" data-bs-toggle="tooltip" data-bs-placement="right" title="En Inspección">
                        <i class="{{ $module['icon'] ?? 'fa fa-default' }}"></i>
                        <span>{{ $module['name'] ?? 'Unnamed Module' }}</span>
                    </a>
                </li>
            @endforeach
 
        </ul>
    </div>

    <div>
        <ul class="nav flex-column"> 
             
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