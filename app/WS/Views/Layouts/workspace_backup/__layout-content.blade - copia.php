<main class="w-100  d-flex  flex-column justify-content-between">
      @php
            $content_layout = $content_layout ?? '';
      @endphp
      @switch($content_layout)
            @case('cols')
                  {{-- Incluir el content con section en columnas --}}
                  @include('layouts.workspace.contents.content-section-cols')  
                  @break

            @case('rows')
                  {{-- Incluir el content top y bottom estáticos --}}
                  @include('layouts.workspace.contents.content-section-rows')  
                  @break

            @default
                  {{-- Incluir el content simple (default) --}}
                  @include('layouts.workspace.contents.content-section')  
            @endswitch


</main>