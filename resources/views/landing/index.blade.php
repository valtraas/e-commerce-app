@extends('layouts.templates.home')
@section('content')
      <!-- Hero -->
      <div class="md:flex md:justify-between items-center pt-10 px-5 z-50">
        <div class="md:w-1/2 p-5">
            <p class="md:text-xl text-active  font-bold">Selamat datang di Teknorithm</p>
            <p class="md:text-2xl my-5">Kami siap bekerja sama dalam membangun bisnis yang sedang anda jalankan
                menjadi lebih berkembang dan lebih dikenal oleh masyarakat luas.</p>
                @auth
                    
                <a href="/dashboard"
                    class="block bg-active px-4 py-2 rounded-md w-40 text-white text-center hover:font-bold hover:bg-green-700">Dashboard</a>
@else

<a href="/kontak"
    class="block bg-active px-4 py-2 rounded-md w-40 text-white text-center hover:font-bold hover:bg-green-700">Hubungi
    Kami</a>
                @endauth
        </div>
        <div class="">
            <img src="{{ asset('image/hero.png') }}" alt="" class="md:block hidden">
        </div>
        </div>
    <!-- End Hero -->
    <div class="w-12 rounded-full mx-auto text-white font-bold text-xl bg-active text-center p-2 my-20 animate-bounce">
        <i class="fa-solid fa-arrow-down"></i>
    </div>
    <div class="my-20">
        <img src="{{ asset('image/wave.png') }}" alt="">
    </div>
    <!-- Portofolio -->
    <div>
        <p class="text-center text-3xl font-bold mb-20">Portofolio</p>
        @if (count($portofolio) > 0)
        <div class="grid place-content-center grid-cols-2 items-center gap-4 p-3 md:p-0">
                 @foreach ($portofolio as $item)
            
                
            <div class="card mx-auto">
                <div class="card-image">
                    @if ($item->image)
                    <img src="{{ asset('storage/'.$item->image) }}" alt="" class="mx-auto">
                    @endif
                </div>
                <div class="card-text text-center font-bold my-5 md:px-20">
                    <p class="md:text-xl font-bold">{{ $item->judul }}</p>
                    <p class="text-xs md:text-sm text-active ">{{ $item->category->name }}</p>
                </div>
            </div>
            @endforeach
            
        </div>
        <div class="mx-auto w-52 mt-10 mb-16">
            <a href="/portofolio/all"
                class="border border-active px-4 py-2 text-center hover:bg-active hover:text-white hover:font-bold rounded-md duration-150">Lihat
                Selengkapnya</a>
        </div>
        
    </div>
    @else
        <p class="text-2xl text-center mb-20">Tidak ada portofolio yang di temukan</p>
    @endif
    <!-- End Portofolio -->
    <!-- Keunggulan -->
    <div class="bg-active p-4">
        <p class="text-center text-xl md:text-3xl text-white mt-10 mb-16 font-bold">Keunggulan Kami</p>
        <div class="flex justify-center items-center gap-8 font-bold md:text-2xl text-white text-xl">
            <div>
                <p class="text-center"><span id="count" class="text-2xl">0</span>+</p>
                <p>Projects</p>
            </div>
            <div>
                <p class="text-center"><span id="count2" class="text-2xl">0</span>+</p>
                <p>Client</p>
            </div>
            <div>
                <p class="text-center"><span id="count3" class="text-2xl">0</span>+</p>
                <p>Ulasan</p>
            </div>
        </div>
        
        <div class="flex flex-wrap my-16 justify-center gap-10 ">
            <div class="rounded-xl bg-white md:w-1/2 p-3 group">
                <div>
                    <img src="./image/pengalaman.png" alt="">
                    <p class="font-bold my-4 text-xl group-hover:text-active duration-200 group-hover:font-extrabold">Pengalaman dan keahlian</p>
                </div>
                <div>
                    <p>Tim kami telah memiliki pengalaman yang luas dalam membangun bisnis digital untuk berbagai
                        klien di berbagai industri</p>
                </div>
            </div>
            <div class="rounded-xl bg-white md:w-80 p-3 group">
                <div>
                    <img src="./image/harga.png" alt="">
                    <p class="font-bold my-4 text-xl group-hover:text-active duration-200 group-hover:font-extrabold">Harga yang bersaing</p>
                </div>
                <div>
                    <p>Anda dapat mendapatkan harga yang kompetitif dan terjangkau untuk layanan yang kami tawarkan
                    </p>
                </div>
            </div>
            <div class="rounded-xl bg-white md:w-80 p-3 group">
                <div>
                    <img src="./image/kustom.png" alt="">
                    <p class="font-bold my-4 text-xl group-hover:text-active duration-200 group-hover:font-bold">Kustomisasi</p>
                </div>
                <div>
                    <p>Tim kustom dapat menciptakan desain kustom yang unik dan menarik untuk bisnis Anda.</p>
                </div>
            </div>
            <div class="rounded-xl bg-white md:w-1/2 p-3 group">
                <div>
                    <img src="./image/integrasi.png" alt="">
                    <p class="font-bold my-4 text-xl group-hover:text-active duration-200 group-hover:font-bold">Integrasi dengan Aplikasi dan Layanan</p>
                </div>
                <div>
                    <p>Tim kami dapat mengintegrasikan bisnis Anda dengan aplikasi dan layanan lain seperti media
                        sosial, platform email marketing, dan perangkat lunak bisnis. Hal ini memungkinkan Anda
                        untuk meningkatkan efisiensi dan memperluas jangkauan bisnis Anda.</p>
                </div>
            </div>
        </div>
    </div>
    <!-- End Keunggulan -->
    <!-- Alur Kerja -->
    <div>
        <p class="text-center font-bold md:text-3xl my-10 mb-16 text-xl">Bagaimana Kami Bekerja</p>
        <div class="flex items-center justify-center gap-6 flex-wrap">
            <div class="card border border-black p-6 w-64 rounded-md">
                <div class="card-image my-5">
                    <img src="./image/consultasion.png" alt="" class="my-7">
                    <p class="text-center text-xl font-bold">Consultation</p>
                </div>
                <div class="card-body">
                    <p>Dalam tahap ini, Kami akan bertemu dengan klien untuk membahas kebutuhan dan pengumpulan
                        informasi.</p>
                </div>
            </div>
            <div class="md:inline hidden">
                <i class="fa-sharp fa-solid fa-arrow-right text-2xl "></i>
            </div>

            <div class="card border border-black p-6 w-64 rounded-md">
                <div class="card-image my-5">
                    <img src="./image/analisis.png" alt="" class="my-7">
                    <p class="text-center text-xl font-bold">Analisis</p>
                </div>
                <div class="card-body">
                    <p>Tahap yang kedua ini kami akan menganalisis kebutuhan, informasi dan persyaratan yang anda
                        berikan sampai ada kesepakatan bersama.</p>
                </div>
            </div>
            <div class="md:inline hidden">
                <i class="fa-sharp fa-solid fa-arrow-right text-2xl "></i>
            </div>
            <div class="card border border-black p-6 w-64 rounded-md">
                <div class="card-image my-5">
                    <img src="./image/develop.png" alt="" class="my-7">
                    <p class="text-center text-xl font-bold">Development</p>
                </div>
                <div class="card-body">
                    <p>Tahap yang terakhir kami akan mulai mengerjakan setelah menganalisis kebutuhan dan informasi
                        yang telah di sepakati.</p>
                </div>
            </div>
        </div>
    </div>
    <!-- End Alur Kerja -->
    <!-- Layanan -->
    <div class="bg-active my-16 p-6">
        <div class="pt-8 mb-16">
            <p class="md:text-3xl text-center font-bold text-white text-xl"> Layanan Kami</p>
        </div>
        <div class="flex justify-center items-center gap-16 mb-16 flex-wrap">
            @foreach ($layanan as $item)
                
            <div class="card bg-white p-3 rounded-md w-64 h-[520px] flex flex-col justify-between ">
                <div class="card-image">
                    <img src="{{ asset('storage/'.$item->image) }}" alt="" class="my-7 w-40 mx-auto">
                    <p class="text-center md:text-2xl font-bold text-xl">{{ $item->name }}</p>
                </div>
                    <p class="text-center mb-10 mt-7">{{$item->desc}}
                    </p>
                    <a href="/layanan/{{ $item->slug }}"
                        class="text-center px-4 py-2 rounded-xl border border-active hover:bg-active hover:text-white hover:font-bold flex justify-center duration-150">
                        Selengkapnya</a>

            </div>
            @endforeach

            

        </div>
    </div>
    <!-- end layanan -->
    <!-- Ulasan -->
    <div>
        <p class="text-center md:text-3xl font-bold text-xl">Bagaimana Ulasan Mereka Tentang kami</p>

        <div class="w-[70%] mx-auto my-20">

            <div class="mb-16 md:block hidden">
                <img src="./image/quote1.png" alt="">
            </div>
            @if (count($ulasan) > 1)
             <div class="md:flex gap-10 items-center justify-between">
                <div class="md:inline-block hidden">
                    <button id="previous"><i class="fa-solid fa-circle-arrow-left text-4xl "
                            style="color: #2ACC02;"></i></button>
                </div>
                <div class="carousel ">
                    @foreach ($ulasan as $item)
                       <div>
                        <p>{{$item->ulasan}}</p>

                        <div class="mt-12">
                            <div class="flex items-center justify-center gap-4 ">
                                <hr class="p-0.5 w-32 bg-black">
                                <p>{{ $item->kontak->name }}</p>
                                <hr class="bg-black p-0.5 w-32">
                            </div>
                            
                        </div>
                    </div> 
                    @endforeach
                    
                  
                </div>
                <div class="flex justify-center gap-10 my-10 md:hidden">
                    <div>
                        <button id="previous-mobile"><i class="fa-solid fa-circle-arrow-left text-4xl "
                                style="color: #2ACC02;"></i></button>
                    </div>
                    <div>
                        <button id="next-mobile"><i class="fa-solid fa-circle-arrow-right text-4xl"
                                style="color: #2ACC02;"></i></button>
                    </div>
                </div>
                <div class="md:inline-block hidden">
                    <button id="next"><i class="fa-solid fa-circle-arrow-right text-4xl"
                            style="color: #2ACC02;"></i></button>
                </div>

            </div>
            @else
            <div class="md:flex gap-10 items-center justify-center">
                
                <div class="carousel ">
                    @foreach ($ulasan as $item)
                       <div>
                        <p>{{$item->ulasan}}</p>

                        <div class="mt-12">
                            <div class="flex items-center justify-center gap-4 ">
                                <hr class="p-0.5 w-32 bg-black">
                                <p>{{ $item->kontak->name }}</p>
                                <hr class="bg-black p-0.5 w-32">
                            </div>
                            
                        </div>
                    </div> 
                    @endforeach
                </div>
            </div>
            @endif
           
            <div class="mt-14 md:flex justify-end hidden">
                <img src="./image/quote2.png" alt="" class="">
            </div>
        </div>
    </div>
    <!-- End Ulasan -->
