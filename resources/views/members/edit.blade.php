<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Update Board Member
        </h2>
    </x-slot>

    <div>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            <div class="block mb-8">
                <a href="{{ URL::previous() }}" class="bg-teal-400 hover:bg-teal-600 text-white font-bold text-xs py-2 px-4 rounded">Go Back</a>
          </div>
            <div class="mt-5 md:mt-0 md:col-span-2">
                <form method="post" class="form-prevent-double-click" action="{{ route('members.update', $members->id) }}">
                    @csrf
                    @method('put')
                    <div class="shadow overflow-hidden sm:rounded-md">
                        <div class="bg-purple-600 px-4 py-5 sm:px-6">
                            <h3 class="mb-1 mt-1 ml-1 text-lg font-extrabold tracking-tight text-white">
                                {{ $members->elected_name}}
                            </h3>
                            <p class="mb-1 mt-1 ml-1 max-w-2xl text-sm text-white">
                             Member of {{ $client->client_organisation }}
                            </p>
                        </div>

                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="agm_date" class="block font-medium text-sm text-gray-700">AGM election date</label>
                            <input type="date" name="agm_date" value="{{ $members->agm_date->format('Y-m-d')}}" id="agm_date" class="form-input rounded-md shadow-sm mt-1 block w-full" />
                            @error('agm_date')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="elected_name" class="block font-medium text-sm text-gray-700">Full name</label>
                            <input type="text" name="elected_name" value="{{ $members->elected_name }}" id="elected_name" class="form-input rounded-md shadow-sm mt-1 block w-full" />
                            @error('elected_name')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="px-4 py-5 bg-white sm:p-6">
                            <select name="position" id="position" class="w-full h-10 pl-3 pr-6 text-base placeholder-gray-600 border rounded-lg appearance-none focus:shadow-outline" placeholder="Regular input">
                                <option value="{{ $members->position }}">{{ $members->position }}</option>
                                <option value="Board Member">Board Member</option>
                                <option value="Board Secretary">Board Secretary</option>
                                <option value="Vice Chair">Vice Chair</option>
                                <option value="Board Chair">Board Chair</option>
                                <option value="Co-opted Member">Co-opted Member</option>
                                <option value="Councillor">Councillor</option>
                                <option value="Commitee Member">Commitee Member</option>
                            </select>
                            @error('position')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="elected_email" class="block font-medium text-sm text-gray-700">Email</label>
                            <input type="email" name="elected_email" value="{{ $members->elected_email }}" id="elected_email" class="form-input rounded-md shadow-sm mt-1 block w-full" />
                            @error('elected_email')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="elected_contact" class="block font-medium text-sm text-gray-700">Contact No</label>
                            <input type="number" name="elected_contact" value="{{ $members->elected_contact }}" id="elected_contact" class="form-input rounded-md shadow-sm mt-1 block w-full" />
                            @error('elected_contact')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                    </div>

                    <br>

                    <div class="shadow overflow-hidden sm:rounded-md">
                        <div class="bg-red-500 px-4 py-5 sm:px-6">
                            <h3 class="mb-1 mt-1 ml-1 text-lg font-extrabold tracking-tight text-white">
                                Position Expiry
                            </h3>
                            <p class="mb-1 mt-1 ml-1 max-w-2xl text-sm text-white">
                             To expire a board member is to remove them from the position.
                            </p>
                            <p class="mb-1 mt-1 ml-1 max-w-2xl text-xs text-white">
                            The below date is the last scheduled serving date before the next AGM election. Only ammend on resignation of their position.
                            </p>
                        </div>

                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="position_exp_date" class="block font-medium text-sm text-gray-700">Expiry Date</label>
                            <input type="date" name="position_exp_date" value="{{ $members->position_exp_date->format('Y-m-d')}}" id="agm_date" class="form-input rounded-md shadow-sm mt-1 block w-full expire-member" />
                            @error('position_exp_date')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="flex items-center justify-end px-4 py-3 bg-gray-50 text-right sm:px-6">
                            <button class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150 button-prevent-double-click">
                                <i><x-heroicon-s-badge-check class="h-5 w-5 text-white prevent-double" /></i> Modify
                            </button>
                        </div>

                    </div>
                    <br>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
