@props([
    'active_css' => 'text-amber-500 border-amber-500'
])
<div>
    <div class="bg-black w-full h-14 sticky top-16 z-30 pr-1 shadow-[rgba(0,0,15,0.5)_0px_4px_4px_0px]"
        x-data="{
            openTab: 1,
            activeClass: 'inline-block border-b-4 pb-3 rounded-t-lg text-[#d4ab1a] border-[#d4ab1a] font-interbold',
            inactiveClass: 'inline-block border-b-4 pb-3 border-transparent rounded-t-lg hover:text-[#d4ab1a] hover:border-[#d4ab1a] hover:font-bold'
        }">
        <div class="text-sm md:text-xl text-center text-white pt-5 md:pt-3 text-nowrap">
            <ul class="flex flex-row -mx-px place-content-center gap-2 md:gap-6 lg:gap-16">
                <li class="cursor-pointer" @click="openTab = 1">
                    <span wire:click="music" onclick="return (openTab==1 ? 'false' : 'true')" :class="openTab === 1 ? activeClass : inactiveClass">Music</span>
                </li>
                <li class="cursor-pointer" @click="openTab = 2">
                    <span wire:click="dance" onclick="return (openTab==2 ? 'false' : 'true')" :class="openTab === 2 ? activeClass : inactiveClass">Dance</span>
                </li>
                <li class="cursor-pointer" @click="openTab = 3">
                    <span wire:click="theater" onclick="return (openTab==3 ? 'false' : 'true')" :class="openTab === 3 ? activeClass : inactiveClass">Theater</span>
                </li>
                <li class="cursor-pointer" @click="openTab = 4">
                    <span wire:click="visualarts" onclick="return (openTab==4 ? 'false' : 'true')" :class="openTab === 4 ? activeClass : inactiveClass">Visual Arts</span>
                </li>
                <li class="cursor-pointer" @click="openTab = 5">
                    <span wire:click="film" onclick="return (openTab==5 ? 'false' : 'true')" :class="openTab === 5 ? activeClass : inactiveClass">Film</span>
                </li>
                <li class="cursor-pointer" @click="openTab = 6">
                    <span wire:click="literature" onclick="return (openTab==6 ? 'false' : 'true')" :class="openTab === 6 ? activeClass : inactiveClass">Literature</span>
                </li>
                <li class="cursor-pointer" @click="openTab = 7">
                    <span wire:click="events" onclick="return (openTab==7 ? 'false' : 'true')" :class="openTab === 7 ? activeClass : inactiveClass">Events</span>
                </li>
            </ul>
        </div>
    </div>


    <div class="col-span-1 sm:col-span-2 lg:col-span-4 w-full justify-center flex text-slate text-md md:text-xl font-interlight bg-red-900 sticky top-28 h-12 md:h-14 z-20 shadow-[rgba(0,0,15,0.5)_0px_4px_4px_0px] pt-3 md:pt-4">
        ENTRIES
    </div>

    <div class="grid w-full grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-x-6 gap-y-6 px-10 lg:px-[3%] pt-6 text-black">
        <!-- output entries on homepage -->
        @foreach($random_collections as $collection)
        <a href="{{ route('entity', ['entity' => $collection, 'slug' => $collection->slug]) }}" class="flex justify-center">
            <div class="container w-full h-full rounded-xl hover:ring-1 hover:ring-red-700/20 justify-center p-2 bg-white  hover:-translate-y-1 hover:scale-105 duration-100">
                <div class="flex flex-col items-center w-auto h-[300px] rounded-md bg-slate-950">
                @if(!is_null($collection->image) && $collection->image != [])
                    <!-- <img src="{{ asset('/storage/'.$collection->image[0]) }}" alt="showcase Featured Image" class="min-w-10 min-h-10 max-h-[300px] rounded-2xl"> -->
                    <img src="{{ asset('/storage/'.$collection->image[0]) }}" alt="showcase Featured Image" class="h-full w-auto rounded-md object-scale-down scale-95">
                    
                @else
                    <img src="{{ asset('img/ccp-default-big.png') }}" alt="Featured Image" class="h-full w-auto rounded-md object-scale-down scale-95">
                    <!-- No Image Found -->
                @endif
                </div>
                <div class="text-sm md:text-md mt-4 flex flex-col text-center align-bottom font-inter container">
                        {{ $collection->title }}
                </div>
            </div>
        </a>
        @endforeach
        <!-- load more entities button -->
        @if($random_collections->count() < $count)
        <div class="col-span-1 sm:col-span-2 lg:col-span-4 w-full justify-center flex py-2 mb-8">
            <button wire:click="loadMore()" class="border border-amber-500/75 rounded-full p-0.5 hover:scale-105 duration-50">
                
                <div wire:loading.remove wire:target="loadMore()" class="px-2 py-1 hover:scale-105 duration-50 font-interlight text-xs">Load more entries</div>
                <svg
                    wire:loading
                    wire:target="loadMore()"
                    class="animate-spin h-7 w-7 text-black"
                    xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 24 24">

                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>

                    <path class="opacity-75" fill="currentColor"
                        d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                    </path>

                </svg>
            </button>
        </div>
        @endif
    </div>
    <!-- Collections -->
    @if($collection_output != null)
    <div class="col-span-1 sm:col-span-2 lg:col-span-4 w-full justify-center flex text-slate text-md md:text-xl font-interlight bg-red-900 sticky top-28 h-12 md:h-14 z-20 shadow-[rgba(0,0,15,0.5)_0px_4px_4px_0px] pt-3 md:pt-4 mt-8">
        COLLECTIONS
    </div>
    
    <div class="grid w-full grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-x-6 gap-y-6 px-10 lg:px-[3%] pt-6 text-black">
        <!-- output collections on homepage -->
        @foreach($collection_output as $collection)
        <a href="{{ route('collection', ['collection' => $collection, 'slug' => $collection->slug]) }}" class="flex justify-center">
            <div class="container w-full h-full rounded-xl hover:ring-1 hover:ring-red-700/20 justify-center p-2 bg-white  hover:-translate-y-1 hover:scale-105 duration-100">
                <div class="flex flex-col items-center w-auto h-[300px] rounded-md bg-slate-950">
                @if(!is_null($collection->image) && $collection->image != [])
                    <img src="{{ asset('/storage/'.$collection->image[0]) }}" alt="showcase Featured Image" class="h-full w-auto rounded-md object-scale-down scale-95">
                    
                @else
                    <img src="{{ asset('img/ccp-default-big.png') }}" alt="Featured Image" class="h-full w-auto rounded-md object-scale-down scale-95">
                    <!-- No Image Found -->
                @endif
                </div>
                <div class="text-sm md:text-md mt-4 flex flex-col text-center align-bottom font-inter container">
                        {{ $collection->name }}
                </div>
            </div>
        </a>
        @endforeach
        <!-- load more collections button -->
        @if($collection_output->count() < $colcount)
        <div class="col-span-1 sm:col-span-2 lg:col-span-4 w-full justify-center flex py-2">
            <button wire:click="loadMoreCol()" class="border border-amber-500/75 rounded-full p-0.5 hover:scale-105 duration-50">
                
                <div wire:loading.remove wire:target="loadMoreCol()" class="px-2 py-1 hover:scale-105 duration-50 font-interlight text-xs">Load more collections</div>
                <svg
                    wire:loading
                    wire:target="loadMoreCol()"
                    class="animate-spin h-7 w-7 text-black"
                    xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 24 24">

                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>

                    <path class="opacity-75" fill="currentColor"
                        d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                    </path>

                </svg>
            </button>
        </div>
        @endif
    @endif

    </div>
</div>