@endsection

@section('js')
<script>
    
    // JavaScript
    document.addEventListener("DOMContentLoaded", function () {
        const carouselContainer = document.querySelector(".carousel");
        const carouselItems = carouselContainer.children;
        const totalItems = carouselItems.length;
        let currentItem = 0;

        function showItem(index) {
            for (let i = 0; i < totalItems; i++) {
                carouselItems[i].classList.add("hidden");
            }
            carouselItems[index].classList.remove("hidden");
        }

        function nextItem() {
            currentItem = (currentItem + 1) % totalItems;
            showItem(currentItem);
        }

        function previousItem() {
            currentItem = (currentItem - 1 + totalItems) % totalItems;
            showItem(currentItem);
        }

        // Initial item display
        showItem(currentItem);

        // Event listeners for next and previous buttons
        const nextButton = document.getElementById("next");
        // console.log(nextButton);
        nextButton.addEventListener("click", nextItem);

        const previousButton = document.getElementById("previous");
        // console.log(previousButton);
        previousButton.addEventListener("click", previousItem);

        // mobile

        const nextM = document.getElementById('next-mobile')
        nextM.addEventListener('click', nextItem);

        const previousM = document.getElementById("previous-mobile");
        // console.log(previousButton);
        previousM.addEventListener("click", previousItem);
    });

    window.addEventListener('scroll', function () {
        const up = document.getElementById('up-button');
        if (window.scrollY > 200) {
            up.classList.remove('hidden')
        } else {
            up.classList.add('hidden')
        }
    })

    function animateCount(element, target, duration) {
        const range = target - 0;
        const increment = target > 0 ? 1 : -1;
        const stepTime = Math.abs(Math.floor(duration / range));
        let count = 0;
        const timer = setInterval(() => {
            count += increment;
            element.innerHTML = count;
            element.parentElement.classList.add("counting");
            if (count === target) {
                element.parentElement.classList.remove("counting");
                clearInterval(timer);
            }
        }, stepTime);
    }

    function animateCountOnScroll(element, target, duration) {
        const observer = new IntersectionObserver((entries) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    animateCount(element, target, duration);
                    observer.unobserve(element);
                }
            });
        });

        observer.observe(element);
    }

    function startCountAnimation() {
        const countElement = document.getElementById("count");
        const countElement2 = document.getElementById("count2");
        const countElement3 = document.getElementById("count3");
        const targetCount = 30;

        animateCountOnScroll(countElement, targetCount, 3000);
        animateCountOnScroll(countElement2, targetCount, 3000);
        animateCountOnScroll(countElement3, targetCount, 3000);
    }

    // Execute when the document is fully loaded
    document.addEventListener("DOMContentLoaded", startCountAnimation);
</script>
@endsection