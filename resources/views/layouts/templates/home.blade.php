<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
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
    @if (request()->is('login'))
        @notifyCss
    @endif
</head>
<body class="font-Poppins">
    @if (!request()->is('login*'))
        @include('layouts.navbar')
        @else
    @include('notify::components.notify')

    @endif
<main>
@yield('content')
<div id="up-button" class="fixed right-4 bottom-5 hidden opacity-70 hover:opacity-100">
    <a href="#" class="bg-white border-2  hover:bg-active hover:text-white rounded-full  p-2.5 duration-150"><i
            class="fa-solid fa-plane-up text-xl"></i></a>
</div>
</main>
@if (!request()->is('login*'))
@include('layouts.footer')
@endif
@yield('js')
@if(request()->is('login'))
@notifyJs
@endif
<script src="{{ asset('js/navbar.js') }}"></script>
</body>
</html>