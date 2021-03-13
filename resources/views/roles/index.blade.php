<x-app-layout>
    <x-slot name="header">
       <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          Permissions
       </h2>
    </x-slot>
    <div>

       <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
          <div class="block mb-8">
              @can('user_access')
            <a href="{{ route('users.index') }}" class="bg-gray-400 hover:bg-gray-500 text-white font-bold text-xs py-2 px-4 rounded">Accounts List</a>
            @endcan
            @can('role_create')
             <a href="{{ route('roles.create') }}" class="bg-green-400 hover:bg-green-600 text-white font-bold text-xs py-2 px-4 rounded">Create Profile</a>
             @endcan
          </div>
          <div class="flex flex-col">
             <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                   <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                      <div class="flex flex-col">
                         <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                               <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                                @if (count($roles) > 0)
                                <h2 class="mb-2 mt-4 ml-6 font-extrabold float-left tracking-tight text-gray-700">
                                    Profiles and Permissions
                                  </h2>
                                  <form action="{{ route('roles.index') }}" method="GET" role="search">
                                    <div class="pt-2 relative mx-auto float-right mr-3 mb-2 text-gray-600">
                                      <input class="border-2 border-gray-300 bg-white h-10 px-5 pr-16 rounded-lg text-sm focus:outline-none" type="text" name="title" placeholder="Search by profile">
                                      <button type="submit" id="title" class="absolute right-0 top-0 mt-5 mr-4">
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
                                  <table class="min-w-full divide-y divide-gray-200">
                                     <thead class="bg-gray-50">
                                        <tr>
                                           <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                              Profile Name
                                           </th>
                                           <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                              Created on
                                           </th>
                                           <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                              Updated on
                                           </th>
                                           <th scope="col" class="relative px-6 py-3">
                                              <span class="sr-only">Edit</span>
                                           </th>
                                        </tr>
                                     </thead>
                                     <tbody class="bg-white divide-y divide-gray-200">
                                        @foreach ($roles as $role)
                                        <tr>
                                           <td class="px-6 py-4 whitespace-nowrap">
                                              <div class="text-sm text-gray-900">{{ $role->title }}</div>
                                           </td>
                                           <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            <div class="text-sm text-gray-900">{{ $role->created_at }}</div>
                                           </td>
                                           <td class="px-6 py-4 whitespace-nowrap">
                                              <div class="text-sm text-gray-900">{{ $role->updated_at }}</div>
                                           </td>


                                           <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                              <a href="{{ route('roles.show', $role->id) }}"  class="inline-flex bg-white hover:bg-purple-600 text-gray-800 hover:text-white text-xs font-semibold py-1 px-2 border border-gray-400 rounded shadow">Show</a>
                                                 @can('role_edit')
                                              <a href="{{ route('roles.edit', $role->id) }}" class="inline-flex bg-white hover:bg-orange-500 text-gray-800 hover:text-white text-xs font-semibold py-1 px-2 border border-gray-400 rounded shadow">Modify</a>
                                                 @endcan
                                                 @can('role_delete')
                                                 <form class="inline-block" action="{{ route('roles.destroy', $role->id) }}" method="POST">
                                                 <input type="hidden" name="_method" value="DELETE">
                                                 <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                 <a type="submit" class="bg-white hover:bg-red-600 text-gray-800 hover:text-white text-xs font-semibold py-1 px-2 border border-gray-400 rounded shadow delete-confirm ">Delete</a>
                                              </form>
                                              @endcan
                                           </td>
                                        </tr>
                                        @endforeach
                                        <!-- More items... -->
                                     </tbody>
                                  </table>
                                  @else
                                  <form action="{{ route('roles.index') }}" method="GET" role="search">
                                    @csrf
                                    <div class="pt-2 relative mx-auto float-right mr-3 mb-2 text-gray-600">
                                      <input class="border-2 border-gray-300 bg-white h-10 px-5 pr-16 rounded-lg text-sm focus:outline-none" type="text" name="title" placeholder="Search by profile">
                                      <button type="submit" id="title" class="absolute right-0 top-0 mt-5 mr-4">
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
                                 <section class="w-full bg-gradient-to-b from-gray-100 to-white">
                                    <div class="w-full px-4 py-10 mx-auto text-left md:text-center md:w-3/4 lg:w-2/4">
                                      <h2 class="mb-6 font-extrabold tracking-tight md:text-1xl md:mb-6 md:leading-tight">
                                          Opps, It looks like the profile you are looking for has not been registered on our system yet
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
                   </div>
                </div>
             </div>
          </div>
          <br>
          {!! $roles->links() !!}
       </div>

    </div>
 </x-app-layout>
