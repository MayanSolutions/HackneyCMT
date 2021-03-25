<x-app-layout>
    <x-slot name="header">
       <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          Board Members
       </h2>
    </x-slot>
    <div>
       <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
          <div class="block mb-8">
             <a href="{{ URL::previous() }}" class="bg-teal-400 hover:bg-teal-600 text-white font-bold text-xs py-2 px-4 rounded">Go Back</a>
          </div>
          <div class="mt-5 md:mt-0 md:col-span-2">
             <div class="shadow overflow-hidden sm:rounded-md">
                <div class="bg-teal-500 px-4 py-5 sm:px-6">
                   <h3 class="mb-1 mt-1 ml-1 text-lg font-extrabold tracking-tight text-white">
                      {{ $filterClient->client_organisation}}
                   </h3>
                   <p class="mb-1 mt-1 ml-1 max-w-2xl text-xs text-white">
                      {{ $filterClient->client_address }}
                   </p>
                </div>
             </div>
             <br>
             <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-md">
                <div class="bg-purple-500 border-b border-gray-200 px-4 py-5 sm:px-6">
                   <h3 class="mb-1 mt-1 ml-1 text-lg font-extrabold tracking-tight text-white">
                      Board Profile
                   </h3>
                   <p class="mb-1 mt-1 ml-1 max-w-2xl text-xs text-white">
                      Elected board member who are curre on the board
                   </p>
                </div>
                <div class="px-1 py-4 mx-auto sm:max-w-xl bg-white md:max-w-full lg:max-w-screen-xl md:px-6 lg:px-2 lg:py-5">
                   <div class="pr-3 pl-3 grid max-w-full gap-5 row-gap-3 sm:row-gap-5 lg:max-w-full lg:grid-cols-4 sm:mx-auto">
                      @foreach($boardDetails as $member)
                      <div class="flex flex-col justify-between p-5 bg-white border rounded shadow-sm">
                         <div class="mb-1">
                            <div class="flex items-center justify-between pb-3 mb-1 border-b">
                               <div>
                                  <p class="text-xs font-bold tracking-wider uppercase">
                                     {{ $member->position}}
                                  </p>
                                  <p class="text-xs font-extrabold">Elected on {{ date('d-m-y', strtotime($member->agm_date)) }}</p>
                                  <p class="text-xs font-extrabold">Expires on {{ date('d-m-y', strtotime($member->position_exp_date)) }}</p>
                               </div>
                               <div class="flex items-center justify-center w-24 h-24 rounded-full bg-blue-gray-50">
                                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" width="30px" height="30px" viewBox="0 0 24 24" stroke="currentColor">
                                     <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                  </svg>
                               </div>
                            </div>
                            <div>
                               <p class="mb-1 font-bold tracking-wide text-xs">Details</p>
                               <ul class="space-y-2">
                                  <li class="flex items-center text-xs">
                                     <div class="mr-2">
                                        <x-heroicon-o-academic-cap class="w-4 h-4 text-green-500"/>
                                     </div>
                                     <p class="font-medium text-gray-800">{{ $member->elected_name}}</p>
                                  </li>
                                  <li class="flex items-center text-xs">
                                     <div class="mr-2">
                                        <x-heroicon-o-mail-open class="w-4 h-4 text-purple-500"/>
                                     </div>
                                     <p class="font-medium text-gray-800">{{ $member->elected_email}}</p>
                                  </li>
                                  <li class="flex items-center text-xs">
                                     <div class="mr-2">
                                        <x-heroicon-o-phone class="w-4 h-4 text-orange-500"/>
                                     </div>
                                     <p class="font-medium text-gray-800">{{ $member->elected_contact}}</p>
                                  </li>
                                  <br>
                                  <li class="flex items-center text-xs">
                                     <div class="mr-2">
                                        <a href="{{ route('members.edit', $member->id) }}" class="inline-flex bg-white hover:bg-orange-500 text-gray-800 hover:text-white text-xs font-semibold py-1 px-2 border border-gray-400 rounded shadow">Modify</a>
                                        <form class="inline-block" action="{{ route('members.destroy', $member->id) }}" method="POST">
                                           <input type="hidden" name="_method" value="DELETE">
                                           <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                           <a type="submit" class="bg-white hover:bg-red-600 text-gray-800 hover:text-white text-xs font-semibold py-1 px-2 border border-gray-400 rounded shadow delete-confirm">Delete</a>
                                        </form>
                                     </div>
                                  </li>
                               </ul>
                            </div>
                         </div>
                      </div>
                      @endforeach
                   </div>
                </div>
                <div class="flex items-center justify-end px-4 py-3 bg-gray-50 text-right sm:px-6">
                   <a href="/members/create/{{$filterClient->id}}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                   Add Board Members
                   </a>
                </div>
             </div>
             <br>
             <div class="mt-5 md:mt-0 md:col-span-2">
                <div class="shadow overflow-hidden sm:rounded-md">
                   <div class="bg-white border-b border-gray-200 px-4 py-5 sm:px-6">
                      <h3 class="mb-1 mt-1 ml-1 text-lg font-extrabold tracking-tight text-gray-800">
                         Former Board Members
                      </h3>
                   </div>
                   @if (count($formerMembers) > 0)
                   <table class="min-w-full divide-y divide-gray-200">
                      <thead class="bg-gray-50">
                         <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                               Name
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                               Position
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                               Elected On
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                               Expired On
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                               Scheduled for deletion
                            </th>
                         </tr>
                      </thead>
                      <tbody class="bg-white divide-y divide-gray-200">
                         @foreach ($formerMembers as $formerMember)
                         <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                               <div class="flex items-center">
                                  <div class="">
                                     <div class="text-sm font-medium text-gray-900">
                                        {{ $formerMember->elected_name }}
                                     </div>
                                  </div>
                               </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                               <div class="flex items-center">
                                  <div class="">
                                     <div class="text-sm font-medium text-gray-900">
                                        {{ $formerMember->position }}
                                     </div>
                                  </div>
                               </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                               <div class="flex items-center">
                                  <div class="">
                                     <div class="text-sm font-medium text-gray-900">
                                        {{ date('d-m-y', strtotime($formerMember->agm_date)) }}
                                     </div>
                                  </div>
                               </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                               <div class="flex items-center">
                                  <div class="">
                                     <div class="text-sm font-medium text-gray-900">
                                        {{ date('d-m-y', strtotime($formerMember->position_exp_date)) }}
                                     </div>
                                  </div>
                               </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                               <div class="flex items-center">
                                  <div class="">
                                     <div class="text-sm font-medium text-gray-900">
                                     </div>
                                  </div>
                               </div>
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
                            There are no former board members on our system
                         </h2>
                         <div class="mb-0 space-x-0 md:space-x-2">
                            <p class="mt-1 max-w-2xl text-xs text-gray-600 text-white">
                               Records are deleted 12 months after the position is retired.
                            </p>
                         </div>
                      </div>
                   </section>
                   @endif
                </div>
          </div>
       </div>
    </div>
 </x-app-layout>
