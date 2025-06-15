<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Available Items') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mb-4">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 flex flex-row">
                    {{ __("You're logged in as ") }} <span class="font-bold ml-2">"{{ Auth::user()->name }}"</span>
                    <span class="font-bold ml-2 flex-1 text-center flex flex-row items-center justify-center">Remaining Money:  <livewire:remaining-money/></span>
                    <span class="font-bold ml-2 flex-1 text-center flex flex-row items-center justify-center">Total Expenses:  <livewire:total-spent/></span>
                </div>
            </div>
        </div>

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <livewire:display-items />
        </div>

    </div>
</x-app-layout>
