@extends('layouts.templates.dashboard')
@section('content')
<div class="h-16 border-b border-active flex items-center">
    <div class=" flex items-center px-4 dark:text-active  gap-4 text-2xl font-bold duration-300 delay-150">
        <div class=" text-xl text-white shadow-xl">
            @if ($user->image)
            <img src="{{ asset('storage/'.$user->image) }}" alt="{{ $user->name }}" class="w-10">
                
            @else
                <img src="{{ asset('image/Avatar.png') }}" alt="" class="w-10">
            @endif
        </div>
        <p>Edit Profile {{ $user->name }} </p>
    </div>
    <div class="  rounded-full  px-4 text-end ml-auto p-2 text-xl">
        <i class="fa-solid fa-sun cursor-pointer dark:text-white text-orange-500 " id="sun" onclick="DarkMode()"></i>
    </div> 
</div>
{{--  --}}

<div class="mx-20 mb-20">
    <div class="border w-[25%] mx-auto p-6 rounded-xl shadow-xl mb-20">
        <form action="{{ route('profile.update',['user'=>$user->username]) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
<div class="mb-5">
    <label for="name" class="block mb-3 dark:text-active font-bold text-xl">name <span class="text-red-700">*</span></label>
    <input type="text" class="px-2 py-1 rounded-xl border border-active @error('name')ring-2 ring-red-700 border-none @enderror" name="name" id="name" value="{{ old('name',$user->name) }}">
    @error('name')
<div class="my-2 text-red-700 text-sm">.
    {{ $message }}
</div>
    @enderror
</div>
<div class="mb-5">
    <label for="username" class="block mb-3 dark:text-active font-bold text-xl">username</label>
    <input type="text" class="px-2 py-1 rounded-xl border border-active  focus:outline-none " name="username" id="username" value="{{ old('username',$user->username) }}">
  
</div>


<div class="mb-5">
    <label for="Judul" class="block mb-3 dark:text-active font-bold text-xl">Photo profile</label>
    <img class="img-preview rounded-lg ">

    <input type="file" class="px-2 py-1 rounded-xl border border-active w-full  bg-white @error('image') border-none ring-2 ring-red-700 @enderror" name="image" id="image-input" onchange="previewImage()">
    @error('image')
<div class="my-2 text-red-700 text-sm">
    {{ $message }}
</div>
    @enderror
</div>
<button class="block mx-auto my-4 px-4 py-2 rounded-xl border border-active dark:bg-white dark:hover:bg-active hover:text-white dark:hover:font-bold hover:bg-active hover:font-bold duration-200" type="submit">Submit</button>
<a href="{{ route('profile.index',['user'=>$user->username]) }}" class="text-sm text-center block mt-6 dark:text-blue-700 text-active hover:underline hover:font-bold">Kembali</a>
</form>
    </div>

</div>

@endsection