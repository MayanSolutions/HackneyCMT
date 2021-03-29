<div>
    <div class="shadow-lg rounded-2xl w-full p-2 bg-white dark:bg-gray-800">
        <div class="flex flex-row items-start gap-4">
            <img src="{{ $user->profile_photo_url }}" alt="" class="w-28 h-28 rounded-lg"/>

            <div class="h-28 w-full flex flex-col justify-between">

                <div>
                    <p class="font-bold p-1 text-black dark:text-white">
                        {{ $user->name}}
                    </p>
                    <p class="font-bold text-xs p-1 text-black dark:text-white">
                        {{ $user->job_title}}
                    </p>
                    <p class="font-bold text-xs p-1 text-black dark:text-white">
                        {{ $user->department}}
                    </p>
                    <div class="flex items-center justify-between gap-4 mt-1">
                        <a href="{{ route('profile.show') }}"  class="inline-flex font-bold bg-purple-500 hover:bg-purple-600 text-white hover:text-white text-xs font-semibold py-1 px-2 rounded shadow">My Profile</a>
                    </div>
                </div>

            </div>
        </div>
        <div class="flex items-center text-gray-600 dark:text-gray-200 justify-between py-2">
            <div class="rounded-lg bg-blue-100 dark:bg-white p-2 w-full">
                <div class="flex items-center justify-between text-xs text-gray-400 dark:text-black">
                    <p class="flex flex-col item-center justify-center">
                        <p class="text-black text-xs dark:text-indigo-500 font-bold">
                            Last recorded login was {{ $user->last_login->diffForHumans()}}
                        </p>
                    </p>
                </div>
            </div>

        </div>


    </div>
</div>
