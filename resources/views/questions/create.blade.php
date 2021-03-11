<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Create Digital Review Questions
        </h2>
    </x-slot>

    <div>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            <div class="mt-5 md:mt-0 md:col-span-2">
                <form method="post" action="/reviews/{{ $review->id }}/questions">
                    @csrf
                    <div class="shadow overflow-hidden sm:rounded-md">
                        <div class="bg-purple-500 px-4 py-5 sm:px-6">
                            <h3 class="mb-1 mt-1 ml-1 text-lg font-extrabold tracking-tight text-white">
                              Review Questions
                            </h3>
                            <p class="mb-1 mt-1 ml-1 max-w-2xl text-xs text-white">
                              Please ensure that the question has place within the purpose of the digital review
                            </p>
                        </div>

                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="question" class="block font-medium text-sm text-gray-700">Question</label>
                            <input type="text" name="question[question]" value="{{ old('question.question') }}" class="form-input rounded-md shadow-sm mt-1 block w-full" />
                            @error('question.question')
                                <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="px-4 py-5 bg-white sm:p-6">
                            <fieldset>

                                <legend>Choices</legend>
                                <label for="choices" class="block font-medium text-sm text-gray-700">By default, the responses must reflect the satisfaction of the requirement</label>
                                        <div class="px-4 py-5 bg-white sm:p-6">
                                        <label for="answer1" class="block font-medium text-sm text-gray-700">Choice 1</label>
                                        <input type="text" name="answers[][answer]"  value="Requirement Met" class="form-input rounded-md shadow-sm mt-1 block w-full" />
                                        @error('answers.0.answer')
                                            <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                                        @enderror
                                        </div>

                                        <div class="px-4 py-5 bg-white sm:p-6">
                                            <label for="answer2" class="block font-medium text-sm text-gray-700">Choice 2</label>
                                            <input type="text" name="answers[][answer]"  value="Requirement Partially Met" class="form-input rounded-md shadow-sm mt-1 block w-full" />
                                            @error('answers.1.answer')
                                                <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class="px-4 py-5 bg-white sm:p-6">
                                            <label for="answer3" class="block font-medium text-sm text-gray-700">Choice 3</label>
                                            <input type="text" name="answers[][answer]"  value="Requirement Not Met" class="form-input rounded-md shadow-sm mt-1 block w-full" />
                                            @error('answers.2.answer')
                                                <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class="px-4 py-5 bg-white sm:p-6">
                                            <label for="answer4" class="block font-medium text-sm text-gray-700">Choice 4</label>
                                            <input type="text" name="answers[][answer]"  value="Not Applicable" class="form-input rounded-md shadow-sm mt-1 block w-full" />
                                            @error('answers.3.answer')
                                                <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                                            @enderror
                                        </div>

                                    </div>
                            </fieldset>
                            <div class="flex items-center justify-end px-4 py-3 bg-gray-50 text-right sm:px-6">
                                <button class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                                    Add Question
                                </button>
                            </div>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</x-app-layout>
