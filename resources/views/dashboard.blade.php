<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">

        <div class="bg-gray-100 min-h-screen w-full flex">
            <div class="grid grid-cols-3 grid-rows-2 gap-6">
                <div class="col-span-1">@livewire('dashprofile')</div>
                <div class="col-span-2">@livewire('dashnotifications')</div>
                <div class="col-span-2"></div>
                <div class="col-span-1"></div>
            </div>
        </div>

    </div>
</x-app-layout>
