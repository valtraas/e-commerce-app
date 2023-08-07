@extends('layouts.templates.home')
@section('content')
  <div class=" flex flex-col bg-gradient-to-b from-[#2ACC02] to-[#067325]">
      <div class="w-[35%] mx-auto border  my-10 pt-4 rounded-lg bg-white">
       <div class="text-center">
           <p class="mb-5 text-2xl font-bold">Teknorithm</p>
           <img src="{{ asset('image/logo.png') }}" alt="" class="mx-auto w-44 ">
       </div>
       <div class=" mt-10 ">
           <div>
            <img src="{{ asset('image/wave3.png') }}" alt="">
           </div>
    
           <div class="bg-active h-full text-center p-6 rounded-b-lg">
            <form action="/login/{{ $token }}" method="post" class="w-[45%] mx-auto">
                @csrf
                <div class="mb-5 ">
                    <label for="" class="block  text-white text-xl font-bold">Username</label>
        <input type="text" class="w-full px-3 py-1 rounded-xl @error('username') ring-2 ring-red-700 border-none @enderror focus:outline-none" name="username">

        @error('username')
<div class="text-red-600">
    {{ $message }}
</div>
        @enderror
                </div>
                <div class="mb-5 ">
                    <label for="" class="block  text-white text-xl font-bold">Password</label>
                    <div class="flex bg-white rounded-xl items-center px-1 @error('password')ring-2 ring-red-700 @enderror ">
                        <input type="password" class="w-full px-3 py-1 rounded-xl bg-white @error('password')  border-none @enderror focus:outline-none" name="password" id="password">
                        <i class="fa-regular fa-eye-slash cursor-pointer mx-2" onclick="eye()" id="icon"></i>
                    </div>
                    @error('password')
<div class="text-red-600">
    {{ $message }}
</div>
        @enderror
                </div>
                <button class="border border-white px-3 py-1 text-white w-full rounded-xl hover:bg-white hover:text-active duration-150 hover:font-bold">Login</button>
                <a href="/" class="border border-white px-3 py-1 text-white w-full rounded-xl mt-5 block hover:bg-white hover:text-active duration-150 hover:font-bold">Kembali ke home</a>
            </form>
           </div>
       </div>
      </div>
      <p class="text-center text-white mb-2">&copy; Copyright 2023 Teknorithm </p>
  </div>
  
@endsection