<x-app-layout>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Create Functions and Responsibilities
        </h2>

    </x-slot>

    <div>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            <div class="block mb-8">
                <a href="{{ URL::previous() }}" class="bg-teal-400 hover:bg-teal-600 text-white font-bold text-xs py-2 px-4 rounded">Go Back</a>
          </div>
            <div class="mt-5 md:mt-0 md:col-span-2">
                <form method="post" action="{{ route('matrixcategories.store') }}">
                    @csrf
                    <div class="shadow overflow-hidden sm:rounded-md">
                        <div class="bg-purple-500 px-4 py-5 sm:px-6">
                            <h3 class="mb-1 mt-1 ml-1 text-lg font-extrabold tracking-tight text-white">
                              Management Function
                            </h3>
                            <p class="mb-1 mt-1 ml-1 max-w-2xl text-xs text-white">
                              Ensure that the title is desciptive of the service as well as providing a concise description
                            </p>
                        </div>
                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="category" class="block font-medium text-sm text-gray-700">Category</label>
                            <input type="text" name="category" id="category" value="{{ old('category') }} " class="form-input rounded-md shadow-sm mt-1 block w-full" />
                            @error('category')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="description" class="block font-medium text-sm text-gray-700">Description</label>
                            <input type="text" name="description" id="description" value="{{ old('description') }} " class="form-input rounded-md shadow-sm mt-1 block w-full" />
                            @error('description')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <br>
                    <div class="mt-5 md:mt-0 md:col-span-2">
                        <div class="shadow overflow-hidden sm:rounded-md">
                            <div class="bg-purple-500 px-4 py-5 sm:px-6">
                                <h3 class="mb-1 mt-1 ml-1 text-lg font-extrabold tracking-tight text-white">
                                Responsibilities
                                </h3>
                                <p class="mb-1 mt-1 ml-1 max-w-2xl text-xs text-white">
                                Responsibilities are determined by the allocation of allowances. Please consult with the finance department before continuing !
                                </p>
                            </div>
                                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                                    <table id="dynamicTable" class="min-w-full divide-y divide-gray-200">
                                    <thead class="bg-gray-50">
                                        <tr>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Function
                                            </th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Cost code
                                            </th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Subjective
                                            </th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Description
                                            </th>
                                            <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-gray-500 tracking-wider">
                                                <a name="add" id="add" class="inline-block rounded-full text-white
                                                bg-green-700 hover:bg-gray-500 duration-300
                                                text-xs font-bold
                                                md:px-4 py-1
                                                opacity-90 hover:opacity-100">Add Function</a>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-200">
                                    </tbody>
                                    </table>
                                </div>
                                <script type="text/javascript">
                                    var i = 0;
                                    $("#add").click(function(){
                                        ++i;
                                        $("#dynamicTable").append('<tr><td class="px-6 py-4 whitespace-nowrap text-sm font-medium"><input type="text" name="function[]" class="form-input text-xs rounded-md shadow-sm mt-1 block w-full" /></td><td class="px-6 py-4 whitespace-nowrap text-sm font-medium"><input type="text" name="cost_code[]" class="form-input text-xs rounded-md shadow-sm mt-1 block w-full" /></td><td class="px-6 py-4 whitespace-nowrap text-sm font-medium"><input type="text" name="subjective[]" class="form-input text-xs rounded-md shadow-sm mt-1 block w-full" /></td><td class="px-6 py-4 whitespace-nowrap text-sm font-medium"><input type="text" name="function_description[]" class="form-input text-xs rounded-md shadow-sm mt-1 block w-full" /></td><td class="px-6 py-4 whitespace-nowrap text-sm font-medium"><a class="inline-block rounded-full text-white bg-red-700 hover:bg-gray-500 duration-300 text-xs font-bold md:px-4 py-1 opacity-90 hover:opacity-100 text-right remove-tr">Remove</a></td></tr>');
                                    });
                                    $(document).on('click', '.remove-tr', function(){
                                        $(this).parents('tr').remove();
                                    });
                                </script>
                            <div class="flex items-center justify-end px-4 py-3 bg-gray-50 text-right sm:px-6">
                                <button class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150 prevent-double">
                                    Create
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        $('#add').one("click", function(event) {
        Swal.fire({
            title: 'Notice',
            text: "Any empty fields will reset the form without saving. Please note that this is for security purposes",
            icon: 'warning',
            showConfirmButton: false,
            timer: 6000
        })
        })
        </script>
</x-app-layout>
