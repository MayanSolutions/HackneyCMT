<x-app-layout>
    <x-slot name="header">
       <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          Review Submission
       </h2>
    </x-slot>


       <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            <div class="block mb-8">
                <a href="{{ URL::previous() }}" class="bg-teal-400 hover:bg-teal-600 text-white font-bold text-xs py-2 px-4 rounded">Go Back</a>
            </div>
            <div class="bg-gray-100 w-100 items-center mb-4">
                <div class="grid grid-cols-3 grid-rows-1 gap-2 md:grid-cols-3 sm:grid-cols-1">
                    <div class="col-span-1">
                        <div class="shadow-lg rounded-2xl p-1 bg-white dark:bg-gray-900 w-full m-auto relative">
                            <div class="w-full h-full text-center">
                                <div class="flex h-full flex-col justify-between">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="mt-3 w-16 h-16 m-auto text-gray-800 dark:text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                                    </svg>
                                    <p class="text-gray-900 dark:text-white text-md mt-2">
                                        {{ $client->client_organisation }}
                                    </p>
                                    <p class="dark:text-gray-50 text-gray-700 text-xs font-thin py-2 px-6">
                                        {{ $submissionInfo->officer }} submitted a review {{ $submissionInfo->created_at->diffForHumans() }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-span-1">
                        <div class="shadow-lg rounded-2xl p-4 bg-white dark:bg-gray-700 w-full">
                            <div class="flex items-center justify-between mb-6">
                                <div class="flex items-center">
                                    <span class="rounded-xl relative p-2 bg-blue-100">
                                        <img class="h-10 w-10 rounded-full" src="{{ $liaisonOfficer->profile_photo_url }}" alt="">
                                    </span>
                                    <div class="flex flex-col">
                                        <span class="font-bold text-md text-black dark:text-white ml-2">
                                            {{ $liaisonOfficer->name }}
                                        </span>
                                        <span class="text-sm text-gray-500 dark:text-white ml-2">
                                            {{ $liaisonOfficer->job_title }}
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="block m-auto">
                                <div>
                                    <span class="text-xs inline-block items-center text-gray-500 dark:text-gray-100">
                                        Is responsible for overseeing the organisation generally undertakes the Annual Review assessment.
                                    <span class="text-gray-700 dark:text-white font-bold">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-span-1">
                        <div class="shadow-lg rounded-2xl p-4 bg-white dark:bg-gray-700 w-full">
                            <div class="flex items-center justify-between mb-6">
                                <div class="relative pt-1 w-full">
                                    <div class="flex mb-1 w-full items-center justify-between">
                                        <div>
                                            @if($status == 100)
                                            <span class="text-xs font-semibold inline-block py-1 px-1">
                                                <a href="" class="inline-flex bg-white hover:bg-purple-600 text-gray-800 hover:text-white text-xs font-semibold py-1 px-2 border border-gray-400 rounded shadow">Send to TMO</a>
                                            </span>
                                            @else
                                            @if(number_format((float)$status, 0, '.', '') < 1)
                                            <span class="text-xs font-semibold inline-block py-1 px-2 uppercase rounded-full text-white bg-pink-400">
                                                Not started
                                            </span>
                                            @elseif(number_format((float)$status, 0, '.', '') < '99')
                                            <span class="text-xs font-semibold inline-block py-1 px-2 uppercase rounded-full text-white bg-purple-600">
                                                In progress
                                            </span>
                                            @endif
                                            @endif
                                        </div>
                                        <div class="text-right">
                                            @if($status == 100)
                                            <span class="text-sm font-semibold inline-block text-green-600">
                                                Completed
                                            </span>
                                            @else
                                            <span class="text-xl font-semibold inline-block text-pink-600">
                                                {{ number_format((float)$status, 0, '.', '') }}%
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="block m-auto">
                                @if($status == 100)
                                <div>
                                    <span class="text-xs inline-block items-center text-gray-500 dark:text-gray-100">

                                    <span class="text-gray-700 dark:text-white font-bold">
                                    <span class="text-xs inline-block items-center text-gray-500 dark:text-gray-100">
                                        Now the assessment is complete, you can send the TMO a copy of the assessments results by clicking the Send to TMO button above
                                    <span class="text-gray-700 dark:text-white font-bold">
                                </div>
                                @else
                                <div>
                                    <span class="text-xs inline-block items-center text-gray-500 dark:text-gray-100">
                                        An assessment cannot be finalised until all requirements are assessed by the responsible officer, assigning a pass or fail for each one.
                                    <span class="text-gray-700 dark:text-white font-bold">
                                </div>
                                @endif
                            </div>
                    </div>
                        </div>
                    </div>
                </div>
                <br>
                <div class="bg-white shadow overflow-hidden sm:rounded-lg">
                    <div class="px-4 py-5 sm:px-6 bg-white">
                        <h3 class="mb-1 mt-1 ml-1 text-lg font-extrabold tracking-tight text-gray-800">
                            Digital Review - {{ $client->client_organisation}}
                        </h3>
                        <p class="mb-1 mt-1 ml-1 max-w-2xl text-xs text-grey-500">
                            Submitted on {{ $submissionInfo->created_at->diffForHumans() }} by {{ $submissionInfo->officer }}. This assessment was last updated {{ $submissionInfo->updated_at->diffForHumans() }}
                        </p>
                    </div>
                    @foreach($assessments as $assessment)
                    <div class="border-t border-gray-200">
                        <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
                            <p class="text-sm text-gray-600">
                                MMA Requirement
                            </p>
                            <p class="text-sm text-gray-600">
                                {{ $assessment->question }}
                            </p>
                        </div>
                        <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
                                <p class="text-sm text-gray-600">
                                    Submission from Digital Review
                                </p>
                                <p class="text-sm text-gray-600">
                                    {{ $assessment->answer }}
                                </p>
                        </div>
                        <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
                            <p class="text-sm text-gray-600">
                                Assessment Result
                            </p>
                            <p class="text-sm text-gray-600">
                                @if(empty($assessment->assessment_result))
                                <span class="text-xs font-semibold inline-block py-1 px-2 rounded-full text-white bg-purple-600">
                                   Not reviewed
                                </span>
                                @elseif($assessment->assessment_result == 1)
                                <span class="text-xs font-bold inline-block py-1 px-2 rounded-full text-white bg-green-500">
                                    Pass
                                </span>
                                @elseif($assessment->assessment_result == 2)
                                <span class="text-xs font-bold inline-block py-1 px-2 rounded-full text-gray-800 bg-pink-200">
                                    Fail
                                </span>
                                @elseif($assessment->assessment_result == 3)
                                <span class="text-xs font-bold inline-block py-1 px-2 rounded-full text-gray-800 bg-teal-500">
                                    Not Applicable
                                </span>
                                @endif
                            </p>
                        </div>
                        <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
                            <p class="text-sm text-gray-600">
                                Comments from assessor
                            </p>
                            <p class="text-sm text-gray-600">
                                @if(empty($assessment->comments))
                                No commentry submitted
                                @else
                                {{ $assessment->comments }}
                                @endif
                            </p>
                        </div>
                        <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
                            <p class="text-sm text-gray-600">
                               Assessing Officer
                            </p>
                            @if(empty($assessment->liaison_officer))
                            <p class="text-sm text-pink-600">
                                This requirement has not been assessed
                            </p>
                             @else
                            <p class="text-sm text-gray-600">
                                {{ $assessment->liaison_officer }}
                            </p>
                            @endif
                        </div>
                        @if(empty($assessment->assessment_result))
                        <div class="flex items-center justify-end px-4 py-3 bg-gray-50 text-right sm:px-6">
                            <a href="{{ route('assessments.edit', $assessment->id) }}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150 button-prevent-double-click">
                                <i><x-heroicon-s-badge-check class="h-5 w-5 text-white prevent-double" /></i> Grade
                            </a>
                        </div>
                        @else
                        <div class="flex items-center justify-end px-4 py-3 bg-gray-50 text-right sm:px-6">
                            <a href="{{ route('assessments.edit', $assessment->id) }}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150 button-prevent-double-click">
                                <i><x-heroicon-s-badge-check class="h-5 w-5 text-white prevent-double" /></i>Re-grade
                            </a>
                        </div>
                        @endif
                    </div>
                    @endforeach
                </div>
                <br>
                    {!! $assessments->links() !!}
            </div>
        </div>

 </x-app-layout>
