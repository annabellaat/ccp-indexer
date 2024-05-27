<div>
    <div class="container mx-auto min-h-screen py-12">
        <div class="py-2 pb-8 absolute text-xl text-red-800 font-interbold">
            Type something to search
        </div>
        <div class="container relative mt-12">
            <span class="absolute inset-y-0 left-2 flex items-center pl-1">
                <svg class="h-6 w-6" viewBox="0 0 36 36" version="1.1" fill="#000000" stroke="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <defs> </defs> <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" sketch:type="MSPage"> <g id="Icon-Set" sketch:type="MSLayerGroup" transform="translate(-256.000000, -1139.000000)" fill="#000000"> <path d="M269.46,1163.45 C263.17,1163.45 258.071,1158.44 258.071,1152.25 C258.071,1146.06 263.17,1141.04 269.46,1141.04 C275.75,1141.04 280.85,1146.06 280.85,1152.25 C280.85,1158.44 275.75,1163.45 269.46,1163.45 L269.46,1163.45 Z M287.688,1169.25 L279.429,1161.12 C281.591,1158.77 282.92,1155.67 282.92,1152.25 C282.92,1144.93 276.894,1139 269.46,1139 C262.026,1139 256,1144.93 256,1152.25 C256,1159.56 262.026,1165.49 269.46,1165.49 C272.672,1165.49 275.618,1164.38 277.932,1162.53 L286.224,1170.69 C286.629,1171.09 287.284,1171.09 287.688,1170.69 C288.093,1170.3 288.093,1169.65 287.688,1169.25 L287.688,1169.25 Z" id="search"> </path> </g> </g> </g></svg>
            </span>
            <input wire:model.live="searchItem" type="text" placeholder="Search all archives..." class="rounded-lg px-10 py-2 active:border-0 text-black border-b-2 border-amber-700 placeholder:text-black placeholder:italic w-[100%] lg:w-[900px] text-2xl form-control" spellcheck="false" aria-label="Search all archives" wire:keydown.escape="close()" id="searchForm" autocomplete="off" wire:debounce="6000">
        </div>
        @if($searchItem!=null)
        <div class="py-2 px-10 relative" wire:transition>
            @if($entC + $colC > 0)
            Showing search results for <span class="text-yellow-600">{{$searchItem}}</span>
            @else
            No match found for <span class="text-yellow-600">{{$searchItem}}</span>
            @endif
            <button class="bg-slate-200 px-3 py-1 rounded-full font-interbold text-slate-700 hover:text-slate-100 hover:bg-red-800 absolute right-0 top-0" wire:click.prevent="close()">X</button>
        </div>
        @endif
        
        <div class="container px-2 sm:px-[10%]">
            @if(strlen($searchItem) > 0 && $entC + $colC > 0)
            <div class="bg-white text-black rounded-lg border-1 px-4 py-4 mt-4 w-full">
                @if(count($this->cols)>0)
                    <div class="container">
                        <p class="font-interbold border-t-2 border-b-2 py-2">Collections matched:</p>
                        @foreach($this->cols as $col)
                            <div class="cursor-pointer py-2 mx-8 grid grid-flow-col {{$loop->last ? 'pb-4' : 'border-b border-orange-200'}}" wire:click="goToCol('{{$col->id}}', '{{$col->slug}}')" wire:key="$col->id">
                                <span class="mr-4">
                                @if($col->image != null || $col->image != [])
                                    <img src="{{ asset('/storage/'.$col->image[0]) }}" alt="showcase Featured Image" class="max-h-20 w-40 rounded-md object-contain">
                                @else
                                    <img src="{{ asset('img/ccp-default-big.png') }}" alt="Featured Image" class="max-h-20 w-40 rounded-md object-contain">
                                @endif
                                </span>
                                <span class="content-center">
                                    <p class="pl-4">{{$col->name}}</p>
                                </span>
                            </div>
                        @endforeach 
                    </div>
                @endif
                @if(count($this->ents)>0)
                    <div class="container">
                        <p class="font-interbold border-t-2 border-b-2 py-2">Entries matched:</p>
                        @foreach($this->ents as $entity)
                            <div class="cursor-pointer py-2 mx-8 grid grid-flow-col {{$loop->last ? 'pb-4' : 'border-b border-orange-200'}}" wire:click="goToEnt('{{$entity->id}}', '{{$entity->slug}}')" wire:key="$entity->id">
                                <span class="mr-4">
                                @if($entity->image != null || $entity->image != [])
                                    <img src="{{ asset('/storage/'.$entity->image[0]) }}" alt="showcase Featured Image" class="max-h-20 w-40 rounded-md object-contain">
                                @else
                                    <img src="{{ asset('img/ccp-default-big.png') }}" alt="Featured Image" class="max-h-20 w-40 rounded-md object-contain">
                                @endif
                                </span>
                                <span class="content-center">
                                    <p class="pl-4">{{$entity->title}}</p>
                                </span>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
            @endif
        </div>
        <!-- load more when scroll -->
        <div
            x-data="{
                observe () {
                    let observer = new IntersectionObserver((entries) => {
                        entries.forEach(entry => {
                            if (entry.isIntersecting) {
                                @this.call('loadMore')
                            }
                        })
                    }, {
                        root: null
                    })

                    observer.observe(this.$el)
                }
            }"
            x-init="observe"
        ></div>
    </div>
</div>
