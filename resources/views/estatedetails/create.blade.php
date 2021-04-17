<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            TMO Estate Makeup
        </h2>
    </x-slot>

    <div>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            <div class="block mb-8">
                <a href="{{ URL::previous() }}" class="bg-teal-400 hover:bg-teal-600 text-white font-bold text-xs py-2 px-4 rounded">Go Back</a>
          </div>
            <div class="mt-5 md:mt-0 md:col-span-2">
                <form method="post" class="form-prevent-double-click" action="{{ route('estatedetails.custom.store', ['clients' => $filterClient->id]) }}">
                    @csrf
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

                    <div class="shadow overflow-hidden sm:rounded-md">
                        <div class="bg-purple-500 px-4 py-5 sm:px-6">
                            <h3 class="mb-1 mt-1 ml-1 text-lg font-extrabold tracking-tight text-white">
                              Resident Profile
                            </h3>
                            <p class="mb-1 mt-1 ml-1 max-w-2xl text-xs text-white">
                             The resident profile is based off the count of differet tenures residing on the estate
                            </p>
                        </div>

                        <div class="px-4 py-5 bg-white sm:p-6">
                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <label for="no_of_units" class="block font-medium text-sm text-gray-700">TMO managed properties</label>
                                    <label for="no_of_units" class="block font-medium text-xs text-gray-700">Properties managed by the TMO within the catchment area</label>
                                    <input type="number" name="no_of_units" value="{{ old('no_of_units') }} " id="no_of_units" class="form-input rounded-md shadow-sm mt-1 block w-full" />
                                    @error('no_of_units')
                                        <p class="text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <label for="freeholders" class="block font-medium text-sm text-gray-700">Freeholders</label>
                                    <label for="freeholders" class="block font-medium text-xs text-gray-700">Where the freehold not held by the LBH but managed by the TMO</label>
                                    <input type="number" name="freeholders" value="{{ old('freeholders') }} " id="freeholders" class="form-input rounded-md shadow-sm mt-1 block w-full" />
                                    @error('freeholders')
                                        <p class="text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                            </div>

                            <div class="grid grid-cols-2 gap-4 mt-5">
                                <div>
                                    <label for="leaseholders" class="block font-medium text-sm text-gray-700">Leaseholders</label>
                                    <label for="leaseholders" class="block font-medium text-xs text-gray-700">The total number of leaseholder properties managed by the TMO</label>
                                    <input type="number" name="leaseholders" value="{{ old('leaseholders') }} " id="leaseholders" class="form-input rounded-md shadow-sm mt-1 block w-full" />
                                    @error('leaseholders')
                                        <p class="text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <label for="tenants" class="block font-medium text-sm text-gray-700">Tenants</label>
                                    <label for="tenants" class="block font-medium text-xs text-gray-700">The total number of tenanted properties managed by the TMO</label>
                                    <input type="number" name="tenants" value="{{ old('tenants') }} " id="tenants" class="form-input rounded-md shadow-sm mt-1 block w-full" />
                                    @error('tenants')
                                        <p class="text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>

                    <div class="shadow overflow-hidden sm:rounded-md">
                        <div class="bg-purple-500 px-4 py-5 sm:px-6">
                            <h3 class="mb-1 mt-1 ml-1 text-lg font-extrabold tracking-tight text-white">
                              Estate Facilities
                            </h3>
                            <p class="mb-1 mt-1 ml-1 max-w-2xl text-xs text-white">
                              Communal areas of the estate, managed by the TMO
                            </p>
                        </div>

                        <div class="px-4 py-5 bg-white sm:p-6">
                            <div class="grid grid-cols-2 gap-4 mt-5">
                                <div>
                                    <label for="comm_halls" class="block font-medium text-sm text-gray-700">Community Halls</label>
                                    <label for="comm_halls" class="block font-medium text-xs text-gray-700">Community halls managed by the organisation</label>
                                    <input type="number" name="comm_halls" id="comm_halls" value="{{ old('comm_halls') }} " class="form-input rounded-md shadow-sm mt-1 block w-full" />
                                    @error('comm_halls')
                                    <p class="text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <label for="outside_areas" class="block font-medium text-sm text-gray-700">Outdoor Areas</label>
                                    <label for="outside_areas" class="block font-medium text-xs text-gray-700">Areas such as gardens, parks and play areas managed by the TMO</label>
                                    <input type="number" name="outside_areas" id="outside_areas" value="{{ old('outside_areas') }} " class="form-input rounded-md shadow-sm mt-1 block w-full" />
                                    @error('outside_areas')
                                        <p class="text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="grid grid-cols-2 gap-4 mt-5">
                                <div>
                                    <label for="communal_facilities" class="block font-medium text-sm text-gray-700">Communal Areas</label>
                                    <label for="communal_facilities" class="block font-medium text-xs text-gray-700">Areas such as break rooms in buildings or concierge areas</label>
                                    <input type="number" name="communal_facilities" id="communal_facilities" value="{{ old('communal_facilities') }} " class="form-input rounded-md shadow-sm mt-1 block w-full" />
                                    @error('communal_facilities')
                                        <p class="text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>

                                </div>

                            </div>
                        </div>
                            <div class="flex items-center justify-end px-4 py-3 bg-gray-50 text-right sm:px-6">
                                <button class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                                    <i><x-heroicon-s-badge-check class="h-5 w-5 text-white prevent-double" /></i> Create
                                </button>
                            </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</x-app-layout>
