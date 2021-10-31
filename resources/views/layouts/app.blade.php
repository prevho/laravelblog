<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Choice css Styles -->
        <link rel="stylesheet" href="{{ asset('css/choices.css') }}">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">

        <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.2/dist/alpine.min.js" defer></script>

        
        @bukStyles(true)
        @livewireStyles
      
        <style>
            .switch {
              position: relative;
              display: inline-block;
              width: 60px;
              height: 34px;
            }
            
            .switch input { 
              opacity: 0;
              width: 0;
              height: 0;
            }
            
            .slider {
              position: absolute;
              cursor: pointer;
              top: 0;
              left: 0;
              right: 0;
              bottom: 0;
              background-color: #ccc;
              -webkit-transition: .4s;
              transition: .4s;
            }
            
            .slider:before {
              position: absolute;
              content: "";
              height: 26px;
              width: 26px;
              left: 4px;
              bottom: 4px;
              background-color: white;
              -webkit-transition: .4s;
              transition: .4s;
            }
            
            input:checked + .slider {
              background-color: #2196F3;
            }
            
            input:focus + .slider {
              box-shadow: 0 0 1px #2196F3;
            }
            
            input:checked + .slider:before {
              -webkit-transform: translateX(26px);
              -ms-transform: translateX(26px);
              transform: translateX(26px);
            }
            
            /* Rounded sliders */
            .slider.round {
              border-radius: 34px;
            }
            
            .slider.round:before {
              border-radius: 50%;
            }
            </style>

        <!-- Scripts -->
        <!-- Scripts -->
        <script src="{{ asset('js/main.js') }}" defer></script>
        {{-- <script src="{{ asset('js/dropdown.js') }}" defer></script> --}}
        <script src="{{ asset('js/app.js') }}" defer></script>
    </head>
    <body class="font-sans antialiased">
        <x-jet-banner />

        <div class="min-h-screen bg-gray-100">
            @livewire('navigation-menu')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="flex space-x-8 max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}

                        @if(isset($nav))
                            {{ $nav }}
                        @endif

                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>

        @stack('modals')

    


        
        
        
        
            <!-- Include Choices JavaScript (latest) -->
{{-- <script src="https://cdn.jsdelivr.net/npm/choices.js/public/assets/scripts/choices.min.js"></script> --}}
<!-- Or versioned -->

{{-- Livewire --}}
@livewireScripts

{{-- Blade UI kit --}}
@bukScripts(true)
        

    </body>
</html>
