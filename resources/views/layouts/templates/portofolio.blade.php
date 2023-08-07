@extends('layouts.templates.home')
@section('content')
     {{-- hero --}}
     <div class="my-20">
        <p class="text-center text-active font-bold text-4xl uppercase">portofolio</p>
        <div class="w-1/2 mx-auto my-10">
            <p class="text-center text-sm md:text-base">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Error ullam hic, enim distinctio tempore odio alias aliquam nisi cum repudiandae.</p>
        </div>
    </div>
    <div>
        <img src="{{ asset('image/wave.png') }}" alt="">
    </div>
    {{-- end hero --}}
    {{-- category --}}
        <div class="my-20">
            
                <div class="flex justify-center gap-8 flex-wrap">
                    <div>
           <a href="/portofolio/all" class="px-2 py-1 rounded-xl border border-active {{ request()->is('portofolio/all') ? 'bg-active text-white font-bold' : 'hover:bg-active hover:text-white hover:font-bold' }}">all</a>
       </div>
                    @foreach ($layanan as $category)
                         <div>
                <a href="/portofolio/{{ $category->slug }}" class="px-2 py-1 rounded-xl border border-active {{ request()->is('portofolio/'.$category->slug) ? 'bg-active text-white font-bold' : 'hover:bg-active hover:text-white hover:font-bold' }}">{{ $category->name }}</a>
            </div>
                    @endforeach

                </div>
        </div>
    {{-- end category --}}
    <div>
        @yield('cards')
    </div>
@endsection