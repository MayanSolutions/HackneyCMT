<div>
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Acitivty Detail
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Description
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Original Data
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    New Data
                                </th>
                            </tr>
                            </thead>
                            @foreach ($activityLog as $userLog)
                            <tbody class="bg-white divide-y divide-gray-200">
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="">
                                            <div class="text-sm font-medium text-gray-900">
                                                Change Reference {{ $userLog->id }}
                                            </div>
                                            <div class="text-xs text-gray-500">
                                                Executed on {{ $userLog->created_at }}
                                            </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="">
                                            <div class="text-sm font-medium text-gray-900">
                                                {{ $userLog->causer->name }} {{ $userLog->description }} a record
                                            </div>
                                            <div class="text-xs text-gray-500">
                                                <strong>{{ $userLog->log_name }}</strong>
                                            </div>
                                            <div class="text-xs text-gray-500">
                                                <strong>Unique Identifier {{ $userLog->subject_id }}</strong>
                                            </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-xs text-gray-500 ">{{ $userLog['properties']['old']['name'] ?? ""}}</div>
                                            <div class="text-xs text-gray-500 ">{{ $userLog['properties']['old']['job_title'] ?? ""}}</div>
                                            <div class="text-xs text-gray-500 ">{{ $userLog['properties']['old']['department'] ?? ""}}</div>
                                            <div class="text-xs text-gray-500 ">{{ $userLog['properties']['old']['organisation'] ?? ""}}</div>
                                            <div class="text-xs text-gray-500 ">{{ $userLog['properties']['old']['email'] ?? ""}}</div>
                                            <div class="text-xs text-gray-500 ">{{ $userLog['properties']['old']['client_organisation'] ?? ""}}</div>
                                            <div class="text-xs text-gray-500 ">{{ $userLog['properties']['old']['client_address'] ?? ""}}</div>
                                            <div class="text-xs text-gray-500 ">{{ $userLog['properties']['old']['client_pfn_email'] ?? ""}}</div>
                                            <div class="text-xs text-gray-500 ">{{ $userLog['properties']['old']['client_pfn'] ?? ""}}</div>
                                            <div class="text-xs text-gray-500 ">{{ $userLog['properties']['old']['client_manager'] ?? ""}}</div>
                                            <div class="text-xs text-gray-500 ">{{ $userLog['properties']['old']['client_manager_contact'] ?? ""}}</div>
                                            <div class="text-xs text-gray-500 ">{{ $userLog['properties']['old']['client_manager_email'] ?? ""}}</div>
                                            <div class="text-xs text-gray-500 ">{{ $userLog['properties']['old']['client_deputy'] ?? ""}}</div>
                                            <div class="text-xs text-gray-500 ">{{ $userLog['properties']['old']['client_chair'] ?? ""}}</div>
                                            <div class="text-xs text-gray-500 ">{{ $userLog['properties']['old']['client_chair_contact'] ?? ""}}</div>
                                            <div class="text-xs text-gray-500 ">{{ $userLog['properties']['old']['client_chair_email'] ?? ""}}</div>
                                            <div class="text-xs text-gray-500 ">{{ $userLog['properties']['old']['client_secretary'] ?? ""}}</div>
                                            <div class="text-xs text-gray-500 ">{{ $userLog['properties']['old']['user_id'] ?? ""}}</div>
                                            <div class="text-xs text-gray-500 ">{{ $userLog['properties']['old']['client_id'] ?? ""}}</div>
                                            <div class="text-xs text-gray-500 ">{{ $userLog['properties']['old']['no_of_units'] ?? ""}}</div>
                                            <div class="text-xs text-gray-500 ">{{ $userLog['properties']['old']['leaseholders'] ?? ""}}</div>
                                            <div class="text-xs text-gray-500 ">{{ $userLog['properties']['old']['freeholders'] ?? ""}}</div>
                                            <div class="text-xs text-gray-500 ">{{ $userLog['properties']['old']['tenants'] ?? ""}}</div>
                                            <div class="text-xs text-gray-500 ">{{ $userLog['properties']['old']['comm_halls'] ?? ""}}</div>
                                            <div class="text-xs text-gray-500 ">{{ $userLog['properties']['old']['outside_areas'] ?? ""}}</div>
                                            <div class="text-xs text-gray-500 ">{{ $userLog['properties']['old']['communal_facilities'] ?? ""}}</div>
                                            <div class="text-xs text-gray-500 ">{{ $userLog['properties']['old']['function'] ?? ""}}</div>
                                            <div class="text-xs text-gray-500 ">{{ $userLog['properties']['old']['title'] ?? ""}}</div>
                                            <div class="text-xs text-gray-500 ">{{ $userLog['properties']['old']['purpose'] ?? ""}}</div>

                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-xs text-gray-500 ">{{ $userLog['properties']['attributes']['name'] ?? ""}}</div>
                                            <div class="text-xs text-gray-500 ">{{ $userLog['properties']['attributes']['job_title'] ?? ""}}</div>
                                            <div class="text-xs text-gray-500 ">{{ $userLog['properties']['attributes']['department'] ?? ""}}</div>
                                            <div class="text-xs text-gray-500 ">{{ $userLog['properties']['attributes']['organisation'] ?? ""}}</div>
                                            <div class="text-xs text-gray-500 ">{{ $userLog['properties']['attributes']['email'] ?? ""}}</div>
                                            <div class="text-xs text-gray-500 ">{{ $userLog['properties']['attributes']['client_organisation'] ?? ""}}</div>
                                            <div class="text-xs text-gray-500 ">{{ $userLog['properties']['attributes']['client_address'] ?? ""}}</div>
                                            <div class="text-xs text-gray-500 ">{{ $userLog['properties']['attributes']['client_pfn_email'] ?? ""}}</div>
                                            <div class="text-xs text-gray-500 ">{{ $userLog['properties']['attributes']['client_pfn'] ?? ""}}</div>
                                            <div class="text-xs text-gray-500 ">{{ $userLog['properties']['attributes']['client_manager'] ?? ""}}</div>
                                            <div class="text-xs text-gray-500 ">{{ $userLog['properties']['attributes']['client_manager_contact'] ?? ""}}</div>
                                            <div class="text-xs text-gray-500 ">{{ $userLog['properties']['attributes']['client_manager_email'] ?? ""}}</div>
                                            <div class="text-xs text-gray-500 ">{{ $userLog['properties']['attributes']['client_deputy'] ?? ""}}</div>
                                            <div class="text-xs text-gray-500 ">{{ $userLog['properties']['attributes']['client_chair'] ?? ""}}</div>
                                            <div class="text-xs text-gray-500 ">{{ $userLog['properties']['attributes']['client_chair_contact'] ?? ""}}</div>
                                            <div class="text-xs text-gray-500 ">{{ $userLog['properties']['attributes']['client_chair_email'] ?? ""}}</div>
                                            <div class="text-xs text-gray-500 ">{{ $userLog['properties']['attributes']['client_secretary'] ?? ""}}</div>
                                            <div class="text-xs text-gray-500 ">{{ $userLog['properties']['attributes']['user_id'] ?? ""}}</div>
                                            <div class="text-xs text-gray-500 ">{{ $userLog['properties']['attributes']['client_id'] ?? ""}}</div>
                                            <div class="text-xs text-gray-500 ">{{ $userLog['properties']['attributes']['no_of_units'] ?? ""}}</div>
                                            <div class="text-xs text-gray-500 ">{{ $userLog['properties']['attributes']['leaseholders'] ?? ""}}</div>
                                            <div class="text-xs text-gray-500 ">{{ $userLog['properties']['attributes']['freeholders'] ?? ""}}</div>
                                            <div class="text-xs text-gray-500 ">{{ $userLog['properties']['attributes']['tenants'] ?? ""}}</div>
                                            <div class="text-xs text-gray-500 ">{{ $userLog['properties']['attributes']['comm_halls'] ?? ""}}</div>
                                            <div class="text-xs text-gray-500 ">{{ $userLog['properties']['attributes']['outside_areas'] ?? ""}}</div>
                                            <div class="text-xs text-gray-500 ">{{ $userLog['properties']['attributes']['communal_facilities'] ?? ""}}</div>
                                            <div class="text-xs text-gray-500 ">{{ $userLog['properties']['attributes']['category'] ?? ""}}</div>
                                            <div class="text-xs text-gray-500 ">{{ $userLog['properties']['attributes']['description'] ?? ""}}</div>
                                            <div class="text-xs text-gray-500 ">{{ $userLog['properties']['attributes']['function'] ?? ""}}</div>
                                            <div class="text-xs text-gray-500 ">{{ $userLog['properties']['attributes']['title'] ?? ""}}</div>
                                            <div class="text-xs text-gray-500 ">{{ $userLog['properties']['attributes']['purpose'] ?? ""}}</div>
                                    </td>
                                </tr>
                            </tbody>
                            @endforeach
                        </table>
                        <br>
                    {{ $activityLog->links() }}

</div>
