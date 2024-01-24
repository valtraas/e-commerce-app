<footer>
    <div>
        <img src="{{ asset('image/wave2.png') }}" alt="" class="min-w-full">
    </div>
    <div>
        <div class="bg-footer">
            <div class="rounded-full">
                <img src="{{ asset('image/logo.png') }}" alt="" class="rounded-full mx-auto py-10" width="100">
                <p class="text-white text-2xl font-bold text-center my-5">Teknorithm</p>
                <div class="my-5">
                    <ul class="flex justify-center text-3xl gap-8 text-white">
                        <li>
                            <a href=""> <i class="fa-brands fa-facebook hover:text-blue-600 duration-300"></i></a>
                        </li>
                        <li>
                            <a href=""><i class="fa-brands fa-x-twitter hover:text-black duration-300"></i></a>
                        </li>
                        <li>
                            <a href=""><i class="fa-brands fa-linkedin hover:text-blue-500 duration-300"></i></a>
                        </li>
                        <li>
                            <a href=""><i class="fa-brands fa-instagram hover:text-rose-600  duration-300"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
            <hr class="p-0.5 bg-white w-[80%] mx-auto ">
            <div class="w-[76%] mx-auto py-8">
                <div class="mt-6 md:flex justify-between items-center px-6 flex-wrap">
                    <div>
                        <ul class="text-white text-xl md:inline-block flex flex-wrap gap-5 justify-center ">
                            <li class="mb-5">
                                <a href="/" class="{{ request()->is('/') ?'font-bold' : 'hover:font-bold font-light' }}">Home</a>
                            </li>
                            <li class="mb-5">
                                <a href="/portofolio/all" class="{{ request()->is('portofolio*') ?'font-bold' : 'hover:font-bold font-light' }}">Portofolio</a>
                            </li>
                            <li class="mb-5">
                                <p class="{{ request()->is('layanan*') ? 'font-bold':'hover:font-bold duration-150 font-light' }} cursor-pointer" onclick="dropdownFooter(event)">Layanan <i
                                    class="fa-solid fa-chevron-down text-sm"></i></p>
                                {{-- opsi --}}
                                <ul id="dropdown-footer" class="  mt-2 text-base py-2 rounded-lg bg-white shadow-lg hidden">
                                    @foreach ($layanan as $item)
                                    <li>
                                        <a href="/layanan/{{ $item->slug }}" class="block px-4 py-2  {{ request()->is('layanan/'.$item->slug) ?'text-active font-bold' :'hover:bg-gray-200 hover:text-active hover:font-bold text-black' }}">{{ $item->name }}</a>
                                    </li>
                                        
                                    @endforeach
                                </ul>
                            </li>
                            <li class="mb-5">
                                <a href="/tentang-kami" class="{{ request()->is('tentang-kami') ?'font-bold' : 'hover:font-bold font-light' }}">About</a>
                            </li>
                            <li class="mb-5">
                                <a href="/kontak" class="{{ request()->is('kontak') ?'font-bold' : 'hover:font-bold font-light' }}">Kontak</a>
                            </li>
                        </ul>
                    </div>
                    <div class="md:w-1/2 mt-20 md:mt-0">
                        <ul class="text-white md:text-xl">
                            <li class="flex">
                                <div>
                                    <i class="fa-solid fa-location-dot mx-5"></i>
                                </div>
                                <p>
                                   Jl. Soekarno-Hatta No.107, Yoyakarta
                                </p>

                            </li>
                            <li class="my-10 flex">
                                <div>
                                    <i class="fa-solid fa-phone mx-5"></i>
                                </div>
                                <p> +62 0808-0808-0808</p>

                            </li>
                            <li class="flex">
                                <div>
                                    <i class="fa-solid fa-envelope mx-5"></i>
                                </div>
                                <p>Teknorithm@gmail.com</p>

                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-slate-900">
            <p class="text-white text-center">&copy; Copyright 2023 Teknorithm</p>
        </div>
    </div>
</footer>
