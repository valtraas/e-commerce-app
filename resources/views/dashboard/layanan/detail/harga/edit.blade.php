@extends('layouts.templates.dashboard')
@section('content')
<div class="h-16 border-b border-active flex items-center">
    <div class=" flex items-center px-4 dark:text-active  gap-4 text-2xl font-bold duration-300 delay-150">
        <div class="bg-blue-600 rounded-xl p-2 text-xl text-white shadow-xl">
            <i class="fa-solid fa-dollar-sign"></i>
        </div>
        <p>Tambah Harga Layanan </p>
    </div>
    <div class="  rounded-full  px-4 text-end ml-auto p-2 text-xl">
        <i class="fa-solid fa-sun cursor-pointer dark:text-white text-orange-500 " id="sun" onclick="DarkMode()"></i>
    </div> 
</div>
{{--  --}}

<div class="mx-20 mb-20">
    <div class="border w-[35%] mx-auto p-6 rounded-xl shadow-xl mb-20">
        <form action="{{ route('harga.update', ['harga' => $harga->nama]) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <input type="hidden" name="category_id" value="{{ $layanan->id }}">
            <div class="mb-5">
                <label for="name" class="block mb-3 dark:text-active font-bold text-xl">Nama Harga <span class="text-red-700">*</span></label>
                <input type="text" class="px-2 py-1 rounded-xl border border-active @error('nama') ring-2 ring-red-700 border-none @enderror w-80" name="nama" id="name" value="{{ $harga->nama }}">
                @error('nama')
                    <div class="my-2 text-red-700 text-sm">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-5">
                <label for="harga" class="block mb-3 dark:text-active font-bold text-xl">Harga <span class="text-red-700">*</span></label>
                <input type="text" class="px-2 py-1 rounded-xl border border-active @error('harga') ring-2 ring-red-700 border-none @enderror w-80" name="harga" id="harga" value="{{ $harga->harga }}">
                @error('harga')
                    <div class="my-2 text-red-700 text-sm">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-5" id="penawaran-container">
                <div class="mb-2 flex justify-between">
                    <label for="penawaran" class="mb-3 dark:text-active font-bold text-xl">Penawaran <span class="text-red-700">*</span></label>
                    <button type="button" id="add-penawaran" class="mr-5 px-2 py-1 rounded-xl hover:bg-white hover:text-active hover:font-bold border border-active text-white">Tambah Fitur</button>
                </div>
        
                @foreach (json_decode($harga->fitur) as $index => $fitur)
                    <div>
                        <input type="text" class="px-2 py-1 rounded-xl border border-active @error('fitur.*') ring-2 ring-red-700 border-none @enderror w-80 penawaran-input mb-2" name="fitur[]" value="{{ $fitur }}">
                        <label>
                            <input type="checkbox" name="keep_fitur[]" value="{{ $index }}" checked> Tetap Ada
                        </label>
                    </div>
                @endforeach
        
                @error('fitur.*')
                    <div class="my-2 text-red-700 text-sm">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        
            <button class="block mx-auto my-4 px-4 py-2 rounded-xl border border-active dark:bg-white dark:hover:bg-active hover:text-white dark:hover:font-bold hover:bg-active hover:font-bold duration-200" type="submit">Update</button>
            <a href="{{ route('detail.index', ['category' => $layanan->slug]) }}" class="text-sm text-center block mt-6 dark:text-blue-700 text-active hover:underline hover:font-bold">Kembali</a>
        </form>
        
        <script>
            document.getElementById('add-penawaran').addEventListener('click', function () {
                var fiturContainer = document.getElementById('penawaran-container');
                var inputFitur = document.createElement('input');
                inputFitur.type = 'text';
                inputFitur.name = 'fitur[]';
                fiturContainer.appendChild(inputFitur);
        
                var inputCheckbox = document.createElement('input');
                inputCheckbox.type = 'checkbox';
                inputCheckbox.name = 'keep_fitur[]';
                inputCheckbox.value = fiturContainer.childElementCount - 1;
                inputCheckbox.checked = true;
                var labelCheckbox = document.createElement('label');
                labelCheckbox.appendChild(inputCheckbox);
                labelCheckbox.appendChild(document.createTextNode(' Tetap Ada'));
                fiturContainer.appendChild(labelCheckbox);
            });
        </script>
        
@endsection
