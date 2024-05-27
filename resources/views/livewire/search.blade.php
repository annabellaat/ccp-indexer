<div>
    <div>
        <div class="relative block mr-2" x-data="{ show: false, seOp: 'mr-3 pt-7', seCl: 'mr-3' }">
            <div :class="show ? seCl : seOp" class="cursor-pointer" @click="show = !show; $nextTick(() => { $refs.searchForm.focus(); });">
                <span class="absolute inset-y-0 left-0 flex items-center pl-1">
                <svg class="h-5 w-5" viewBox="0 0 36 36" version="1.1" fill="#ffffff" stroke="#ffffff"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <defs> </defs> <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" sketch:type="MSPage"> <g id="Icon-Set" sketch:type="MSLayerGroup" transform="translate(-256.000000, -1139.000000)" fill="#ffffff"> <path d="M269.46,1163.45 C263.17,1163.45 258.071,1158.44 258.071,1152.25 C258.071,1146.06 263.17,1141.04 269.46,1141.04 C275.75,1141.04 280.85,1146.06 280.85,1152.25 C280.85,1158.44 275.75,1163.45 269.46,1163.45 L269.46,1163.45 Z M287.688,1169.25 L279.429,1161.12 C281.591,1158.77 282.92,1155.67 282.92,1152.25 C282.92,1144.93 276.894,1139 269.46,1139 C262.026,1139 256,1144.93 256,1152.25 C256,1159.56 262.026,1165.49 269.46,1165.49 C272.672,1165.49 275.618,1164.38 277.932,1162.53 L286.224,1170.69 C286.629,1171.09 287.284,1171.09 287.688,1170.69 C288.093,1170.3 288.093,1169.65 287.688,1169.25 L287.688,1169.25 Z" id="search"> </path> </g> </g> </g></svg>
                </span>
            </div>
            <span class="sr-only">Search</span>
            <input x-show="show" x-transition.duration.1000ms x-transition:leave.duration.1ms wire:model.live="searchItem" type="text" placeholder="Search" class="bg-transparent outline-none text-white border-b-2 border-amber-700 placeholder:text-white placeholder:italic pl-8 w-28 sm:w-56 form-control" spellcheck="false" aria-label="Search" wire:keydown.escape="close()" id="searchForm" autocomplete="off" x-ref="searchForm">
        </div>
    </div>
    @if(strlen($searchItem) > 0)
    <div class="absolute bg-white text-black rounded-sm border-1 px-4 py-4 -ml-64 sm:-ml-96 mt-4 min-w-[400px] lg:w-[950px] overflow-y-auto max-h-[800px] overscroll-contain no-scrollbar">
        <button class="bg-slate-200 absolute right-4 top-5 px-3 py-1 rounded-full font-interbold text-slate-700 hover:text-slate-100 hover:bg-red-600" wire:click.prevent="close()">X</button>
        @if(count($this->cols)>0)
            <div class="container">
                <p class="font-interbold border-t-2 border-b-2 py-2">Collections matched:</p>
                @foreach($this->cols as $col)
                    <div class="cursor-pointer py-2 mx-8 grid grid-flow-col {{$loop->last ? 'pb-4' : 'border-b border-orange-200'}}" wire:click="goToCol('{{$col->id}}', '{{$col->slug}}')">
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
                    <div class="cursor-pointer py-2 mx-8 grid grid-flow-col {{$loop->last ? 'pb-4' : 'border-b border-orange-200'}}" wire:click="goToEnt('{{$entity->id}}', '{{$entity->slug}}')">
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
        @if(count($this->cols) == 0 && count($this->ents) == 0)
            <p class="font-interbold border-t-2 border-b-2 py-2">No match found</p>
        @endif
        @if($this->entC > 3 || $this->colC > 3)
            <a href="{{route('search', ['searchTerm' => $searchItem])}}">
                <p class="font-interbold border-b-2 py-2 bg-red-200 hover:bg-red-300 text-center rounded-sm">Click to see {{($this->entC+$this->colC) - count($this->cols) - count($this->ents)}} more result{{($this->entC+$this->colC) - count($this->cols) - count($this->ents) > 1 ? 's': ''}}...</p>
            </a>
        @endif

    </div>
    @endif
</div>
