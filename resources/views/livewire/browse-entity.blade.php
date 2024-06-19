<div>
    <div class="min-h-screen">
        <div class="grid justify-center items-center pt-12">
            <div class="relative z-10">
                <div class="absolute inset-y-0 end-0 flex items-center p-5 rounded-full pointer-events-none bg-gray-700">
                    <svg class="w-6 h-4 text-white dark:text-gray-400" aria-hidden="true"  fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                    </svg>
                </div>
                <input type="text" class="text-md md:text-xl form-control text-slate-800 pl-4 pr-44 md:pr-[450px] lg:pr-[600px] py-4 w-full rounded-full text-align-start" wire:model.live="query" wire:debounce="1500" placeholder="Search all titles..." id="searchEnt" spellcheck="false" autocomplete="off">
            </div>
        </div>
        <div class="py-12 pb-24 text-red-800">
            <div class="grid justify-center items-center">
                <div class="text-lg md:text-3xl lg:text-4xl pb-12">
                    <!-- <span 
                    class="{{ $activeLet == 'num' ? 'underline font-bold' : '' }} text-bold cursor-pointer" wire:click="filterNumber()">#</span> -->
                    <span 
                    class="{{ $activeLet == 'all' ? 'underline font-bold' : '' }} text-bold cursor-pointer text-2xl" wire:click="filterAll()">all</span>
                @foreach(range("A","Z") as $let)
                    <span 
                    class="{{ $activeLet == $let ? 'underline font-bold' : '' }} text-bold cursor-pointer" wire:click="filterByLetter('{{ $let }}')">{{$let}}</span>
                @endforeach
                </div>
            </div>
            <div class="grid items-center mx-auto w-4/5 md:w-[60%] text-lg sm:text-xl" wire:key="header">
                @if($all_browse)
                @foreach($all_browse as $ent)
                    @if(array_key_exists('archivist', $ent))
                    <span wire:click="goToEnt('{{$ent['id']}}', '{{$ent['slug']}}')" class="mb-3 px-4 cursor-pointer"> {{ $ent['title'] }}</span>
                    @else
                    <livewire:under-collection :id="$ent['id']" :slug="$ent['slug']" :title="$ent['title']" wire:key="inlw-div-{{$ent['id']}}-{{$loop->iteration}}"/>
                    @endif
                @endforeach
                @else
                <span class="mb-3 px-4 cursor-pointer items-center font-interbold">No match found</span>
                @endif
            </div>
            <div class="grid items-center mx-auto w-4/5 md:w-[60%]">
                <svg
                    wire:key="loading-circle"
                    wire:loading
                    class="animate-spin h-8 w-8 text-black justify-self-center mt-12"
                    xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 24 24">

                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>

                    <path class="opacity-75" fill="currentColor"
                        d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                    </path>
                </svg>
            </div>
        </div>
        
        <!-- load more when scroll -->
         @if($this->totalCount > count($this->all_browse))
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
        @endif
    </div>
</div>
