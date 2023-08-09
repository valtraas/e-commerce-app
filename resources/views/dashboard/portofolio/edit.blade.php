@extends('layouts.templates.dashboard')
@section('content')
<div class="h-16 border-b border-active flex items-center">
    <div class=" flex items-center px-4 dark:text-active  gap-4 text-2xl font-bold duration-300 delay-150">
        <div class="bg-blue-600 rounded-xl p-2 text-xl text-white shadow-xl">
            <i class="fa-solid fa-code"></i>
        </div>
        <p>Edit Portofolio {{ $portofolio->judul }}</p>
    </div>
    <div class="  rounded-full  px-4 text-end ml-auto p-2 text-xl">
        <i class="fa-solid fa-sun cursor-pointer dark:text-white text-orange-500 " id="sun" onclick="DarkMode()"></i>
    </div> 
</div>
{{--  --}}

<div class="mx-20">
    <div class="border w-[25%] mx-auto p-6 rounded-xl shadow-xl">
        <form action="{{ route('portofolio.update',['portofolio'=>$portofolio->judul]) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
<div class="mb-5">
    <label for="Judul" class="block mb-3 dark:text-active font-bold text-xl">Judul</label>
    <input type="text" class="px-2 py-1 rounded-xl border border-active @error('judul')border-none ring-2 ring-red-700 @enderror" name="judul" value="{{ old('judul',$portofolio->judul) }}">

    @error('judul')
    <div class="text-red-700 text-sm">
        {{ $message }}
    </div>
    @enderror
</div>
<div class="mb-5">
    <label for="Judul" class="block mb-3 dark:text-active font-bold text-xl">Link Proyek</label>
    <input type="text" class="px-2 py-1 rounded-xl border border-active @error('link')border-none ring-2 ring-red-700 @enderror" name="link" value="{{ old('link',$portofolio->link) }}">

    @error('link')
    <div class="text-red-700 text-sm">
        {{ $message }}
    </div>
    @enderror
</div>
<div class="mb-5">
    <input type="hidden" class="px-2 py-1 rounded-xl border border-active" value="{{ $portofolio->category->id }}" name="category_id">
</div>
<div class="mb-5">
    <label for="Judul" class="block mb-3 dark:text-active font-bold text-xl">Thumbnail</label>
    <img class="img-preview rounded-lg ">

    <input type="file" class="px-2 py-1 rounded-xl border border-active w-full  bg-white @error('image') border-none ring-2 ring-red-700 @enderror" name="image" id="image-input" onchange="previewImage()">
    @error('image')
<div class="my-2 text-red-700 text-sm">
    {{ $message }}
</div>
    @enderror
</div>
<button class="block mx-auto my-4 px-4 py-2 rounded-xl border border-active dark:bg-white dark:hover:bg-active hover:text-white dark:hover:font-bold hover:bg-active hover:font-bold duration-200" type="submit">Submit</button>
<a href="/dashboard/portofolio/{{ $slug }}" class="text-sm text-center block mt-6 dark:text-blue-700 text-active hover:underline hover:font-bold">Kembali</a>
</form>
    </div>

</div>
@endsection