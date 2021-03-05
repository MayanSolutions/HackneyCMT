<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            TMO Estate Makeup
        </h2>
    </x-slot>

    <div>
        <div class="max-w-4xl mx-auto py-10 sm:px-6 lg:px-8">
            <div class="mt-5 md:mt-0 md:col-span-2">
                <form method="post" action="{{ route('estatedetails.store') }}">
                    @csrf
                    <div class="shadow overflow-hidden sm:rounded-md">
                        <div class="bg-purple-500 px-4 py-5 sm:px-6">
                            <h3 class="text-lg leading-6 font-medium text-white">
                              TMO Organisation
                            </h3>
                            <p class="mt-1 max-w-2xl text-sm text-white">
                                Only organisation without estate profiles are avaliable for selection.
                            </p>
                        </div>

                        <div class="px-4 py-5 bg-white sm:p-6">

                                <div class="grid grid-cols-2 gap-4">
                                    <div class=" bg-white sm:p-6">
                                        <select name="client_id" id="client_id" class="w-full float-left h-10 pl-3 pr-6 text-base placeholder-gray-600 border rounded-lg appearance-none focus:shadow-outline" placeholder="Regular input">
                                            <option value="">Select Client</option>
                                            @foreach($clients as $client)
                                            <option value="{{ $client->id }}">{{ $client->client_organisation }}</option>
                                            @endforeach
                                        </select>
                                        <div class="absolute inset-y-0 right-0 flex items-center px-2 pointer-events-none">
                                        <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20"><path d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" fill-rule="evenodd"></path></svg>
                                        </div>
                                    </div>

                                    <div>
                                        <p class="mt-1 max-w-2xl text-xs text-gray-500">
                                            Please select the client to which you would like to create a Estate Profile for
                                        </p>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <br>

                    <div class="shadow overflow-hidden sm:rounded-md">
                        <div class="bg-purple-500 px-4 py-5 sm:px-6">
                            <h3 class="text-lg leading-6 font-medium text-white">
                              Resident Profile
                            </h3>
                            <p class="mt-1 max-w-2xl text-sm text-white">
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
                            <h3 class="text-lg leading-6 font-medium text-white">
                              Estate Facilities
                            </h3>
                            <p class="mt-1 max-w-2xl text-sm text-white">
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
                                    Create
                                </button>
                            </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</x-app-layout>
