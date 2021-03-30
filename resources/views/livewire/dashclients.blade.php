<div>
    <div class="container w-full mb-2 items-center">
        <div class="shadow-lg rounded-2xl w-full p-2 bg-white dark:bg-gray-800">
            <p class="font-bold text-md p-2 border-b mb-3 border-gray-200 text-black dark:text-white">
                Assigned Management Organisation's
            </p>
            <div class="flex flex-row mb-1 sm:mb-0 justify-between w-full">
                <h3 class="font-bold text-sm p-2 text-black dark:text-white">
                    Search by TMO
                </h3>
                <div class="text-end">
                    <form class="flex w-full max-w-sm space-x-3">
                        <div class="relative">
                            <input type="text" id="tmo" class=" text-xs rounded-lg border-transparent flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" placeholder="TMO"/>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @if($clients != Null)
    <div class="container w-full items-center">
        <div class="flex flex-col">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
              <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                  <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                      <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                          Organisation
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                          Management
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                          Board Status
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">

                        </th>
                      </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach($clients as $client)
                      <tr>
                        <td class="px-6 py-4 whitespace-nowrap">
                          <div class="flex items-center">
                            <div class="ml-1">
                              <div class="text-sm font-medium text-gray-900">
                                {{ $client->organisation }}
                              </div>
                              <div class="text-sm text-gray-500">
                                {{ $client->client_address }}
                              </div>
                            </div>
                          </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                          <div class="text-sm text-gray-900">{{ $client->client_manager }}</div>
                          <div class="text-sm text-gray-500">{{ $client->client_deputy }}</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            @if($client->members != Null)
                            Board Elected
                            @else
                            No board registered
                            @endif
                        </td>
                        <td class="px-2 py-1 whitespace-nowrap text-sm text-gray-500">
                            @can('client_access')
                            <a href="{{ route('clients.show', $client->id) }}" class="inline-flex bg-white hover:bg-purple-600 text-gray-800 hover:text-white text-xs font-semibold py-1 px-2 border border-gray-400 rounded shadow">Show</a>
                            @endcan
                            @can('client_edit')
                            <a href="{{ route('clients.edit', $client->id) }}" class="inline-flex bg-white hover:bg-orange-500 text-gray-800 hover:text-white text-xs font-semibold py-1 px-2 border border-gray-400 rounded shadow">Modify</a>
                            @endcan
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
    </div>
    @else
    <p class="font-bold text-md p-2 border-b mb-3border-gray-200 text-black dark:text-white">
        You have no client assigned to you
    </p>
    @endif

</div>
