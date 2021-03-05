<x-app-layout>
    <x-slot name="header">
       <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          Category Functions
       </h2>
    </x-slot>
    <div>

       <div class="max-w-6xl mx-auto py-10 sm:px-6 lg:px-8">
          <div class="flex flex-col">
             <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                   <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">

                    <div class="bg-gray-200 px-4 py-5 sm:px-6">
                        <h3 class="text-lg leading-6 font-medium text-gray-900">
                          Service Functions
                        </h3>
                        <p class="mt-1 max-w-2xl text-sm text-gray-700">
                          These are the functions undertaken by the service area, linked to a charge code.
                        </p>
                    </div>

                    <div class="flex flex-col">
                         <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                               <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                                  <table class="min-w-full divide-y divide-gray-200">
                                     <thead class="bg-gray-50">
                                        <tr>
                                           <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                             Function
                                           </th>
                                           <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Description
                                          </th>
                                          <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Cost code
                                          </th>
                                          <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Subjective
                                          </th>
                                           <th scope="col" class="relative px-6 py-3">
                                              <span class="sr-only">Edit</span>
                                           </th>
                                        </tr>
                                     </thead>
                                     <tbody class="bg-white divide-y divide-gray-200">

                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="text-sm text-gray-900"></div>
                                             </td>

                                           <td class="px-6 py-4 whitespace-nowrap">
                                              <div class="text-sm text-gray-900"></div>
                                           </td>

                                           <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-gray-900"></div>
                                            </td>

                                            <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-gray-900"></div>
                                            </td>

                                           <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                              <a href="" class="inline-block rounded-full text-white
                                                 bg-black hover:bg-gray-500 duration-300
                                                 text-xs font-bold
                                                 mr-1 md:mr-2 mb-2 px-2 md:px-4 py-1
                                                 opacity-90 hover:opacity-100">View</a>
                                              <a href="" class="inline-block rounded-full text-white
                                                 bg-blue-400 hover:bg-blue-500 duration-300
                                                 text-xs font-bold
                                                 mr-1 md:mr-2 mb-2 px-2 md:px-4 py-1
                                                 opacity-90 hover:opacity-100">Edit</a>
                                                 <form class="inline-block" action="" method="POST" onsubmit="return confirm('Are you sure?');">
                                                 <input type="hidden" name="_method" value="DELETE">
                                                 <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                 <input type="submit" class="inline-block rounded-full text-white
                                                    bg-red-400 hover:bg-red-500 duration-300
                                                    text-xs font-bold
                                                    mr-1 md:mr-2 mb-2 px-2 md:px-4 py-1
                                                    opacity-90 hover:opacity-100" value="Delete">
                                              </form>
                                           </td>
                                        </tr>
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
       </div>

    </div>
 </x-app-layout>
