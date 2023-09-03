@extends('layouts.templates.home')
@section('content')
         {{-- hero --}}
         <div class="my-20">
            <p class="text-center text-active font-bold md:text-4xl uppercase text-3xl">Kontak Kami</p>
            <div class="w-1/2 mx-auto my-10">
                <p class="text-center ">Mari Bekerjasama mengembangkan bisnis anda sekarang juga.</p>
            </div>
        </div>
        <div>
            <img src="{{ asset('image/wave.png') }}" alt="">
        </div>
        {{-- end hero --}}
        {{-- form --}}
<div class="flex p-6 justify-center my-16 items-center">
   <div class="hidden md:block">
     <div class=" pl-12">
        <img src="{{ asset('image/logo.png') }}" alt="" width="200">
        <p class="text-3xl font-bold my-10">Teknorithm</p>
     </div>
     <div class="rounded-xl border border-black shadow-lg w-1/2 mb-10">
        <div class="bg-active rounded-t-xl flex text-white gap-5 px-3 items-center text-2xl">
            <i class="fa-solid fa-location-dot"></i> 
            <span class="">Location</span>   
        </div>
        <div class="p-4">
            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Accusamus, deleniti?</p>
        </div>

    </div>
     <div class="rounded-xl border border-black shadow-lg w-1/2 mb-10">
        <div class="bg-active rounded-t-xl flex text-white gap-5 px-3 items-center text-2xl">
            <i class="fa-solid fa-phone"></i>
            <span class="">Telephone</span>   
        </div>
        <div class="p-4">
            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Accusamus, deleniti?</p>
        </div>

    </div>
     <div class="rounded-xl border border-black shadow-lg w-1/2 mb-10">
        <div class="bg-active rounded-t-xl flex text-white gap-5 px-3 items-center text-2xl">
            <i class="fa-solid fa-envelope"></i>
            <span class="">Email</span>   
        </div>
        <div class="p-4">
            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Accusamus, deleniti?</p>
        </div>

        </div>
   </div>

    <div class=" text-xl p-6 flex flex-col justify-center items-center">
        <form action="{{ route('kontak.message') }}" method="post" id="form-kontak">
            @csrf
            <div class="mb-5">
                <label for="nama" class="block mb-3 font-bold">Nama <span class="text-red-600">*</span></label>
                <input type="text" class="border border-black rounded-xl px-4 py-2  @error('name') border-red-700 @enderror " placeholder="Masukan nama anda" name="name">
                @error('name')
                <p class="text-red-500">{{ $message }}</p>
                @enderror
                
            </div>
            <div class="mb-5">
                <label for="email" class="block mb-3 font-bold">Email <span class="text-red-600">*</span></label>
                <input type="email" class="border border-black rounded-xl px-4 py-2  @error('email') border-red-700 @enderror" placeholder="example@email.com" name="email">
                @error('email')
                <p class="text-red-500">{{ $message }}</p>
                
                @enderror
            </div>
            <div class="mb-5">
                <label for="telephone" class="block mb-3 font-bold">Telephone <span class="text-red-600">*</span></label>
                <input type="text" class="border border-black rounded-xl px-4 py-2 @error('telephone') border-red-700 @enderror" placeholder="Masukan nomor " name="telephone">
                @error('telephone')
                <p class="text-red-500">{{ $message }}</p>
            @enderror
            </div>

            <div class="mb-5">
                <label for="pesan" class="block mb-3 font-bold">Pesan <span class="text-red-600">*</span></label>
                <textarea class="border border-black rounded-xl px-4 py-2 @error('pesan') border-red-700 @enderror" cols="30" rows="10" placeholder="Masukan pesan anda" name="pesan"></textarea>
                @error('pesan')
                <p class="text-red-500">{{ $message }}</p>
            @enderror
            </div>
            <button class="border border-active px-4 py-2 rounded-xl hover:bg-active hover:text-white hover:font-bold duration-200">Kirim</button>
        </form>
    </div>
</div>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const form = document.querySelector("#form-kontak"); // Pilih form
        form.addEventListener("submit", function(event) {
            event.preventDefault(); // Mencegah form di-submit secara langsung
            if (form.checkValidity()) {
            Swal.fire({
                icon: "success",
                title: "Success!",
                text: "Pesan berhail terkirim",
                timer: 3000, // Mengatur waktu dalam milidetik (3000ms = 3 detik)
                showConfirmButton: false, // Menyembunyikan tombol OK
            }).then((result) => {
                form.submit();
            });
        }
        });
    });
    </script>
@endsection