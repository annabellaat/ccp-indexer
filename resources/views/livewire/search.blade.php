<div class="w-full text-black justify-center items-center">
    <!-- {{-- Close your eyes. Count to one. That is how long forever feels. --}}
    <p class="text-4xl mb-4">Discover thousands of materials from <br> the Cultural Center of the Philippines </p> -->
    <div class="flex justify-center items-center py-12">
        <div class="relative z-10">
            <div class="absolute inset-y-0 end-0 flex items-center p-5 rounded-full pointer-events-none bg-gray-700">
                <svg class="w-6 h-4 text-white dark:text-gray-400" aria-hidden="true"  fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                </svg>
            </div>
            <input type="text" class="text-md md:text-xl form-control text-slate-800 pl-4 pr-20 md:pr-32 lg:pr-40 py-4 rounded-full text-align-start w-[300px] md:w-[500px]" wire:model.live="searchItem" placeholder="Search all 10k+ archives..." id="searchEnt">
        </div>
    </div>
    @if($searchItem != '' && strlen($this->searchItem) > 2)
    <div class="flex w-full items-center justify-center modal-dialog modal-lg font-interlight">
        <div class="absolute w-3/4 lg:w-1/2 mt-10 justify-center items-center">
            <ul class="h-1">
            @if($count > 0)
                @foreach ($results as $result)
                    <li class="list-group-item bg-gray-100 h-auto border border-gray-700 text-md md:text-lg rounded-sm text-center self-center align-middle tracking-wide md:tracking-wider py-4 px-4 -mb-px odd:bg-white even:bg-gray-100">{{ $result->title }}</li>
                @endforeach
                @if($count > 10)
                    @if($count - 10 > 1)
                    <li class="list-group-item bg-white h-12 border border-gray-700 text-lg rounded-sm pt-2 pr-5 text-end">And {{ $count - 10 }} others...</li>
                    @else
                    <li class="list-group-item bg-white h-12 border border-gray-700 text-lg rounded-sm pt-2 pr-5 text-end">And {{ $count - 10 }} other...</li>
                    @endif 
                @endif
            @else
                <li class="list-group-item bg-gray-200 h-auto border border-gray-700 text-md md:text-lg rounded-sm text-center self-center align-middle tracking-wide md:tracking-wider py-4 px-4 -mb-px">No results found.</li>
            @endif

            </ul>
        </div>
    </div>
    @endif
</div>
