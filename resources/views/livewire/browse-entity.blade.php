<div>
    <div class="">
        <div class="grid justify-center items-center pt-12">
            <div class="relative z-10">
                <div class="absolute inset-y-0 end-0 flex items-center p-5 rounded-full pointer-events-none bg-gray-700">
                    <svg class="w-6 h-4 text-white dark:text-gray-400" aria-hidden="true"  fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                    </svg>
                </div>
                <input type="text" class="text-md md:text-xl form-control text-slate-800 pl-4 pr-20 md:pr-32 lg:pr-40 py-4 rounded-full text-align-start w-[300px] md:w-[500px]" wire:model.live="query" wire:debounce="1000" placeholder="Search all 10k+ archives..." id="searchEnt">
            </div>
        </div>
        <div class="py-12 pb-24 text-red-800">
            <div class="grid justify-center items-center">
                <div class="text-lg md:text-3xl lg:text-4xl pb-12">
                @foreach(range("A","Z") as $let)
                    <span 
                    class="{{ $activeLet == $let ? 'underline font-bold' : '' }} text-bold cursor-pointer" wire:click="filterByLetter('{{ $let }}')">{{$let}}</span>
                @endforeach
                </div>
            </div>
            <div class="grid items-center mx-auto w-4/5 md:w-[60%] text-lg sm:text-xl">
                @foreach($all_ents as $ent)
                <a href="{{ route('entity', ['entity' => $ent, 'slug' => $ent->slug]) }}" class="mb-3 px-4"> {{ $ent->title }}</a>
                @endforeach
            </div>
        </div>
    </div>
</div>