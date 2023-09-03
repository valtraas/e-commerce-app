@extends('layouts.templates.dashboard')
@section('content')
<div class="h-16 border-b border-active flex items-center">
    <div class=" flex items-center px-4 dark:text-active  gap-4 text-2xl font-bold duration-300 delay-150">
        <div class="bg-blue-600 rounded-xl p-2 text-xl text-white shadow-xl">
            <i class="fa-solid fa-gears"></i>
        </div>
        <p>Edit Layanan {{ $layanan->name }} </p>
    </div>
    <div class="  rounded-full  px-4 text-end ml-auto p-2 text-xl">
        <i class="fa-solid fa-sun cursor-pointer dark:text-white text-orange-500 " id="sun" onclick="DarkMode()"></i>
    </div> 
</div>
{{--  --}}

<div class="mx-20 mb-20">
    <div class="border w-[25%] mx-auto p-6 rounded-xl shadow-xl mb-20">
        <form action="/dashboard/layanan/{{ $layanan->slug }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
<div class="mb-5">
    <label for="name" class="block mb-3 dark:text-active font-bold text-xl">name <span class="text-red-700">*</span></label>
    <input type="text" class="px-2 py-1 rounded-xl border border-active @error('name')ring-2 ring-red-700 border-none @enderror" name="name" id="name" value="{{ old('name',$layanan->name) }}">
    @error('name')
<div class="my-2 text-red-700 text-sm">.
    {{ $message }}
</div>
    @enderror
</div>
<div class="mb-5">
    <label for="slug" class="block mb-3 dark:text-active font-bold text-xl">Slug</label>
    <input type="text" class="px-2 py-1 rounded-xl border border-active bg-gray-300 cursor-default focus:outline-none " name="slug" readonly dissable id="slug" value="{{ old('slug',$layanan->slug) }}">
  
</div>
<div class="mb-5">
    <label for="desc" class="block mb-3 dark:text-active font-bold text-xl">Deskripsi <span class="text-red-700">*</span></label>
    <textarea name="desc" id="" cols="23" rows="5 "class="px-2 py-1 rounded-xl border border-active @error('desc')ring-2 ring-red-700 border-none @enderror" >{{ old('desc',$layanan->desc) }} </textarea>
    @error('desc')
<div class="my-2 text-red-700 text-sm">
    {{ $message }}
</div>
    @enderror
</div>


<button class="block mx-auto my-4 px-4 py-2 rounded-xl border border-active dark:bg-white dark:hover:bg-active hover:text-white dark:hover:font-bold hover:bg-active hover:font-bold duration-200" type="submit">Submit</button>
<a href="/dashboard/layanan" class="text-sm text-center block mt-6 dark:text-blue-700 text-active hover:underline hover:font-bold">Kembali</a>
</form>
    </div>

</div>

<script>
    const name  =document.querySelector('#name')
    const slug = document.querySelector('#slug')
    
    name.addEventListener('change',function(){
    fetch('/dashboard/layanan/slug?name='+ name.value)
        .then(response => response.json())
        .then(data => slug.value = data.slug)
    
    });
    </script>
@endsection