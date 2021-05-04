<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Digital Review
        </h2>
    </x-slot>
    <div>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            <div class="block mb-8">
                <a href="{{ route('digitalreviews.index') }}" class="bg-gray-400 hover:bg-gray-500 text-white font-bold text-xs py-2 px-4 rounded">Review List</a>
                <a href="/surveys/{{ $review->id }}-{{ Str::slug($review->id) }}" class="bg-green-400 hover:bg-green-500 text-white font-bold text-xs py-2 px-4 rounded">Live Submission</a>
             </div>
                <div class="bg-purple-600 shadow overflow-hidden sm:rounded-lg">
                    <div class="px-4 py-5 sm:px-6">
                        <h3 class="mb-1 mt-1 ml-1 text-lg font-extrabold tracking-tight text-white">
                            {{ $review->title }}
                        </h3>
                        <p class="mb-1 mt-1 ml-1 max-w-2xl text-sm text-white">
                            {{ $review->purpose }}
                        </p>
                        <br>
                        <p class="mb-1 mt-1 ml-1 max-w-2xl text-xs text-white">
                            {{ $review->version }}
                        </p>
                    </div>

                    <div class="flex items-center justify-end px-4 py-3 bg-gray-50 text-right sm:px-6">
                        <a href="/reviews/{{ $review->id }}/questions/create" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                            Create Review Question
                        </a>
                    </div>
                </div>
                <br>
                @foreach($review->questions as $question)
                <div class="bg-green-600 shadow overflow-hidden sm:rounded-lg">
                    <div class="px-6 py-4 whitespace-nowrap">
                        <h3 class="text-lg leading-6 font-medium text-white">
                            {{ $question->question }}
                        </h3>
                    </div>

                    <div class="bg-white shadow-xl w-full">
                        <ul class="divide-y divide-gray-300">
                            @foreach($question->answers as $answer)
                            <li class="p-4 hover:bg-gray-50 cursor-pointer">{{ $answer->answer }}</li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="px-6 py-4 whitespace-nowrap">
                    <form action="/reviews/{{ $review->id  }}/questions/{{ $question->id }}" method="post">
                        @method('DELETE')
                        @csrf
                        <a href="" class="delete-confirm float-right inline-block rounded-full text-white
                            bg-green-500 hover:bg-red-700 duration-300
                            text-xs font-bold
                            mr-1 md:mr-2 mb-2 px-2 md:px-4 py-1
                            opacity-90 hover:opacity-100 delete-confirm">Delete this question</a>
                    </form>
                    <br>
                </div>
                </div>
                <br>
                    @endforeach
            </div>
        </div>
</x-app-layout>
