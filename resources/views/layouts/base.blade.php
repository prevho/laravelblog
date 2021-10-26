<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <x-partials.head />
    </head>


    <body>
        <x-partials.nav />

        <x-ui.alerts />


        <div class="leading-normal tracking-normal text-white gradient">
            {{ $slot }}
        </div>


        <footer>
            
            <x-partials.footer />
        </footer>

        {{-- Livewire --}}
        @livewireScripts
        {{-- <livewire:scripts> --}}
        
    </body>
</html>
