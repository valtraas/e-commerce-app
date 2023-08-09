@extends('layouts.templates.dashboard')
@section('content')
<div class="h-16 border-b border-active flex items-center">
   
    <div class="  rounded-full  px-4 text-end ml-auto p-2 text-xl">
        <i class="fa-solid fa-sun cursor-pointer dark:text-white text-orange-500 " id="sun" onclick="DarkMode()"></i>
    </div> 
</div>
{{-- layanan --}}
<div class="mx-20 mb-20">
    <div class=" border w-96 rounded-xl shadow-md dark:bg-white" >
        <div class="flex gap-6 items-center text-2xl font-bold p-2">
  <div class="bg-blue-600 rounded-xl p-4 text-2xl text-white shadow-xl">
    <i class="fa-solid fa-gears"></i>
        </div>
            <p>{{ $layanan->name }}</p>
        </div>
        <div class="bg-slate-600 text-center mt-2 rounded-b-xl p-2 text-white  hover:font-bold duration-200 hover:underline dark:text-active">
            <a href="{{ route('layanan.index') }}"><i class="fa-solid fa-circle-left"></i></i> Kembali</a>
          </div>
      
    </div>
       
    {{--  --}}
    <div class="pt-6 mb-20">
        <div class=" border w-96 rounded-xl shadow-md dark:bg-white mt-10 mb-5" id="proses" >
            <div class="flex gap-6 items-center text-2xl font-bold p-2">
               <div class="bg-blue-600 rounded-xl p-4 text-2xl text-white shadow-xl">
                   <i class="fa-solid fa-list-ul"></i>
               </div>
                   <p>Proses Layanan</p>
               </div>
             <div class="bg-slate-600 text-center mt-2 rounded-b-xl p-2 text-white  hover:font-bold duration-200 hover:underline dark:text-active">
               <a href="{{ route('proses.creates',['category'=>$layanan->slug]) }}"><i class="fa-solid fa-circle-plus"></i> Tambah Proses Layanan</a>
             </div>
        </div>
              <div class="w-72 mb-5 rounded-xl bg-white ">
                <form action="{{ route('detail.index',['category'=>$layanan->slug]) }}" method="get">
<div class="flex items-center">
    <i class="fa-solid fa-magnifying-glass ml-2"></i>
<input type="text" class="rounded-xl  px-2 py-1 w-full focus:outline-none" name="proses">
</div>
                </form>
              </div>
        <div class="overflow-x-auto  ">
            <table class="table-auto border-collapse border border-gray-400">
                <thead>
                    <tr>
                        <th class="px-4 py-2 text-white bg-gray-800 dark:bg-green-800 border duration-300  delay-150">#</th>
                        <th class="px-4 py-2 text-gray-600 dark:text-active border duration-300 delay-150">Nama Proses</th>
                        <th class="px-4 py-2 text-gray-600 dark:text-active border duration-300 delay-150">Deskripsi Proses</th>
                        <th class="px-4 py-2 text-gray-600 dark:text-active border duration-300 delay-150">Action</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($proses as $item)
                    {{-- @dd($item->proses->name) --}}
                    <tr class="dark:text-white">
                        <td class="border px-4 py-2">{{ $loop->iteration }}</td>

                        <td class="border px-4 py-2">{{ $item->name }}</td>
                        <td class="border px-4 py-2">{{ $item->desc }}</td>
                        <td class="border px-4 py-2">
                            <div class="flex">
                               
                                <div class="bg-yellow-400 mr-2 rounded-md px-2 py-1 text-white
                            hover:bg-yellow-600">
                                    <a href="{{ route('proses.edited',['proses'=>$item->name]) }}">
                                        <i class="fa-regular fa-pen-to-square"></i>
                                    </a>
                                </div>
                                <form action="{{ route('proses.deleted',['proses'=>$item->name]) }}" method="post" id="deleteForm">
                                    @csrf
                                    @method('DELETE')
                                    <button class="bg-red-600 rounded-md px-2 py-1 text-white hover:bg-red-800 deleteButton"
                                      >

                                        <i class="fa-regular fa-trash-can"></i>
                                    </button>
                                </form>

                            </div>
                        </td>
                    </tr>
                    @endforeach
                    
                </tbody>
            </table>
        </div>
    </div>
    {{--  --}}
    {{--  --}}
    <div class="pt-6 mb-20">
        <div class=" border w-96 rounded-xl shadow-md dark:bg-white mt-10 mb-5" id="fitur">
            <div class="flex gap-6 items-center text-2xl font-bold p-2">
               <div class="bg-blue-600 rounded-xl p-4 text-2xl text-white shadow-xl">
                   <i class="fa-solid fa-shapes"></i>
               </div>
                   <a href="#">Fitur Layanan</a>
               </div>
             <div class="bg-slate-600 text-center mt-2 rounded-b-xl p-2 text-white  hover:font-bold duration-200 hover:underline dark:text-active">
               <a href="{{ route('fitur.created',['category'=>$layanan->slug]) }}"><i class="fa-solid fa-circle-plus"></i> Tambah Proses Layanan</a>
             </div>
           </div>
           <div class="w-72 mb-5 rounded-xl bg-white ">
            <form action="{{ route('detail.index',['category'=>$layanan->slug]) }}" method="get">
