<x-app-layout>
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js"></script>
	<x-slot name="header">
		<h2 class="font-semibold text-xl text-gray-800 leading-tight">
            User Details
        </h2>
    </x-slot>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            <div class="block mb-8">
                <a href="{{ URL::previous() }}" class="bg-teal-400 hover:bg-teal-600 text-white font-bold text-xs py-2 px-4 rounded">Go Back</a>
                <a href="{{ route('users.index') }}" class="bg-gray-400 hover:bg-gray-500 text-white font-bold text-xs py-2 px-4 rounded">Accounts List</a>
            </div>
            <div class="block mb-5">
                @if($user->active == true)
                <div class="inline-block"><h2 class="font-semibold text-xl text-gray-600 ml-2 leading-tight text-left">Active </h2></div>
                <div class="inline-block"><x-heroicon-s-badge-check class="ml-2 h-4 w-4 text-green-500"/></div>
                @else
                <div class="inline-block"><h2 class="font-semibold text-xl text-gray-600 ml-2 leading-tight">Inactive</h2></div>
                <div class="inline-block"><x-heroicon-s-ban class="ml-1 h-4 w-4 text-red-600" /></div>
                @endif
                @can('user_edit')
                <div class="ml-1 inline-block">
                <form method="post" id="activetoggle" action="{{ route('users.custom.store', $user->id) }}">
                @csrf
                    <label class="flex items-center">
                        <input class="relative w-10 h-5 transition-all duration-200 ease-in-out bg-gray-400 rounded-full shadow-inner outline-none appearance-none "
                        type="checkbox" value="" {{ $user->active ? 'checked' : '' }}
                        onchange="document.getElementById('activetoggle').submit()"/>
                      </label>
                      <style>
                        input:before {
                          content: '';
                          position: absolute;
                          width: 1.25rem;
                          height: 1.25rem;
                          border-radius: 50%;
                          top: 0;
                          left: 0;
                          transform: scale(1.1);
                          box-shadow: 0 0.125rem 0.5rem rgba(0, 0, 0, 0.2);
                          background-color: white;
                          transition: .2s ease-in-out;
                        }

                        input:checked {
                          @apply: bg-indigo-400;
                          background-color:#7f9cf5;
                        }

                        input:checked:before {
                          left: 1.25rem;
                        }
                      </style>
                      </form>
                </div>
                @endcan
            </div>
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
                        @if(!empty($clientDetails->EstateDetails))
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
                              <td class="px-6 py-4 whitespace-nowrap">
                                 <div class="flex items-center">
                                    <div class="">
                                       <div class="text-sm font-medium text-gray-900">
                                        {{ $client->EstateDetails->no_of_units }} Units
                                       </div>
                                    </div>
                                 </div>
                              </td>
                            </tr>
                        </tbody>
                              @else
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
                                </tr>
                              </tbody>
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
</x-app-layout>
