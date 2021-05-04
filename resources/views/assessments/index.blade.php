<x-app-layout>
    <x-slot name="header">
       <h2 class="font-semibold text-xl text-gray-800 leading-tight">
         TMO Reviews
       </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto py-4 sm:px-2 lg:px-2">
        <div class="flex flex-col">
           <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
              <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                 <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                    <div class="flex flex-col">
                       <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                          <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                             <div class="shadow overflow-hidden border-b border-gray-200 ">
                              <h2 class="mb-2 mt-4 ml-6 font-extrabold float-left tracking-tight text-gray-700">
                                  Search Reviews
                                </h2>

                                <form action="{{ route('assessments.index') }}" method="GET" role="search">
                                  <div class="pt-2 relative mx-auto float-right mr-3 mb-2 text-gray-600">
                                    <input class="border-2 border-gray-300 bg-white h-10 px-5 pr-16 rounded-lg text-sm focus:outline-none" type="text" name="survey" placeholder="Submitter or Submision date">
                                    <button type="submit" id="survey" class="absolute right-0 top-0 mt-5 mr-4">
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
                          </div>
                       </div>
                    </div>

       <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
          <div class="flex flex-col">
             <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                   <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                      <div class="flex flex-col">
                         <div class="-my-2 overflow-x-auto bg-white sm:-mx-6 lg:-mx-8">
                            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                               <div class="shadow overflow-hidden border-b border-gray-200 ">
                                <h2 class="mb-2 mt-4 ml-6 font-extrabold float-left tracking-tight text-gray-700">
                                    Active Reviews
                                  </h2>
                               </div>
                               @if (count($surveys) > 0)
                                  <table class="min-w-full divide-y divide-gray-200">
                                     <thead class="bg-gray-50">
                                        <tr>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                TMO Organisation
                                            </th>
                                           <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Assessment
                                           </th>
                                           <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Submitted by
                                            </th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Submitted
                                            </th>
                                           <th scope="col" class="relative px-6 py-3">
                                              <span class="sr-only">Edit</span>
                                           </th>
                                        </tr>
                                     </thead>
                                     <tbody class="bg-white divide-y divide-gray-200">
                                        @foreach ($surveys as $response)

                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="text-sm text-gray-500">
                                                    {{ $response->clients->client_organisation }}
                                                </div>
                                            </td>

                                           <td class="px-6 py-4 whitespace-nowrap">
                                              <div class="text-sm text-gray-500">
                                                {{ $response->review->title }}
                                              </div>
                                           </td>

                                           <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-gray-500">
                                                {{  $response->officer  }}
                                            </div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="text-sm text-gray-500">
                                                    {{  $response->created_at->diffForHumans()  }}
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                                 <a href="{{ route('assessments.show', $response->id) }}" class="inline-flex bg-white hover:bg-purple-600 text-gray-800 hover:text-white text-xs font-semibold py-1 px-2 border border-gray-400 rounded shadow">Show</a>
                                                 <form class="inline-block" action="" method="POST">
                                                 <input type="hidden" name="_method" value="DELETE">
                                                 <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                 <a type="submit" class="bg-white hover:bg-red-600 text-gray-800 hover:text-white text-xs font-semibold py-1 px-2 border border-gray-400 rounded shadow delete-confirm">Delete</a>
                                                </form>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                  </table>
                                  @else
                                  <section class="w-full bg-gradient-to-b from-gray-100 to-white">
                                      <div class="w-full px-4 py-10 mx-auto text-left md:text-center md:w-3/4 lg:w-2/4">
                                        <h2 class="mb-6 font-extrabold tracking-tight md:text-1xl md:mb-6 md:leading-tight">
                                            Ohh no!.. There doesnt appear to be any digital reviews here
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
          {!! $surveys->links() !!}
       </div>

       <div class="max-w-7xl mx-auto py-5 sm:px-6 lg:px-8">
        <div class="flex flex-col">
           <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
              <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                 <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                    <div class="flex flex-col">
                       <div class="-my-2 overflow-x-auto bg-white sm:-mx-6 lg:-mx-8">
                          <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                             <div class="shadow overflow-hidden border-b border-gray-200 ">
                              <h2 class="mb-2 mt-4 ml-6 font-extrabold float-left tracking-tight text-gray-700">
                                  Historical Reviews
                                </h2>
                             </div>
                             @if (count($historicalSurveys) > 0)
                                <table class="min-w-full divide-y divide-gray-200">
                                   <thead class="bg-gray-50">
                                      <tr>
                                          <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                              TMO Organisation
                                          </th>
                                         <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                              Assessment
                                         </th>
                                         <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                              Submitted by
                                          </th>
                                          <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                              Submitted
                                          </th>
                                         <th scope="col" class="relative px-6 py-3">
                                            <span class="sr-only">Edit</span>
                                         </th>
                                      </tr>
                                   </thead>
                                   <tbody class="bg-white divide-y divide-gray-200">
                                      @foreach ($historicalSurveys as $historicalResponse)
                                      <tr>
                                          <td class="px-6 py-4 whitespace-nowrap">
                                              <div class="text-sm text-gray-500">
                                                  {{ $historicalResponse->clients->client_organisation }}
                                              </div>
                                          </td>

                                         <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-gray-500">
                                              {{ $historicalResponse->review->title }}
                                            </div>
                                         </td>

                                         <td class="px-6 py-4 whitespace-nowrap">
                                          <div class="text-sm text-gray-500">
                                              {{  $historicalResponse->officer  }}
                                          </div>
                                          </td>
                                          <td class="px-6 py-4 whitespace-nowrap">
                                              <div class="text-sm text-gray-500">
                                                  {{  $historicalResponse->created_at->diffForHumans()  }}
                                              </div>
                                          </td>
                                          <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                               <a href="{{ route('assessments.show', $historicalResponse->id) }}" class="inline-flex bg-white hover:bg-purple-600 text-gray-800 hover:text-white text-xs font-semibold py-1 px-2 border border-gray-400 rounded shadow">Show</a>
                                               <form class="inline-block" action="" method="POST">
                                               <input type="hidden" name="_method" value="DELETE">
                                               <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                               <a type="submit" class="bg-white hover:bg-red-600 text-gray-800 hover:text-white text-xs font-semibold py-1 px-2 border border-gray-400 rounded shadow delete-confirm">Delete</a>
                                              </form>
                                          </td>
                                      </tr>
                                      @endforeach
                                  </tbody>
                                </table>
                                @else
                                <section class="w-full bg-gradient-to-b from-gray-100 to-white">
                                    <div class="w-full px-4 py-10 mx-auto text-left md:text-center md:w-3/4 lg:w-2/4">
                                      <h2 class="mb-6 font-extrabold tracking-tight md:text-1xl md:mb-6 md:leading-tight">
                                            Ohh no!.. There doesnt appear to be any digital reviews here
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
        {!! $historicalSurveys->links() !!}
     </div>
    </div>
</div>
</div>
</div>
</div>

 </x-app-layout>
