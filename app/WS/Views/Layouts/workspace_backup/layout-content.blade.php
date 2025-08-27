@switch($layoutOptions['main'])

    @case('blank')
                @yield('contenido')
                @break


    @case('rows')
    @case('cols')
    @case('fixed')
            <main class="content-fix w-100 d-flex flex-column" style="height: 100vh;">
                <div style="background-image: linear-gradient(108.45deg, #45389c 0, #22c8ff 100%); height:3px"></div>
                {{-- Incluir el Content --}}
                @include('wslayout::contents/section-fixed-top')

                {{-- Incluir el Content --}}
                @include('wslayout::contents/section-fixed')

                {{-- Incluir el Content --}}
                @include('wslayout::contents/section-fixed-bottom')
            </main>


    @case('simple')
    @default
            <main class="content w-100 vh-100 overflow-y-scroll"   >
                 <div style="background-image: linear-gradient(108.45deg, #45389c 0, #22c8ff 100%); height:4px"></div>
                
                {{-- Incluir el Content --}}
                @include('wslayout::contents/section-simple-top')

                {{-- Incluir el Content --}}
                @include('wslayout::contents/section-simple')

                {{-- Incluir el Content --}}
                @include('wslayout::contents/section-simple-bottom')
            </main>
@endswitch

