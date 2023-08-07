@extends('layouts.templates.dashboard')
@section('content')
<div class="h-16 border-b border-active flex items-center pr-2">
     <div class="  rounded-full  px-4 text-end ml-auto p-2 text-xl">
        <i class="fa-solid fa-sun cursor-pointer dark:text-white text-orange-500 " id="sun" onclick="DarkMode()"></i>
    </div> 
</div>

{{-- card info --}}
<div class="mb-28">
    <div class=" my-10">
      
        <p class="text-4xl font-bold my-10 ml-48 dark:text-active duration-300">Dashboard</p>
    </div>
    <div class="flex justify-center  gap-5 flex-wrap">
        <div class="border p-2  text-2xl rounded-lg shadow-xl flex gap-5 w-[35%] dark:bg-white">
            <div class="bg-blue-600 flex items-center text-white w-20 justify-center rounded-lg text-2xl">
                <i class="fa-solid fa-gears"></i>
            </div>
            <div>
                <p class="text-center mb-2 text-2xl font-semibold">Layanan</p>
                    <p class="text-2xl">{{ count($category) }} </p> 
            </div>
            <div>
                <a href="/dashboard/layanan" class="hover:px-2 hover:py-1 hover:bg-blue-500 hover:text-white rounded-xl group hover:w-28 duration-300 flex items-center gap-3"><i class="fa-solid fa-circle-info"></i> <span class="opacity-0 group-hover:opacity-100 text-base group-hover:font-bold ">Detail</span></a>
            </div>
            
        </div>
        <div class="border p-2  text-2xl rounded-lg shadow-xl flex gap-5 w-[35%] dark:bg-white">
            <div class="bg-green-600 flex items-center text-white w-20 justify-center rounded-lg text-2xl">
                <i class="fa-solid fa-users"></i>
            </div>
            <div>
                <p class="text-center mb-2 text-2xl font-semibold">Client</p>
                    <p class="text-2xl">{{ count($client) }} </p> 
            </div>
            <div>
                <a href="/dashboard/customers" class="hover:px-2 hover:py-1 hover:bg-blue-500 hover:text-white rounded-xl group hover:w-28 duration-300 flex items-center gap-3"><i class="fa-solid fa-circle-info"></i> <span class="opacity-0 group-hover:opacity-100 text-base group-hover:font-bold ">Detail</span></a>
            </div>
        </div>
        <div class="border p-2  text-2xl rounded-lg shadow-xl w-[35%] dark:bg-white ">
            <div class=" flex gap-5">
                <div class="bg-red-600 flex items-center text-white w-20 justify-center rounded-lg text-2xl">
                    <i class="fa-solid fa-list-check"></i>
                </div>
                <div>
                    <p class="text-center mb-2 text-2xl font-semibold">Portofolio</p>
                        <p class="text-2xl">{{ count($portofolio) }}</p> 
                    
                </div>
                <div>
                    <p class="hover:px-2 hover:py-1 hover:bg-blue-500 hover:text-white rounded-xl group hover:w-28 duration-300 flex items-center gap-3 cursor-pointer" onclick="toggleDetail()"><i class="fa-solid fa-circle-info"></i> <span id="detailText" class="opacity-0 group-hover:opacity-100 text-base group-hover:font-bold">Detail</span></p>
                  </div>
            </div>
            <div class="relative">
                <ul class="absolute bg-white w-full top-2 rounded-xl p-3 border opacity-0 -z-10" id="portofolio">
                    @foreach ($category as $layanan)
                        <li class="my-3 hover:text-active hover:bg-zinc-200 p-2 rounded-xl hover:font-bold text-base ">
                    <a href="/dashboard/portofolio/{{ $layanan->slug }}">{{ $layanan->name }}</a>
                    <hr>
                  </li>
                    @endforeach
                  
                
                </ul>
              </div>
           
        </div>


        <div class="border p-2  text-2xl rounded-lg shadow-xl flex gap-5 w-[35%] dark:bg-white">
            <div class="bg-yellow-600 flex items-center text-white w-20 justify-center rounded-lg text-2xl">
                <i class="fa-regular fa-comments"></i>
            </div>
            <div>
                <p class="text-center mb-2 text-2xl font-semibold">Ulasan</p>
                <div class="flex justify-between items-center">
                    <p class="text-2xl">{{ count($ulasan) }} </p> 
                </div>

            </div>
        
        </div>
    </div>
</div>
{{-- end card-info --}}
@endsection
<script>
    

function toggleDetail() {
    const detailText = document.getElementById('detailText');
    const portofolio = document.getElementById('portofolio');

    if (detailText.classList.contains('opacity-0')) {
      detailText.classList.remove('opacity-0');
      detailText.classList.add('opacity-100');
    } else {
      detailText.classList.remove('opacity-100');
      detailText.classList.add('opacity-0');
    }

    if (portofolio.classList.contains('-z-10')) {
      portofolio.classList.remove('opacity-0', '-z-10');
    } else {
      portofolio.classList.add('opacity-0', '-z-10');
    }
  }
</script>