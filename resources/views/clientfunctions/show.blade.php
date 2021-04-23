<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $clients->client_organisation}}
        </h2>
    </x-slot>

        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            <div class="block mb-8">
                <a href="{{ route('clients.index') }}" class="bg-gray-400 hover:bg-gray-500 text-white font-bold text-xs py-2 px-4 rounded">Organisation List</a>
             </div>
            <div class="mt-5 md:mt-0 md:col-span-2">
                <div class="shadow overflow-hidden sm:rounded-md">
                    <div class="bg-teal-500 px-4 py-5 sm:px-6">
                        <h3 class="mb-1 mt-1 ml-1 text-lg font-extrabold tracking-tight text-white">
                          {{ $clients->client_organisation}}
                        </h3>
                        <p class="mb-1 mt-1 ml-1 max-w-2xl text-xs text-white">
                            {{ $clients->client_address }}
                        </p>
                    </div>
                </div>
                <br>
                @if(!empty($clientDetails->EstateDetails))
                <div class="bg-white shadow overflow-hidden sm:rounded-lg">
                    <div class="px-4 py-8 mx-auto sm:max-w-xl md:max-w-full lg:max-w-screen-xl md:px-12 lg:px-8 lg:py-8">
                        <div class="grid grid-cols-2 row-gap-8 md:grid-cols-5">
                          <div class="text-center">
                            <h6 class="text-3xl font-bold text-deep-purple-accent-400">{{ $clientDetails->EstateDetails->tenants }}</h6>
                            <p class="font-bold">Tenants</p>
                          </div>
                          <div class="text-center">
                            <h6 class="text-3xl font-bold text-deep-purple-accent-400">{{ $clientDetails->EstateDetails->leaseholders }}</h6>
                            <p class="font-bold">Leaseholders</p>
                          </div>
                          <div class="text-center">
                            <h6 class="text-3xl font-bold text-deep-purple-accent-400">{{ $clientDetails->EstateDetails->freeholders }}</h6>
                            <p class="font-bold">Freeholders</p>
                          </div>
                          <div class="text-center">
                            <h6 class="text-3xl font-bold text-deep-purple-accent-400">{{ $clientDetails->EstateDetails->no_of_units }}</h6>
                            <p class="font-bold">Properties</p>
                          </div>
                          <div class="text-center">
                            <h6 class="text-3xl font-bold text-deep-purple-accent-400">{{ round($control) }}%</h6>
                            <p class="font-bold">Functions</p>
                          </div>
                        </div>
                        @else
                        <div class="shadow overflow-hidden sm:rounded-md">
                            <div class="shadow overflow-hidden sm:rounded-md">
                                <div class="bg-red-500 px-4 py-5 sm:px-6">
                                    <h3 class="mb-1 mt-1 ml-1 text-lg font-extrabold tracking-tight text-white">
                                      Estate Profile
                                    </h3>
                                    <p class="mb-1 mt-1 ml-1 max-w-2xl text-xs text-white">
                                        This relates to property and resident makeup of the estate
                                    </p>
                                </div>
                                <div class="border-t border-gray-200">
                                    <div class="shadow overflow-hidden border-b border-gray-200">
                                       <section class="w-full bg-gradient-to-b from-gray-100 to-white">
                                          <div class="w-full px-4 py-10 mx-auto text-left md:text-center md:w-3/4 lg:w-2/4">
                                             <h2 class="mb-6 font-extrabold tracking-tight md:text-1xl md:mb-6 md:leading-tight">
                                                This TMO does not have an estate makeup. Please click below to create an estate profile. Please do not ignore this warning !
                                             </h2>
                                             <div class="mb-0 space-x-0 md:space-x-2">
                                                <a href="/estatedetails/create/{{$clientDetails->id}}" class="inline-block rounded-full text-white
                                                bg-gray-600 hover:bg-purple-600 duration-300
                                                text-xs font-bold
                                                mr-1 md:mr-2 mb-2 px-2 md:px-4 py-1
                                                opacity-90 hover:opacity-100">Create Estate</a>
                                             </div>
                                          </div>
                                       </section>
                                    </div>
                                 </div>
                            </div>
                          @endif
                    </div>
                </div>
                <br>
                <div class="shadow overflow-hidden sm:rounded-md flex flex-col">
                    <div class="bg-purple-600 px-4 py-5 sm:px-6">
                        <h3 class="mb-1 mt-1 ml-1 text-lg font-extrabold tracking-tight text-white">
                          Management Functions
                        </h3>
                        <p class="mb-1 mt-1 ml-1 max-w-2xl text-xs text-white">
                            Areas of operation, under responsibility of the TMO organisation
                        </p>
                        <form action="{{ route('clientfunctions.show', $clients->id) }}" method="GET" role="search">
                            <div class="pt-2 relative mx-auto float-right mr-3 mb-2 text-gray-600">
                              <input class="border-2 border-gray-300 bg-white h-10 px-5 pr-16 rounded-lg text-sm focus:outline-none" type="text" name="function" placeholder="Search Function">
                              <button type="submit" id="function" class="absolute right-0 top-0 mt-5 mr-4">
                                <svg class="text-gray-600 h-4 w-4 fill-current" xmlns="http://www.w3.org/2000/svg"
                                  xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px"
                                  viewBox="0 0 56.966 56.966" style="enable-background:new 0 0 56.966 56.966;" xml:space="preserve"
                                  width="512px" height="512px">
                                  <path
                                    d="M55.146,51.887L41.588,37.786c3.486-4.144,5.396-9.358,5.396-14.786c0-12.682-10.318-23-23-23s-23,10.318-23,23  s10.318,23,23,23c4.761,0,9.298-1.436,13.177-4.162l13.661,14.208c0.571,0.593,1.339,0.92,2.162,0.92  c0.779,0,1.518-0.297,2.079-0.837C56.255,54.982,56.293,53.08,55.146,51.887z M23.984,6c9.374,0,17,7.626,17,17s-7.626,17-17,17  s-17-7.626-17-17S14.61,6,23.984,6z" />
                                </svg>
                              </button>
                            </div>
                         </form>
                    </div>
                    <div class="border-t border-gray-200">
                        <div class="shadow overflow-hidden border-b border-gray-200">
                            @if (count($clientFunctions) > 0)
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                   <tr>
                                      <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Service
                                      </th>
                                      <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                       Function
                                      </th>
                                      <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Cost Code
                                      </th>
                                      <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Subjective
                                      </th>
                                      <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Description
                                      </th>
                                      <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        @can('can_function_assign')<a href="{{ route('clientfunctions.edit', $clients->id) }}" class="inline-flex bg-white hover:bg-orange-500 text-gray-800 hover:text-white text-xs font-semibold py-1 px-2 border border-gray-400 rounded shadow">Modify</a>@endcan
                                      </th>
                                   </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                   @foreach($clientFunctions as $client)
                                   <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        {{ $client->category }}
                                    </td>

                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        {{ $client->function }}
                                    </td>

                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        {{ $client->cost_code }}
                                    </td>

                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        {{ $client->subjective }}
                                    </td>

                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        {{ $client->description }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">

                                    </td>
                                </tr>
                                   @endforeach
                                   <!-- More items... -->
                                </tbody>
                             </table>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                {!! $clientFunctions->links() !!}
                             @else
                             <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                   <tr>
                                      <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Service
                                      </th>
                                      <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                       Function
                                      </th>
                                      <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Cost Code
                                      </th>
                                      <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Subjective
                                      </th>
                                      <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Description
                                      </th>
                                      <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        <a href="{{ route('clientfunctions.edit', $clients->id) }}" class="inline-block rounded-full mr-4"><x-heroicon-s-pencil-alt class="h-5 w-5 text-purple-700" /></a>
                                      </th>
                                   </tr>
                                </thead>
                            </table>
                             <section class="w-full bg-gradient-to-b from-gray-100 to-white">
                                <div class="w-full px-4 py-10 mx-auto text-left md:text-center md:w-3/4 lg:w-2/4">
                                  <h2 class="mb-6 font-extrabold tracking-tight md:text-1xl md:mb-6 md:leading-tight">
                                      Opps, It looks like that Function has not been assigned to this TMO !
                                    </h2>
                                    @can('can_function_assign')
                                  <div class="mb-0 space-x-0 md:space-x-2">
                                    <p class="mt-1 max-w-2xl text-xs text-gray-600 text-white">
                                        Click the edit icon to assign permissions. If you cannot see it then you dont have the required permission
                                    </p>
                                  </div>
                                  @endcan
                                </div>
                              </section>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
</x-app-layout>
