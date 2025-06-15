<div class="w-full h-full flex flex-col gap-2">

    {{-- Search Input --}}
    <div class="w-full mb-4">
        <div class="bg-white overflow-hidden shadow-sm rounded-lg">
            <div class="p-6 text-gray-900">
                <input type="text" placeholder="Search a user by name..." class="rounded-lg w-full"
                    wire:model.live.debounce.300ms="searchedUser">
            </div>
        </div>
    </div>

    {{-- User Cards --}}
    @foreach ($users as $billionaires)
        <div wire:key="user-{{ $billionaires->id }}"
            class="w-full h-auto bg-white p-4 rounded-lg flex flex-row items-center justify-center gap-4 shadow-lg cursor-pointer hover:scale-105 transition-all duration-300"
            wire:click='selectUser({{ $billionaires->id }})'>
            <div class="flex flex-1 flex-col">
                <h3 class="font-bold">{{ $billionaires->name }}</h3>
                <span class="text-gray-500">{{ $billionaires->email }}</span>
            </div>
            <div class="flex flex-row h-full items-center justify-center gap-2">
                <span>Remaining money: </span>
                <span class="text-green-400">$ {{ number_format(1000000000 - $billionaires->total_expense) }}</span>
            </div>
        </div>
    @endforeach

    {{-- ✅ Properly Rendered Modal Below Loop --}}
    @if ($viewUser)
        <div wire:key="modal" wire:ignore.self
            class="fixed inset-0 z-50 bg-black bg-opacity-50 flex items-center justify-center"
            wire:click="closeModal">
            <div class="w-[90%] md:max-w-xl lg:max-w-4xl max-h-[80%] bg-white/90 p-6 rounded-lg shadow-lg overflow-auto z-100"
                wire:click.stop>
                {{-- Modal Header --}}
                <div class="flex flex-wrap items-center gap-4 border-b pb-2 bg-white p-4 rounded-lg mb-4 shadow-lg">
                    <div class="flex-1">
                        <h3 class="font-bold">{{ $user->name }}</h3>
                        <span class="text-gray-500">{{ $user->email }}</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <span>Remaining:</span>
                        <span class="text-green-400">$ {{ number_format($userRemainingMoney) }}</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <span>Spent:</span>
                        <span class="text-red-400">$ {{ number_format($userTotalSpent) }}</span>
                    </div>
                </div>

                {{-- Modal Items --}}
                <div class="grid grid-cols-1 md:grid-cols-2 gap-2">
                    @foreach ($boughtItems as $userItem)
                        @if ($userItem->amount !== 0)
                            <div class="w-full bg-white p-4 rounded-lg">
                                <div class="h-48 overflow-hidden rounded-md mb-2">
                                    <img src="{{ $userItem->image }}" class="w-full h-full object-cover" />
                                </div>
                                <h3 class="text-blue-400 font-bold">{{ $userItem->item_name }}</h3>
                                <p>Price: ${{ $userItem->price }}</p>
                                <div class="flex justify-between mt-2">
                                    <span>Amount: {{ $userItem->amount }}</span>
                                    <span>Total: <span class="text-green-400">$ {{ number_format($userItem->total) }}</span></span>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    @endif

</div>
