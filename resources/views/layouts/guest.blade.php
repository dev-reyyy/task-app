<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-white dark:bg-gray-900">
    <header>
        <x-navbar/>
    </header>

    <main>
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
    </main>
</body>
</html>