<div class="flex items-center">
<i class="fa-solid fa-magnifying-glass ml-2"></i>
<input type="text" class="rounded-xl  px-2 py-1 w-full focus:outline-none" name="fitur">
</div>
            </form>
          </div>
        <div class="overflow-x-auto  ">
            <table class="table-auto border-collapse border border-gray-400">
                <thead>
                    <tr>
                        <th class="px-4 py-2 text-white bg-gray-800 dark:bg-green-800 border duration-300  delay-150">#</th>
                        <th class="px-4 py-2 text-gray-600 dark:text-active border duration-300 delay-150">Nama Proses</th>
                        <th class="px-4 py-2 text-gray-600 dark:text-active border duration-300 delay-150">Deskripsi Proses</th>
                        <th class="px-4 py-2 text-gray-600 dark:text-active border duration-300 delay-150">Thumbnail</th>
                        <th class="px-4 py-2 text-gray-600 dark:text-active border duration-300 delay-150">Action</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($fitur as $item)
                    <tr class="dark:text-white">
                        <td class="border px-4 py-2">{{ $loop->iteration }}</td>
                        <td class="border px-4 py-2">{{ $item->name }}</td>
                        <td class="border px-4 py-2">{{ $item->desc }}</td>
                        <td class="border px-4 py-2">
                            <img src="{{ asset('storage/'.$item->icon) }}" alt="" width="70" class="rounded-xl mx-auto">
                        </td>
                        <td class="border px-4 py-2">
                            <div class="flex">
                               
                                <div class="bg-yellow-400 mr-2 rounded-md px-2 py-1 text-white
                            hover:bg-yellow-600">
                                    <a href="{{ route('fitur.edite',['fitur'=>$item->name]) }}">
                                        <i class="fa-regular fa-pen-to-square"></i>
                                    </a>
                                </div>
                                <form action="{{ route('fitur.hapus',['fitur'=>$item->name]) }}" method="post" id="deleteForm">
                                    @csrf
                                    @method('DELETE')
                                    <button class="bg-red-600 rounded-md px-2 py-1 text-white hover:bg-red-800 deleteButton"
                                       >

                                        <i class="fa-regular fa-trash-can"></i>
                                    </button>
                                </form>

                            </div>
                        </td>
                    </tr>
                    @endforeach
                    
                </tbody>
            </table>
        </div>
    </div>
    {{--  --}}
    
</div>
      
    
</div>
<div id="up-button" class="fixed right-4 bottom-5 ">
    <div id="menu" class=" hidden flex-col  rounded-xl mt-2 py-2  justify-center gap-3 ">
        <!-- Isi menu di sini -->
        <div class="rounded-full bg-white  p-2 text-center hover:bg-active hover:text-white">
            <a href="#proses" class="block  "> <i class="fa-solid fa-list-ul"></i>
            </a>
        </div>
        <div class="rounded-full bg-white  p-2 text-center hover:bg-active hover:text-white">
            <a href="#fitur" class="block  "> <i class="fa-solid fa-shapes"></i></a>
        </div>
        <div class="rounded-full bg-white  p-1 text-center hover:bg-active hover:text-white">
            <a href="#" class="block py-1 top"> <i class="fa-solid fa-angle-up"></i>
            </a>
        </div>
        <!-- Tambahkan menu lainnya sesuai kebutuhan -->
    </div>
    <p class="bg-white border-2 p-2  hover:bg-active hover:text-white rounded-full  duration-150 font-bold">
        <i class="fa-solid fa-circle mx-1" id="navigation"></i>
    </p>
</div>
{{-- end layanan --}}

{{-- table layanan --}}

{{-- end table layanan --}}
@endsection