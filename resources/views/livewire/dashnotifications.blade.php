<div>
    <div class="container w-full items-center">

        <div class="mb-4 mr-4 shadow-lg rounded-2xl bg-white dark:bg-gray-700 items-center">
            <p class="font-bold text-md p-4 text-black dark:text-white">
                My Notifications
            </p>
            <span class="ml-3 font-bold text-md underline p-4 text-xs text-teal-500 dark:text-gray-300 dark:text-white">
                @if($countNotifications > 0)
                {{ $countNotifications }} recent Notifications
                @else
                0 unread Notifications
                @endif
            </span>
            <button class="float-right text-xs outline-none focus:outline-none" wire:click="read"><x-heroicon-o-x-circle class="mr-3 w-5 h-5 text-red-500"/></button>
            <ul>
                @forelse($notifications as $notification)
                <li class="flex items-center text-gray-600 dark:text-gray-200 justify-between py-3 border-b-2 border-gray-100 dark:border-gray-800">
                    <div class="flex items-center justify-start text-sm">
                        <span class="font-bold text-md p-4 text-xs text-grey-500 dark:text-gray-300 dark:text-white ml-2">
                            <x-heroicon-o-mail class="w-4 h-4 text-teal-500"/>
                        </span>
                        @foreach($notification->data['notify'] as $messages)
                        <span class="font-bold text-md p-2 text-sm text-black dark:text-gray-300 dark:text-white ml-1">
                            {{ $messages }}
                        </span>
                        @endforeach
                    </div>
                    <span class="font-bold text-md p-2 mr-4 text-xs text-teal-500 dark:text-gray-300 dark:text-white ml-1">
                        {{ $notification->created_at->diffForHumans() }}
                    </span>
                </li>
                @empty
                <li class="flex items-center text-gray-600 dark:text-gray-200 justify-between py-3 border-b-2 border-gray-100 dark:border-gray-800">
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

