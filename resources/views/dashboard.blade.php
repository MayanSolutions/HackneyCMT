<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            <div class="grid grid-rows-1 grid-flow-col gap-2">
                <div class="row-span-3">
                    <div>
                        @livewire('dashprofile')
                    </div>
                        <br>
                    <div>
                        @livewire('dashnotifications')
                    </div>
                </div>
              </div>
        </div>
</x-app-layout>
