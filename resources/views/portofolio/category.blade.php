@extends('layouts.templates.portofolio')
@section('cards')
{{-- card --}}
<div class="my-28">
    @if (count($portofolio) > 0 )
         <div class="flex flex-wrap justify-center gap-10 ">
        @foreach ($portofolio as $item)
            
        <div class="card p-5 border border-black shadow-md rounded-md">
                <div class="card-image">
                <img src="{{ asset('image/kedai.png') }}" alt="" class="rounded-md mx-auto" width="300">
                </div>
                <div class="text-center">
                    <p class="mt-5 mb-3 text-center text-2xl">{{ $item->judul }}</p>
                    <p class="text-sm text-active text-center font-bold mb-7">{{ $item->category->name }}</p>
                    @if ($item->link)
                    <a href="{{ $item->link }}" class="px-2 py-1 border border-active my-4 rounded-xl">Kunjungi</a>
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