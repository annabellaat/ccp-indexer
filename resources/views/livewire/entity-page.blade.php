<div>
    <div class="text-sm sm:text-lg md:text-xl px-20 pt-12 justify-self-center">
        <a href="{{ route('home') }}" class="text-red-800">Home </a>/ <a href="{{ route('browse') }}" class="text-red-800">Browse </a>/ <h class="text-red-800 cursor-default">{{ $entity->title }} </h>
    </div>
    @if(!is_null($entity->collection_id))
    <div class="text-sm sm:text-lg md:text-xl px-20 pt-12 justify-self-center">
        Under the collection <a href="{{ route('collection', ['collection' => $entity->collection, 'slug' => $entity->collection->slug]) }}" class="text-red-800"> {{ $entity->collection->name }} </a>
    </div>
    @endif
    <div class="min-h-screen py-12 grid grid-cols-2">
        <div class="grid-col px-12 w-full">
            <div class="grid place-items-center">
                
            @if(!is_null($entity->image) && $entity->image !== [])
                @if(count($entity->image) > 1)
                <div id="entityCarousel" class="relative w-full flex-auto"  data-te-carousel-init data-te-ride="carousel">
                <!--Carousel indicators-->
                    <div class="absolute -top-5 left-0 right-0 z-40 mx-[15%] mb-4 flex list-none justify-center p-0" data-te-carousel-indicators>
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
                            class="relative float-left -mr-[100%] w-full max-w-full transition-transform duration-[600ms] ease-in-out motion-reduce:transition-none object-fill"
                            data-te-carousel-item
                            data-te-carousel-active>
                            @else
                            <div
                            class="relative float-left -mr-[100%] hidden w-full max-w-full transition-transform duration-[600ms] ease-in-out motion-reduce:transition-none"
                            data-te-carousel-item>
                            @endif

                            <img
                                src="{{ asset('/storage/'.$img) }}"
                                class="block max-w-full m-auto rounded-xl"
                                alt="{{$entity->title}} Image" />
                            </div>
                        @endforeach
                    </div>
                </div>
                @else
                <div class="">
                    <img src="{{ asset('/storage/'.$entity->image[0]) }}" alt="{{$entity->title}} Image" class="min-w-10 min-h-10 h-auto max-w-full rounded-2xl">
                </div>
                @endif
            @else
                <div class="text-lg">
                    <img src="{{ asset('img/ccp-default-big.png') }}" alt="No Image" class="min-w-10 min-h-10 max-h-[300px] rounded-2xl">
                    <!-- No Image Found -->
                </div>
                <p id="no-images">No images in folder</p>
            @endif

            </div>

        </div>
        <div class="grid-col w-full pr-10 md:pr-60 sm:pr-10">
            <div class="text-lg md:text-xl font-bold text-red-800 pb-3">{{ $entity->title }}</div>
            @if($readmore == false)
            <div class="text-sm md:text-md">{{ \Illuminate\Support\Str::words($entity->description, 150, '...') }}  
                @if(str_word_count($entity->description) > 150)
                <span class="text-sky-600 cursor-pointer" wire:click="readMore()">read more</span>
                @endif
            </div>
            @else
            <div class="text-sm md:text-md">{{ $entity->description }}  <span class="text-sky-600 cursor-pointer" wire:click="readMore()">see less</span></div>
            @endif

            <div class="grid grid-cols-4 text-xs sm:text-sm md:text-md">
                <div class="col-span-4 text-lg font-bold text-red-800 py-6">Details</div>
                <div class="font-bold col-span-1 py-1">Date: </div>
                <div class="col-span-3">{{ !is_null($entity->date) ? $entity->date->format('F d, Y') : "-No date given-" }}</div>
                <div class="font-bold col-span-1 py-1">Place: </div>
                <div class="col-span-3">{{ !is_null($entity->place) ? $entity->place : "-No place given-" }}</div>
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
