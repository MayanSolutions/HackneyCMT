<div>
<div class="shadow-lg rounded-2xl w-80 p-4 bg-white dark:bg-gray-800">
    <div class="flex flex-row items-start gap-4">
        <img src="{{ $user->profile_photo_url }}" alt="" class="w-28 h-28 rounded-lg"/>
        <div class="h-28 w-full flex flex-col justify-between">
            <div>
                <p class="text-gray-800 dark:text-white text-xl font-medium">
                    {{ $user->name}}
                </p>
                <p class="text-gray-400 text-xs">
                    {{ $user->job_title}}
                </p>
                <p class="text-gray-400 text-xs">
                    {{ $user->organisation}}
                </p>
            </div>
            <div class="rounded-lg bg-blue-100 dark:bg-white p-2 w-full">
                <div class="flex items-center justify-between text-xs text-gray-400 dark:text-black">
                    <p class="flex flex-col">
                        <span class="text-black text-xs dark:text-indigo-500 font-bold">
                            Logged in {{ $user->last_login->diffForHumans()}}
                        </span>
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="flex items-center justify-between gap-4 mt-6">
        <a href="{{ route('profile.show') }}" class="py-2 px-4  bg-purple-600 hover:bg-purple-700 focus:ring-indigo-500 focus:ring-offset-indigo-200 text-white w-full transition ease-in duration-200 text-center text-base font-semibold shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2  rounded-lg ">
            My Profile
        </a>
    </div>
</div
</div>
