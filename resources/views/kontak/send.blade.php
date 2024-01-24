<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/ed30145a20.js" crossorigin="anonymous"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>

<body class="font-Poppins flex flex-col justify-center h-screen bg-slate-100">
    <div class="shadow-lg w-[70%] mx-auto pt-4 bg-white rounded-md">
        <div class="card-image my-3">
            <img src="{{ asset('image/logo.png') }}" alt="" class="w-20 mx-auto">
            <p class="text-center mt-5">Teknorithm</p>
        </div>
        <div>
            <img src="{{ asset('image/wave3.png') }}" alt="" class="min-w-full">
        </div>
        <div class="card-body bg-active p-4">
            <div class="data mb-3">
                <p class="text-white font-semibold mb-3">Customer</p>
                <p class="text-center text-white">{{ $data->name }}</p>
            </div>
            <div class="data mb-3">
                <p class="text-white font-semibold mb-3">Email</p>
                <p class="text-center text-white">{{ $data->email }}</p>
            </div>
            <div class="data mb-3">
                <p class="text-white font-semibold mb-3">Nomor Hp</p>
                <p class="text-center text-white">{{ $data->telephone }}</p>
            </div>
            <div class="data mb-3">
                <p class="text-white font-semibold mb-3">Pesan</p>
                <p class="text-center text-white">{{ $data->pesan }}</p>
            </div>

        </div>

    </div>
    {{-- <strong>Name: </strong>{{ $data->name }} <br>
<strong>Email: </strong>{{ $data->email }} <br>
<strong>Phone: </strong>{{ $data->telephone }} <br>
<strong>Message: </strong>{{ $data->pesan}} <br><br> --}}
</body>

</html>

{{-- <h2>Hey, It's me {{ $data->name }}</h2> 
<br>

  
Thank you --}}
