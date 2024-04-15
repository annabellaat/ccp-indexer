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
                <li class="" @click="openTab = 1">
                    <a wire:click="music" href="#showcase" onclick="return {{$activeTab==1 ? 'false' : 'true'}}" :class="openTab === 1 ? activeClass : inactiveClass">Music</a>
                </li>
                <li class="" @click="openTab = 2">
                    <a wire:click="dance" href="#showcase" onclick="return {{$activeTab==2 ? 'false' : 'true'}}" :class="openTab === 2 ? activeClass : inactiveClass">Dance</a>
                </li>
                <li class="" @click="openTab = 3">
                    <a wire:click="theater" href="#showcase" onclick="return {{$activeTab==3 ? 'false' : 'true'}}" :class="openTab === 3 ? activeClass : inactiveClass">Theater</a>
                </li>
                <li class="" @click="openTab = 4">
                    <a wire:click="visualarts" href="#showcase" onclick="return {{$activeTab==4 ? 'false' : 'true'}}" :class="openTab === 4 ? activeClass : inactiveClass">Visual Arts</a>
                </li>
                <li class="" @click="openTab = 5">
                    <a wire:click="film" href="#showcase" onclick="return {{$activeTab==5 ? 'false' : 'true'}}" :class="openTab === 5 ? activeClass : inactiveClass">Film</a>
                </li>
                <li class="" @click="openTab = 6">
                    <a wire:click="literature" href="#showcase" onclick="return {{$activeTab==6 ? 'false' : 'true'}}" :class="openTab === 6 ? activeClass : inactiveClass">Literature</a>
                </li>
                <li class="" @click="openTab = 7">
                    <a wire:click="events" href="#showcase" onclick="return {{$activeTab==7 ? 'false' : 'true'}}" :class="openTab === 7 ? activeClass : inactiveClass">Events</a>
                </li>
            </ul>
        </div>
    </div>


    @livewire('search')

    <div class="grid w-full grid grid-cols-1 gap-1 gap-y-24 px-4 lg:px-30 py-20 md:grid-cols-2 text-black place-items-center place-content-center justify-ceter">

        @if($activeTab == 1)

        @foreach($random_collections as $collection)



        <div class="w-2/3 lg:w-[60%]">
            <div class="">
                <img src="{{ asset('/storage/'.$collection->image) }}" alt="showcase Featured Image" class="min-w-10 min-h-10  max-h-[550px] rounded-2xl">
                <div class="max-w-xl w-auto">
                    <div class="text-4xl mt-10">
                        {{ $collection->name }}
                    </div>
                    <div class="text-2xl">
                        {{ $collection->description  }}
                    </div>
                </div>
            </div>
        </div>

        @endforeach


        @endif
        @if($activeTab == 2)
        <div class="w-2/3 lg:w-[60%]">
            <div class="">
                <img src="{{asset('img/library-image.jpg')}}" alt="showcase Featured Image" class="min-w-10 min-h-10  max-h-[550px] rounded-2xl">
                <div class="max-w-xl w-auto">
                    <div class="text-4xl mt-10">
                        Dance Collection1 Name
                    </div>
                    <div class="text-2xl">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore ...
                    </div>
                </div>
            </div>
        </div>

        @endif
        @if($activeTab == 3)


        @endif
        @if($activeTab == 4)
        @endif
        @if($activeTab == 5)
        @endif
        @if($activeTab == 6)
        @endif
        @if($activeTab == 7)
        @endif
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
