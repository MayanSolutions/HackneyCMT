<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Create Account
        </h2>
    </x-slot>

    <div>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            <div class="block mb-8">
                <a href="{{ URL::previous() }}" class="bg-teal-400 hover:bg-teal-600 text-white font-bold text-xs py-2 px-4 rounded">Go Back</a>
            </div>
            <div class="mt-5 md:mt-0 md:col-span-2">
                <form method="post" class="form-prevent-double-click" action="{{ route('users.store') }}">
                    @csrf
                        <div class="shadow overflow-hidden sm:rounded-md">
                            <div class="bg-purple-600 px-4 py-5 sm:px-6">
                                <h3 class="mb-1 mt-1 ml-1 text-lg font-extrabold tracking-tight text-white">
                                New Account
                                </h3>
                                <p class="mb-1 mt-1 ml-1 max-w-2xl text-xs text-white">
                                Please cross reference any new account information. Unauthorised accounts pose a serious security risk !
                                </p>
                            </div>

                            <div class="px-4 py-5 bg-white sm:p-6">
                                <label for="name" class="block font-medium text-sm text-gray-700">Name</label>
                                <input type="text" name="name" id="name" class="form-input rounded-md shadow-sm mt-1 block w-full" />
                                @error('name')
                                    <p class="text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="px-4 py-5 bg-white sm:p-6">
                                <label for="email" class="block font-medium text-sm text-gray-700">Email</label>
                                <input type="email" name="email" id="email" class="form-input rounded-md shadow-sm mt-1 block w-full" />
                                @error('email')
                                    <p class="text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="px-4 py-5 bg-white sm:p-6">
                                <label for="job_title" class="block font-medium text-sm text-gray-700">Job Title</label>
                                <input type="text" name="job_title" id="job_title" class="form-input rounded-md shadow-sm mt-1 block w-full" />
                                @error('job_title')
                                    <p class="text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="px-4 py-5 bg-white sm:p-6">
                                <label for="department" class="block font-medium text-sm text-gray-700">Department</label>
                                <input type="text" name="department" id="department" class="form-input rounded-md shadow-sm mt-1 block w-full" />
                                @error('department')
                                    <p class="text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="px-4 py-5 bg-white sm:p-6">
                                <label for="organisation" class="block font-medium text-sm text-gray-700">Organisation</label>
                                <input type="text" name="organisation" id="organisation" class="form-input rounded-md shadow-sm mt-1 block w-full" />
                                @error('organisation')
                                    <p class="text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="px-4 py-5 bg-white sm:p-6">
                                <label for="password" class="block font-medium text-sm text-gray-700">Password</label>
                                <input type="password" name="password" id="password" class="form-input rounded-md shadow-sm mt-1 block w-full" />
                                @error('password')
                                    <p class="text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    <br>

                        <div class="mt-5 md:mt-0 md:col-span-2">
                            <div class="shadow overflow-hidden sm:rounded-md">
                                <div class="bg-purple-600 px-4 py-5 sm:px-6">
                                    <h3 class="mb-1 mt-1 ml-1 text-lg font-extrabold tracking-tight text-white">
                                    Account Permissions
                                    </h3>
                                    <p class="mb-1 mt-1 ml-1 max-w-2xl text-xs text-white">
                                    For security reasons, please ensure you assign the adequate profile
                                    </p>
                                </div>

                                <div class="px-4 py-5 bg-white sm:p-6">
                                    <label for="roles" class="block font-medium text-sm text-gray-700">Profile</label>
                                    <select name="roles[]" id="roles" class="form-multiselect block rounded-md shadow-sm mt-1 block w-full">
                                        <option value="">Select Profile</option>
                                        @foreach($roles as $id => $role)
                                            <option value="{{ $id }}"{{ in_array($id, old('roles', [])) ? ' selected' : '' }}>{{ $role }}</option>
                                        @endforeach
                                    </select>
                                    @error('roles')
                                        <p class="text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="flex items-center justify-end px-4 py-3 bg-gray-50 text-right sm:px-6">
                                    <button class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150 button-prevent-double-click">
                                        <i><x-heroicon-s-badge-check class="h-5 w-5 text-white prevent-double" /></i> Create
                                    </button>
                                </div>
                            </div>
                        </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
