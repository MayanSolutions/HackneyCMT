<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Update {{ $clients->client_organisation }}
        </h2>
    </x-slot>

    <div>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            <div class="block mb-8">
                <a href="{{ URL::previous() }}" class="bg-teal-400 hover:bg-teal-600 text-white font-bold text-xs py-2 px-4 rounded">Go Back</a>
          </div>
            <div class="mt-5 md:mt-0 md:col-span-2">
                <form method="post" class="form-prevent-double-click" action="{{ route('clients.update', $clients->id) }}">
                    @csrf
                    @method('put')
                    <div class="shadow overflow-hidden sm:rounded-md">
                        <div class="bg-purple-600 px-4 py-5 sm:px-6">
                            <h3 class="mb-1 mt-1 ml-1 text-lg font-extrabold tracking-tight text-white">
                              Client Details
                            </h3>
                            <p class="mb-1 mt-1 ml-1 max-w-2xl text-xs text-white">
                              Please complete using TMO office information only
                            </p>
                        </div>

                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="client_organisation" class="block font-medium text-sm text-gray-700">Organisation</label>
                            <input type="text" name="client_organisation" value="{{ $clients->client_organisation }} " id="client_organisation" class="form-input rounded-md shadow-sm mt-1 block w-full" />
                            @error('client_organisation')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="client_pfn_email" class="block font-medium text-sm text-gray-700">Office Email</label>
                            <input type="email" name="client_pfn_email" value="{{ $clients->client_pfn_email }} " id="client_pfn_email" class="form-input rounded-md shadow-sm mt-1 block w-full" />
                            @error('client_pfn_email')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="client_address" class="block font-medium text-sm text-gray-700">Office Address</label>
                            <textarea name="client_address" " id="client_address" class="form-input rounded-md shadow-sm mt-1 block w-full">{{ $clients->client_address }}</textarea>
                            @error('client_address')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="client_pfn" class="block font-medium text-sm text-gray-700">Office Contact No</label>
                            <input type="text" name="client_pfn" id="client_pfn" value="{{ $clients->client_pfn }}" class="form-input rounded-md shadow-sm mt-1 block w-full" />
                            @error('client_pfn')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                            <br>
                        </div>
                    </div>
                    <br>

                    <div class="shadow overflow-hidden sm:rounded-md">
                        <div class="bg-purple-600 px-4 py-5 sm:px-6">
                            <h3 class="mb-1 mt-1 ml-1 text-lg font-extrabold tracking-tight text-white">
                              Management Details
                            </h3>
                            <p class="mb-1 mt-1 ml-1 max-w-2xl text-xs text-white">
                              Please complete using TMO staff information only
                            </p>
                        </div>

                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="client_manager" class="block font-medium text-sm text-gray-700">Office Manager</label>
                            <input type="text" name="client_manager" id="client_manager" value="{{ $clients->client_manager }} " class="form-input rounded-md shadow-sm mt-1 block w-full" />
                            @error('client_manager')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="client_manager_email" class="block font-medium text-sm text-gray-700">Manager's Email</label>
                            <input type="email" name="client_manager_email" id="client_manager_email" value="{{ $clients->client_manager_email }} " class="form-input rounded-md shadow-sm mt-1 block w-full" />
                            @error('client_manager_email')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="client_manager_contact" class="block font-medium text-sm text-gray-700">Manager's Contact No</label>
                            <input type="text" name="client_manager_contact" id="client_manager_contact" value="{{ $clients->client_manager_contact }} " class="form-input rounded-md shadow-sm mt-1 block w-full" />
                            @error('client_manager_contact')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="client_deputy" class="block font-medium text-sm text-gray-700">Deputising Officer</label>
                            <input type="text" name="client_deputy" id="client_deputy" value="{{ $clients->client_deputy }} " class="form-input rounded-md shadow-sm mt-1 block w-full" />
                            @error('client_deputy')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                            <br>
                        </div>
                    </div>
                    <br>

                    <div class="shadow overflow-hidden sm:rounded-md">
                        <div class="bg-purple-600 px-4 py-5 sm:px-6">
                            <h3 class="mb-1 mt-1 ml-1 text-lg font-extrabold tracking-tight text-white">
                            Assign Liaison Officer
                            </h3>
                            <p class="mb-1 mt-1 ml-1 max-w-2xl text-xs text-white">
                            This can be done at a later point if required
                            </p>
                        </div>
                            <div class="px-4 py-5 bg-white sm:p-6">
                                <select name="liaison_officer" id="liaison_officer" class="w-full h-10 pl-3 pr-6 text-base placeholder-gray-600 border rounded-lg appearance-none focus:shadow-outline" placeholder="Regular input">
                                    @foreach($liaison_officers as $liaison_officer)
                                    <option value="{{ $liaison_officer->id }}">{{ $liaison_officer->name }}</option>
                                    @endforeach
                                </select>
                                <div class="absolute inset-y-0 right-0 flex items-center px-2 pointer-events-none">
                                <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20"><path d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" fill-rule="evenodd"></path></svg>
                                </div>
                            </div>

                        <div class="flex items-center justify-end px-4 py-3 bg-gray-50 text-right sm:px-6">
                            <button class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150 button-prevent-double-click">
                                <i><x-heroicon-s-badge-check class="h-5 w-5 text-white prevent-double" /></i> Modify
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
