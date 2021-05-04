<x-app-layout>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Requirement Assessment
        </h2>

    </x-slot>

    <div>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            <div class="block mb-8">
                <a href="{{ URL::previous() }}" class="bg-teal-400 hover:bg-teal-600 text-white font-bold text-xs py-2 px-4 rounded">Go Back</a>
          </div>
            <div class="mt-5 md:mt-0 md:col-span-2">
                <form method="post" class="form-prevent-double-click" action="{{ route('assessments.update', $assessment->id) }}">
                    @csrf
                    @method('put')
                    <div class="shadow overflow-hidden sm:rounded-md">
                        <div class="bg-purple-600 px-4 py-5 sm:px-6">
                            <h3 class="mb-1 mt-1 ml-1 text-lg font-extrabold tracking-tight text-white">
                              Requirement
                            </h3>
                            <p class="mb-1 mt-1 ml-1 max-w-2xl text-xs text-white">
                              {{ $assessment->question}}
                            </p>
                        </div>

                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="assessment_result" class="block font-medium text-sm text-gray-700">Requirement Result</label>
                            <select name="assessment_result" id="assessment_result" class="w-full h-10 pl-3 pr-6 text-base placeholder-gray-600 border rounded-lg appearance-none focus:shadow-outline" placeholder="Regular input">
                                <option value=""> Select result</option>
                                <option value="1" {{ ($assessment->question == '') ? 'selected' : '' }}>Pass</option>
                                <option value="2" {{ ($assessment->question == '') ? 'selected' : '' }}>Fail</option>
                                <option value="3" {{ ($assessment->question == '') ? 'selected' : '' }}>Not Applicable</option>
                            </select>
                            @error('assessment_result')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="comments" class="block font-medium text-sm text-gray-700">Liaison Comments</label>
                            <textarea name="comments" id="comments" class="form-input rounded-md shadow-sm mt-1 block w-full" />{{ $assessment->comments }}</textarea>
                            @error('comments')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="flex items-center justify-end px-4 py-3 bg-gray-50 text-right sm:px-6">
                            <button class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150 button-prevent-double-click">
                                <i><x-heroicon-s-badge-check class="h-5 w-5 text-white prevent-double" /></i> Grade
                            </button>
                    </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
