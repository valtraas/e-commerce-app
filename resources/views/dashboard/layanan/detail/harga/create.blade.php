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
        <form action="{{ route('harga.create',['category'=>$layanan->slug]) }}" method="post" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="category_id" value="{{ $layanan->id }}">
<div class="mb-5">
    <label for="name" class="block mb-3 dark:text-active font-bold text-xl">Name <span class="text-red-700">*</span></label>
    <input type="text" class="px-2 py-1 rounded-xl border border-active @error('name')ring-2 ring-red-700 border-none @enderror w-80" name="name" id="name">
    @error('name')
<div class="my-2 text-red-700 text-sm">.
    {{ $message }}
</div>
    @enderror
</div>
<div class="mb-5">
    <label for="name" class="block mb-3 dark:text-active font-bold text-xl">Harga <span class="text-red-700">*</span></label>
    <input type="text" class="px-2 py-1 rounded-xl border border-active @error('name')ring-2 ring-red-700 border-none @enderror w-80" name="harga" id="name">
    @error('name')
<div class="my-2 text-red-700 text-sm">.
    {{ $message }}
</div>
    @enderror
</div>
<div class="mb-5" id="penawaran-container">
    <div class="mb-2 flex justify-between">
           <label for="penawaran" class=" mb-3 dark:text-active font-bold text-xl">Penawaran <span class="text-red-700">*</span></label>
    <button type="button" id="add-penawaran" class="mr-5 px-2 py-1 rounded-xl hover:bg-white hover:text-active hover:font-bold border border-active text-white">Tambah Fitur</button>
    </div>
 
    <input type="text" class="px-2 py-1 rounded-xl border border-active @error('name')ring-2 ring-red-700 border-none @enderror w-80 penawaran-input mb-2" name="fitur[]" >
    @error('name')
<div class="my-2 text-red-700 text-sm">.
    {{ $message }}
</div>
    @enderror
</div>


<button class="block mx-auto my-4 px-4 py-2 rounded-xl border border-active dark:bg-white dark:hover:bg-active hover:text-white dark:hover:font-bold hover:bg-active hover:font-bold duration-200" type="submit">Submit</button>
<a href="{{ route('detail.index',['category'=>$layanan->slug]) }}" class="text-sm text-center block mt-6 dark:text-blue-700 text-active hover:underline hover:font-bold">Kembali</a>
</form>
    </div>

</div>
<script>
    document.getElementById('add-penawaran').addEventListener('click',function(){
        const container =document.getElementById('penawaran-container');
        const input =document.createElement('input');
        input.type = 'text';
        input.name = 'fitur[]';
        input.classList.add('penawaran-input','rounded-xl','px-2','py-1','border','border-active','w-80','my-2');
        container.appendChild(input);

        const cancel = document.createElement('i')
        cancel.classList.add('ml-2','text-red-600','fa-solid','fa-circle-xmark','cursor-pointer')
        container.appendChild(cancel)
        // cancel.addEventListener('click',function(){
        //     input.classList.add('hidden')
        // })
    })
</script>
@endsection
