<x-app-layout>
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js"></script>
	<x-slot name="header">
		<h2 class="font-semibold text-xl text-gray-800 leading-tight">
            User Details
        </h2>
    </x-slot>
	<div class="">
		<div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
                <div class="mx-10 bg-gray-100">
                    <div class="block mb-8"> <a href="{{ route('users.index') }}" class="bg-gray-400 hover:bg-gray-500 text-white font-bold text-xs py-2 px-4 rounded">Accounts List</a> </div>
                    <div class="grid gap-6 mb-6 md:grid-cols-2">
                        <div class="min-w-0 bg-gray-100 rounded-lg">
                            <div class="container mx-auto flex flex-col space-y-4 items-center">
                                <div class="bg-white w-full flex items-center p-2 rounded-xl shadow border">
                                    <div class="flex items-center space-x-4 p-3"> <img src="{{ $user->profile_photo_url }}" alt="{{ $user->name }}"" class="w-16 h-16 rounded-full" /> </div>
                                    <div class="flex-grow p-3">
                                        <div class="font-semibold text-sm text-gray-600"> {{ $user->name }} </div>
                                        <div class="text-sm text-gray-500"> {{ $user->job_title }} </div>
                                        <div class="text-xs text-gray-500"> {{ $user->department }} </div>
                                    </div>
                                </div>
                                <div class="bg-white w-full flex items-center p-2 rounded-xl shadow border">
                                    <div class="relative flex items-center space-x-4"> </div>
                                    <div class="flex-grow p-3 ">
                                        <div class="font-semibold text-sm text-gray-700 items-center"> Organisation </div>
                                        <div class="text-sm text-gray-500"> {{ $user->organisation }} </div>
                                        <br>
                                        <div class="font-semibold text-sm text-gray-600 items-center"> Email Address</div>
                                        <div class="text-sm text-gray-500"> {{ $user->email }} </div>
                                        <br>
                                        <div class="font-semibold text-sm text-gray-600 items-center"> Account Reference </div>
                                        <div class="text-sm text-gray-500"> {{ $user->id }} </div>
                                        <br>
                                        <div class="font-semibold text-sm text-gray-600 items-center"> System Profile </div>
                                        <div class="text-sm text-gray-500">
                                            @foreach ($user->roles as $role)
                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                                    {{ $role->title }}
                                            </span>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--card 2 -->
                        <div class="min-w-0 bg-grey-100 max-h-12 rounded-lg"  id="activity_data">
                            <div class="container mx-auto  flex flex-col space-y-4 items-center">
                                <div class="bg-white w-full flex items-center p-2 rounded-xl shadow border">
                                    <div class="flex-grow p-3">
                                        <div class="font-semibold text-sm text-gray-700"> Profile Activity </div>
                                        <div class="text-xs text-gray-500"> Click the activity to expand for more information </div>
                                    </div>
                                </div>
                            </div>

                            <!--Activity cards -->

                            <div class="bg-grey-100 max-w-xl mx-auto border border-gray-100 pt-3">
                                <ul class="shadow-box max-w-xl">
                                    @foreach ($useractivities as $useractivity)
                                    <li class="relative border-b border-gray-100" x-data="{selected:null}">
                                        <button type="button" class="w-full px-2 py-2 text-left" @click="selected !== {{ $useractivity->id }} ? selected = {{ $useractivity->id }} : selected = null">
                                            <div class="group bg-purple-800 w-full flex items-center p-2 rounded-xl shadow border hover:bg-white hover:shadow-lg hover:border-transparent">
                                                <div class="relative flex items-center space-x-4">
                                                    <div class="flex items-center px-4 space-x-4"> <x-heroicon-s-bell class="h-6 w-6 text-white group-hover:text-purple-800" /> </div>
                                                </div>
                                                <div class="flex-grow p-3 ">

                                                    <div class="text-sm text-white group-hover:text-gray-900"> {{ $useractivity->causer->name }} has {{ $useractivity->description }} this account</div>
                                                    <div class="text-xs text-white group-hover:text-gray-900"> Action taken on {{ $useractivity->created_at }} </div>
                                                </div>
                                            </div>
                                        </button>
                                        <div class="relative overflow-hidden transition-all max-h-0 duration-500" style="" x-ref="container1" x-bind:style="selected == {{ $useractivity->id }} ? 'max-height: ' + $refs.container1.scrollHeight + 'px' : ''">
                                            <div class="flex flex-col w-full px-2 py-2">
                                                <div class="p-1">
                                                    <div class="bg-orange-800 w-full flex items-center p-2 rounded-xl shadow border">
                                                        <div class="relative flex items-center space-x-4">
                                                            <div class="flex items-center px-4 space-x-4"><x-heroicon-s-trash class="h-5 w-5 text-white" /> </div>
                                                        </div>
                                                        <div class="flex-grow p-3">
                                                            <div class="font-semibold text-sm text-white items-center"> Overwriten Data</div>
                                                            <div class="text-xs text-white">{{ $useractivity['properties']['old']['name'] ?? ""}}</div>
                                                            <div class="text-xs text-white">{{ $useractivity['properties']['old']['job_title'] ?? ""}}</div>
                                                            <div class="text-xs text-white">{{ $useractivity['properties']['old']['department'] ?? ""}}</div>
                                                            <div class="text-xs text-white">{{ $useractivity['properties']['old']['organisation'] ?? ""}}</div>
                                                            <div class="text-xs text-white">{{ $useractivity['properties']['old']['email'] ?? ""}}</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="p-1">
                                                    <div class="bg-green-800 w-full flex items-center p-2 rounded-xl shadow border">
                                                        <div class="relative flex items-center space-x-4">
                                                            <div class="flex items-center px-4 space-x-4"> <x-heroicon-s-save class="h-6 w-6 text-white" /> </div>
                                                        </div>
                                                        <div class="flex-grow p-3 ">
                                                            <div class="font-semibold text-sm text-white items-center">Current Data</div>
                                                            <div class="text-xs text-white">{{ $useractivity['properties']['attributes']['name'] ?? ""}}</div>
                                                            <div class="text-xs text-white">{{ $useractivity['properties']['attributes']['job_title'] ?? ""}}</div>
                                                            <div class="text-xs text-white">{{ $useractivity['properties']['attributes']['department'] ?? ""}}</div>
                                                            <div class="text-xs text-white">{{ $useractivity['properties']['attributes']['organisation'] ?? ""}}</div>
                                                            <div class="text-xs text-white">{{ $useractivity['properties']['attributes']['email'] ?? ""}}</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                            <br>
                            {!! $useractivities->links() !!}
                            <br>
                        </div>
                    </div>
                </div>
            </div>
		</div>
    </div>
</x-app-layout>
