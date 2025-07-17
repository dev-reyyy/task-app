<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>

    @vite(['resources/css/app.css', 'resources/css/custom.css', 'resources/js/app.js'])
</head>
<body class="bg-white dark:bg-gray-900">
    {{-- SIDEBAR --}}
    <x-sidebar />

    <div id="main-content" class="sm:ml-64 flex flex-col transition-all duration-300">
        {{-- NAVBAR --}}
        <x-app-navbar />

        {{-- MAIN --}}
        <div class="p-6">
            <div class="fixed top-5 right-5 flex flex-col space-y-4 z-50">
                {{-- Flash Toast Message from Session --}}
                @if(session('toast'))
                    <x-toast 
                        type="{{ session('toast')['type'] }}" 
                        message="{{ session('toast')['message'] }}" 
                    />
                @endif
            </div>

            @yield('content')
        </div>

        {{-- Modal Template --}}
        <div id="modalTemplate" tabindex="-1" aria-hidden="true"
            class="fixed top-0 left-0 right-0 z-50 items-center justify-center hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-full bg-black/75">
            <div class="relative w-full max-h-full max-w-2xl bg-white rounded-lg shadow dark:bg-gray-800" id="modalContent">
                {{-- AJAX-loaded content will be injected here --}}
            </div>
        </div>
</body>
</html>