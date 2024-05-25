<div>
    <div class="text-md sm:text-lg md:text-xl px-4 sm:px-20 pt-6 justify-self-center">
        <a href="{{ route('home') }}" class="text-red-800">Home </a>/ <a href="{{ route('browse') }}" class="text-red-800">Browse </a>/ <h class="text-red-800 cursor-default">{{ $collection->name }} </h>
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
        <div class="py-4">
            <p class="text-2xl mb-4 text-red-800">
                {{ $collection->name }}
            </p>
            <p class="text-lg">
                {{ $collection->description }}
            </p>
        </div>
        <!-- collections under this collection -->
        @if(count($colsUnderCollection) > 0)
        <div class="">
            <p class="text-xl pl-[10%]">
                Collections under this collection:
            </p>
            <div class="grid w-full grid grid-cols-1 sm:grid-cols-{{count($colsUnderCollection) > 1 ? 2 : 1 }} lg:grid-cols-{{count($colsUnderCollection) > 3 ? 4 : count($colsUnderCollection) }} gap-4 gap-y-6 px-20 lg:px-[10%] pt-4 pb-4 text-black">
                @foreach($colsUnderCollection as $col)
                <a href="{{ route('collection', ['collection' => $col, 'slug' => $col->slug]) }}">
                    <div class="container w-full h-full rounded-md hover:ring-1 hover:ring-yellow-500 shadow-lg justify-center p-2 bg-white">
                        <div class="flex flex-col items-center w-auto border-2 shadow-lg h-[300px] rounded-md">
                        @if(!is_null($col->image) && $col->image != [])
                            <img src="{{ asset('/storage/'.$col->image[0]) }}" alt="showcase Featured Image" class="h-full w-auto rounded-md object-contain">
                        @else
                            <img src="{{ asset('img/ccp-default-big.png') }}" alt="Featured Image" class="h-full w-auto rounded-md object-contain">
                            <!-- No Image Found -->
                        @endif
                        </div>
                        <div class="text-sm md:text-md mt-4 flex flex-col text-center align-bottom font-interlight container">
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
            <p class="text-xl pl-[10%]">
                Entries under this collection:
            </p>
            <div class="grid w-full grid grid-cols-1 sm:grid-cols-{{count($entsUnderCollection) > 1 ? 2 : 1 }} lg:grid-cols-{{count($entsUnderCollection) > 3 ? 4 : count($entsUnderCollection) }} gap-4 gap-y-6 px-20 lg:px-[10%] pt-4 pb-20 text-black">
                @foreach($entsUnderCollection as $ent)
                <a href="{{ route('entity', ['entity' => $ent, 'slug' => $ent->slug]) }}">
                    <div class="container w-full h-full rounded-md hover:ring-1 hover:ring-yellow-500 shadow-lg justify-center p-2 bg-white">
                        <div class="flex flex-col items-center w-auto border-2 shadow-lg h-[300px] rounded-md">
                        @if(!is_null($ent->image) && $ent->image != [])
                            <img src="{{ asset('/storage/'.$ent->image[0]) }}" alt="showcase Featured Image" class="h-full w-auto rounded-md object-contain">
                        @else
                            <img src="{{ asset('img/ccp-default-big.png') }}" alt="Featured Image" class="h-full w-auto rounded-md object-contain">
                            <!-- No Image Found -->
                        @endif
                        </div>
                        <div class="text-sm md:text-md mt-4 flex flex-col text-center align-bottom font-interlight container">
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
