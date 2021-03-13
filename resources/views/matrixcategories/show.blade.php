<x-app-layout>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <x-slot name="header">
       <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ $category->category }} Function
       </h2>
    </x-slot>
    <div>
       <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
        <div class="block mb-8">
            @can('can_view_matrix_cat')
            <a href="{{ route('matrixcategories.index') }}" class="bg-gray-400 text-white hover:bg-gray-500 hover:text-white font-bold text-xs py-2 px-4 rounded">Housing Functions</a>
            @endcan
        </div>

         <div class="mt-5 md:mt-0 md:col-span-2">
                <div class="bg-white shadow overflow-hidden sm:rounded-lg">
                    <div class="bg-purple-500 px-4 py-5 sm:px-6">
                        <h3 class="mb-1 mt-1 ml-1 text-lg font-extrabold tracking-tight text-white">
                            {{ $category->category }}
                        </h3>
                        <p class="mb-1 mt-1 ml-1 max-w-2xl text-xs text-white">
                            Please consult with finance before adding any new functions
                        </p>
                    </div>

                            <div class="border-t border-gray-200">
                                <form method="post" action="{{ route('matrixfunctions.store') }}">
                                    @csrf
                                <div class="shadow overflow-hidden border-b border-gray-200">
                                    <table class="min-w-full divide-y divide-gray-200" id="dynamicTable">
                                    <thead class="bg-gray-50">
                                        <tr>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Housing function
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

                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 text-right tracking-wider">
                                                <a name="add" id="add" class="inline-block rounded-full text-white
                                                bg-green-700 hover:bg-gray-500 duration-300
                                                text-xs font-bold
                                                md:px-4 py-1
                                                opacity-90 hover:opacity-100 ">Add Function</a>

                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-200">
                                    </tbody>
                                    </table>
                                </div>
                                <div class="flex items-center justify-end px-4 py-3 bg-gray-50 text-right sm:px-6">
                                    <button class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                                        Create
                                    </button>
                                </div>
                                <script type="text/javascript">
                                    var i = 0;
                                    $("#add").click(function(){
                                        ++i;
                                        $("#dynamicTable").append('<tr><td class="px-6 py-4 whitespace-nowrap text-sm font-medium"><input type="text" name="function[]" class="form-input text-xs rounded-md shadow-sm mt-1 block w-full" /></td><td class="px-6 py-4 whitespace-nowrap text-sm font-medium"><input type="text" name="cost_code[]" class="form-input text-xs rounded-md shadow-sm mt-1 block w-full" /></td><td class="px-6 py-4 whitespace-nowrap text-sm font-medium"><input type="text" name="subjective[]" class="form-input text-xs rounded-md shadow-sm mt-1 block w-full" /></td><td class="px-6 py-4 whitespace-nowrap text-sm font-medium"><input type="text" name="function_description[]" class="form-input text-xs rounded-md shadow-sm mt-1 block w-full" /></td><td class="px-6 py-4 whitespace-nowrap text-sm font-medium"><a class="inline-block rounded-full text-white bg-red-700 hover:bg-gray-500 duration-300 text-xs font-bold md:px-4 py-1 opacity-90 hover:opacity-100 remove-tr">Remove</a></td><td><input type="hidden" name="catid[]"value="{{ $category->id }}" readonly/></td></tr>');
                                    });
                                    $(document).on('click', '.remove-tr', function(){
                                        $(this).parents('tr').remove();
                                    });
                                </script>
                                </form>
                         </div>
                    </div>
                </div>
                <br>
                        <div class="border-t border-gray-200">
                            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                                    <h3 class="mb-2 mt-4 ml-6 font-extrabold float-left tracking-tight text-gray-700">
                                        Housing Function
                                    </h3>
                                        <form action="{{ route('matrixcategories.show', $category->id) }}" method="GET" role="search">
                                            <div class="pt-2 relative mx-auto float-right mr-3 mb-2 text-gray-600">
                                            <input class="border-2 border-gray-300 bg-white h-10 px-5 pr-16 rounded-lg text-sm focus:outline-none" type="text" name="function" placeholder="Search Function">
                                            <button type="submit" id="function" class="absolute right-0 top-0 mt-5 mr-4">
                                                <svg class="text-gray-600 h-4 w-4 fill-current" xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px"
                                                viewBox="0 0 56.966 56.966" style="enable-background:new 0 0 56.966 56.966;" xml:space="preserve"
                                                width="512px" height="512px">
                                                <path
                                                    d="M55.146,51.887L41.588,37.786c3.486-4.144,5.396-9.358,5.396-14.786c0-12.682-10.318-23-23-23s-23,10.318-23,23  s10.318,23,23,23c4.761,0,9.298-1.436,13.177-4.162l13.661,14.208c0.571,0.593,1.339,0.92,2.162,0.92  c0.779,0,1.518-0.297,2.079-0.837C56.255,54.982,56.293,53.08,55.146,51.887z M23.984,6c9.374,0,17,7.626,17,17s-7.626,17-17,17  s-17-7.626-17-17S14.61,6,23.984,6z" />
                                                </svg>
                                            </button>
                                            </div>
                                        </form>

                                @if (count($functions) > 0)
                                <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Housing function
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

                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">

                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    @foreach($functions as $function)
                                    <tr>

                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            {{ $function->function }}
                                        </td>

                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            {{ $function->cost_code }}
                                        </td>

                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            {{ $function->subjective }}
                                        </td>

                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        {{ $function->description }}
                                        </td>

                                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        @can('can_delete_matrix_cat')
                                        <form class="inline-block" action="{{ route('matrixfunctions.destroy', $function->id) }}" method="POST">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <a type="submit" class="bg-white hover:bg-red-600 text-gray-800 hover:text-white text-xs font-semibold py-1 px-2 border border-gray-400 rounded shadow delete-confirm">Delete</a>
                                     </form>
                                       @endcan
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                </table>
                                @else
                                <section class="w-full bg-gradient-to-b from-gray-100 to-white">
                                    <div class="w-full px-4 py-10 mx-auto text-left md:text-center md:w-3/4 lg:w-2/4">
                                      <h2 class="mb-6 font-extrabold tracking-tight md:text-1xl md:mb-6 md:leading-tight">
                                          Opps, It looks like the Function you are looking for has not been registered on our system yet
                                        </h2>
                                      <div class="mb-0 space-x-0 md:space-x-2">
                                        <p class="mt-1 max-w-2xl text-xs text-gray-600 text-white">
                                            If you just ran a search, click search icon again to return. If not, please contact your system administrator !
                                        </p>
                                      </div>
                                    </div>
                                  </section>
                                @endif
                            </div>
                     </div>
                     <br>
                     {!! $functions->links() !!}
                </div>
            </div>
        </div>
    </div>
</div>
<script>
$('#add').one("click", function(event) {
Swal.fire({
    title: 'Notice',
    text: "Empty fields will reset the form without assigning functions to the service. This is for security purposes",
    icon: 'warning',
    showConfirmButton: false,
    timer: 6000
})
})
</script>
<script>
    $('.delete-function').click(function(event) {
        event.preventDefault();
        var form =  $(this).closest("form");
    Swal.fire({
        title: 'Are you sure?',
        text: "Deleting a function will remove it from the responsibilities list. This cause damage to several areas of the system !",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
    if (result.value) {
    form.submit();
    }
    })
    })
    </script>
 </x-app-layout>
