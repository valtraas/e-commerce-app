@extends('layouts.templates.home')
@section('content')
     {{-- hero --}}
     <div class="my-20">
        <p class="text-center text-active font-bold md:text-4xl uppercase text-3xl">Tentang Kami</p>
        <div class="w-1/2 mx-auto my-10">
            <p class="text-center ">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Error ullam hic, enim distinctio tempore odio alias aliquam nisi cum repudiandae.</p>
        </div>
    </div>
    <div>
        <img src="{{ asset('image/wave.png') }}" alt="">
    </div>
    {{-- end hero --}}
    {{-- tujuan --}}
<div class="my-28">
    <div class="flex justify-center items-center gap-5 flex-wrap">
<div class="md:w-1/4 text-center md:text-start p-2 md:p-0">
    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ipsa doloremque odio ut voluptatibus obcaecati hic laboriosam cumque accusantium tempore numquam.</p>
</div>
<div>
    <img src="{{ asset('image/ui.png') }}" alt="" class="md:block hidden">
</div>
    </div>
</div>
    {{-- end tujuan --}}

    {{-- visi & misi --}}
<div class="my-28">
    <div class="md:w-1/2 w-[77%] mx-auto mb-10">
        <div class="bg-active text-white md:flex p-5 rounded-xl md:gap-7 shadow-lg ">
    <div>
        <img src="{{ asset('image/visi.png') }}" alt="" width="400" class="md:block hidden">
    </div>
    <div class="md:text-start text-center">
        <p class="md:text-center font-bold text-2xl mb-5">Visi Kami</p>
        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Numquam, repellendus. Sint velit aperiam, ad excepturi dolore eaque pariatur in laboriosam!</p>
    </div>
        </div>
    </div>
    <div class="md:w-1/2 w-[77%] mx-auto mb-10">
        <div class="bg-active text-white md:flex p-5 rounded-xl md:gap-7 shadow-lg ">
            <div class="md:text-start text-center">
                <p class="md:text-center font-bold text-2xl mb-5">Misi Kami</p>
                <p class="text-center">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Numquam, repellendus. Sint velit aperiam, ad excepturi dolore eaque pariatur in laboriosam!</p>
            </div>
            <div>
                <img src="{{ asset('image/misi.png') }}" alt="" width="400" class="md:block hidden">
            </div>
        </div>
    </div>
</div>
    {{-- end visi & misi --}}
    {{-- mengapa harus kami --}}
<div class="my-28">
    <div class="bg-active p-6">
        <p class="text-center text-white font-bold md:text-3xl my-10 text-2xl">Mengapa harus kami</p>
        <div class="flex flex-wrap my-16 justify-center gap-10 ">
            <div class="rounded-xl bg-white md:w-1/2 p-3">
                <div>
                    <img src="{{ asset('image/pengalaman.png') }}" alt="" class="md:block hidden">
                    <p class="font-bold my-4 text-xl">Pengalaman dan keahlian</p>
                </div>
                <div>
                    <p>Tim kami telah memiliki pengalaman yang luas dalam membangun bisnis digital untuk berbagai
                        klien di berbagai industri</p>
                </div>
            </div>
            <div class="rounded-xl bg-white md:w-80 p-3">
                <div>
                    <img src="{{ asset('image/harga.png') }}" alt="" class="md:block hidden">
                    <p class="font-bold my-4 text-xl">Harga yang bersaing</p>
                </div>
                <div>
                    <p>Anda dapat mendapatkan harga yang kompetitif dan terjangkau untuk layanan yang kami tawarkan
                    </p>
                </div>
            </div>
            <div class="rounded-xl bg-white md:w-80 p-3">
                <div>
                    <img src="{{ asset('image/kustom.png') }}" alt="" class="md:block hidden">
                    <p class="font-bold my-4 text-xl">Kustomisasi</p>
                </div>
                <div>
                    <p>Tim kustom dapat menciptakan desain kustom yang unik dan menarik untuk bisnis Anda.</p>
                </div>
            </div>
            <div class="rounded-xl bg-white md:w-1/2 p-3">
                <div>
                    <img src="{{ asset('image/integrasi.png') }}" alt="" class="md:block hidden">
                    <p class="font-bold my-4 text-xl">Integrasi dengan Aplikasi dan Layanan</p>
                </div>
                <div>
                    <p>Tim kami dapat mengintegrasikan bisnis Anda dengan aplikasi dan layanan lain seperti media
                        sosial, platform email marketing, dan perangkat lunak bisnis. Hal ini memungkinkan Anda
                        untuk meningkatkan efisiensi dan memperluas jangkauan bisnis Anda.</p>
                </div>
            </div>
        </div>
    </div>
</div>
    {{-- end mengapa harus kami --}}

    {{-- Tim --}}
<div class="my-28 ">
    <p class="text-center text-3xl font-bold my-20">Tim Kami</p>
    <div class="flex justify-center gap-7 flex-wrap">
        @foreach ($team as $item)
        <div class="card border  shadow-lg p-4 rounded-md ">
            <div>
                @if ($item->image)
                <img src="{{ asset('storage/'.$item->image) }}" alt="" width="200">
                
                @else
                <img src="{{ asset('image/Avatar.png') }}" alt="" width="200" class="rounded-md">
                    
                @endif
            </div>
            <div class="text-center my-4">
                <p class="text-active font-bold text-2xl">{{ $item->name }}</p>
            </div>
        </div>
        @endforeach
    </div>
</div>
    {{-- end Tim --}}
@endsection