@props([
    'active_css' => 'text-amber-500 border-amber-500'
])
<div>
    <div class="bg-black w-full h-15 lg:h-16 sticky top-16 z-30 pr-1"
        x-data="{
            openTab: 1,
            activeClass: 'rounded-sm inline-block border-b-4 pb-3 rounded-t-lg text-[#d4ab1a] border-[#d4ab1a] font-interbold',
            inactiveClass: 'rounded-sm inline-block border-b-4 pb-3 border-transparent rounded-t-lg hover:text-[#d4ab1a] hover:border-[#d4ab1a] hover:font-bold'
        }">
        <div class="text-sm sm:text-lg md:text-xl lg:text-2xl font-medium text-center text-white pt-4 text-nowrap">
            <ul class="flex flex-row -mx-px place-content-center gap-2 sm:gap-8">
                <li class="cursor-pointer" @click="openTab = 1">
                    <span wire:click="music" onclick="return {{$activeTab==1 ? 'false' : 'true'}}" :class="openTab === 1 ? activeClass : inactiveClass">Music</span>
                </li>
                <li class="cursor-pointer" @click="openTab = 2">
                    <span wire:click="dance" onclick="return {{$activeTab==2 ? 'false' : 'true'}}" :class="openTab === 2 ? activeClass : inactiveClass">Dance</span>
                </li>
                <li class="cursor-pointer" @click="openTab = 3">
                    <span wire:click="theater" onclick="return {{$activeTab==3 ? 'false' : 'true'}}" :class="openTab === 3 ? activeClass : inactiveClass">Theater</span>
                </li>
                <li class="cursor-pointer" @click="openTab = 4">
                    <span wire:click="visualarts" onclick="return {{$activeTab==4 ? 'false' : 'true'}}" :class="openTab === 4 ? activeClass : inactiveClass">Visual Arts</span>
                </li>
                <li class="cursor-pointer" @click="openTab = 5">
                    <span wire:click="film" onclick="return {{$activeTab==5 ? 'false' : 'true'}}" :class="openTab === 5 ? activeClass : inactiveClass">Film</span>
                </li>
                <li class="cursor-pointer" @click="openTab = 6">
                    <span wire:click="literature" onclick="return {{$activeTab==6 ? 'false' : 'true'}}" :class="openTab === 6 ? activeClass : inactiveClass">Literature</span>
                </li>
                <li class="cursor-pointer" @click="openTab = 7">
                    <span wire:click="events" onclick="return {{$activeTab==7 ? 'false' : 'true'}}" :class="openTab === 7 ? activeClass : inactiveClass">Events</span>
                </li>
            </ul>
        </div>
    </div>


  

    <div class="grid w-full grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 gap-y-12 px-20 md:px-32 lg:px-56 pt-20 pb-20 text-black">

        @foreach($random_collections as $collection)

        <a href="{{ route('entity', ['entity' => $collection, 'slug' => $collection->slug]) }}">
            <div class="container w-full h-full rounded-sm border-r border-b border-yellow-700 ring-2 ring-yellow-700 shadow-lg justify-center p-2 bg-white">
                <div class="flex flex-col items-center w-full">
                @if(!is_null($collection->image) && $collection->image != [])
                    <img src="{{ asset('/storage/'.$collection->image[0]) }}" alt="showcase Featured Image" class="min-w-10 min-h-10 max-h-[250px] rounded-2xl">
                @else
                    <img src="{{ asset('img/ccp-default-big.png') }}" alt="Featured Image" class="min-w-10 min-h-10 max-h-[250px] rounded-2xl">
                    <!-- No Image Found -->
                @endif
                </div>
                <div class="w-full h-max text-md md:text-lg mt-10 flex flex-col text-center">
                        {{ $collection->title }}
                    <!-- <div class="text-md pt-4">
                        {{  Str::words($collection->description, 25)  }}
                    </div> -->
                </div>
            </div>
        </a>

        @endforeach

        <!-- <div class="grid-col w-2/3 lg:w-[60%]">
            <div class="">
                <img src="{{asset('img/library-image.jpg')}}" alt="showcase Featured Image" class="min-w-10 min-h-10 w-auto rounded-2xl">
                <div class="max-w-xl w-auto">
                    <div class="text-4xl mt-10">
                        Collection Name
                    </div>
                    <div class="text-2xl">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore ...
                    </div>
                </div>
            </div>
        </div> -->

    </div>
</div>
