@extends('layouts.templates.portofolio')
@section('cards')
{{-- card --}}
<div class="my-28">
    <div class="flex flex-wrap justify-center gap-10 ">
        @foreach ($portofolio as $item)
            
        <div class="card md:p-5 p-3 border border-black shadow-md rounded-md">
                <div class="card-image">
                <img src="{{ asset('image/kedai.png') }}" alt="" class="rounded-md mx-auto md:w-72 w-60" >
                </div>
                <div class="text-center">
                    <p class="mt-5 mb-3 text-center text-2xl">{{ $item->judul }}</p>
                    <p class="text-sm text-active text-center font-bold mb-7">{{ $item->category->name }}</p>
                    @if ($item->link)
                    <a href="{{ $item->link }}" class="px-2 py-1 border border-active my-4 rounded-xl md:text-base text-sm">Kunjungi</a>
                    @endif
                </div>
        </div>
        @endforeach
    </div>
    <div class="flex justify-center my-10">
        {{ $portofolio->links() }}
    </div>
</div>
{{-- end card --}}
@endsection