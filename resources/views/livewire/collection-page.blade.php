<div>
    <div class="container min-h-screen px-10 py-2 md:py-24 min-w-full flex flex-col items-center">
        <div class="">
            @if(!is_null($collection->image) && $collection->image !== [])
            <img src="{{ asset('/storage/'.$collection->image[0]) }}" alt="{{$collection->name}} Image" class="min-w-10 min-h-10 max-h-[500px] w-auto rounded-md shadow-lg">
            @else
            <img src="{{ asset('img/ccp-default-big.png') }}" alt="No Image" class="min-w-10 min-h-10 max-h-[300px] rounded-2xl">
                <!-- No Image Found -->
            <p id="no-images">No images in folder</p>
            @endif

        </div>
        <div class="py-10">
            <p class="text-2xl mb-4">
                {{ $collection->name }}
            </p>
            <p class="text-lg">
                {{ $collection->description }}
            </p>
        </div>
        <!-- entities under this collection -->
        @if(count($entsUnderCollection) > 0)
        <div>
            <p class="text-xl">
                Entities under this collection:
            </p>
            <div class="grid w-full grid-cols-{{count($entsUnderCollection)}} gap-4">
                @foreach($entsUnderCollection as $ent)
                <a href="{{ route('entity', ['entity' => $ent, 'slug' => $ent->slug]) }}">
                    <div class="container w-full h-full rounded-sm border-r border-b border-yellow-700 ring-2 ring-yellow-700 shadow-lg justify-center p-2">
                        <div class="place-items-center w-full">
                        @if(!is_null($ent->image) && $ent->image != [])
                            <img src="{{ asset('/storage/'.$ent->image[0]) }}" alt="showcase Featured Image" class="min-w-10 min-h-10 max-h-[150px] rounded-2xl">
                        @else
                            <img src="{{ asset('img/ccp-default-big.png') }}" alt="Featured Image" class="min-w-10 min-h-10 max-h-[150px] rounded-2xl">
                            <!-- No Image Found -->
                        @endif
                        </div>
                        <div class="w-full h-max text-md md:text-lg mt-10 text-center align-text-bottom">
                                {{ $ent->title }}
                        </div>
                    </div>
                </a>
                @endforeach
            </div>
        </div>
        @endif
        <!-- collections under this collection -->
        @if(count($colsUnderCollection) > 0)
        <div class="py-12">
            <p class="text-xl">
                Collections under this collection:
            </p>
            <div class="grid w-full grid-cols-{{count($colsUnderCollection)}} gap-4">
                @foreach($colsUnderCollection as $col)
                <a href="{{ route('collection', ['collection' => $col, 'slug' => $col->slug]) }}">
                    <div class="container w-full h-full rounded-sm border-r border-b border-yellow-700 ring-2 ring-yellow-700 shadow-lg justify-center p-2">
                        <div class="place-items-center w-full">
                        @if(!is_null($col->image) && $col->image != [])
                            <img src="{{ asset('/storage/'.$col->image[0]) }}" alt="showcase Featured Image" class="min-w-10 min-h-10 max-h-[150px] rounded-2xl">
                        @else
                            <img src="{{ asset('img/ccp-default-big.png') }}" alt="Featured Image" class="min-w-10 min-h-10 max-h-[150px] rounded-2xl">
                            <!-- No Image Found -->
                        @endif
                        </div>
                        <div class="w-full h-max text-md md:text-lg mt-10 text-center align-text-bottom">
                                {{ $col->name }}
                        </div>
                    </div>
                </a>
                @endforeach
            </div>
        </div>
        @endif

    </div>
</div>
