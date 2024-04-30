<div>
    <div class="h-max py-24 grid grid-cols-2">
        <div class="text-xl col-span-2 pb-6 w-3/4 justify-self-center">
            <a href="{{ route('home') }}" class="text-red-800">Home </a>/ <a href="{{ route('browse') }}" class="text-red-800">Browse </a>/ <h class="text-red-800">{{ $entity->title }} </h>
        </div>
        <div class="grid-col px-12 w-full">
            <div class="grid place-items-center">
                
            @if(!is_null($entity->image))
                <div id="default-carousel" class="relative w-full" data-carousel="slide">
                    <!-- Carousel wrapper -->
                    <div class="relative h-56 overflow-hidden rounded-lg md:h-96">
                        <!-- Item 1 -->
                        <div class="hidden duration-700 ease-in-out" data-carousel-item>
                            <img src="/docs/images/carousel/carousel-1.svg" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                        </div>
                        <!-- Item 2 -->
                        <div class="hidden duration-700 ease-in-out" data-carousel-item>
                            <img src="/docs/images/carousel/carousel-2.svg" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                        </div>
                        <!-- Item 3 -->
                        <div class="hidden duration-700 ease-in-out" data-carousel-item>
                            <img src="/docs/images/carousel/carousel-3.svg" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                        </div>
                        <!-- Item 4 -->
                        <div class="hidden duration-700 ease-in-out" data-carousel-item>
                            <img src="/docs/images/carousel/carousel-4.svg" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                        </div>
                        <!-- Item 5 -->
                        <div class="hidden duration-700 ease-in-out" data-carousel-item>
                            <img src="/docs/images/carousel/carousel-5.svg" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                        </div>
                    </div>
                    <!-- Slider indicators -->
                    <div class="absolute z-30 flex -translate-x-1/2 bottom-5 left-1/2 space-x-3 rtl:space-x-reverse">
                        <button type="button" class="w-3 h-3 rounded-full" aria-current="true" aria-label="Slide 1" data-carousel-slide-to="0"></button>
                        <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 2" data-carousel-slide-to="1"></button>
                        <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 3" data-carousel-slide-to="2"></button>
                        <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 4" data-carousel-slide-to="3"></button>
                        <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 5" data-carousel-slide-to="4"></button>
                    </div>
                    <!-- Slider controls -->
                    <button type="button" class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev>
                        <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                            <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4"/>
                            </svg>
                            <span class="sr-only">Previous</span>
                        </span>
                    </button>
                    <button type="button" class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next>
                        <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                            <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                            </svg>
                            <span class="sr-only">Next</span>
                        </span>
                    </button>
                </div>
                @foreach($entity->image as $img)
                <div class="">
                    <img src="{{ asset('/storage/'.$img) }}" alt="{{$entity->title}} Image" class="min-w-10 min-h-10 h-auto max-w-full rounded-2xl">
                </div>
                @endforeach
                </div>
            @else
                <div class="text-lg">
                    <img src="{{ asset('img/ccp-default-big.png') }}" alt="Featured Image" class="min-w-10 min-h-10 max-h-[300px] rounded-2xl">
                    <!-- No Image Found -->
                </div>
                <p id="no-images">No images in folder</p>
            @endif

            </div>

        </div>
        <div class="grid-col w-3/4">
            <div class="text-lg md:text-xl font-bold text-red-800 pb-3">{{ $entity->title }}</div>
            <div class="text-sm md:text-md">{{ $entity->description }}</div>

            <div class="grid grid-cols-4 text-sm md:text-md">
                <div class="col-span-4 text-lg font-bold text-red-800 py-6">Details</div>
                <div class="font-bold col-span-1 py-1">Date: </div>
                <div class="col-span-3">{{ $entity->date->format('F d, Y') }}</div>
                <div class="font-bold col-span-1 py-1">Place: </div>
                <div class="col-span-3">{{ $entity->place }}</div>
                <div class="font-bold col-span-1 py-1">Material: </div>
                <div class="col-span-3">{{ $entity->material }}</div>
                <div class="font-bold col-span-1 py-1">Category: </div>
                <div class="col-span-3">{{ $entity->category }}</div>
                <div class="font-bold col-span-1 py-1">Tag: </div>
                <div class="col-span-3">
                    @if(!$entity->tags->isEmpty())
                        @foreach($entity->tags as $tag)   
                            {{ $tag->name }}{{ $loop->last ? '' : ',' }}
                        @endforeach
                    @else
                        No Tags Input
                    @endif
                </div>
                <div class="col-span-3 mt-20">
                    <a href="{{ route('browse') }}" class="rounded-full font-bold text-xl text-gray-800 bg-[#d4ab1a] mx-4 px-2 text-xs md:text-lg lg:text-xl md:px-2 lg:px-8 py-3 hover:text-black hover:bg-amber-400 text-nowrap">Request Access</a>
                </div>
            </div>
        </div>
    </div>
</div>
