<div class="w-full h-full grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-2">

    {{-- Card --}}
    @foreach ($items as $item)
        @php
            $userItem = $user_items->firstWhere('item_id', $item->id);
        @endphp
        <div class="w-full h-auto bg-white p-4 rounded-lg flex flex-col gap-4">
            <div class="w-full h-48 overflow-hidden rounded-md">
                <img src="{{ $item->image }}" alt="{{ $item->item_name }}" class="w-full h-full object-cover" />
            </div>
            <h3 class="text-blue-400">{{ $item->item_name }}</h3>
            <p>Price: ${{ number_format($item->price) }}</p>
            <div class="flex flex-row items-center gap-4">
                <button class="px-2 rounded-md bg-red-300" wire:click='subtractItem({{ $item->id }})'>-</button>
                <span>{{ $userItem ? $userItem->amount : 0 }}</span>
                <button class="px-2 rounded-md bg-green-300" wire:click='addItem({{ $item->id }})'>+</button>
            </div>
        </div>
    @endforeach

</div>
