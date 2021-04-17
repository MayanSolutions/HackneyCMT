<div>
    @if($systemCount > 0)
    <div class="relative inline-block text-left" x-data="{open:false}">
        <div>
            <button @click="open = true" type="button" class=" bg-white dark:bg-gray-800 flex items-center justify-center w-full rounded-md px-4 py-2 text-sm font-medium text-gray-700 dark:text-gray-50 hover:bg-gray-50 dark:hover:bg-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-100 focus:ring-gray-500" id="options-menu" >
                <p class="font-medium text-xs mr-2 border-gray-200 text-gray-700 dark:text-white">
                    <p class="font-bold text-xs mr-2 border-gray-200 text-red-500 dark:text-white">
                        {{ $systemCount }} System Alerts
                    </p>
                </p>
                <svg width="15" height="15" fill="currentColor" viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg">
                    <path d="M1408 704q0 26-19 45l-448 448q-19 19-45 19t-45-19l-448-448q-19-19-19-45t19-45 45-19h896q26 0 45 19t19 45z">
                    </path>
                </svg>
            </button>
        </div>
        <div x-show="open" @click.away="open=false" x-transition:enter-start="transition ease-in duration-3000" class="absolute z-10 -ml-4 mt-3 transform px-2 w-screen max-w-md sm:px-0 lg:ml-0 lg:left-1/2 lg:-translate-x-1/2">
            <div class="rounded-lg shadow-lg ring-1 ring-black flex flex-wrap ring-opacity-5 overflow-auto">
                <div class="relative grid gap-2 bg-white dark:bg-gray-800 px-5 py-6 sm:gap-4 sm:p-8 divide-y divide-gray-100">
                    <span class="font-bold text-md text-xs text-grey-500 dark:text-gray-300 dark:text-white">
                        <div class="flex items-center justify-start text-sm">
                            <span class="font-bold text-md p-1 text-xs text-grey-500 dark:text-gray-300 dark:text-white">
                                <x-heroicon-o-exclamation class="w-4 h-4 text-red-500"/>
                            </span>
                            <span class="font-bold text-md p-2 text-xs text-black dark:text-gray-300 dark:text-white">
                                My Alerts
                            </span>
                        </div>
                    </span>
                    @forelse($clientboard as $board)
                    <div class="flex items-center justify-start text-sm">
                        <span class="font-bold text-md p-2 text-xs text-grey-500 dark:text-gray-300 dark:text-white ml-2">
                            <x-heroicon-o-user-group class="w-4 h-4 text-purple-500"/>
                        </span>
                        <span class="font-bold text-md p-2 text-xs text-black dark:text-gray-300 dark:text-white ml-1">
                            {{ $board->client_organisation }} doesn't have any registered board members
                        </span>
                        <span class="font-bold text-md p-2 mr-4 text-xs text-purple-500 dark:text-gray-300 dark:text-white ml-1">
                            <span class="font-bold text-md p-2 text-xs text-black dark:text-gray-300 dark:text-white ml-1">
                                @can('client_edit')
                                <a href="{{ route('clients.show', $board->id) }}"  class="inline-flex font-bold bg-white text-gray-800 hover:bg-teal-600 text-white hover:text-white text-xs font-semibold py-1 px-2 rounded shadow">Fix</a>
                                @endcan
                            </span>
                        </span>
                    </div>
                    @empty
                    @endforelse

                    @forelse($clientestate as $estate)
                    <div class="flex items-center justify-start text-sm">
                        <span class="font-bold text-md p-2 text-xs text-orange-500 dark:text-gray-300 dark:text-white ml-2">
                            <x-heroicon-o-office-building class="w-4 h-4 text-purple-500"/>
                        </span>
                        <span class="font-bold text-md p-2 text-xs text-black dark:text-gray-300 dark:text-white ml-1">
                            {{ $estate->client_organisation }} has no estate make up
                        </span>
                        <span class="font-bold text-md p-2 mr-4 text-xs text-teal-500 dark:text-gray-300 dark:text-white ml-1">
                            <span class="font-bold text-md p-2 text-xs text-black dark:text-gray-300 dark:text-white ml-1">
                                @can('client_edit')
                                <a href="{{ route('clients.show', $estate->id) }}"  class="inline-flex font-bold bg-white text-gray-800 hover:bg-teal-600 text-white hover:text-white text-xs font-semibold py-1 px-2 rounded shadow">Fix</a>
                                @endcan
                            </span>
                        </span>
                    </div>
                    @empty
                    @endforelse

                    @foreach($liaison as $liaisons)
                    <div class="flex items-center justify-start text-sm">
                        <span class="font-bold text-md p-2 text-xs text-grey-500 dark:text-gray-300 dark:text-white ml-2">
                            <x-heroicon-o-user-circle class="w-4 h-4 text-purple-500"/>
                        </span>
                        <span class="font-bold text-md p-2 text-xs text-black dark:text-gray-300 dark:text-white ml-1">
                            {{ $liaisons->client_organisation }} has not been assigned a liaison officer
                        </span>
                        <span class="font-bold text-md p-2 mr-4 text-xs text-teal-500 dark:text-gray-300 dark:text-white ml-1">
                            <span class="font-bold text-md p-2 text-xs text-black dark:text-gray-300 dark:text-white ml-1">
                                @can('client_edit')
                                <a href="{{ route('clients.show', $liaisons->id) }}"  class="inline-flex font-bold bg-white text-gray-800 hover:bg-teal-600 text-white hover:text-white text-xs font-semibold py-1 px-2 rounded shadow">Fix</a>
                                @endcan
                            </span>
                        </span>
                    </div>
                    @endforeach

                    @forelse($expiringboard as $expire)
                    <div class="flex items-center justify-start text-sm">
                        <span class="font-bold text-md p-2 text-xs text-grey-500 dark:text-gray-300 dark:text-white ml-2">
                            <x-heroicon-o-user-group class="w-4 h-4 text-purple-500"/>
                        </span>
                        <span class="font-bold text-md p-2 text-xs text-black dark:text-gray-300 dark:text-white ml-1">
                            {{ $expire->client_organisation}} has one or more members whose position is due to expire this week.
                        </span>
                        <span class="font-bold text-md p-2 text-xs text-black dark:text-gray-300 dark:text-white ml-1">
                            @can('client_edit')
                            <a href="{{ route('clients.show', $expire->id) }}"  class="inline-flex font-bold bg-white text-gray-800 hover:bg-teal-600 text-white hover:text-white text-xs font-semibold py-1 px-2 rounded shadow">Fix</a>
                            @endcan
                        </span>
                    </div>
                    @empty
                    @endforelse

                    @forelse($clientfunctions as $function)
                    <div class="flex items-center justify-start text-sm">
                        <span class="font-bold text-md p-2 text-xs text-grey-500 dark:text-gray-300 dark:text-white ml-2">
                            <x-heroicon-o-view-grid-add class="w-4 h-4 text-purple-500"/>
                        </span>
                        <span class="font-bold text-md p-2 text-xs text-black dark:text-gray-300 dark:text-white ml-1">
                            {{ $function->client_organisation}} has not been assigned any functions
                        </span>
                        <span class="font-bold text-md p-2 text-xs text-black dark:text-gray-300 dark:text-white ml-1">
                            @can('client_edit')
                            <a href="{{ route('clients.show', $function->id) }}"  class="inline-flex font-bold bg-white text-gray-800 hover:bg-teal-600 text-white hover:text-white text-xs font-semibold py-1 px-2 rounded shadow">Fix</a>
                            @endcan
                        </span>
                    </div>
                    @empty
                    @endforelse

                </div>
            </div>
        </div>
    </div>
    @endif
</div>
