<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $clientDetails->client_organisation}}
        </h2>
    </x-slot>
    <div>
        <div class="max-w-4xl mx-auto py-10 sm:px-6 lg:px-8">
            <div class="block mb-8">
                <a href="{{ route('clients.index') }}" class="bg-gray-400 hover:bg-gray-500 text-white font-bold text-xs py-2 px-4 rounded">Organisation List</a>
             </div>

                <div class="bg-purple-600 shadow overflow-hidden sm:rounded-lg">
                    <div class="px-4 py-5 sm:px-6">
                        <h3 class="text-lg leading-6 font-medium text-white">
                            Liaison Officer
                        </h3>
                        <p class="mt-1 max-w-2xl text-xs text-white">
                            This client has been assigned to the below officer
                        </p>
                    </div>
                    <div class="border-t border-gray-200">
                        <div class="shadow overflow-hidden border-b border-gray-200">
                            @if (count($liaisonDetails) > 0)
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
                                        Organisation
                                     </th>
                                     <th scope="col" class="relative px-6 py-3">
                                        <span class="sr-only">View</span>
                                     </th>
                                  </tr>
                               </thead>
                               <tbody class="bg-white divide-y divide-gray-200">
                                  @foreach ($liaisonDetails as $liaisonDetail)
                                  <tr>
                                     <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                           <div class="flex-shrink-0 h-10 w-10">
                                              <img class="h-10 w-10 rounded-full" src="{{ $liaisonDetail->profile_photo_url }}" alt="">
                                           </div>
                                           <div class="ml-4">
                                              <div class="text-sm font-medium text-gray-900">
                                                 {{ $liaisonDetail->name }}
                                              </div>
                                              <div class="text-sm text-gray-500">
                                                 {{ $liaisonDetail->email }}
                                              </div>
                                           </div>
                                        </div>
                                     </td>
                                     <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">{{ $liaisonDetail->job_title }}</div>
                                        <div class="text-sm text-gray-500">{{ $liaisonDetail->department }}</div>
                                     </td>
                                     <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-500">{{ $liaisonDetail->organisation }}</div>
                                     </td>
                                     @can('client_access')
                                     <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        <a href="{{ route('users.show', $liaisonDetail->id) }}" class="inline-block rounded-full text-white
                                           bg-black hover:bg-gray-500 duration-300
                                           text-xs font-bold
                                           mr-1 md:mr-2 mb-2 px-2 md:px-4 py-1
                                           opacity-90 hover:opacity-100">View</a>
                                     </td>
                                     @endcan
                                  </tr>
                                  @endforeach
                                  <!-- More items... -->
                               </tbody>
                            </table>
                            @else

                            <section class="w-full bg-gradient-to-b from-gray-100 to-white">
                                <div class="w-full px-4 py-10 mx-auto text-left md:text-center md:w-3/4 lg:w-2/4">
                                  <h2 class="mb-6 font-extrabold tracking-tight md:text-1xl md:mb-6 md:leading-tight">
                                      A liaison officer has not been assigned to oversee this organisation. Please assign an officer !
                                    </h2>
                                  <div class="mb-0 space-x-0 md:space-x-2">
                                    <a href="{{ route('clients.edit', $clientDetails->id) }}" class="inline-block rounded-full text-white
                                        bg-gray-600 hover:bg-purple-600 duration-300
                                        text-xs font-bold
                                        mr-1 md:mr-2 mb-2 px-2 md:px-4 py-1
                                        opacity-90 hover:opacity-100">Assign Officer</a>
                                  </div>
                                </div>
                              </section>
                            @endif
                         </div>
                    </div>
                </div>
                <br>
                @if (count($emptyProfiles) > 0)
                <div class="mt-5 md:mt-0 md:col-span-2">
                    <div class="bg-red-500 shadow overflow-hidden sm:rounded-lg">
                        <div class="px-4 py-5 sm:px-6">
                            <h3 class="text-lg leading-6 font-medium text-white">
                                Estate Profile
                            </h3>
                        </div>
                        <div class="border-t border-gray-200">
                            <div class="shadow overflow-hidden border-b border-gray-200">
                                <section class="w-full bg-gradient-to-b from-gray-100 to-white">
                                    <div class="w-full px-4 py-10 mx-auto text-left md:text-center md:w-3/4 lg:w-2/4">
                                      <h2 class="mb-6 font-extrabold tracking-tight md:text-1xl md:mb-6 md:leading-tight">
                                          This TMO does not have an estate makeup. Please click below to create an estate profile. Please do not ignore this warning !
                                        </h2>
                                      <div class="mb-0 space-x-0 md:space-x-2">
                                        <a href="{{ route('estatedetails.create') }}" class="inline-block rounded-full text-white
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
                    <br>
                    @else
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
                                <h6 class="text-3xl font-bold text-deep-purple-accent-400"></h6>
                                <p class="font-bold">Functions</p>
                              </div>
                            </div>
                        </div>
                    </div>
                    @endif
                    <br>

                <div class="bg-white shadow overflow-hidden sm:rounded-lg">
                        <div class="px-4 py-5 sm:px-6">
                            <h3 class="text-lg leading-6 font-medium text-gray-900">
                                TMO Details
                            </h3>
                            <p class="mt-1 max-w-2xl text-sm text-gray-500">
                                Information relating to the organisation
                            </p>
                        </div>
                        <div class="border-t border-gray-200">
                            <dl>
                                <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                <dt class="text-sm font-medium text-gray-500">
                                    Organisation
                                </dt>
                                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                    {{ $clientDetails->client_organisation}}
                                </dd>
                                </div>
                                <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                <dt class="text-sm font-medium text-gray-500">
                                    Office address
                                </dt>
                                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                    {{ $clientDetails->client_address}}
                                </dd>
                                </div>
                                <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                <dt class="text-sm font-medium text-gray-500">
                                    Contact details
                                </dt>
                                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                    {{ $clientDetails->client_pfn_email}}
                                </dd>
                                <dt class="text-sm font-medium text-gray-500">

                                </dt>
                                <dd class="mt-1 text-xs text-gray-900 sm:mt-0 sm:col-span-2">
                                    {{ $clientDetails->client_pfn}}
                                </dd>
                                </div>
                            </dl>
                        </div>

                  </div>
            <br>
            <div class="bg-white shadow overflow-hidden sm:rounded-lg">
                <div class="px-4 py-5 sm:px-6">
                    <h3 class="text-lg leading-6 font-medium text-gray-900">
                        Management Details
                    </h3>
                    <p class="mt-1 max-w-2xl text-sm text-gray-500">
                        Information relating the organisation's management
                    </p>
                </div>
                <div class="border-t border-gray-200">
                    <dl>
                        <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">
                            Office Manager
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                            {{ $clientDetails->client_manager}}
                        </dd>
                        </div>
                        <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">
                            Contact details
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                            {{ $clientDetails->client_manager_email}}
                        </dd>
                        <dt class="text-sm font-medium text-gray-500">

                        </dt>
                        <dd class="mt-1 text-xs text-gray-900 sm:mt-0 sm:col-span-2">
                            {{ $clientDetails->client_manager_contact}}
                        </dd>
                        </div>
                        <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500">
                                Deputising Officer
                            </dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                {{ $clientDetails->client_deputy}}
                            </dd>
                            </div>
                    </dl>
                </div>

          </div>
          <br>
          <div class="bg-white shadow overflow-hidden sm:rounded-lg">
            <div class="px-4 py-5 sm:px-6">
                <h3 class="text-lg leading-6 font-medium text-gray-900">
                    Board Member Details
                </h3>
                <p class="mt-1 max-w-2xl text-sm text-gray-500">
                    Information relating senior board members
                </p>
            </div>
            <div class="border-t border-gray-200">
                <dl>
                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">
                        Board Chair
                    </dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                        {{ $clientDetails->client_chair}}
                    </dd>
                    </div>
                    <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">
                        Contact details
                    </dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                        {{ $clientDetails->client_chair_email}}
                    </dd>
                    <dt class="text-sm font-medium text-gray-500">

                    </dt>
                    <dd class="mt-1 text-xs text-gray-900 sm:mt-0 sm:col-span-2">
                        {{ $clientDetails->client_chair_contact}}
                    </dd>
                    </div>
                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">
                            Board Secretary
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                            {{ $clientDetails->client_secretary}}
                        </dd>
                        </div>
                </dl>
            </div>
        </div>
      </div>
    </div>
            </div>
        </div>
    </div>
</x-app-layout>
