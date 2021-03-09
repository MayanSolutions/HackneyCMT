<x-app-layout>
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js"></script>
	<x-slot name="header">
		<h2 class="font-semibold text-xl text-gray-800 leading-tight">
            User Details
        </h2>
    </x-slot>
	<div>

        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            <div class="block mb-8"> <a href="{{ route('users.index') }}" class="bg-gray-400 hover:bg-gray-500 text-white font-bold text-xs py-2 px-4 rounded">Accounts List</a> </div>
            <div class="flex flex-col">
                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                  <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                        <h2 class="mb-2 mt-4 ml-6 font-extrabold float-left tracking-tight text-gray-700">
                            Account information
                        </h2>
                      <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                          <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                              Name
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                              Title
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                              System Access
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                              Organisation
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                              Last Login
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                              Responsibility
                            </th>
                          </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                          <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                              <div class="flex items-center">
                                <div class="flex-shrink-0 h-10 w-10">
                                    <img class="h-10 w-10 rounded-full" src="{{ $user->profile_photo_url }}" alt="">
                                </div>
                                <div class="ml-4">
                                  <div class="text-sm font-medium text-gray-900">
                                    {{ $user->name }}
                                  </div>
                                  <div class="text-sm text-gray-500">
                                    {{ $user->email }}
                                  </div>
                                </div>
                              </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                              <div class="text-sm text-gray-900">{{ $user->job_title }}</div>
                              <div class="text-sm text-gray-500">{{ $user->department }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                @foreach ($user->roles as $role)
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                        {{ $role->title }}
                                </span>
                                @endforeach
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                {{ $user->organisation }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">{{ \Carbon\Carbon::parse($user->last_login)->format('j F, Y h:i:s A') }}</div>
                                <div class="text-xs text-gray-500">IP Address{{ $user->last_login_ip }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                @if($clientDetails->count() > 1)
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-orange-100 text-green-800">
                                        {{ $clientDetails->count() }} Organisation's
                                </span>
                                @else
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-orange-100 text-green-800">
                                    {{ $clientDetails->count() }} Organisation
                                </span>
                                @endif
                            </td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
        </div>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            <div class="flex flex-col">
               <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                  <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                     <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                        <h2 class="mb-2 mt-4 ml-6 font-extrabold float-left tracking-tight text-gray-700">
                           Assigned Clients
                        </h2>
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
                                 Properties
                              </th>
                              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                 Residents
                              </th>
                              <th scope="col" class="relative px-6 py-3">
                                 <span class="sr-only">Edit</span>
                              </th>
                           </tr>
                        </thead>
                        @foreach ($clientDetails as $client)
                        <tbody class="bg-white divide-y divide-gray-200">
                           <tr>
                              <td class="px-6 py-4 whitespace-nowrap">
                                 <div class="flex items-center">
                                    <div class="">
                                       <div class="text-sm font-medium text-gray-900">
                                          {{ $client->client_organisation }}
                                       </div>
                                       <div class="text-sm text-gray-500">
                                          {{ $client->client_pfn_email }}
                                       </div>
                                       <div class="text-xs text-gray-500">
                                          {{ $client->client_pfn }}
                                       </div>
                                    </div>
                                 </div>
                              </td>
                              <td class="px-6 py-4 whitespace-nowrap">
                                 <div class="flex items-center">
                                    <div class="">
                                       <div class="text-sm font-medium text-gray-900">
                                          {{ $client->client_manager }}
                                       </div>
                                       <div class="text-xs text-gray-500">
                                          {{ $client->client_deputy }}
                                       </div>
                                    </div>
                                 </div>
                              </td>
                              @if(!empty($clientDetails->EstateDetails))
                              <td class="px-6 py-4 whitespace-nowrap">
                                 <div class="flex items-center">
                                    <div class="">
                                       <div class="text-sm font-medium text-gray-900">
                                        {{ $client->EstateDetails->no_of_units }} Units
                                       </div>
                                    </div>
                                 </div>
                              </td>

                              <td class="px-6 py-4 whitespace-nowrap">
                                 <div class="text-xs text-gray-500 ">
                                    {{ $client->EstateDetails->tenants }} Tenants
                                </div>
                                <div class="text-xs text-gray-500 ">
                                    {{ $client->EstateDetails->leaseholders }} Leaseholders
                                </div>
                                <div class="text-xs text-gray-500 ">
                                    {{ $client->EstateDetails->freeholders }} Freeholders
                                </div>
                              </td>
                                @else
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                       <div class="">
                                          <div class="text-sm font-medium text-gray-900">
                                           No Estate has been registered
                                          </div>
                                       </div>
                                    </div>
                                 </td>

                                 <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-xs text-gray-500 ">
                                       0 Tenants
                                   </div>
                                   <div class="text-xs text-gray-500 ">
                                       0 Leaseholders
                                   </div>
                                   <div class="text-xs text-gray-500 ">
                                       0 Freeholders
                                   </div>
                                 </td>
                                 @endif

                              <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                 <a href="{{ route('clients.show', $client->id) }}" class="inline-flex bg-white hover:bg-purple-600 text-gray-800 hover:text-white text-xs font-semibold py-1 px-2 border border-gray-400 rounded shadow">Show</a>
                                 @can('client_edit')
                                 <a href="{{ route('clients.edit', $client->id) }}" class="inline-flex bg-white hover:bg-black text-gray-800 hover:text-white text-xs font-semibold py-1 px-2 border border-gray-400 rounded shadow">Reassign</a>
                                     @endcan
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
        </div>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            <div class="flex flex-col">
               <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                  <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                     <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                        <h2 class="mb-2 mt-4 ml-6 font-extrabold float-left tracking-tight text-gray-700">
                           User Activity
                        </h2>
                        <form action="{{ route('users.show', $user->id ) }}" method="GET" role="search">
                            <div class="pt-2 relative mx-auto float-right mr-3 mb-2 text-gray-600">
                            <input class="border-2 border-gray-300 bg-white h-10 px-5 pr-16 rounded-lg text-sm focus:outline-none" type="text" name="activity" placeholder="Search Activity">
                            <button type="submit" id="organisation" class="absolute right-0 top-0 mt-5 mr-4">
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
                        @if (count($useractivities) > 0)
                     <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                           <tr>
                              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                 Acitivty Detail
                              </th>
                              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                 Description
                              </th>
                              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                 Original Data
                              </th>
                              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                 New Data
                              </th>
                           </tr>
                        </thead>
                        @foreach ($useractivities as $useractivity)
                        <tbody class="bg-white divide-y divide-gray-200">
                           <tr>
                              <td class="px-6 py-4 whitespace-nowrap">
                                 <div class="flex items-center">
                                    <div class="">
                                       <div class="text-sm font-medium text-gray-900">
                                          Change Reference {{ $useractivity->id }}
                                       </div>
                                       <div class="text-xs text-gray-500">
                                          Executed on {{ $useractivity->created_at }}
                                       </div>
                                    </div>
                                 </div>
                              </td>
                              <td class="px-6 py-4 whitespace-nowrap">
                                 <div class="flex items-center">
                                    <div class="">
                                       <div class="text-sm font-medium text-gray-900">
                                        {{ $useractivity->causer->name }} {{ $useractivity->description }} a record
                                       </div>
                                       <div class="text-xs text-gray-500">
                                        <strong>{{ $useractivity->log_name }}</strong>
                                       </div>
                                       <div class="text-xs text-gray-500">
                                        <strong>Unique Identifier {{ $useractivity->subject_id }}</strong>
                                       </div>
                                    </div>
                                 </div>
                              </td>
                              <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-xs text-gray-500 ">{{ $useractivity['properties']['old']['name'] ?? ""}}</div>
                                    <div class="text-xs text-gray-500 ">{{ $useractivity['properties']['old']['job_title'] ?? ""}}</div>
                                    <div class="text-xs text-gray-500 ">{{ $useractivity['properties']['old']['department'] ?? ""}}</div>
                                    <div class="text-xs text-gray-500 ">{{ $useractivity['properties']['old']['organisation'] ?? ""}}</div>
                                    <div class="text-xs text-gray-500 ">{{ $useractivity['properties']['old']['email'] ?? ""}}</div>
                                    <div class="text-xs text-gray-500 ">{{ $useractivity['properties']['old']['client_organisation'] ?? ""}}</div>
                                    <div class="text-xs text-gray-500 ">{{ $useractivity['properties']['old']['client_address'] ?? ""}}</div>
                                    <div class="text-xs text-gray-500 ">{{ $useractivity['properties']['old']['client_pfn_email'] ?? ""}}</div>
                                    <div class="text-xs text-gray-500 ">{{ $useractivity['properties']['old']['client_pfn'] ?? ""}}</div>
                                    <div class="text-xs text-gray-500 ">{{ $useractivity['properties']['old']['client_manager'] ?? ""}}</div>
                                    <div class="text-xs text-gray-500 ">{{ $useractivity['properties']['old']['client_manager_contact'] ?? ""}}</div>
                                    <div class="text-xs text-gray-500 ">{{ $useractivity['properties']['old']['client_manager_email'] ?? ""}}</div>
                                    <div class="text-xs text-gray-500 ">{{ $useractivity['properties']['old']['client_deputy'] ?? ""}}</div>
                                    <div class="text-xs text-gray-500 ">{{ $useractivity['properties']['old']['client_chair'] ?? ""}}</div>
                                    <div class="text-xs text-gray-500 ">{{ $useractivity['properties']['old']['client_chair_contact'] ?? ""}}</div>
                                    <div class="text-xs text-gray-500 ">{{ $useractivity['properties']['old']['client_chair_email'] ?? ""}}</div>
                                    <div class="text-xs text-gray-500 ">{{ $useractivity['properties']['old']['client_secretary'] ?? ""}}</div>
                                    <div class="text-xs text-gray-500 ">{{ $useractivity['properties']['old']['user_id'] ?? ""}}</div>
                                    <div class="text-xs text-gray-500 ">{{ $useractivity['properties']['old']['client_id'] ?? ""}}</div>
                                    <div class="text-xs text-gray-500 ">{{ $useractivity['properties']['old']['no_of_units'] ?? ""}}</div>
                                    <div class="text-xs text-gray-500 ">{{ $useractivity['properties']['old']['leaseholders'] ?? ""}}</div>
                                    <div class="text-xs text-gray-500 ">{{ $useractivity['properties']['old']['freeholders'] ?? ""}}</div>
                                    <div class="text-xs text-gray-500 ">{{ $useractivity['properties']['old']['tenants'] ?? ""}}</div>
                                    <div class="text-xs text-gray-500 ">{{ $useractivity['properties']['old']['comm_halls'] ?? ""}}</div>
                                    <div class="text-xs text-gray-500 ">{{ $useractivity['properties']['old']['outside_areas'] ?? ""}}</div>
                                    <div class="text-xs text-gray-500 ">{{ $useractivity['properties']['old']['communal_facilities'] ?? ""}}</div>
                                    <div class="text-xs text-gray-500 ">{{ $useractivity['properties']['old']['category'] ?? ""}}</div>
                                    <div class="text-xs text-gray-500 ">{{ $useractivity['properties']['old']['description'] ?? ""}}</div>
                                    <div class="text-xs text-gray-500 ">{{ $useractivity['properties']['old']['function'] ?? ""}}</div>
                                    <div class="text-xs text-gray-500 ">{{ $useractivity['properties']['old']['title'] ?? ""}}</div>
                                    <div class="text-xs text-gray-500 ">{{ $useractivity['properties']['old']['purpose'] ?? ""}}</div>

                              </td>
                              <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-xs text-gray-500 ">{{ $useractivity['properties']['attributes']['name'] ?? ""}}</div>
                                    <div class="text-xs text-gray-500 ">{{ $useractivity['properties']['attributes']['job_title'] ?? ""}}</div>
                                    <div class="text-xs text-gray-500 ">{{ $useractivity['properties']['attributes']['department'] ?? ""}}</div>
                                    <div class="text-xs text-gray-500 ">{{ $useractivity['properties']['attributes']['organisation'] ?? ""}}</div>
                                    <div class="text-xs text-gray-500 ">{{ $useractivity['properties']['attributes']['email'] ?? ""}}</div>
                                    <div class="text-xs text-gray-500 ">{{ $useractivity['properties']['attributes']['client_organisation'] ?? ""}}</div>
                                    <div class="text-xs text-gray-500 ">{{ $useractivity['properties']['attributes']['client_address'] ?? ""}}</div>
                                    <div class="text-xs text-gray-500 ">{{ $useractivity['properties']['attributes']['client_pfn_email'] ?? ""}}</div>
                                    <div class="text-xs text-gray-500 ">{{ $useractivity['properties']['attributes']['client_pfn'] ?? ""}}</div>
                                    <div class="text-xs text-gray-500 ">{{ $useractivity['properties']['attributes']['client_manager'] ?? ""}}</div>
                                    <div class="text-xs text-gray-500 ">{{ $useractivity['properties']['attributes']['client_manager_contact'] ?? ""}}</div>
                                    <div class="text-xs text-gray-500 ">{{ $useractivity['properties']['attributes']['client_manager_email'] ?? ""}}</div>
                                    <div class="text-xs text-gray-500 ">{{ $useractivity['properties']['attributes']['client_deputy'] ?? ""}}</div>
                                    <div class="text-xs text-gray-500 ">{{ $useractivity['properties']['attributes']['client_chair'] ?? ""}}</div>
                                    <div class="text-xs text-gray-500 ">{{ $useractivity['properties']['attributes']['client_chair_contact'] ?? ""}}</div>
                                    <div class="text-xs text-gray-500 ">{{ $useractivity['properties']['attributes']['client_chair_email'] ?? ""}}</div>
                                    <div class="text-xs text-gray-500 ">{{ $useractivity['properties']['attributes']['client_secretary'] ?? ""}}</div>
                                    <div class="text-xs text-gray-500 ">{{ $useractivity['properties']['attributes']['user_id'] ?? ""}}</div>
                                    <div class="text-xs text-gray-500 ">{{ $useractivity['properties']['attributes']['client_id'] ?? ""}}</div>
                                    <div class="text-xs text-gray-500 ">{{ $useractivity['properties']['attributes']['no_of_units'] ?? ""}}</div>
                                    <div class="text-xs text-gray-500 ">{{ $useractivity['properties']['attributes']['leaseholders'] ?? ""}}</div>
                                    <div class="text-xs text-gray-500 ">{{ $useractivity['properties']['attributes']['freeholders'] ?? ""}}</div>
                                    <div class="text-xs text-gray-500 ">{{ $useractivity['properties']['attributes']['tenants'] ?? ""}}</div>
                                    <div class="text-xs text-gray-500 ">{{ $useractivity['properties']['attributes']['comm_halls'] ?? ""}}</div>
                                    <div class="text-xs text-gray-500 ">{{ $useractivity['properties']['attributes']['outside_areas'] ?? ""}}</div>
                                    <div class="text-xs text-gray-500 ">{{ $useractivity['properties']['attributes']['communal_facilities'] ?? ""}}</div>
                                    <div class="text-xs text-gray-500 ">{{ $useractivity['properties']['attributes']['category'] ?? ""}}</div>
                                    <div class="text-xs text-gray-500 ">{{ $useractivity['properties']['attributes']['description'] ?? ""}}</div>
                                    <div class="text-xs text-gray-500 ">{{ $useractivity['properties']['attributes']['function'] ?? ""}}</div>
                                    <div class="text-xs text-gray-500 ">{{ $useractivity['properties']['attributes']['title'] ?? ""}}</div>
                                    <div class="text-xs text-gray-500 ">{{ $useractivity['properties']['attributes']['purpose'] ?? ""}}</div>
                             </td>
                           </tr>
                           @endforeach
                           <!-- More items... -->
                        </tbody>
                     </table>
                     @else
                        <section class="w-full bg-gradient-to-b from-gray-100 to-white">
                            <div class="w-full px-4 py-10 mx-auto text-left md:text-center md:w-3/4 lg:w-2/4">
                                <h2 class="mb-6 font-extrabold tracking-tight md:text-1xl md:mb-6 md:leading-tight">
                                    Opps, It looks like there are no activities here
                                </h2>
                                <div class="mb-0 space-x-0 md:space-x-2">
                                    <p class="mt-1 max-w-2xl text-xs text-gray-600 text-white">
                                        If you just ran a search, click search icon again to return.
                                    </p>
                                </div>
                            </div>
                        </section>
                    @endif
                     </div>
                  </div>
               </div>
            </div>
            <br>
            {!! $useractivities->links() !!}
        </div>
    </div>
</x-app-layout>
