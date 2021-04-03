<div>
    <div class="container w-full items-center">
        <div class="shadow-lg rounded-2xl mb-2 w-full p-2 bg-gradient-to-b from-white to-gray-100 dark:bg-gray-800">
            <p class="font-bold text-md p-2 border-b mb-3 border-gray-200 text-black dark:text-white">
                My Notifications
            </p>
            <span class="font-bold text-md mt-2 underline p-2 text-xs text-teal-500 dark:text-gray-300 dark:text-white">
                @if($countNotifications > 0)
                {{ $countNotifications }} recent Notifications
                @else
                0 unread Notifications
                @endif
            </span>
            @if($countNotifications > 0)
            <button class="float-right text-xs outline-none focus:outline-none" wire:click="read"><x-heroicon-o-mail-open class="mr-3 w-5 h-5 text-red-500"/></button>
            @else
            @endif
            <ul>
                @forelse($notifications as $notification)
                <li class="flex items-center text-gray-600 dark:text-gray-200 justify-between py-3 dark:border-gray-800">
                    <div class="flex items-center justify-start text-sm">
                        <span class="font-bold text-md p-4 text-xs text-grey-500 dark:text-gray-300 dark:text-white ml-2">
                            <x-heroicon-o-mail class="w-5 h-5 text-teal-500"/>
                        </span>
                        @foreach($notification->data['notify'] as $messages)
                        <span class="font-bold text-md p-2 text-xs text-black dark:text-gray-300 dark:text-white ml-1">
                            {{ $messages }}
                        </span>
                        @endforeach
                    </div>
                    <span class="font-bold text-md p-2 mr-4 text-xs text-teal-500 dark:text-gray-300 dark:text-white ml-1">
                        {{ $notification->created_at->diffForHumans() }}
                        @foreach($notification->data['url'] as $link)
                        <span class="font-bold text-md p-2 text-xs text-black dark:text-gray-300 dark:text-white ml-1">
                            <a href="{{ $link }}"  class="inline-flex font-bold bg-white text-gray-800 hover:bg-teal-600 text-white hover:text-white text-xs font-semibold py-1 px-2 rounded shadow">View</a>
                        </span>
                        @endforeach
                    </span>
                </li>
                @empty
                <li class="flex items-center text-gray-600 dark:text-gray-200 justify-between py-3 dark:border-gray-800">
                    <div class="flex items-center justify-start text-sm">
                        <span class="font-bold text-md p-4 text-xs text-grey-500 dark:text-gray-300 dark:text-white ml-2">
                            <x-heroicon-o-thumb-up class="w-5 h-5 text-teal-500"/>
                        </span>
                        <span class="font-bold text-md p-2 items-center text-xs text-black dark:text-gray-300 dark:text-white ml-1">
                            You have no unread notifications at the time
                        </span>
                    </div>
                </li>
                @endforelse
            </ul>
        </div>
        {{ $notifications->links() }}
    </div>
</div>



