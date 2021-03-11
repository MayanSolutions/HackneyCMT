<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Create Digital Review
        </h2>
    </x-slot>

    <div>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            <div class="mt-5 md:mt-0 md:col-span-2">
                <form method="post" action="/reviews">
                    @csrf
                    <div class="shadow overflow-hidden sm:rounded-md">
                        <div class="bg-purple-500 px-4 py-5 sm:px-6">
                            <h3 class="mb-1 mt-1 ml-1 text-lg font-extrabold tracking-tight text-white">
                              Review Details
                            </h3>
                            <p class="mb-1 mt-1 ml-1 max-w-2xl text-xs text-white">
                              Please provide a description as required below
                            </p>
                        </div>

                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="title" class="block font-medium text-sm text-gray-700">Review Title</label>
                            <input type="text" name="title" value="{{ old('title') }} " id="title" class="form-input rounded-md shadow-sm mt-1 block w-full" />
                            @error('title')
                                <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="purpose" class="block font-medium text-sm text-gray-700">Review Purpose</label>
                            <input type="text" name="purpose" value="{{ old('purpose') }} " id="purpose" class="form-input rounded-md shadow-sm mt-1 block w-full" />
                            @error('purpose')
                                <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="version" class="block font-medium text-sm text-gray-700">Review Version</label>
                            <input type="text" name="version" value="{{ old('version') }}" id="version" class="form-input rounded-md shadow-sm mt-1 block w-full"/>
                            @error('version')
                                <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
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
    </div>
</x-app-layout>
