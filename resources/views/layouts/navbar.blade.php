<nav class="justify-between shadow-md p-6 md:flex md:items-center md:justify-between bg-transparent">
    <div class="flex justify-between items-centers">
        <span><img src="{{ asset('image/logo.png') }}" alt="" width="40" class="inline">
            <a href="#" class="inline font-semibold">Teknorithm</a>
        </span>
        <span class="text-2xl md:hidden block cursor-pointer ">
            <ion-icon name="menu" onclick="burger(this)"></ion-icon>
        </span>
    </div>
    <div>
        <ul
            class="md:flex md:gap-4 md:items-center md:static absolute left-0 w-full bg-white p-4  md:py-0 md:opacity-100 opacity-0  transition-all ease-in shadow-md md:shadow-none text-xl -z-10">
            <li class="my-5 md:my-0">
                <a href="/" class="{{ request()->is('/') ? 'text-active font-bold':'hover:text-active hover:font-bold duration-150' }}">Home</a>
            </li>
            <li class="my-5 md:my-0">
                <a href="/portofolio/all" class="{{ request()->is('portofolio*') ? 'text-active font-bold':'hover:text-active hover:font-bold duration-150' }}">Portofolio</a>
            </li>
            <li class="my-5 md:my-0 relative">
                <p class="{{ request()->is('layanan*') ? 'text-active font-bold':'hover:text-active hover:font-bold duration-150' }} cursor-pointer" onclick="toggleDropdown(event)">Layanan <i
                    class="fa-solid fa-chevron-down text-sm"></i></p>
                {{-- opsi --}}
                <ul id="dropdown" class="md:absolute  mt-2 text-base py-2 rounded-lg bg-white shadow-lg hidden">
                    @foreach ($layanan as $item)
                    <li>
                        <a href="/layanan/{{ $item->slug }}" class="block px-4 py-2  {{ request()->is('layanan/'.$item->slug) ?'text-active font-bold' :'hover:bg-gray-200 hover:text-active hover:font-bold' }}">{{ $item->name }}</a>
                    </li>
                        
                    @endforeach
                </ul>
            </li>
            <li class="my-5 md:my-0">
                <a href="/tentang-kami" class=" {{ request()->is('tentang-kami') ? 'text-active font-bold' : 'hover:text-active hover:font-bold duration-150' }}">Tentang</a>
            </li>
            <li class="my-5 md:my-0">
                <a href="/kontak"
                    class=" px-2 py-1 rounded-md {{ request()->is('kontak') ? 'text-active font-bold' : 'bg-active text-white hover:bg-green-700 hover:font-bold ' }}">Kontak</a>
            </li>

               
            @can('admin')
                <li class="my-5 md:my-0">
                    <form action="/logout" method="post">
                        @csrf
                        <!-- Tombol login hanya ditampilkan jika pengguna dengan is_admin yang bernilai true -->
                        <button class="px-2 py-1 rounded-md bg-red-700 text-white hover:bg-green-700 hover:font-bold">logout</button>
                    </form>
                </li>
            @endcan
                    

        </ul>
    </div>
</nav>