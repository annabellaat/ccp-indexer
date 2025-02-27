<div>
    <div class="bg-red-100/75">
        <div class="text-sm sm:text-lg px-4 sm:px-20 py-2 justify-self-start">
            <a href="{{ route('home') }}" class="text-red-800">Home </a>/ <a href="{{ route('browse') }}" class="text-red-800">Browse </a>/ <h class="text-red-800/70 cursor-default">{{ $collection->name }} </h>
        </div>
        @if(!is_null($collection->collection_id))
        <div class="text-sm sm:text-md px-4 sm:px-20 pb-2 justify-self-start font-interlight">
            Under the collection <a href="{{ route('collection', ['collection' => $collection->collection, 'slug' => $collection->collection->slug]) }}" class="text-red-800 text-lg font-inter"> {{ $collection->collection->name }} </a>
        </div>
        @endif
    </div>
    <div class="container min-h-screen px-10 py-4 md:py-12 min-w-full flex flex-col items-center">
        <div class="">
            @if(!is_null($collection->image) && $collection->image !== [])
            <img src="{{ asset('/storage/'.$collection->image[0]) }}" alt="{{$collection->name}} Image" class="min-w-10 min-h-10 max-h-[500px] w-auto rounded-md shadow-lg">
            @else
            <img src="{{ asset('img/ccp-default-big.png') }}" alt="No Image" class="min-w-10 min-h-10 max-h-[300px] rounded-2xl">
                <!-- No Image Found -->
            <!-- <p id="no-images">No images in folder</p> -->
            @endif

        </div>
        <div class="py-8 container">
            <p class="text-xl sm:text-2xl mb-4 sm:px-10 text-red-800 font-interbold">
                {{ $collection->name }}
            </p>
            <p class="text-md sm:text-lg sm:px-10 font-interlight">
                {{ $collection->description }}
            </p>
        </div>
        <!-- collections under this collection -->
        @if(count($colsUnderCollection) > 0)
        <div class="">
            <p class="text-sm sm:text-lg pl-[10%] font-interbold absolute left-7">
                Collections under this collection:
            </p>
            <div class="grid w-full grid grid-cols-1 sm:grid-cols-{{count($colsUnderCollection) > 1 ? 2 : 1 }} lg:grid-cols-{{count($colsUnderCollection) > 3 ? 4 : count($colsUnderCollection) }} gap-4 gap-y-6 px-20 lg:px-[10%] pt-10 pb-4 text-black">
                @foreach($colsUnderCollection as $col)
                <a href="{{ route('collection', ['collection' => $col, 'slug' => $col->slug]) }}">
                    <div class="container w-full h-full rounded-md hover:ring-1 hover:ring-red-700/20 justify-center p-2 bg-gray-100 hover:-translate-y-1 hover:scale-105 duration-150">
                        <div class="flex flex-col items-center w-auto border-2 shadow-lg h-[300px] rounded-md bg-slate-950">
                        @if(!is_null($col->image) && $col->image != [])
                            <img src="{{ asset('/storage/'.$col->image[0]) }}" alt="showcase Featured Image" class="h-full w-auto rounded-md object-contain">
                        @else
                            <img src="{{ asset('img/ccp-default-big.png') }}" alt="Featured Image" class="h-full w-auto rounded-md object-contain">
                            <!-- No Image Found -->
                        @endif
                        </div>
                        <div class="text-sm md:text-md mt-4 flex flex-col text-center align-bottom font-inter container">
                                {{ $col->name }}
                        </div>
                    </div>
                </a>
                @endforeach
            </div>
        </div>
        @endif
        <!-- entities under this collection -->
        @if(count($entsUnderCollection) > 0)
        <div class="">
            <p class="text-sm sm:text-lg pl-[10%] font-interbold absolute left-7">
                Entries under this collection:
            </p>
            <div class="grid w-full grid grid-cols-1 sm:grid-cols-{{count($entsUnderCollection) > 1 ? 2 : 1 }} lg:grid-cols-{{count($entsUnderCollection) > 3 ? 4 : count($entsUnderCollection) }} gap-4 gap-y-6 px-20 lg:px-[10%] pt-10 pb-20 text-black">
                @foreach($entsUnderCollection as $ent)
                <a href="{{ route('entity', ['entity' => $ent, 'slug' => $ent->slug]) }}">
                    <div class="container w-full h-full rounded-md hover:ring-1 hover:ring-red-700/20 justify-center p-2 bg-gray-100 hover:-translate-y-1 hover:scale-105 duration-150">
                        <div class="flex flex-col items-center w-auto border-2 shadow-lg h-[300px] rounded-md bg-slate-950">
                        @if(!is_null($ent->image) && $ent->image != [])
                            <img src="{{ asset('/storage/'.$ent->image[0]) }}" alt="showcase Featured Image" class="h-full w-auto rounded-md object-contain">
                        @else
                            <img src="{{ asset('img/ccp-default-big.png') }}" alt="Featured Image" class="h-full w-auto rounded-md object-contain">
                            <!-- No Image Found -->
                        @endif
                        </div>
                        <div class="text-sm md:text-md mt-4 flex flex-col text-center align-bottom font-inter container">
                                {{ $ent->title }}
                        </div>
                    </div>
                </a>
                @endforeach
            </div>
        </div>
        @endif
        

    </div>
</div>
