@extends('layouts.app ')
@push('styles')
    <link
      rel="stylesheet"
      href="https://unpkg.com/swiper/swiper-bundle.min.css"
    />
    <style>

    </style>
@endpush

@section('content')
<div class="w-full text-white">
    <!-- search -->
    <div class="justify-content-center bg-red-200 h-max" id="search">
        <div class="h-max lg:h-[600px] bg-black">
            <div id="carouselExampleIndicators" class="relative h-full flex-auto" data-te-carousel-init data-te-ride="carousel">
                <!--Carousel indicators-->
                @if(count($banners) > 1)
                <div class="absolute bottom-[5%] left-0 right-0 z-40 mx-[15%] mb-4 flex list-none justify-center p-0" data-te-carousel-indicators>
                    @for($i = 0 ; $i < count($banners); $i++)
                        <button
                        type="button"
                        data-te-target="#carouselExampleIndicators"
                        data-te-slide-to="{{$i}}"
                        data-te-carousel-active
                        class="mx-[3px] box-content h-[10px] w-[10px] md:h-[15px] md:w-[15px] rounded-full flex-initial cursor-pointer border-solid border-transparent bg-white p-0 -indent-[999px] opacity-50 transition-opacity duration-[600ms] ease-[cubic-bezier(0.25,0.1,0.25,1.0)] motion-reduce:transition-none"
                        aria-current="true"
                        aria-label="Slide {{$i+1}}"></button>
                    @endfor
                </div>
                @endif

                <!--Carousel items-->
                <div class="relative flex h-full w-full overflow-hidden after:clear-both after:block after:content-['']">
                    @foreach($banners as $ban)
                        @if($loop->first)
                        <div
                        class="relative float-left -mr-[100%] w-screen transition-transform duration-[900ms] ease-in-out motion-reduce:transition-none"
                        data-te-carousel-item
                        data-te-carousel-active>
                        @else
                        <div
                        class="relative float-left -mr-[100%] hidden w-full transition-transform duration-[900ms] ease-in-out motion-reduce:transition-none"
                        data-te-carousel-item>
                        @endif
                            @if($ban->title != null && $ban->description != null)
                            <div class="z-30 absolute bottom-20 ml-[10%] w-fit bg-gray-800 bg-opacity-45 px-10 py-5">
                                <p class="text-[#d4ab1a] font-interbold text-lg sm:text-2xl md:text-3xl lg:text-4xl mb-4">{{$ban->title}}</p>
                                <p class="text-gray-200 text-xs sm:text-lg md:text-xl mb-4 font-interlight">{{$ban->description}}</p>
                            </div>
                            @endif
                            @if($ban->entity_id != null)
                            <a href="{{ route('entity', ['entity' => $ban->entity_id]) }}">
                            <img
                                src="{{asset('storage')}}/{{$ban->image}}"
                                class="block flex h-full w-auto m-auto"
                                alt="Slide {{$loop->iteration}}" />
                            </a>
                            @else
                            <img
                                src="{{asset('storage')}}/{{$ban->image}}"
                                class="block flex h-full w-auto m-auto"
                                alt="Slide {{$loop->iteration}}" />
                            @endif
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="bg-gray-300 w-full h-72 md:h-36 grid grid-cols-1 md:grid-cols-2 justify-center items-center px-2 font-interbold">
            <div class="grid-col justify-self-center md:justify-self-end px-5 md:px-5 h-1/3 md:h-fit">
                <p class="text-slate-800 text-xl sm:text-2xl lg:3xl">Now digitized and <br class="block sm:hidden"> made accessible <br class="block md:hidden">for your discovery.</p>
            </div>
            <!-- <div class="grid-col justify-self-center md:justify-self-start grid grid-cols-1 sm:grid-cols-2 gap-8 md:gap-2 h-1/2 md:h-fit pb-20 md:pb-0"> -->
            <div class="justify-self-center md:justify-self-start pb-2 md:pb-0 md:pl-16">
                <div class="grid-col hover:-translate-y-1 hover:scale-105 duration-150">
                    <a href="{{ route('browse') }}" class="rounded-full text-lg text-gray-800 bg-[#d4ab1a] mx-4 px-6 md:text-lg lg:text-xl md:px-24 py-3 hover:text-black  text-nowrap">Browse collections</a>
                    <!-- <a href="{{ route('browse') }}" class="rounded-full text-xl text-gray-800 bg-[#d4ab1a] mx-4 px-8 md:text-lg lg:text-xl md:px-2 lg:px-8 py-3 hover:text-black hover:bg-amber-400 text-nowrap">Browse collections</a> -->
                </div>
                <!-- <div class="grid-col">
                    <a href="#" class="rounded-full text-xl text-gray-800 bg-gray-100 mx-4 px-24 md:text-lg lg:text-xl md:px-8 lg:px-24 py-3 hover:text-black hover:bg-amber-400 text-nowrap">Log In</a>
                </div> -->
            </div>
        </div>

    </div>



    <!-- allegories -->
    <div class="bg-white h-full justify-center relative min-h-svh" id="showcase">
          @livewire('hometabs')

        <div class="w-full flex justify-center mt-1">
            <div class="w-5/6 sm:w-4/5 md:w-3/5 lg:w-2/5 place-content-center mb-10">
                <div class="my-10 h-1 w-900px border-black bg-slate-900 rounded-full"></div>
                <div class="px-2">
                    <div class="w-auto text-2xl text-[#d4ab1a] mb-4 font-interbold">
                        About the Digital Archives
                    </div>
                    <div class="w-auto text-lg text-slate-800 mb-8 text-justify">
                        The CCP Digital Archives is a catalog of the center’s
                        materials and resources. It aims to share thousands of
                        works produced by the CCP since its opening in 1969.
                        Comprised of videos, photos, publications, and
                        documents, users can search the growing archive, view
                        exhibitions, and request access to materials.
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- request -->
    <!-- <div class="bg-cover h-screen justify-center bg-center" id="request" style="background-image: url('{{asset('img/request.jpg')}}')   ">
        <div class="h-full w-full pl-10 sm:pl-[20vw] pt-[43vh]">
            <div class="container w-fit h-min">
                <p class="text-2xl md:text-4xl mb-4">Access the collections by <br> filling out a five-step form</p>
                <a href="#" class="rounded text-md text-gray-800 bg-slate-300 px-3 py-1 hover:text-white hover:bg-slate-500">REQUEST</a>
            </div>
        </div>
    </div> -->

</div>
@endsection
