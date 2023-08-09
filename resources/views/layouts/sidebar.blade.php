<aside
class="compact-nav fixed  left-0 top-0 z-10 w-[calc(3.73rem)] border-r border-active hover:w-56 hover:shadow-2xl h-screen bg-white overflow-hidden group dark:bg-[#001C30] ">

<div class=" flex flex-col justify-between h-full">
    <div>
        <div class="h-16 flex items-center border-b border-active">
            <a href="/" class=" w-max px-2.5 flex items-center gap-6">
                <img src="{{ asset('image/logo.png') }}" alt="" class="inline" width="40">
                <span class="text-xl font-bold dark:text-white">Teknorithm</span>
            </a>
        </div>

        <div class="mt-6">
            <ul class="px-1 -ml-px font-medium tracking-wide space-y-4">
                <li class="w-max font-medium space-y-4 group-hover:w-full">
                    <a href="/dashboard"
                        class="block w-[46px] rounded-full  py-2 group-hover:w-full {{ request()->is('dashboard') ? 'bg-active  text-white dark:bg-white dark:text-active' : 'text-gray-500 hover:bg-active hover:text-white hover:font-bold dark:hover:bg-white dark:hover:text-active dark:hover:font-bold' }}">
                        <div class="w-max flex gap-5 px-3.5 items-center text-xl">
                            <i class="fa-solid fa-house"></i>
                            <span>Dashboard</span>
                        </div>
                    </a>
                </li>
                <li class="w-max group-hover:w-full space-y-4">
                    <a href="/dashboard/layanan"  class="text-gray-500 block w-[46px] rounded-full py-2 group-hover:w-full {{ request()->is('dashboard/layanan*') ? 'bg-active  text-white dark:bg-white dark:text-active' : 'text-gray-500 hover:bg-active hover:text-white hover:font-bold dark:hover:bg-white dark:hover:text-active dark:hover:font-bold' }} ">
                        <div class="flex items-center gap-5  px-2.5 text-xl">
                            <i class="fa-solid fa-gears"></i>
                            <span>
                                Layanan
                            </span>
                        </div>
                    </a>
                </li>
                <li class="w-max group-hover:w-full space-y-4 relative">
                    <a class="text-gray-500 block w-[46px] rounded-full  group-hover:py-2 group-hover:w-full {{ request()->is('dashboard/portofolio*') ? 'bg-active  text-white dark:bg-white dark:text-active font-bold'   : 'text-gray-500 hover:bg-active hover:text-white hover:font-bold dark:hover:bg-white dark:hover:text-active dark:hover:font-bold' }} cursor-pointer" onclick="SideDown(event)">
                        <div class="flex items-center gap-5  px-4 text-xl ">
                            <i class="fa-solid fa-list-check"></i>
                            <span>
                               Portofolio <i
                               class="fa-solid fa-chevron-down text-sm"></i>
                            </span>
                        </div>

                    </a>
                    <ul id="dropdown" class="  mt-2 text-base py-2 rounded-lg bg-white shadow-lg hidden border px-2">
                        @foreach ($layananList as $item)
                             <li>
                            <a href="/dashboard/portofolio/{{ $item->slug }}" class="block px-4 py-2  {{ request()->is('dashboard/portofolio/'. $item->slug)? 'text-active font-bold' : 'hover:bg-gray-200 hover:font-bold hover:text-active hover:rounded-xl' }}"> {{ $item->name }}</a>
                        </li>
                        @endforeach
                       
                    </ul>
                </li>
                <li class="w-max group-hover:w-full space-y-4">
                    <a href="/dashboard/client"  class="text-gray-500 block w-[46px] rounded-full py-2 group-hover:w-full {{ request()->is('dashboard/client*') ? 'bg-active  text-white dark:bg-white dark:text-active' : 'text-gray-500 hover:bg-active hover:text-white hover:font-bold dark:hover:bg-white dark:hover:text-active dark:hover:font-bold' }} ">
                        <div class="flex items-center gap-5  px-2.5 text-xl">
                            <i class="fa-solid fa-users"></i>
                            <span>
                                Client
                            </span>
                        </div>
                    </a>
                </li>
                <li class="w-max group-hover:w-full space-y-4">
                    <a href="{{ route('teams.index') }}"  class="text-gray-500 block w-[46px] rounded-full py-2 group-hover:w-full {{ request()->is('dashboard/teams*') ? 'bg-active  text-white dark:bg-white dark:text-active' : 'text-gray-500 hover:bg-active hover:text-white hover:font-bold dark:hover:bg-white dark:hover:text-active dark:hover:font-bold' }} ">
                        <div class="flex items-center gap-5  px-2.5 text-xl">
                            <i class="fa-solid fa-users"></i>
                            <span>
                                Team
                            </span>
                        </div>
                    </a>
                </li>
               
                <li class="w-max group-hover:w-full space-y-4">
                    <form action="/logout" method="POST" id="formLogout">
                        @csrf
                         <button class="text-gray-500 block hover:group-hover:w-full rounded-full hover:bg-red-700 hover:text-white py-2" id="btn-logout"> 
                
                        <div class="flex items-center gap-5  px-4 text-xl">
                            <i class="fa-solid fa-right-from-bracket"></i>
                            <span >
                                Log out
                            </span>
                        </div>
                    </button>
                    </form>
                   
                </li>

            </ul>
        </div>
    </div>
    <div class="py-4 border-t border-active px-2 ">
        <a href="{{ route('profile.index',['user'=>auth()->user()->username]) }}">
            <div class="flex gap-4 items-center w-max rounded-full">
                @if (auth()->user()->image)
                    
                <img src="{{ asset('storage/'.auth()->user()->image) }}" alt="" class="w-10 h-10 rounded-full">
                @else
                    
                <img src="{{ asset('image/Avatar.png') }}" alt="" class="w-10 h-10 rounded-full">
                @endif
                <div>
                    <h6 class="text-gray-600 font-medium dark:text-active">
                       {{auth()->user()->username}}
                    </h6>
                    <span class="block -mt-0.5 text-xs dark:text-white">{{ auth()->user()->roles->name }}</span>
                </div>
            </div>
        </a>
    </div>
</div>
</aside>