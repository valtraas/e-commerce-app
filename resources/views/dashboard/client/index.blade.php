@extends('layouts.templates.dashboard')
@section('content')
<div class="h-16 border-b border-active flex items-center">
    <form action="{{ route('client.index') }}" class=" mx-auto w-1/2">
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
<div class="mx-20 mb-20">
    <notify-messages />

    <div class=" border w-96 rounded-xl shadow-md dark:bg-white">
     <div class="flex gap-6 items-center text-2xl font-bold p-2">
        <div class="bg-green-500 rounded-xl p-4 text-2xl text-white shadow-xl">
             <i class="fa-solid fa-users"></i>
        </div>
            <p>Client</p>
        </div>
        
    </div>
       
    {{--  --}}
    <div class="pt-6 mb-20">
        <div class="overflow-x-auto  ">
            <table class="table-auto border-collapse border border-gray-400">
                <thead>
                    <tr>
                        <th class="px-4 py-2 text-white bg-gray-800 dark:bg-green-800 border duration-300  delay-150">#</th>
                        <th class="px-4 py-2 text-gray-600 dark:text-active border duration-300 delay-150">Nama Client</th>
                        <th class="px-4 py-2 text-gray-600 dark:text-active border duration-300 delay-150">Email </th>
                        <th class="px-4 py-2 text-gray-600 dark:text-active border duration-300 delay-150">status </th>
                        <th class="px-4 py-2 text-gray-600 dark:text-active border duration-300 delay-150">Action</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($client as $item)
                    <tr class="dark:text-white">
                        <td class="border px-4 py-2">{{ $loop->iteration }}</td>
                        <td class="border px-4 py-2">{{ $item->name }}</td>
                        <td class="border px-4 py-2">{{ $item->email }}</td>
                        <td class="border px-4 py-2">{{ $item->status }}</td>
                        
                        <td class="border px-4 py-2">
                            <div class="flex">
                                <a href="{{ route('client.show',['kontak'=>$item->name]) }}">
                                <div class="bg-blue-400 mr-2 rounded-md px-2 py-1 text-white
                            hover:bg-blue-600">
                            <i class="fa-solid fa-eye"></i>
                                    </div>
                                </a>
                                @if ($item->status !== 'Terselesaikan')
                                    
                                <div class="bg-green-500 mr-2 rounded-md px-2 py-1 text-white
                            hover:bg-green-700">
                            <form action="{{ route('client.done',['kontak'=>$item->name]) }}" method="post">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="status" >
                            <button type="submit" class="statusButton">
                                <i class="fa-solid fa-check"></i>
                            </button>
                            </form>
                                </div>
                                @endif
                                @if ($item->status !=='Terselesaikan')
                                     <form action="{{ route('client.eject',['kontak'=>$item->name]) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                   
                                    <button class="bg-red-600 rounded-md px-2 py-1 text-white hover:bg-red-800 deleteButton"
                                       >
                                        <i class="fa-regular fa-circle-xmark"></i>
                                    </button>
                                </form>
                                @endif
                               

                            </div>
                        </td>
                    </tr>
                    @endforeach
                    
                </tbody>
            </table>
        </div>
    </div>
     {{-- --}}
    {{-- <div class=" border w-96 rounded-xl shadow-md dark:bg-white">
     <div class="flex gap-6 items-center text-2xl font-bold p-2">
        <div class="bg-yellow-600 rounded-xl p-4 text-2xl text-white shadow-xl">
            <i class="fa-solid fa-comments"></i>
        </div>
            <p>Ulasan</p>
        </div>
        <div class="bg-slate-600 text-center mt-2 rounded-b-xl p-2 text-white  hover:font-bold duration-200 hover:underline dark:text-active">
            <a href="{{ route('ulasan.create') }}"><i class="fa-solid fa-circle-plus"></i> Tambah Ulasan</a>
          </div>
    </div> --}}
       
    {{--  --}}
    {{-- <div class="pt-6 mb-20">
        <div class="overflow-x-auto  ">
            <table class="table-auto border-collapse border border-gray-400">
                <thead>
                    <tr>
                        <th class="px-4 py-2 text-white bg-gray-800 dark:bg-green-800 border duration-300  delay-150">#</th>
                        <th class="px-4 py-2 text-gray-600 dark:text-active border duration-300 delay-150">Nama Client</th>
                        <th class="px-4 py-2 text-gray-600 dark:text-active border duration-300 delay-150">Ulasan </th>
                        <th class="px-4 py-2 text-gray-600 dark:text-active border duration-300 delay-150">Action</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($ulasan as $item)
                    <tr class="dark:text-white">
                        <td class="border px-4 py-2">{{ $loop->iteration }}</td>
                        <td class="border px-4 py-2">{{ $item->kontak->name }}</td>
                        <td class="border px-4 py-2">{{ $item->ulasan }}</td>
                        <td class="border px-4 py-2">
                            <div class="flex">
                                <div class="bg-yellow-400 mr-2 rounded-md px-2 py-1 text-white
                            hover:bg-yellow-600">
                                    <a href="{{ route('ulasan.edit',['ulasan'=>$item->kontak->name]) }}">
                                        <i class="fa-regular fa-pen-to-square"></i>
                                    </a>
                                </div>
                                <form action="{{ route('ulasan.delete',['ulasan'=>$item->kontak->name]) }}" method="post">
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
    </div> --}}
    {{--  --}}
   
</div>
      
    
</div>
{{-- end layanan --}}

{{-- table layanan --}}

{{-- end table layanan --}}
@endsection