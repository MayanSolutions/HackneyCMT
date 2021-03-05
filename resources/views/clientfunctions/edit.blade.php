<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Modify responsibilities
        </h2>
    </x-slot>

    <div class="max-w-4xl mx-auto py-10 sm:px-6 lg:px-8">
        <div class="mt-5 md:mt-0 md:col-span-2">
            <form method="post" action="{{ route('clientfunctions.update', $client->id) }}">
                @csrf
                @method('put')
                <div class="shadow overflow-hidden sm:rounded-md">
                    <div class="bg-orange-500 px-4 py-5 sm:px-6">
                        <h3 class="text-lg leading-6 font-medium text-white">
                        Responsibilities for - {{ $client->client_organisation }}
                        <input type="hidden" name="client" value="{{ $client->id }}" readonly/>
                        </h3>
                        <p class="mt-1 max-w-2xl text-sm text-white">
                        Assign the correct responsibilities to the TMO organisation. If you're unsure, please contact the TMO Services Team
                        </p>
                    </div>
                </div>
                <br>
                <div class="shadow overflow-hidden sm:rounded-md">
                    <div class="bg-orange-500 px-4 py-5 sm:px-6">
                        <h3 class="text-lg leading-6 font-medium text-white">
                        Responsibilities List
                        </h3>
                        <p class="mt-1 max-w-2xl text-sm text-white">

                        </p>
                    </div>
                    @foreach( $functions as $category)
                    <p class="mt-3 ml-6 max-w-2xl text-sm text-bold text-grey-800">{{ $category->category }}</p>
                    @if(count($category->MatrixFunction) > 0)
                        <div class="max-w-6xl mx-auto py-6 sm:px-6 lg:px-8">
                            <div class="block mb-8">
                                <div class="flex flex-row flex-wrap">
                                    @foreach($category->MatrixFunction as $function)
                                    <label class="inline-flex text-sm items-center mt-1 p-2">
                                      <input type="checkbox" name="function[]" value="{{ $function->id }}" class="form-checkbox h-5 w-5 text-black"
                                            @if(in_array($function->id, $clientFunctions)) checked @endif >
                                      <span class="ml-2 text-black"> {{ $function->function }}</span>
                                    </label>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        @else
                        <section class="w-full bg-gradient-to-b from-gray-100 to-white">
                        <div class="w-full px-4 py-10 mx-auto text-left md:text-center md:w-3/4 lg:w-2/4">
                          <h2 class="mb-6 font-extrabold tracking-tight md:text-1xl md:mb-6 md:leading-tight">
                              Opps, It appears that no Management Function's exist in the system
                            </h2>
                          <div class="mb-0 space-x-0 md:space-x-2">
                            <p class="mt-1 max-w-2xl text-xs text-gray-600 text-white">
                                Please contact the system administror. This notice is not an error !
                            </p>
                          </div>
                        </div>
                      </section>
                      @endif
                      @endforeach
                      <div class="flex items-center justify-end px-4 py-3 bg-gray-50 text-right sm:px-6">
                        <button class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150 submit">
                            Assign
                        </button>
                    </div>
                    </div>
                </div>

            </form>
        </div>
    </div>
</x-app-layout>
