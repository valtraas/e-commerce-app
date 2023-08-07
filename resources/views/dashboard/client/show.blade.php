@extends('layouts.templates.dashboard')
@section('content')
<div class="h-16 border-b border-active flex items-center pr-2">
    <div class="  rounded-full  px-4 text-end ml-auto p-2 text-xl">
       <i class="fa-solid fa-sun cursor-pointer dark:text-white text-orange-500 " id="sun" onclick="DarkMode()"></i>
   </div> 
</div>

<div>

    <div class="w-[40%] mx-auto border  my-10 pt-4 rounded-lg ">
        <div class="text-center">
            <p class="mb-5 text-2xl font-bold dark:text-active">{{ $client->name }}</p>
            <img src="https://source.unsplash.com/500x500?planets" alt="" class="mx-auto w-44 rounded-full">
        </div>
        <div class=" mt-10 ">
            <div>
             <img src="{{ asset('image/wave3.png') }}" alt="">
            </div>
     
            <div class="bg-active h-full text-center p-6 rounded-b-lg">

          <div class="client-detail text-white">
              <div class="text-center mb-5 ">
                  <p class="font-bold text-2xl mb-3">Email</p>
                  <p class="text-xl">{{ $client->email }}</p>
              </div>
              <div class="text-center mb-5 ">
                  <p class="font-bold text-2xl mb-3">Telephone</p>
                  <p class="text-xl">{{ $client->telephone }}</p>
              </div>
              <div class="text-center mb-5 ">
                  <p class="font-bold text-2xl mb-3">Status</p>
                  <p class="text-xl">{{ $client->status }}</p>
              </div>
             
              <div class="text-center mb-5 ">
                  <p class="font-bold text-2xl mb-3">Pesan</p>
                  <p class="text-xl">{{ $client->pesan }}</p>
              </div>
          </div>
          <a href="{{ route('client.index') }}" class="px-3 py-1 border text-white rounded-xl hover:bg-white hover:text-active duration-150 hover:font-bold block mt-10 w-60 mx-auto">Kembali</a>

            </div>
        </div>
       </div>

</div>
@endsection