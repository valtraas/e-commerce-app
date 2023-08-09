@extends('layouts.templates.portofolio')
@section('cards')
{{-- card --}}
<div class="my-28">
    @if (count($portofolio) > 0 )
    <div class="flex flex-wrap justify-center gap-10 md:px-0 px-10 ">
        @foreach ($portofolio as $item)
            
        <div class="card md:p-5 p-3 border border-black shadow-md rounded-md flex flex-col justify-center">
                <div class="card-image">
                    @if ($item->image)
                    <img src="{{ asset('storage/'.$item->image) }}" alt="" class="rounded-md mx-auto md:w-48 w-32" >
                        
                    @endif
                </div>
                <div class="text-center">
                    <p class="mt-5 mb-3 text-center text-2xl">{{ $item->judul }}</p>
                    <p class="text-sm text-active text-center font-bold mb-7">{{ $item->category->name }}</p>
                    @if ($item->link)
                    <a href="{{ $item->link }}" class="px-2 py-1 border border-active my-4 rounded-xl md:text-base text-sm hover:bg-active hover:text-white hover:font-bold duration-200">Kunjungi</a>
                    @endif
                </div>
        </div>
        @endforeach
    </div>
    <div class="flex justify-center my-10">
        {{ $portofolio->links() }}
    </div>
    @else
        <p class="text-center my-20 text-3xl">Tidak ada proyek yang ditemukan</p>
    @endif
   
</div>
{{-- end card --}}
@endsection