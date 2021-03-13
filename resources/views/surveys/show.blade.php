<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Annual Review Assessment
        </h2>
    </x-slot>

    <script type="text/javascript">
        function noenter() {
          return !(window.event && window.event.keyCode == 13); }
    </script>

    <div>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            <div class="mt-5 md:mt-0 md:col-span-2">
                    <div class="shadow overflow-hidden bg-white sm:rounded-md">
                        <div class="px-4 py-8 mx-auto sm:max-w-xl md:max-w-full lg:max-w-screen-xl md:px-12 lg:px-4 lg:py-10">
                            <div class="grid gap-3 row-gap-4 lg:grid-cols-2">
                              <div class="ml-6 flex flex-col justify-center">
                                <div class="max-w-xl mb-6">
                                  <h2 class="max-w-lg mb-6 font-sans text-1xl font-bold tracking-tight text-gray-900 sm:text-1xl sm:leading-none">
                                    Tenant Management Organisation<br class="hidden md:block" />
                                    Digital
                                    <span class="inline-block text-deep-purple-accent-400">Annual Reviews</span>
                                  </h2>
                                  <p class="text-base text-gray-700 md:text-sm">
                                    Welcome to the Digital Review Assessment Platform.
                                  </p>
                                  <br>
                                  <p class="text-base text-gray-700 md:text-sm">
                                    You should have recieved an email from your liaison officer, proving you a copy of the review assessment, to allow you to pre-prepair for this initial review.
                                  </p>
                                  <p class="text-base text-gray-700 md:text-sm">
                                    This assessment will provide your liaison officer with all the information which is required to conduct an Annual Review. This will then be assessed by the local authority.
                                  </p>
                                  <br>
                                  <p class="text-base text-gray-700 md:text-sm">
                                    Please ensure that the required documentation has been pre-scanned and is saved in a single PDF file, no larger that 10MB. Also, please have all your infomation to hand in order to commplete the assessment fully in one sitting.
                                  </p>
                                  <br>
                                  <p class="text-base text-gray-700 md:text-sm">
                                    Your review survey is located below
                                  </p>
                                  <br>
                                </div>
                                <a aria-label="" class="inline-flex items-center font-semibold transition-colors duration-200 text-deep-purple-accent-400 hover:text-deep-purple-800">
                                  Please do not refresh this page
                                </a>
                              </div>
                              <div class="max-w-xl mb-6">
                                <img src="{{url('/images/undraw_Up_to_date_re_nqid.svg')}}" alt="Logo" style="height: 495px; width: 495px;"></a>
                            </div>
                        </div>

                    </div>
                </div>
                <br>

                    <div class="bg-gray-100 shadow overflow-hidden sm:rounded-md">
                        <div class="bg-teal-400 px-4 py-5 sm:px-6">
                            <h3 class="text-lg leading-6 font-medium text-white">
                              {{ $review->title }}
                            </h3>
                        </div>

                    <form action="/surveys/{{ $review->id }}-{{ Str::slug($review->title) }}" method="post" >
                        @csrf

                        <div class="bg-white mt-6 mb-6 p-3 p-3 ml-5 mr-5 grid shadow overflow-hidden sm:rounded-md">
                            <section class="ml-5 mt-3 w-full bg-white">
                                <div class="w-full mx-auto text-left">
                                    <h2 class="mb-6 font-extrabold items-center tracking-tight md:text-1xl md:mb-6 md:leading-tight">
                                         Completing the assessment
                                    </h2>
                                    <p class="text-base text-gray-700 md:text-sm">
                                        1. Please ensure you complete the organisation details, with the information of the completing officer so we can identify your response.
                                    </p>
                                    <br>
                                    <p class="text-base text-gray-700 md:text-sm">
                                        2. Complete all questions below. If the below question doesnt relate to your organisation, please use the N/A option as an answer.
                                    </p>
                                    <br>
                                    <p class="text-base text-gray-700 md:text-sm mb-3">
                                        3. Your liaison officer will contact you shortly to verify the submission og the assessment.
                                    </p>
                                </div>
                            </section>
                    </div>

                        <div class="bg-white mt-6 mb-6 p-3 p-3 ml-5 mr-5 grid w-90 gap-4 shadow overflow-hidden sm:rounded-md row-gap-5 mx-auto lg:grid-cols-2">
                                <div class="mt-3 mb-3 flex flex-col max-w-md sm:ml-4 mr-5 sm:flex-row">
                                    <div class="mr-4">
                                        <div class="flex items-center justify-center w-12 h-12 mb-4 rounded-full bg-indigo-50">
                                            <strong>TMO</strong>
                                        </div>
                                    </div>

                                    <div class="w-full">
                                        <h6 class="mb-3 text-l font-bold leading-5">Your Organisation</h6>
                                        <div class="px-1 py-2 bg-white sm:p-2">
                                            <select name="survey[client_id]" id="survey[client_id]" class="w-full h-10 pl-3 pr-6 text-base placeholder-gray-600 border rounded-lg appearance-none focus:shadow-outline" placeholder="Regular input" onkeypress="return noenter()">
                                                <option value="">Select Your organisation</option>
                                                @foreach($clients as $client)
                                                <option value="{{ $client->id }}">{{ $client->client_organisation }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="mt-3 mb-3 flex flex-col max-w-md sm:ml-4 mr-5 sm:flex-row">
                                    <div class="w-full">
                                        <h6 class="mb-3 text-l font-bold leading-5">Your Name</h6>
                                            <div class="px-1 py-2 bg-white sm:p-2">
                                                <input type="text" name="survey[officer]" value="" id="survey[officer]" class="w-full h-10 pl-3 pr-6 text-base placeholder-gray-600 border rounded-lg appearance-none focus:shadow-outline" onkeypress="return noenter()" />
                                            </div>
                                    </div>
                                </div>
                        </div>


                                @foreach($review->questions as $key => $question)
                                <div class="bg-white mt-6 mb-6 p-3 p-3 ml-5 mr-5 grid w-90 gap-4 shadow overflow-hidden sm:rounded-md row-gap-5 mx-auto lg:grid-cols-2">

                                    <div class="mt-3 mb-3 flex flex-col max-w-md sm:ml-4 mr-5 sm:flex-row">
                                    <div class="mr-4">
                                        <div class="flex items-center justify-center w-12 h-12 mb-4 rounded-full bg-indigo-50">
                                            <strong>Q.{{ $key + 1 }}</strong>
                                        </div>
                                    </div>
                                    <div>
                                        <h6 class="mb-3 text-l font-bold leading-5">Requirement</h6>
                                        <p class="mb-3 text-sm text-gray-900">
                                        {{ $question->question}}
                                        </p>
                                    </div>
                                    </div>

                                    <div class="mt-3 mb-3 flex flex-col max-w-md sm:ml-4 mr-5 sm:flex-row">
                                    <div class="mr-4">
                                        <div class="flex items-center justify-center w-12 h-12 mb-4 rounded-full bg-indigo-50">
                                            <strong>A.{{ $key + 1 }}</strong>
                                        </div>
                                    </div>

                                    <div>
                                        <h6 class="mb-3 text-l font-bold leading-5">Response</h6>
                                        @foreach($question->answers as $answer)
                                        <li class="list-none">
                                            <div class="flex flex-col">
                                            <label for="answer{{ $answer->id }}" class="inline-flex items-center text-sm mt-3">
                                            <input type="radio" name="responses[{{ $key }}][answer_id]" value="{{ $answer->id }}" id="answer{{ $answer->id }}" onkeypress="return noenter()" class="form-radio h-5 w-5 text-teal-600" {{ (old('response.' . $key . '.answer_id') == $answer->id) ? 'checked' : ''}}><span class="ml-2 text-gray-700">{{ $answer->answer }}</span>
                                            <input type="hidden" name="responses[{{ $key }}][question_id]" value="{{ $question->id }}" onkeypress="return noenter()"/>
                                            </label>
                                            </div>
                                        </li>
                                        @endforeach
                                        @error('responses.' .$key . '.answer_id')
                                        <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    </div>
                                </div>
                                @endforeach
                                <div class="flex items-center justify-end px-4 py-3 bg-gray-50 text-right sm:px-6">
                                    <button class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                                        Submit
                                    </button>
                                </div>
                                </div>
                            </div>

                </form>
            </div>
        </div>
    </div>
</x-app-layout>
