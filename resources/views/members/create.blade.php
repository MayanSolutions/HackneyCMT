<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Create Board Profile
        </h2>
    </x-slot>

    <div>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            <div class="block mb-8">
                <a href="{{ URL::previous() }}" class="bg-teal-400 hover:bg-teal-600 text-white font-bold text-xs py-2 px-4 rounded">Go Back</a>
          </div>
          @if($filterClient != Null)
            <div class="mt-5 md:mt-0 md:col-span-2">
                <form method="post" class="form-prevent-double-click" action="{{ route('members.custom.store', ['clients' => $filterClient->id]) }}">
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
                        <div class="bg-white px-4 py-5 sm:px-6">
                                <h3 class="text-lg font-extrabold tracking-tight text-gray-700">
                                    Election Date
                                 </h3>
                                <label for="agm_date" class="block font-medium text-sm text-gray-700">Date of AGM</label>
                                <input type="date" name="agm_date" id="agm_date" value="{{ old('agm_date') }}" class="form-input rounded-md shadow-sm mt-1 block w-full" />
                                @error('agm_date')
                                    <p class="text-sm text-red-600">{{ $message }}</p>
                                @enderror
                        </div>
                    </div>
                    <br>

                    <div class="shadow overflow-hidden sm:rounded-md">
                        <div class="bg-purple-500 px-4 py-5 sm:px-6">
                            <h3 class="mb-1 mt-1 ml-1 text-lg font-extrabold tracking-tight text-white">
                               Board Profile
                            </h3>
                            <p class="mb-1 mt-1 ml-1 max-w-2xl text-xs text-white">
                               This relates to elected members on the TMO board
                            </p>
                         </div>
                        <table id="dynamicTable" class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Elected Member
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Position
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Member email
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Member Contact No
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-gray-500 tracking-wider">
                                        <a name="add" id="add" class="inline-block rounded-full text-white
                                        bg-green-700 hover:bg-gray-500 duration-300
                                        text-xs font-bold
                                        md:px-4 py-1
                                        opacity-90 hover:opacity-100">New</a>
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                            </tbody>
                        </table>
                        <div class="flex items-center justify-end px-4 py-3 bg-gray-50 text-right sm:px-6">
                            <button class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150 button-prevent-double-click">
                                <i><x-heroicon-s-badge-check class="h-5 w-5 text-white prevent-double" /></i>  Create
                            </button>
                        </div>
                </form>
            </div>

            @else
            <div class="mt-5 md:mt-0 md:col-span-2">
                    <div class="shadow overflow-hidden sm:rounded-md">
                        <div class="bg-teal-500 px-4 py-5 sm:px-6">
                            <h3 class="mb-1 mt-1 ml-1 text-lg font-extrabold tracking-tight text-white">
                              There has been an error
                            </h3>
                            <p class="mb-1 mt-1 ml-1 max-w-2xl text-xs text-white">
                                No TMO requires a board profile
                            </p>
                        </div>
                    </div>
            </div>
            @endif
            </div>
        </div>
    </div>
    <script type="text/javascript">
        var i = 0;
        $("#add").click(function(){
        ++i;
        $("#dynamicTable").append('<tr><td class="px-6 py-4 whitespace-nowrap text-sm font-medium"><input type="text" name="elected_name[]" class="form-input text-xs rounded-md shadow-sm mt-1 block w-full" /></td><td class="px-6 py-4 whitespace-nowrap text-sm font-medium"><select name="position[]" id="position[]" class="w-full h-10 pl-3 pr-6 text-base placeholder-gray-600 border rounded-lg appearance-none focus:shadow-outline" placeholder="Regular input"><option value="Board Member">Board Member</option><option value="Board Secretary">Board Secretary</option><option value="Vice Chair">Vice Chair</option><option value="Board Chair">Board Chair</option><option value="Co-opted Member">Co-opted Member</option><option value="Councillor">Councillor</option><option value="Commitee Member">Commitee Member</option></select></td><td><input type="text" name="elected_email[]" class="form-input text-xs rounded-md shadow-sm mt-1 block w-full" /></td><td class="px-6 py-4 whitespace-nowrap text-sm font-medium"><input type="text" name="elected_contact[]" class="form-input text-xs rounded-md shadow-sm mt-1 block w-full" /></td><td class="px-6 py-4 whitespace-nowrap text-sm font-medium"><a class="inline-block rounded-full text-white bg-red-700 hover:bg-gray-500 duration-300 text-xs font-bold md:px-4 py-1 opacity-90 hover:opacity-100 text-right remove-tr">Remove</a></td></tr>');
        });
        $(document).on('click', '.remove-tr', function(){
        $(this).parents('tr').remove();
        });
    </script>
</x-app-layout>
