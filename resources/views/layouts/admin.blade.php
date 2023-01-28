<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="icon" href="{{ asset($globalSettings['app_favicon']) }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
      
        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Scripts -->
  <!-- Datatables JS CDN -->

        <!-- Styles -->
        @livewireStyles
    </head>
    <body class="font-sans antialiased">
        <x-jet-banner />

        <div class="min-h-screen bg-gray-100">
            @livewire('navigation-menu')
            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}

                    </div>
                    @if(isset($pretitle))
                <div class="page-pretitle">
                    {{ $pretitle }}
                </div>
            @endif
            @if(isset($title))
                <div class="page-header d-print-none">
                    <div class="row align-items-center">
                        <div class="col">
                            <h2 class="page-title">
                                {{ $title }}
                            </h2>
                        </div>
                    </div>
                </div>
            @endif

                </header>
            @endif


            <!-- Page Content -->
            <main>

                        @if(isset($actions))
                        <div class="col-md-12 actions text-right pt-2 pb-2">
                            {{ $actions }}
                        </div>
                        @endif
                        
 <div class="py-12">
                        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 innner-content overflow-hidden ">
                          {{ $slot }}
                        </div>
                        </div>

            </main>
        </div>
<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script> 
@stack('modals')

<livewire:modals />
      
        <script src="{{ asset('vendor/livewire-alert/livewire-alert.js') }}"></script> 
<livewire:scripts/>
<x-livewire-alert::scripts />
<x-livewire-alert::flash />
@stack('scripts')
    <!-- Scripts -->
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    
        <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
       
    </body>
</html>
