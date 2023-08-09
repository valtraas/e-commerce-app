<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>{{ $title }}</title>
        <link rel="icon" href="{{ asset('image/logo.png') }}">
        @vite('resources/css/app.css')
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
        <script src="https://kit.fontawesome.com/ed30145a20.js" crossorigin="anonymous"></script>
        <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
        @notifyCss
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    </head>
</head>
<body class="font-Poppins dark:bg-[#001C30]" >
    @include('notify::components.notify')
    @include('layouts.sidebar')
    
    <main class="w-[calc(100%-3.73rem)] ml-auto">
<div class="2xl:container mx-auto space-y-6">
    @yield('content')
</div>
    </main>
    
    @notifyJs
   <script src="{{ asset('js/dashboard.js') }}"></script>
    <script src="{{ asset('js/sidebar.js') }}"></script>
    <script src="{{ asset('js/preview.js') }}"></script>
</body>
</html>