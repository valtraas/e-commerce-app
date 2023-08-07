@extends('layouts.templates.dashboard')
@section('content')
<div class="h-16 border-b border-active flex items-center">
    <div class=" flex items-center px-4 dark:text-active  gap-4 text-2xl font-bold duration-300 delay-150">
        <div class=" rounded-full  text-xl text-white ">
            @if ($user->image)
            <img src="{{ asset('storage/'.$user->image) }}" alt="" class=" w-20 rounded-full">
            
            @else
            <img src="https://source.unsplash.com/500x500?planets" alt="" class=" w-10 rounded-full">
                
            @endif

        </div>
        <p> Profile {{ $user->name }} </p>
    </div>
    <div class="  rounded-full  px-4 text-end ml-auto p-2 text-xl">
        <i class="fa-solid fa-sun cursor-pointer dark:text-white text-orange-500 " id="sun" onclick="DarkMode()"></i>
    </div> 
</div>

<div>

    <div class="w-[40%] mx-auto border  my-10 pt-4 rounded-lg shadow-xl">
        <div class="text-center">
            <p class="mb-5 text-2xl font-bold dark:text-active">{{ $user->name }}</p>
            @if ($user->image)
                
            <img src="{{ asset('storage/'.$user->image) }}" alt="" class="mx-auto w-44 rounded-full">
            @else
                
            <img src="https://source.unsplash.com/500x500?planets" alt="" class="mx-auto w-44 rounded-full">
            @endif
        </div>
        <div class=" mt-10 ">
            <div>
             <img src="{{ asset('image/wave3.png') }}" alt="">
            </div>
     
            <div class="bg-active h-full text-center p-6 rounded-b-lg">

          <div class="client-detail text-white">
              <div class="text-center mb-5 ">
                  <p class="font-bold text-2xl mb-3">Username</p>
                  <p class="text-xl">{{ $user->username }}</p>
              </div>
              <div class="text-center mb-5 ">
                  <p class="font-bold text-2xl mb-3">Role</p>
                  <p class="text-xl">{{ $user->roles->name }}</p>
              </div>
             
          </div>
          <a href="{{ route('profile.edit',['user'=>$user->username]) }}" class="px-3 py-1 border text-white rounded-xl hover:bg-white hover:text-active duration-150 hover:font-bold block mt-10 w-60 mx-auto">Ubah Profile</a>
            </div>
        </div>
       </div>

</div>
@endsection