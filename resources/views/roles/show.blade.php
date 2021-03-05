<x-app-layout>
    <x-slot name="header">
        @foreach( $roles as $role)
       <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ $role->title }} - Profile
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
                    <h3 class="text-lg leading-6 font-medium text-gray-700">
                        System Profile
                    </h3>
                    @foreach( $roles as $role)
                    <p class="mt-1 max-w-2xl text-sm text-gray-600">
                        System permissions for {{ $role->title }} profile
                    </p>
                    @endforeach
                </div>
                        <div class="border-t border-gray-200">
                            <div class="shadow overflow-hidden border-b border-gray-200">

                                <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Accounts
                                        </th>

                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Permissions
                                        </th>

                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Activity
                                        </th>

                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Reviews
                                        </th>

                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Clients
                                        </th>

                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Functions
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            @foreach($rolePermissions as $rolePermission)
                                            @if($rolePermission->area == 'users')
                                            <div class="mb-2 text-sm font-medium text-gray-900">
                                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-black text-white">{{ $rolePermission->description}}</span>
                                            </div>
                                            @endif
                                            @endforeach
                                        </td>

                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            @foreach($rolePermissions as $rolePermission)
                                            @if($rolePermission->area == 'permissions')
                                            <div class="mb-2 text-sm font-medium text-gray-900">
                                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-black text-white">{{ $rolePermission->description}}</span>
                                            </div>
                                            @endif
                                            @endforeach
                                        </td>

                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            @foreach($rolePermissions as $rolePermission)
                                            @if($rolePermission->area == 'activity')
                                            <div class="mb-2 text-sm font-medium text-gray-900">
                                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-black text-white">{{ $rolePermission->description}}</span>
                                            </div>
                                            @endif
                                            @endforeach
                                        </td>

                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            @foreach($rolePermissions as $rolePermission)
                                            @if($rolePermission->area == 'reviews')
                                            <div class="mb-2 text-sm font-medium text-gray-900">
                                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-black text-white">{{ $rolePermission->description}}</span>
                                            </div>
                                            @endif
                                            @endforeach
                                        </td>

                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            @foreach($rolePermissions as $rolePermission)
                                            @if($rolePermission->area == 'clients')
                                            <div class="mb-2 text-sm font-medium text-gray-900">
                                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-black text-white">{{ $rolePermission->description}}</span>
                                            </div>
                                            @endif
                                            @endforeach
                                        </td>

                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            @foreach($rolePermissions as $rolePermission)
                                            @if($rolePermission->area == 'functions')
                                            <div class="mb-2 text-sm font-medium text-gray-900">
                                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-black text-white">{{ $rolePermission->description}}</span>
                                            </div>
                                            @endif
                                            @endforeach
                                        </td>

                                    </tr>
                                    <!-- More items... -->
                                </tbody>
                                </table>
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
                            <h3 class="text-lg leading-6 font-medium text-gray-700">
                                Registered Accounts
                            </h3>
                            @foreach( $roles as $role)
                            <p class="mt-1 max-w-2xl text-sm text-gray-600">
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
                                        <a href="{{ route('users.show', $profile_user->id) }}" class="inline-block rounded-full text-white
                                           bg-purple-700 hover:bg-gray-500 duration-300
                                           text-xs font-bold
                                           mr-1 md:mr-2 mb-2 px-2 md:px-4 py-1
                                           opacity-90 hover:opacity-100">View Account</a>
                                        <a href="{{ route('users.edit', $profile_user->id) }}" class="inline-block rounded-full text-white
                                           bg-orange-500 hover:bg-blue-500 duration-300
                                           text-xs font-bold
                                           mr-1 md:mr-2 mb-2 px-2 md:px-4 py-1
                                           opacity-90 hover:opacity-100">Modify Permissions</a>
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
