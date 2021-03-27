<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            <div class="flex flex-col">
               <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                  <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                     <div class="overflow-hidden sm:rounded-lg">
                        <div class="flex flex-col">
                           <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="grid grid-flow-col grid-cols-2 grid-rows-1 gap-4">
                                <div>
                                    @livewire('dashnotifications')
                                </div>
                              </div>

                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
</x-app-layout>
