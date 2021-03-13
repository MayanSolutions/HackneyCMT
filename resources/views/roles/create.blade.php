<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Create Profile
        </h2>
    </x-slot>


        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            <div class="block mb-8">
                <a href="{{ URL::previous() }}" class="bg-teal-400 hover:bg-teal-600 text-white font-bold text-xs py-2 px-4 rounded">Go Back</a>
          </div>
            <div class="mt-5 md:mt-0 md:col-span-2">
                <form method="post" action="{{ route('roles.store') }}">
                    @csrf
                    <div class="shadow overflow-hidden sm:rounded-md">
                        <div class="bg-purple-500 px-4 py-5 sm:px-6">
                            <h3 class="mb-1 mt-1 ml-1 text-lg font-extrabold tracking-tight text-white">
                            System Profile
                            </h3>
                            <p class="mb-1 mt-1 ml-1 max-w-2xl text-xs text-white">
                            These profile grant access to system areas by assigning permissions
                            </p>
                        </div>
                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="title" class="block font-medium text-sm text-gray-700">Profile Name</label>
                            <input type="text" name="title" id="title" class="form-input rounded-md shadow-sm mt-1 block w-full" />
                            @error('title')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <br>

                    <div class="shadow overflow-hidden sm:rounded-md bg-white">
                        <div class="bg-purple-500 px-4 py-5 sm:px-6">
                            <h3 class="mb-1 mt-1 ml-1 text-lg font-extrabold tracking-tight text-white">
                            Permission's List
                            </h3>
                            <p class="mb-1 mt-1 ml-1 max-w-2xl text-xs text-white">
                            The checked permissions will be assigned to the creared profile
                            </p>
                        </div>
                            <div class="max-w-6xl mx-auto py-6 sm:px-6 lg:px-6">
                                <label for="title" class="block font-medium text-sm text-gray-700 mb-2 ">System Permissions</label>
                                <div class="block mb-8">
                                    <div class="flex flex-row flex-wrap">
                                        @foreach($permission as $value)
                                        <label class="inline-flex bg-white hover:bg-teal-400 text-sm mt-2 mb-2 mr-2 font-semibold py-1 px-2 border border-gray-300 rounded shadow">
                                          <input type="checkbox" name="permission[]" id="permission" value="{{ $value->id }}" class="form-checkbox h-5 w-5 text-black" >
                                          <span class="ml-2 text-gray-800 hover:text-white">{{ $value->description }}</span>
                                        </label>
                                        @endforeach
                                    </div>
                                </div>
                                @error('permission')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
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
</x-app-layout>
