@extends('layouts.templates.home')
@section('content')
    {{-- hero --}}
    <div class="my-20">
        <p class="text-center text-active font-bold md:text-4xl uppercase text-2xl">{{ $category->name }}</p>
        <div class="w-1/2 mx-auto my-10">
            <p class="text-center ">{{ $category->desc }}</p>
        </div>
    </div>
    <div>
        <img src="{{ asset('image/wave.png') }}" alt="">
    </div>
    {{-- end hero --}}
    
    {{-- alur kerja --}}
    @if (count($proses)!=0)
    <div class="my-20">
        <p class="text-center md:text-3xl  font-bold my-20 text-2xl">Proses Layanan</p>
                <div class="border rounded-md md:w-[500px] w-[300px] mx-auto p-3 my-5 border-black shadow-lg">
            <p class="inline md:text-2xl text-xl">1 <span class=" text-active  flex justify-center items-center font-bold">{{ $proses[0]->name }}</span></p>
            <p class="text-center my-4">{{ $proses[0]->desc }}</p>
                </div>
    
                <div class="flex flex-wrap">
                    @if (count($proses) > 2)
                    @foreach ($proses->skip(1) as $alur)
                    {{-- @dd($alur->name) --}}
                    @if (!$loop->last)
                        
                    <div class="border rounded-md md:w-[400px] w-[280px] mx-auto p-3 my-5 border-black shadow-lg">
                        <p class="inline md:text-2xl text-xl">{{ $loop->iteration + 1 }}</p>
                        <p class="text-active flex justify-center items-center font-bold">
                            {{ $alur->name }}
                        </p>
                        <p class="text-center my-4">{{ $alur->desc }}</p>
                    </div>
                    @endif
                    @endforeach
                    @endif
                </div>
                
                <div class="border rounded-md md:w-[500px] w-[300px] mx-auto p-3 my-5 border-black shadow-lg">
                    @if (count($proses) >= 2)
                    <p class="inline md:text-2xl text-xl ">{{ count($proses) }} <span class=" text-active  flex justify-center items-center font-bold">{{ $proses->last()->name}}</span></p>
                    @else
    
                    <p class="inline md:text-2xl text-xl ">{{ count($proses)  }} <span class=" text-active  flex justify-center items-center font-bold">{{ $proses->last()->name}}</span></p>
                    @endif
                    <p class="text-center my-4">{{ $proses->last()->desc }}</p>
                        </div>
            
    </div>
    @endif
    {{-- end alur kerja --}}

    {{-- fitur  --}}
    @if (count($proses) != 0)
    <div>
            <p class="text-center font-bold md:text-3xl text-2xl">Fitur yang anda dapatkan</p>
            <div class="my-20">
                @foreach ($fitur as $fitur)
                    
                <div class="flex bg-active text-white md:w-1/2 w-[80%] mx-auto p-5 rounded-xl gap-8 my-16 shadow-lg">
                    @if ($loop->iteration % 2 == 1)
                    <img src="{{ asset('image/hp.png') }}" alt="" width="200" class="md:block hidden">
               <div class="">
                   <p class="text-2xl font-bold text-center mb-5">{{ $fitur->name }}</p>
                   <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Odit id harum quis eaque ad dolorem nulla neque? Beatae, inventore qui!</p>
                </div>
                @else
                <div class="">
                    <p class="text-2xl font-bold text-center mb-5">{{ $fitur->name }}</p>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Odit id harum quis eaque ad dolorem nulla neque? Beatae, inventore qui!</p>
                </div>
                <img src="{{ asset('image/hp.png') }}" alt="" width="200" class="md:block hidden">
                    @endif
                </div>
                @endforeach
                {{--  --}}
               
            </div>
    </div>  
    @endif
    {{-- end fitur --}}
    

        </div>
    </div>
</div>
    {{-- end harga --}}
@endsection
