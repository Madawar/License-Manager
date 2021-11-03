<div class="bg-white  border rounded-5 divide-y divide-gray-300 ">
    <div
        class="flex flex-col md:flex-row p-2 md:space-x-1 md:space-y-0 space-y-1 w-full {{ $license->next_renewal < Carbon\Carbon::today() ? 'bg-red-200' : 'bg-green-200' }}">
        <div class=" flex-auto text-center leading-loose block font-sans  font-semibold text-gray-900 ">
            {{ Str::upper($license->license_certification) }}
            ({{ $license->next_renewal < Carbon\Carbon::today() ? 'Expired' : 'Valid' }})
        </div>

    </div>
    <div class="flex flex-col md:flex-row p-2 md:space-x-1 md:space-y-0 space-y-1 w-full ">
        <div class="md:w-1/3 flex-auto ">
            <div class="leading-loose block font-sans  font-semibold text-gray-900">License Type :</div>
            <div>{{ Str::upper($license->license_type) }}</div>
        </div>
        <div class="md:w-1/3 flex-auto ">
            <div class="leading-loose block font-sans  font-semibold text-gray-900">License Name :</div>
            <div>{{ Str::upper($license->license_certification) }}</div>
        </div>
        <div class="md:w-1/3 flex-auto ">
            <div class="leading-loose block font-sans  font-semibold text-gray-900">Department Under :</div>
            <div>
                @isset($license->department)
                    {{ Str::upper($license->department->name) }}
                @endisset

            </div>
        </div>

    </div>
    <div class="flex flex-col md:flex-row p-2 md:space-x-1 md:space-y-0 space-y-1 w-full">
        <div class="md:w-1/3 flex-auto">
            <div class="leading-loose block font-sans  font-semibold text-gray-900">Last Acquired :</div>
            <div>{{ Str::upper(Carbon\Carbon::parse($license->last_acquired)->format('j-M-y')) }}</div>
        </div>
        <div class="md:w-1/3 flex-auto ">
            <div class="leading-loose block font-sans  font-semibold text-gray-900">Next Renewal :</div>
            <div>
                {{ Str::upper(Carbon\Carbon::parse($license->next_renewal)->format('j-M-y')) }}
                - Every {{ Str::upper($license->renewal) }} {{ Str::upper($license->license_period) }}
            </div>
        </div>
        <div class="md:w-1/3 flex-auto">
            <div class="leading-loose block font-sans  font-semibold text-gray-900">Next Reminder :</div>
            <div>
                {{ Str::upper(Carbon\Carbon::parse($license->next_reminder)->format('j-M-y')) }}
                - {{ Str::upper($license->reminder) }} {{ Str::upper($license->license_reminder_period) }}
                before
                Renewal Date
            </div>
        </div>
    </div>
    <div class="flex flex-col md:flex-row p-2 md:space-x-1 md:space-y-0 space-y-1 w-full">
        <div class="flex-auto ">
            <div class="leading-loose block font-sans  font-semibold text-gray-900">Notes :</div>
            <div class="leading-loose">{{ $license->notes }}</div>
        </div>
    </div>
    <div class="flex flex-col md:flex-row p-2 md:space-x-1 md:space-y-0 space-y-1 w-full">
        <div class="md:w-1/3 flex-auto">
            <div class="leading-loose block font-sans  font-semibold text-gray-900">Brand :</div>
            <div>{{ Str::upper($license->brandName ?? '-') }}</div>
        </div>
        <div class="md:w-1/3 flex-auto ">
            <div class="leading-loose block font-sans  font-semibold text-gray-900">Model :</div>
            <div>{{ Str::upper($license->modelName ?? '-') }}</div>
        </div>
        <div class="md:w-1/3 flex-auto">
            <div class="leading-loose block font-sans  font-semibold text-gray-900">Next Reminder :</div>
            <div>{{ Str::upper($license->assetTag ?? '-') }}</div>
        </div>
    </div>
    <div class="flex flex-col md:flex-row p-2 md:space-x-1 md:space-y-0 space-y-1 w-full">
        <div class="md:w-1/3 flex-auto">
            <div class="leading-loose block font-sans  font-semibold text-gray-900">Notification Emails :</div>
            <div>{{ $license->notify }}</div>
        </div>

    </div>
    <div class="flex flex-col md:flex-row p-2 md:space-x-1 md:space-y-0 space-y-1 w-full">
        <div class="md:w-full flex-auto">
            <div class="leading-loose block font-sans  font-semibold text-gray-900">Email Log :</div>
            <div>
                @isset($license->log)


                    <table class="min-w-full">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col"
                                    class="text-xs font-medium text-gray-700 px-6 py-3 text-left uppercase tracking-wider">
                                    Near Expiry Email Sent
                                </th>
                                <th scope="col"
                                    class="text-xs font-medium text-gray-700 px-6 py-3 text-left uppercase tracking-wider">
                                    Expired Email Sent
                                </th>
                                <th scope="col"
                                    class="text-xs font-medium text-gray-700 px-6 py-3 text-left uppercase tracking-wider">
                                    Reminder Email Sent
                                </th>

                            </tr>
                        </thead>
                        <tbody>
                            <!-- Product 1 -->

                            <tr class=" border-b ">
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                    @isset($license->log->near_expiry_date)
                                        Yes on
                                        {{ Carbon\Carbon::parse($license->log->near_expiry_date)->format('j-M-y') }}
                                    @else
                                        No
                                    @endisset

                                </td>
                                <td class="text-sm text-gray-500 px-6 py-4 whitespace-nowrap">
                                    @isset($license->log->expired_date)
                                        Yes on
                                        {{ Carbon\Carbon::parse($license->log->expired_date)->format('j-M-y') }}
                                    @else
                                        No
                                    @endisset
                                </td>
                                <td class="text-sm text-gray-500 px-6 py-4 whitespace-nowrap">
                                    @isset($license->log->reminder_date)
                                        Yes on
                                        {{ Carbon\Carbon::parse($license->log->reminder_date)->format('j-M-y') }}
                                    @else
                                        No
                                    @endisset
                                </td>


                            </tr>



                        </tbody>
                    </table>
                @endisset
            </div>
        </div>

    </div>
    <div class="flex flex-col md:flex-row p-2 md:space-x-1 md:space-y-0 space-y-1 w-full">
        <div class="md:w-full flex-auto">
            <div class="leading-loose block font-sans  font-semibold text-gray-900">Email Log :</div>
            <div>
                @isset($license->logs)


                    <table class="min-w-full">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col"
                                    class="text-xs font-medium text-gray-700 px-6 py-3 text-left uppercase tracking-wider">
                                    Last renewed On
                                </th>


                            </tr>
                        </thead>
                        <tbody>
                            <!-- Product 1 -->
                            @foreach ($license->logs as $log)
                                <tr class=" border-b ">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">

                                        {{ Carbon\Carbon::parse($log->renewal_date)->format('j-M-y') }}


                                    </td>



                                </tr>
                            @endforeach




                        </tbody>
                    </table>
                @endisset
            </div>
        </div>

    </div>
    <div class="flex flex-col md:flex-row p-2 md:space-x-1 md:space-y-0 space-y-1 w-full">
        <div class=" flex-auto">
            <div class="form-control">
                <label class="label">
                    <span class="label-text">Set as Renewed</span>
                </label>
                <div class="relative">
                    <input type="text" wire:model='license.last_acquired' placeholder="Search"
                        class="w-full pr-16 input input-primary input-bordered date">
                    <button wire:click='renewCertificate' wire:loading.class='loading' wire:target='renewCertificate'
                        class="absolute top-0 right-0 rounded-l-none btn btn-primary">Mark as Renewed</button>
                </div>
            </div>
        </div>


    </div>

</div>
