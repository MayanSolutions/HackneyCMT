<x-app-layout>
    <x-slot name="header">
        @foreach( $roles as $role)
       <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ $role->title }} Profile
       </h2>
       @endforeach
    </x-slot>
    <div>
       <div class="max-w-6xl mx-auto py-10 sm:px-6 lg:px-8">
        <div class="block mb-8">
            <a href="{{ route('roles.index') }}" class="bg-gray-400 text-white hover:bg-gray-500 hover:text-white font-bold text-xs py-2 px-4 rounded">Permissions List</a>
         </div>

         <div class="mt-5 md:mt-0 md:col-span-2">
            <div class="bg-white shadow overflow-hidden sm:rounded-lg">
                <div class="px-4 py-5 sm:px-6">
                    <h3 class="mb-1 mt-1 ml-1 text-lg font-extrabold tracking-tight text-grey-700">
                        {{ $role->title }} Profile
                    </h3>
                    @foreach( $roles as $role)
                    <p class="mb-1 mt-1 ml-1 max-w-2xl text-xs text-grey-600">
                        System permissions for {{ $role->title }} profile
                    </p>
                    @endforeach
                </div>
                        <div class="border-t border-gray-200">

                            <div class="shadow overflow-hidden border-b border-gray-200">
                                <div class="px-1 py-4 mx-auto sm:max-w-xl md:max-w-full lg:max-w-screen-xl md:px-6 lg:px-2 lg:py-5">
                                    <div class="pr-3 pl-3 grid max-w-full gap-5 row-gap-3 sm:row-gap-5 lg:max-w-full lg:grid-cols-4 sm:mx-auto">

                                      <div class="flex flex-col justify-between p-5 bg-white border rounded shadow-sm">
                                        <div class="mb-1">
                                          <div class="flex items-center justify-between pb-3 mb-1 border-b">
                                            <div>
                                              <p class="text-xs font-bold tracking-wider uppercase">
                                                Permissions
                                              </p>
                                              <p class="text-sm font-extrabold">User Accounts</p>
                                            </div>
                                            <div class="flex items-center justify-center w-24 h-24 rounded-full bg-blue-gray-50">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" width="30px" height="30px" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                  </svg>
                                            </div>
                                          </div>
                                          <div>
                                            <p class="mb-1 font-bold tracking-wide text-xs">Features</p>
                                            <ul class="space-y-2">
                                                @foreach($rolePermissions as $rolePermission)
                                                @if($rolePermission->area == 'users')
                                              <li class="flex items-center text-xs">
                                                <div class="mr-2">
                                                  <svg class="w-4 h-4 text-deep-purple-accent-400" viewBox="0 0 24 24" stroke-linecap="round" stroke-width="2">
                                                    <polyline fill="none" stroke="currentColor" points="6,12 10,16 18,8"></polyline>
                                                    <circle cx="12" cy="12" fill="none" r="11" stroke="currentColor"></circle>
                                                  </svg>
                                                </div>
                                                <p class="font-medium text-gray-800">{{ $rolePermission->description}}</p>
                                              </li>
                                              @endif
                                              @endforeach
                                            </ul>
                                          </div>
                                        </div>
                                      </div>

                                      <div class="flex flex-col justify-between p-5 bg-white border rounded shadow-sm">
                                        <div class="mb-1">
                                          <div class="flex items-center justify-between pb-3 mb-1 border-b">
                                            <div>
                                              <p class="text-xs font-bold tracking-wider uppercase">
                                                Permissions
                                              </p>
                                              <p class="text-sm font-extrabold">Permissions</p>
                                            </div>
                                            <div class="flex items-center justify-center w-24 h-24 rounded-full bg-blue-gray-50">
                                                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" width="30px" height="30px"viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17h.01" />
                                                  </svg>
                                            </div>
                                          </div>
                                          <div>
                                            <p class="mb-1 font-bold tracking-wide text-xs">Features</p>
                                            <ul class="space-y-2 text-xs">
                                                @foreach($rolePermissions as $rolePermission)
                                                @if($rolePermission->area == 'permissions')
                                              <li class="flex items-center">
                                                <div class="mr-2">
                                                  <svg class="w-4 h-4 text-deep-purple-accent-400" viewBox="0 0 24 24" stroke-linecap="round" stroke-width="2">
                                                    <polyline fill="none" stroke="currentColor" points="6,12 10,16 18,8"></polyline>
                                                    <circle cx="12" cy="12" fill="none" r="11" stroke="currentColor"></circle>
                                                  </svg>
                                                </div>
                                                <p class="font-medium text-gray-800">{{ $rolePermission->description}}</p>
                                              </li>
                                              @endif
                                              @endforeach
                                            </ul>
                                          </div>
                                        </div>
                                      </div>

                                      <div class="flex flex-col justify-between p-5 bg-white border rounded shadow-sm">
                                        <div class="mb-1">
                                          <div class="flex items-center justify-between pb-3 mb-1 border-b">
                                            <div>
                                              <p class="text-xs font-bold tracking-wider uppercase">
                                                Permissions
                                              </p>
                                              <p class="text-sm font-extrabold">Activity</p>
                                            </div>
                                            <div class="flex items-center justify-center w-24 h-24 rounded-full bg-blue-gray-50">
                                                  <svg xmlns="http://www.w3.org/2000/svg" width="30px" height="30px" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z" />
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                  </svg>
                                            </div>
                                          </div>
                                          <div>
                                            <p class="mb-1 font-bold tracking-wide text-xs">Features</p>
                                            <ul class="space-y-2 text-xs">
                                                @foreach($rolePermissions as $rolePermission)
                                                @if($rolePermission->area == 'activity')
                                              <li class="flex items-center">
                                                <div class="mr-2">
                                                  <svg class="w-4 h-4 text-deep-purple-accent-400" viewBox="0 0 24 24" stroke-linecap="round" stroke-width="2">
                                                    <polyline fill="none" stroke="currentColor" points="6,12 10,16 18,8"></polyline>
                                                    <circle cx="12" cy="12" fill="none" r="11" stroke="currentColor"></circle>
                                                  </svg>
                                                </div>
                                                <p class="font-medium text-gray-800">{{ $rolePermission->description}}</p>
                                              </li>
                                              @endif
                                              @endforeach
                                            </ul>
                                          </div>
                                        </div>
                                      </div>

                                      <div class="flex flex-col justify-between p-5 bg-white border rounded shadow-sm">
                                        <div class="mb-1">
                                          <div class="flex items-center justify-between pb-3 mb-1 border-b">
                                            <div>
                                              <p class="text-xs font-bold tracking-wider uppercase">
                                                Permissions
                                              </p>
                                              <p class="text-sm font-extrabold">Digital Reviews</p>
                                            </div>
                                            <div class="flex items-center justify-center w-24 h-24 rounded-full bg-blue-gray-50">
                                                  <svg xmlns="http://www.w3.org/2000/svg" width="30px" height="30px" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                                                  </svg>
                                            </div>
                                          </div>
                                          <div>
                                            <p class="mb-1 font-bold tracking-wide text-xs">Features</p>
                                            <ul class="space-y-2 text-xs">
                                                @foreach($rolePermissions as $rolePermission)
                                                @if($rolePermission->area == 'reviews')
                                              <li class="flex items-center">
                                                <div class="mr-2">
                                                  <svg class="w-4 h-4 text-deep-purple-accent-400" viewBox="0 0 24 24" stroke-linecap="round" stroke-width="2">
                                                    <polyline fill="none" stroke="currentColor" points="6,12 10,16 18,8"></polyline>
                                                    <circle cx="12" cy="12" fill="none" r="11" stroke="currentColor"></circle>
                                                  </svg>
                                                </div>
                                                <p class="font-medium text-gray-800">{{ $rolePermission->description}}</p>
                                              </li>
                                              @endif
                                              @endforeach
                                            </ul>
                                          </div>
                                        </div>
                                      </div>

                                      <div class="flex flex-col justify-between p-5 bg-white border rounded shadow-sm">
                                        <div class="mb-1">
                                          <div class="flex items-center justify-between pb-3 mb-1 border-b">
                                            <div>
                                              <p class="text-xs font-bold tracking-wider uppercase">
                                                Permissions
                                              </p>
                                              <p class="text-sm font-extrabold">TMO Profiles</p>
                                            </div>
                                            <div class="flex items-center justify-center w-24 h-24 rounded-full bg-blue-gray-50">
                                                  <svg xmlns="http://www.w3.org/2000/svg" width="30px" height="30px" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V8a2 2 0 00-2-2h-5m-4 0V5a2 2 0 114 0v1m-4 0a2 2 0 104 0m-5 8a2 2 0 100-4 2 2 0 000 4zm0 0c1.306 0 2.417.835 2.83 2M9 14a3.001 3.001 0 00-2.83 2M15 11h3m-3 4h2" />
                                                  </svg>
                                            </div>
                                          </div>
                                          <div>
                                            <p class="mb-1 font-bold tracking-wide text-xs">Features</p>
                                            <ul class="space-y-2 text-xs">
                                                @foreach($rolePermissions as $rolePermission)
                                                @if($rolePermission->area == 'clients')
                                              <li class="flex items-center">
                                                <div class="mr-2">
                                                  <svg class="w-4 h-4 text-deep-purple-accent-400" viewBox="0 0 24 24" stroke-linecap="round" stroke-width="2">
                                                    <polyline fill="none" stroke="currentColor" points="6,12 10,16 18,8"></polyline>
                                                    <circle cx="12" cy="12" fill="none" r="11" stroke="currentColor"></circle>
                                                  </svg>
                                                </div>
                                                <p class="font-medium text-gray-800">{{ $rolePermission->description}}</p>
                                              </li>
                                              @endif
                                              @endforeach
                                            </ul>
                                          </div>
                                        </div>
                                      </div>

                                      <div class="flex flex-col justify-between p-5 bg-white border rounded shadow-sm">
                                        <div class="mb-1">
                                          <div class="flex items-center justify-between pb-3 mb-1 border-b">
                                            <div>
                                              <p class="text-xs font-bold tracking-wider uppercase">
                                                Permissions
                                              </p>
                                              <p class="text-sm font-extrabold">Functions</p>
                                            </div>
                                            <div class="flex items-center justify-center w-24 h-24 rounded-full bg-blue-gray-50">
                                                  <svg xmlns="http://www.w3.org/2000/svg" width="30px" height="30px" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                                                  </svg>
                                            </div>
                                          </div>
                                          <div>
                                            <p class="mb-1 font-bold tracking-wide text-xs">Features</p>
                                            <ul class="space-y-2 text-xs">
                                                @foreach($rolePermissions as $rolePermission)
                                                @if($rolePermission->area == 'functions')
                                              <li class="flex items-center">
                                                <div class="mr-2">
                                                  <svg class="w-4 h-4 text-deep-purple-accent-400" viewBox="0 0 24 24" stroke-linecap="round" stroke-width="2">
                                                    <polyline fill="none" stroke="currentColor" points="6,12 10,16 18,8"></polyline>
                                                    <circle cx="12" cy="12" fill="none" r="11" stroke="currentColor"></circle>
                                                  </svg>
                                                </div>
                                                <p class="font-medium text-gray-800">{{ $rolePermission->description}}</p>
                                              </li>
                                              @endif
                                              @endforeach
                                            </ul>
                                          </div>
                                        </div>
                                      </div>

                                    </div>
                                  </div>
                            </div>
                     </div>
                </div>
            </div>
          <br>
       <div class="flex flex-col">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
           <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
              <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                 <div class="flex flex-col">
                    <div class="-my-2 bg-white overflow-x-auto sm:-mx-6 lg:-mx-8">
                       <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="px-4 py-5 sm:px-6">
                            <h3 class="mb-1 mt-1 ml-1 text-lg font-extrabold tracking-tight text-grey-700">
                                Registered Accounts
                            </h3>
                            @foreach( $roles as $role)
                            <p class="mb-1 mt-1 ml-1 max-w-2xl text-xs text-grey-600">
                                Account using the  {{ $role->title }} profile
                            </p>
                            @endforeach
                        </div>
                          <div class="shadow overflow-hidden border-b border-gray-200">
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
                                      <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                     </th>
                                   </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                   @foreach ($profile_users as $profile_user)
                                   <tr>
                                      <td class="px-6 py-4 whitespace-nowrap">
                                         <div class="flex items-center">
                                            <div class="ml-4">
                                               <div class="text-sm font-medium text-gray-900">
                                                  {{ $profile_user->name }}
                                               </div>
                                               <div class="text-sm text-gray-500">
                                                  {{ $profile_user->email }}
                                               </div>
                                            </div>
                                         </div>
                                      </td>
                                      <td class="px-6 py-4 whitespace-nowrap">
                                         <div class="text-sm text-gray-900">{{ $profile_user->job_title }}</div>
                                         <div class="text-sm text-gray-500">{{ $profile_user->department }}</div>
                                      </td>
                                      <td class="px-6 py-4 whitespace-nowrap">
                                         <div class="text-sm text-gray-500">{{ $profile_user->organisation }}</div>
                                      </td>
                                      <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        <a href="{{ route('users.show', $profile_user->id) }}" class="inline-flex bg-white hover:bg-black text-gray-800 hover:text-white text-xs font-semibold py-1 px-2 border border-gray-400 rounded shadow">View</a>
                                        <a href="{{ route('users.edit', $profile_user->id) }}" class="inline-flex bg-white hover:bg-orange-500 text-gray-800 hover:text-white text-xs font-semibold py-1 px-2 border border-gray-400 rounded shadow">Modify</a>
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
           </div>
        </div>
     </div>
     <br>
          {!! $profile_users->links() !!}
  </div>
    </div>
</div>
 </x-app-layout>
