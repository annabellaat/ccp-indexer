<div class="pl-4 mb-3">
    <span x-data="{ show: true }">
        <span x-show="show" x-on:click="show = ! show" class="font-interbold cursor-pointer">[+] </span>
        <span x-show="! show" x-on:click="show = ! show" class="font-interbold cursor-pointer">[-] </span>
        <span wire:click="goToCol('{{$id}}', '{{$slug}}')" class="cursor-pointer">{{ $title }}</span>

        <div x-show="! show" class="grid items-center pl-8 pt-2">
            @if(count($all) == 0)
            <span class="pl-4 text-yellow-600 cursor-default" wire:key="no-saved-{{$id}}">No current entries saved.</span>
            @else
            @foreach($all as $ent)
                @if(array_key_exists('archivist', $ent))
                <span wire:click="goToEnt('{{$ent['id']}}', '{{$ent['slug']}}')" class="mb-2 px-4 cursor-pointer" wire:key="{{$ent['id']}}">{{$ent['title']}}</span>
                @else
                <div wire:key="under-collection-loop-header-{{$id}}">
                    <livewire:under-collection wire:key="{{$ent['id']}}" :id="$ent['id']" :slug="$ent['slug']" :title="$ent['title']" />
                </div>
                @endif
            @endforeach
            @endif
        </div>
    </span>
</div>
