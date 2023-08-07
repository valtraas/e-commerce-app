@extends('layouts.templates.portofolio')
@section('cards')
<div class="my-28">
    <div class="flex flex-wrap justify-center gap-10 ">
        <div class="card p-5 border border-black shadow-md rounded-md">
                <div class="card-image">
                <img src="{{ asset('image/kedai.png') }}" alt="" class="rounded-md mx-auto" width="300">
                </div>
                <div class="text-center">
                    <p class="mt-5 mb-3 text-center text-2xl">Kedai ikan</p>
                    <p class="text-sm text-active text-center font-bold mb-7">Web Development</p>
                <a href="#" class="px-2 py-1 border border-active my-4 rounded-xl">Kunjungi</a>
                </div>
        </div>
        <div class="card p-5 border border-black shadow-md rounded-md">
                <div class="card-image">
                <img src="{{ asset('image/kedai.png') }}" alt="" class="rounded-md mx-auto" width="300">
                </div>
                <div class="text-center">
                    <p class="mt-5 mb-3 text-center text-2xl">Kedai ikan</p>
                    <p class="text-sm text-active text-center font-bold mb-7">Web Development</p>
                <a href="#" class="px-2 py-1 border border-active my-4 rounded-xl">Kunjungi</a>
                </div>
        </div>
        <div class="card p-5 border border-black shadow-md rounded-md">
                <div class="card-image">
                <img src="{{ asset('image/kedai.png') }}" alt="" class="rounded-md mx-auto" width="300">
                </div>
                <div class="text-center">
                    <p class="mt-5 mb-3 text-center text-2xl">Kedai ikan</p>
                    <p class="text-sm text-active text-center font-bold mb-7">Web Development</p>
                <a href="#" class="px-2 py-1 border border-active my-4 rounded-xl">Kunjungi</a>
                </div>
        </div>
        <div class="card p-5 border border-black shadow-md rounded-md">
                <div class="card-image">
                <img src="{{ asset('image/kedai.png') }}" alt="" class="rounded-md mx-auto" width="300">
                </div>
                <div class="text-center">
                    <p class="mt-5 mb-3 text-center text-2xl">Kedai ikan</p>
                    <p class="text-sm text-active text-center font-bold mb-7">Web Development</p>
                <a href="#" class="px-2 py-1 border border-active my-4 rounded-xl">Kunjungi</a>
                </div>
        </div>
    </div>
</div>
@endsection