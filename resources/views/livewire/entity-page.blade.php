<div>
    <div class="bg-red-100/50">
        <div class="text-sm sm:text-lg px-4 sm:px-20 py-2 justify-self-start">
            <a href="{{ route('home') }}" class="text-red-800">Home </a>/ <a href="{{ route('browse') }}" class="text-red-800">Browse </a>/ <h class="text-red-800/75 cursor-default">{{ $entity->title }} </h>
        </div>
        @if(!is_null($entity->collection_id))
        <div class="text-sm sm:text-md px-4 sm:px-20 pb-2 justify-self-start font-interlight">
            Under the collection <a href="{{ route('collection', ['collection' => $entity->collection, 'slug' => $entity->collection->slug]) }}" class="text-red-800 text-lg font-inter"> {{ $entity->collection->name }} </a>
        </div>
        @endif
    </div>
    <div class="min-h-screen py-12 grid grid-cols-1 lg:grid-cols-2">
        <div class="grid-col px-12 w-full">
            <div class="grid place-items-center">
                
            @if(!is_null($entity->image) && $entity->image !== [])
                @if(count($entity->image) > 1)
                <div id="entityCarousel" class="relative w-full flex-auto"  data-te-carousel-init data-te-ride="carousel">
                    <!--Carousel indicators-->
                    <div class="absolute -bottom-12 left-0 right-0 z-40 mx-[15%] mb-4 flex list-none justify-center p-0" data-te-carousel-indicators>
                        @foreach($entity->image as $img)
                            @if($loop->iteration == 1)
                                <button
                                type="button"
                                data-te-target="#entityCarousel"
                                data-te-slide-to="{{$loop->iteration - 1}}"
                                data-te-carousel-active
                                class="mx-[3px] box-content h-[10px] w-[10px] md:h-[15px] md:w-[15px] rounded-full flex-initial cursor-pointer border-solid border-transparent bg-yellow-600 p-0 -indent-[999px] opacity-50 transition-opacity duration-[600ms] ease-[cubic-bezier(0.25,0.1,0.25,1.0)] motion-reduce:transition-none"
                                aria-current="true"
                                aria-label="Slide {{$loop->iteration}}"></button>
                            @else
                                <button
                                type="button"
                                data-te-target="#entityCarousel"
                                data-te-slide-to="{{$loop->iteration - 1}}"
                                class="mx-[3px] box-content h-[10px] w-[10px] md:h-[15px] md:w-[15px] rounded-full flex-initial cursor-pointer border-solid border-transparent bg-yellow-600 p-0 -indent-[999px] opacity-50 transition-opacity duration-[600ms] ease-[cubic-bezier(0.25,0.1,0.25,1.0)] motion-reduce:transition-none"
                                aria-label="Slide {{$loop->iteration}}"></button>
                            @endif
                        @endforeach
                    </div>
                    <!-- Carousel items -->
                    <div class="relative flex h-full w-full overflow-hidden after:clear-both after:block after:content-['']">
                        
                        @foreach($entity->image as $img)
                            @if($loop->iteration == 1)
                            <div
                            class="relative float-left -mr-[100%] w-full transition-transform duration-[1000ms] ease-in-out motion-reduce:transition-none items-center h-[300px] lg:h-[550px] rounded-md"
                            data-te-carousel-item
                            data-te-carousel-active>
                            @else
                            <div
                            class="relative float-left -mr-[100%] hidden w-full transition-transform duration-[1000ms] ease-in-out motion-reduce:transition-none items-center h-[300px] lg:h-[550px] rounded-md"
                            data-te-carousel-item>
                            @endif

                            <img
                                src="{{ asset('/storage/'.$img) }}"
                                class="block h-full w-auto m-auto rounded-md object-cover"
                                alt="{{$entity->title}} Image" />
                            </div>
                        @endforeach
                    </div>
                </div>
                @else
                <div class="shadow-lg items-center h-[300px] lg:h-[550px] rounded-md bg-slate-900">
                    <img src="{{ asset('/storage/'.$entity->image[0]) }}" alt="{{$entity->title}} Image" class="h-full w-auto rounded-md object-cover">
                </div>
                @endif
            @else
                <div class="h-[300px] lg:h-[550px]">
                    <img src="{{ asset('img/ccp-default-big.png') }}" alt="No Image" class="h-full rounded-2xl object-contain">
                    <!-- No Image Found -->
                </div>
                <p id="no-images" class="italic">No images in folder</p>
            @endif

            </div>

        </div>
        <div class="grid-col w-full pt-8 lg:pt-0 pl-10 md:pl-[10%] md:pr-[10%] lg:pl-0 pr-10 lg:pr-48 sm:pr-10 cursor-default">
            <div class="text-xl md:text-2xl font-bold text-red-800 pb-3">{{ $entity->title }}</div>
            @if($readmore == false)
            <div class="text-sm md:text-md max-h-[220px] overscroll-contain overflow-y-auto">{{ \Illuminate\Support\Str::words($entity->description, 150, '...') }}  
                @if(str_word_count($entity->description) > 150)
                <span class="text-sky-600 cursor-pointer" wire:click="readMore()">read more</span>
                @endif
            </div>
            @else
            <div class="text-sm md:text-md max-h-[220px] overscroll-contain overflow-y-auto">{{ $entity->description }}  <span class="text-sky-600 cursor-pointer" wire:click="readMore()">see less</span></div>
            @endif
            
            <div class="col-span-1 pt-4 text-xs">
                <span class="font-bold">Tags:</span> 
                    @if(!$entity->tags->isEmpty())
                        @foreach($entity->tags as $tag)
                            <span wire:click="goSearch('[{{$tag->name}}]')" class="text-slate-600 font-interbold bg-sky-200/50 rounded-md px-1 py-1 mr-1 hover:bg-sky-300/50 cursor-pointer">
                                {{ $tag->name }}
                            </span>
                        @endforeach
                    @else
                    <span class="text-rose-700">
                        No Tags Input
                    </span>
                    @endif
            </div>
            <div class="grid grid-cols-4 text-xs sm:text-sm">
                <div class="col-span-4 text-lg font-bold text-red-800 pt-4 pb-1">Details</div>
                <div class="font-bold col-span-1 py-1">Date: </div>
                <div class="col-span-3">{{ !is_null($entity->date) ? $entity->date->format('M d, Y') : "-No date given-" }}</div>
                <div class="font-bold col-span-1 py-1">Place: </div>
                <div class="col-span-3">{{ !is_null($entity->place) ? $entity->place : "-No place given-" }}</div>
                <div class="font-bold col-span-1 py-1">Material: </div>
                <div class="col-span-3">{{ $entity->material }}</div>
                <div class="font-bold col-span-1 py-1">Category: </div>
                @if($entity->category == 'Arts Eduction')
                <div class="col-span-3">Arts Education</div>
                @else
                <div class="col-span-3">{{ $entity->category }}</div>
                @endif
                
                @foreach($columns as $col)
                    @if($entity->$col)
                    <div class="font-bold col-span-1 py-1">{{ucwords(str_replace("_"," ",$col))}}: </div>
                    <div class="col-span-3 py-1">{{ $entity->$col }}</div>
                    @endif
                @endforeach

                @if($entity->open_access_link)
                <div class="col-span-3 mt-20">
                    <a href="{{ $entity->open_access_link }}" target="_blank" class="rounded-full font-bold text-xl text-gray-800 bg-[#d4ab1a] mx-4 px-2 text-xs md:text-lg lg:text-xl md:px-2 lg:px-8 py-3 hover:text-black hover:bg-amber-400 text-nowrap">Access Here</a>
                </div>
                @else
                <div class="col-span-3 mt-20">
                    <a href="{{ route('request', $entity) }}" class="rounded-full font-bold text-xl text-gray-800 bg-[#d4ab1a] mx-4 px-2 text-xs md:text-lg lg:text-xl md:px-2 lg:px-8 py-3 hover:text-black hover:bg-amber-400 text-nowrap">Request Access</a>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
