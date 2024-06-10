<div>
    <div>
        <div class="relative block mr-2 text-sm" x-data="{ show: false, seOp: 'mr-3 pt-7', seCl: 'mr-3' }">
            <div :class="show ? seCl : seOp" class="cursor-pointer" @click="show = !show; $nextTick(() => { $refs.searchForm.focus(); });">
                <span class="absolute inset-y-0 left-0 flex items-center pl-1">
                <svg class="h-5 w-5" viewBox="0 0 36 36" version="1.1" fill="#ffffff" stroke="#ffffff"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <defs> </defs> <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" sketch:type="MSPage"> <g id="Icon-Set" sketch:type="MSLayerGroup" transform="translate(-256.000000, -1139.000000)" fill="#ffffff"> <path d="M269.46,1163.45 C263.17,1163.45 258.071,1158.44 258.071,1152.25 C258.071,1146.06 263.17,1141.04 269.46,1141.04 C275.75,1141.04 280.85,1146.06 280.85,1152.25 C280.85,1158.44 275.75,1163.45 269.46,1163.45 L269.46,1163.45 Z M287.688,1169.25 L279.429,1161.12 C281.591,1158.77 282.92,1155.67 282.92,1152.25 C282.92,1144.93 276.894,1139 269.46,1139 C262.026,1139 256,1144.93 256,1152.25 C256,1159.56 262.026,1165.49 269.46,1165.49 C272.672,1165.49 275.618,1164.38 277.932,1162.53 L286.224,1170.69 C286.629,1171.09 287.284,1171.09 287.688,1170.69 C288.093,1170.3 288.093,1169.65 287.688,1169.25 L287.688,1169.25 Z" id="search"> </path> </g> </g> </g></svg>
                </span>
            </div>
            <span class="sr-only">Search</span>
            <input x-show="show" x-transition.duration.1000ms x-transition:leave.duration.1ms wire:model.live="searchItem" type="text" placeholder="Search" class="bg-transparent outline-none text-white border-b-2 border-amber-700 placeholder:text-white placeholder:italic pl-8 pr-8 w-28 sm:w-56 form-control" spellcheck="false" aria-label="Search" wire:keydown.escape="close()" wire:keydown.enter="goSearch()" id="searchForm" autocomplete="off" x-ref="searchForm">
            
            <div wire:click="goSearch()" class="cursor-pointer">
                <span x-show="show" class="absolute inset-y-0 right-0 flex items-center pl-1">
                    <svg fill="#ffffff" class="h-5 w-4" version="1.1" id="Layer_1" viewBox="0 0 330 330" xml:space="preserve" stroke="#ffffff"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path id="XMLID_27_" d="M15,180h263.787l-49.394,49.394c-5.858,5.857-5.858,15.355,0,21.213C232.322,253.535,236.161,255,240,255 s7.678-1.465,10.606-4.394l75-75c5.858-5.857,5.858-15.355,0-21.213l-75-75c-5.857-5.857-15.355-5.857-21.213,0 c-5.858,5.857-5.858,15.355,0,21.213L278.787,150H15c-8.284,0-15,6.716-15,15S6.716,180,15,180z"></path> </g></svg>
                </span>
            </div>
        </div>
    </div>
</div>
