<div>
    <span class="pl-4" x-data="{ show: true }" wire:key="{{$id}}">

        <span x-show="show" x-on:click="show = ! show" class="font-interbold cursor-pointer" id="{{$id}}-plus">[+] </span>
        <span x-show="! show" x-on:click="show = ! show" class="font-interbold cursor-pointer" id="{{$id}}-minus">[-] </span>
        <span wire:click="goToCol('{{$id}}', '{{$slug}}')" class="cursor-pointer">{{ $title }}</span>

        <div x-show="! show" class="grid items-center pl-8 pt-2">
            @if(count($all) == 0)
            <span class="pl-4 text-yellow-600 cursor-default">No current entries saved.</span>
            @else
            @foreach($all as $ent)
                @if(array_key_exists('archivist', $ent))
                <span wire:click="goToEnt('{{$ent['id']}}', '{{$ent['slug']}}')" class="mt-1 mb-3 px-4 cursor-pointer" wire:key="{{$ent['id']}}">{{$ent['title']}}</span>
                @else
                <div class="mb-2">
                    <livewire:under-collection :id="$ent['id']" :slug="$ent['slug']" :title="$ent['title']" />
                </div>
                @endif
            @endforeach
            @endif
        </div>
    </span>
</div>
