@extends('layouts.templates.dashboard')
@section('content')
<div class="h-16 border-b border-active flex items-center">
    <div class=" flex items-center px-4 dark:text-active  gap-4 text-2xl font-bold duration-300 delay-150">
        <div class="bg-blue-600 rounded-xl p-2 text-xl text-white shadow-xl">
            <i class="fa-solid fa-list-ul"></i>
        </div>
        <p>Tambah Ulasan client </p>
    </div>
    <div class="  rounded-full  px-4 text-end ml-auto p-2 text-xl">
        <i class="fa-solid fa-sun cursor-pointer dark:text-white text-orange-500 " id="sun" onclick="DarkMode()"></i>
    </div> 
</div>
{{--  --}}

<div class="mx-20 mb-20">
    <div class="border w-[35%] mx-auto p-6 rounded-xl shadow-xl mb-20">
        <form action="{{ route('ulasan.update',['ulasan'=>$kontak]) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
<div class="mb-5">
    <label for="name" class="block mb-3 dark:text-active font-bold text-xl">Nama Client <span class="text-red-700">*</span></label>
    <select type="text" class="px-2 py-1 rounded-xl border border-active @error('kontak_id')ring-2 ring-red-700 border-none @enderror w-80" name="kontak_id" id="client">
        <option selected value="{{ $ulasan->kontak->id }}">{{ $ulasan->kontak->name }}</option>
    @foreach ($client as $item)
    @if ($item->id !== $ulasan->kontak->id)
        
    <option value="{{ $item->id }}" >{{ $item->name }}</option>
    @endif
    @endforeach
    
    </select>
    @error('kontak_id')
<div class="my-2 text-red-700 text-sm">.
    {{ $message }}
</div>
    @enderror
</div>

<div class="mb-5">
    <label for="desc" class="block mb-3 dark:text-active font-bold text-xl">Ulasan <span class="text-red-700">*</span></label>
    <textarea name="ulasan" id="" cols="35" rows="5 "class="px-2 py-1 rounded-xl border border-active @error('ulasan')ring-2 ring-red-700 border-none @enderror">{{ $ulasan->ulasan }}</textarea>
    @error('ulasan')
<div class="my-2 text-red-700 text-sm">
    {{ $message }}
</div>
    @enderror
</div>

<button class="block mx-auto my-4 px-4 py-2 rounded-xl border border-active dark:bg-white dark:hover:bg-active hover:text-white dark:hover:font-bold hover:bg-active hover:font-bold duration-200" type="submit">Submit</button>
<a href="{{ route('client.index') }}" class="text-sm text-center block mt-6 dark:text-blue-700 text-active hover:underline hover:font-bold">Kembali</a>
</form>
    </div>

</div>

@endsection
