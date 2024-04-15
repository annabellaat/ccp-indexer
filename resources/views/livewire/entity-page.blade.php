<div>
    <div class="h-max py-24 grid grid-cols-2">
        <div class="text-xl col-span-2 pb-6 w-3/4 justify-self-center">
            <a href="{{ route('home') }}" class="text-red-800">Home </a>/ <a href="{{ route('browse') }}" class="text-red-800">Browse </a>/ <h class="text-red-800">Entity </h>
        </div>
        <div class="grid-col justify-self-end mr-12 pl-6">
            <img src="{{ asset('/storage/'.$entity->image) }}" alt="{{$entity->title}} Image" class="min-w-10 min-h-10  max-h-[550px] rounded-2xl">
        </div>
        <div class="grid-col w-3/4">
            <div class="text-lg md:text-2xl font-bold text-red-800 pb-3">{{ $entity->title }}</div>
            <div class="text-sm md:text-lg">{{ $entity->description }}</div>

            <div class="grid grid-cols-2">
                <div class="col-span-2 text-lg font-bold text-red-800 py-6">Details</div>
                <div class="font-bold col-span-1 py-2">Date: </div>
                <div class="col-span-1">{{ $entity->date->format('F d, Y') }}</div>
                <div class="font-bold col-span-1 py-2">Place: </div>
                <div class="col-span-1">{{ $entity->place }}</div>
                <div class="font-bold col-span-1 py-2">Material: </div>
                <div class="col-span-1">{{ $entity->material }}</div>
                <div class="font-bold col-span-1 py-2">Category: </div>
                <div class="col-span-1">{{ $entity->category }}</div>
                <div class="font-bold col-span-1 py-2">Tag: </div>
                <div class="col-span-1">
                    @if(!$entity->tags->isEmpty())
                        @foreach($entity->tags as $tag)   
                            {{ $tag->name }}{{ $loop->last ? '' : ',' }}
                        @endforeach
                    @else
                        No Tags Input
                    @endif
                </div>
                <div class="col-span-2 mt-20">
                    <a href="{{ route('browse') }}" class="rounded-full font-bold text-xl text-gray-800 bg-[#d4ab1a] mx-4 px-2 text-xs md:text-lg lg:text-xl md:px-2 lg:px-8 py-3 hover:text-black hover:bg-amber-400 text-nowrap">Request Access</a>
                </div>
            </div>
        </div>
    </div>
</div>
