@extends('layouts.templates.dashboard')
@section('content')
<div class="h-16 border-b border-active flex items-center">
    <form action="{{ route('portofolio.index',['portofolio'=>$slug]) }}" class=" mx-auto w-1/2">
        <div class="mx-auto w-full border border-black rounded-full flex items-center px-4 dark:bg-white">
             <i class="fa-solid fa-magnifying-glass"></i>
            <input type="text" class=" w-full px-2 py-1 rounded-full focus:outline-none text-center" name="search" value="{{ request('search') }}">
        </div>
    </form>
    <div class="  rounded-full  px-4 text-end ml-auto p-2 text-xl">
        <i class="fa-solid fa-sun cursor-pointer dark:text-white text-orange-500 " id="sun" onclick="DarkMode()"></i>
    </div> 
</div>
{{-- layanan --}}
<div class="mx-20">
    <div class=" border w-96 rounded-xl shadow-md dark:bg-white">
        <div class="flex gap-6 items-center text-2xl font-bold p-2">
  <div class="bg-blue-600 rounded-xl p-4 text-2xl text-white shadow-xl">
            <i class="fa-solid fa-code"></i>
        </div>
            <p>{{ $layanan }}</p>
        </div>
      <div class="bg-slate-600 text-center mt-2 rounded-b-xl p-2 text-white  hover:font-bold duration-200 hover:underline dark:text-active">
        <a href="/dashboard/portofolio/{{ $slug }}/create"><i class="fa-solid fa-circle-plus"></i> Tambah Portofolio</a>
      </div>
    </div>
       
    {{--  --}}
    <div class="pt-6 mb-28">
        <div class="overflow-x-auto  ">
            <table class="table-auto border-collapse border border-gray-400">
                <thead>
                    <tr>
                        <th class="px-4 py-2 text-white bg-gray-800 dark:bg-green-800 border duration-300  delay-150">#</th>
                        <th class="px-4 py-2 text-gray-600 dark:text-active border duration-300 delay-150">Nama Proyek</th>
                        <th class="px-4 py-2 text-gray-600 dark:text-active border duration-300 delay-150">Link Proyek</th>
                        <th class="px-4 py-2 text-gray-600 dark:text-active border duration-300 delay-150">Thumbnail</th>
                        <th class="px-4 py-2 text-gray-600 dark:text-active border duration-300 delay-150">Action</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($portofolio as $item)
                    {{-- @dd($item) --}}
                    <tr class="dark:text-white">
                        <td class="border px-4 py-2">{{ $loop->iteration }}</td>
                        <td class="border px-4 py-2">{{ $item->judul }}</td>
                        <td class="border px-4 py-2">
                            <a href="{{ $item->link }}" class="text-blue-500 underline hover:text-blue-800">{{ $item->link }}</a></td>
                            <td class="border px-4 py-2">
                                @if ($item->image)
                                    <img src="{{ asset('storage/'.$item->image) }}" alt="" width="70" class="mx-auto">
                                    
                                @endif
                            </td>
                        
                        <td class="border px-4 py-2">
                            <div class="flex">
                                <div class="bg-yellow-400 mr-2 rounded-md px-2 py-1 text-white
                            hover:bg-yellow-600">
                                    <a href="/dashboard/portofolio/{{ $item->judul }}/edit">
                                        <i class="fa-regular fa-pen-to-square"></i>
                                    </a>
                                </div>
                                <form action="{{ route('portofolio.delete',['portofolio'=>$item->judul]) }} " method="POST" id="deleteForm">
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
{{-- end layanan --}}

{{-- table layanan --}}

{{-- end table layanan --}}
@endsection