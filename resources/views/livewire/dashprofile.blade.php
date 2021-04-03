<div>
    <div class="shadow-lg rounded-2xl w-full p-2 bg-gradient-to-b from-white to-gray-100  dark:bg-gray-800">
        <p class="font-bold text-md p-2 border-b mb-3 border-gray-200 text-black dark:text-white">
            My Account
        </p>
            <div class="flex flex-row items-start gap-4 mb-3">
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
                        <p class="font-bold text-xs p-1 text-black dark:text-white">
                            {{ $user->organisation}}
                        </p>
                    </div>

                </div>
            </div>

            <div class="flex items-center text-gray-600 dark:text-gray-200 justify-between py-2">
                <div class="rounded-lg bg-gray-200 dark:bg-white p-2 w-full">
                    <div class="flex items-center justify-between text-xs text-gray-400 dark:text-black">
                        <p class="flex flex-col item-center justify-center">
                            <p class="text-black text-xs dark:text-indigo-500 font-bold">
                                You logged in {{ $user->last_login->diffForHumans()}}
                            </p>
                        </p>
                    </div>
                </div>
            </div>
            <div class="flex items-center text-gray-600 dark:text-gray-200 justify-between py-2">
                <div class="rounded-lg bg-gray-200 dark:bg-white p-2 w-full">
                    <div class="flex items-center justify-between text-xs text-gray-400 dark:text-black">
                        <p class="flex flex-col item-center justify-center">
                            <p class="text-black text-xs dark:text-indigo-500 font-bold">
                                Last active login IP Address {{ $user->last_login_ip}}
                            </p>
                        </p>
                    </div>
                </div>
            </div>
            <div class="flex items-center justify-end text-sm">
                <span class="font-bold text-md p-2 items-end text-xs text-black dark:text-gray-300 dark:text-white ml-1">
                    <a href="{{ route('profile.show') }}"  class="inline-flex font-bold bg-teal-400 hover:bg-teal-600 text-white hover:text-white text-sm font-semibold py-1 px-2 rounded shadow">My Profile</a>
                </span>
            </div>
    </div>
</div>
