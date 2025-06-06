<div>
    <div class="grid grid-cols-1 flex justify-center sm:container mx-auto min-h-full py-4">
        <div class="grid-col justify-center">
            <div class="flex justify-center text-3xl text-red-800">
                Open Access Collections
            </div>
            <div class="flex justify-center text-justify text-md px-[20%] lg:px-[35%] pt-4">
                Open Access Collections are made available to the public and may be used for noncommercial purposes without fee or copyright restriction.
            </div>
        </div>
    </div>

    <div class="px-10 min-w-full flex flex-col items-center">   
        <!-- collections under open access -->
        @if(count($all_cols) > 0)
        <div class="w-full">
            <p class="text-lg font-interbold pl-10 sm:pl-20">
                Collections under Open Access:
            </p>
            <div class="grid grid-cols-1 sm:grid-cols-{{count($all_cols) > 1 ? 2 : 1 }} lg:grid-cols-{{count($all_cols) > 3 ? 4 : count($all_cols) }} gap-4 gap-y-6 px-10 sm:px-20 lg:px-[10%] py-4">
                @foreach($all_cols as $col)
                <a href="{{ route('collection', ['collection' => $col, 'slug' => $col->slug]) }}">
                    <div class="container w-full h-full rounded-2xl hover:ring-1 hover:ring-red-700/20 justify-center p-2 bg-gray-100 max-w-[300px] hover:-translate-y-1 hover:scale-105 duration-150">
                        <div class="flex flex-col items-center w-auto border-2 shadow-lg h-[300px] rounded-md bg-slate-950">
                        @if(!is_null($col->image) && $col->image != [])
                            <img src="{{ asset('/storage/'.$col->image[0]) }}" alt="showcase Featured Image" class="h-full w-auto rounded-md object-contain scale-95">
                        @else
                            <img src="{{ asset('img/ccp-default-big.png') }}" alt="Featured Image" class="h-full w-auto rounded-md object-contain scale-95">
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
        <!-- else
        <div class="w-full py-12">
            <p class="text-lg text-yellow-700 font-interbold pl-10 sm:pl-20">
                No Collections under Open Access.
            </p>

        </div> -->
        @endif
        <!-- entities under open access -->
        @if(count($all_ents) > 0)
        <div class="w-full">
            <p class="text-lg font-interbold pl-10 sm:pl-20">
                Entries under Open Access:
            </p>
            <div class="w-full grid grid-cols-1 sm:grid-cols-{{count($all_ents) > 1 ? 2 : 1 }} lg:grid-cols-{{count($all_ents) > 3 ? 4 : count($all_ents) }} gap-4 gap-y-6 px-10 sm:px-20 lg:px-[10%] pt-4 pb-20">
                @foreach($all_ents as $ent)
                <a href="{{ route('entity', ['entity' => $ent, 'slug' => $ent->slug]) }}">
                    <div class="container w-full h-full rounded-2xl hover:ring-1 hover:ring-red-700/20 justify-center p-2 bg-gray-100 max-w-[300px] hover:-translate-y-1 hover:scale-105 duration-150">
                        <div class="flex flex-col items-center w-auto border-2 shadow-lg h-[300px] rounded-md bg-slate-950">
                        @if(!is_null($ent->image) && $ent->image != [])
                            <img src="{{ asset('/storage/'.$ent->image[0]) }}" alt="showcase Featured Image" class="h-full w-auto rounded-md object-contain scale-95">
                        @else
                            <img src="{{ asset('img/ccp-default-big.png') }}" alt="Featured Image" class="h-full w-auto rounded-md object-contain scale-95">
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
        @else
        <div class="w-full py-12">
            <p class="text-lg text-yellow-700 font-interbold pl-10 sm:pl-20">
                No Entries under Open Access.
            </p>

        </div>
        @endif
        

    </div>
</div>
