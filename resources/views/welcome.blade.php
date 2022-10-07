<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Welcome to XusAmogus!😎</title>
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <!-- Styles -->
        @livewireStyles
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&family=Alumni+Sans+Pinstripe&display=swap" rel="stylesheet">
    </head>
    <body class="font-pinstripe antialiased">        
        <div class="bg relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">           
            @livewire('welcome-menu')

            <div class="mx-auto sm:px-6 lg:px-8">
                <div class="flex justify-center sm:justify-start sm:pt-0">
                    @livewire('blog')                    
                </div>
                
                <div class="flex justify-center mt-4 sm:items-center sm:justify-between">
                    <div class="text-center text-sm text-gray-500 sm:text-left">
                        <div class="flex items-center">                           
                            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="ml-4 -mt-px w-5 h-5 text-gray-400">
                                <path d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                            </svg>
                            <a href="https://buymeacoffee.com/?via=511xusamogI" target="_blank" class="text-lg ml-1 underline">
                                Sponsor
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @stack('modals')
 
        @livewireScripts
    </body>
</html>
