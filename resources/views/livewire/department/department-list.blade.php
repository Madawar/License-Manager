<div>
    {{-- The Master doesn't talk, he acts. --}}
    <?php use Illuminate\Support\Str; ?>
    <div class="flex flex-col">
        <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                <div class="overflow-hidden sm:rounded-lg shadow-md">
                    <div class="bg-gray-50 border-gray-300 shadow-sm mb-1 border overflow-x-auto">
                        <div class="flex flex-col md:flex-row p-2 md:space-x-1 md:space-y-0 space-y-1 w-full">

                            <div class="flex-auto">
                                <x-forms.select :options="[5=>5,10=>10,20=>20,30=>30]" label=""
                                    placeholder="How Many Results Per Page" wire:model="pagination" name="Pagination" />
                            </div>
                            <div class="flex-auto">
                                <x-forms.input label="" placeholder="Search Anything" wire:model="search"
                                    name="search" />
                            </div>
                            <div class="flex-auto">
                                <x-forms.select :options="$options" label="" placeholder="Filter" wire:model="filter"
                                    name="search" />
                            </div>

                            <div class="flex-auto">


                                <button class=" btn btn-square btn-block md:btn-circle" wire:click='download'>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="inline-block w-6 h-6 stroke-current"
                                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                                    </svg>

                                </button>

                            </div>
                        </div>


                    </div>
                    <table class="min-w-full">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col"
                                    class="text-xs font-medium text-gray-700 px-6 py-3 text-left uppercase tracking-wider">
                                    Department Name
                                </th>
                                <th scope="col"
                                    class="text-xs font-medium text-gray-700 px-6 py-3 text-left uppercase tracking-wider">
                                    Department Email
                                </th>
                                <th scope="col"
                                    class="text-xs font-medium text-gray-700 px-6 py-3 text-left uppercase tracking-wider">
                                    Number of Items
                                </th>
                                <th scope="col" class="relative px-6 py-3">
                                    <span class="sr-only">Edit</span>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Product 1 -->
                            @foreach ($departments as $department)
                                <tr class=" border-b bg-white">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                        {{ $department->name }}
                                    </td>
                                    <td class="text-sm text-gray-500 px-6 py-4 whitespace-nowrap">
                                        {{ $department->email }}
                                    </td>
                                    <td class="text-sm text-gray-500 px-6 py-4 whitespace-nowrap">
                                        @isset($department->licenses)
                                            {{ count($department->licenses) }}
                                        @endisset
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        <a href="#"
                                            class="btn btn-outline btn-sm text-blue-600 hover:text-blue-900">Update
                                            Status</a>
                                    </td>
                                </tr>
                            @endforeach


                        </tbody>
                    </table>
                    <div class="p-2">
                        {{ $departments->appends(request()->query())->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
