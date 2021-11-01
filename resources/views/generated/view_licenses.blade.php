<div>
    <div class="bg-gray-50 border-gray-300 shadow-sm mb-1 border overflow-x-auto">
        <div class="flex flex-col md:flex-row p-2 md:space-x-1 md:space-y-0 space-y-1 w-full">
            <div class="flex-auto">
                <x-forms.select :options="[5=>5,10=>10,20=>20,30=>30]" label="" placeholder="How Many Results Per Page"
                    wire:model="pagination" name="Pagination" />
            </div>
            <div class="flex-auto">
                <x-forms.input label="" placeholder="Search Anything" wire:model="search" name="search" />
            </div>
            <div class="flex-auto">
                <x-forms.select :options="$options" label="" placeholder="Filter" wire:model="filter" name="search" />
            </div>
            <div class="flex-auto">
                <button class=" btn btn-square btn-block md:btn-circle" wire:click='download'>
                    <svg xmlns="http://www.w3.org/2000/svg" class="inline-block w-6 h-6 stroke-current" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                    </svg>
                </button>
            </div>
        </div>
    </div>
    <div class="overflow-x-auto">
        <table class="table w-full table-compact table-zebra" wire:loading.class="cursor-wait">
            <thead>
                <tr>
                    <th></th>
                          <th>Department Id</th>
      <th>Password</th>
      <th>Supplier</th>
      <th>Certificates</th>
      <th>Notify</th>
      <th>License Key</th>
      <th>Notes</th>
      <th>Expiry</th>
      <th>First Acquired</th>
      <th>License Type</th>
      <th>License Certification</th>

                </tr>
            </thead>
            <tbody>
                @foreach($licenses as $license)
                    <tr>
                        <th>{{ $loop->index + 1 }}</th>
                               <td>{{ $license->department_id }}</td>
       <td>{{ $license->password }}</td>
       <td>{{ $license->supplier }}</td>
       <td>{{ $license->certificates }}</td>
       <td>{{ $license->notify }}</td>
       <td>{{ $license->license_key }}</td>
       <td>{{ $license->notes }}</td>
       <td>{{ $license->expiry }}</td>
       <td>{{ $license->first_acquired }}</td>
       <td>{{ $license->license_type }}</td>
       <td>{{ $license->license_certification }}</td>

                        <td>
                            <!--if($license->payments()->exists())-->
                            <button class="btn btn-primary btn-square btn-xs"
                                v-on:click="openModal({{ $license->id }})">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </button>
                            <a href="{{ route('license.edit', ['license' => $license->id]) }}"
                                class="btn  btn-square btn-xs btn-error">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                </svg>
                            </a>
                        </td>
                    </tr>
                @endforeach

            </tbody>
            <tfoot>
                <tr>
                    <th></th>
                          <th>Department Id</th>
      <th>Password</th>
      <th>Supplier</th>
      <th>Certificates</th>
      <th>Notify</th>
      <th>License Key</th>
      <th>Notes</th>
      <th>Expiry</th>
      <th>First Acquired</th>
      <th>License Type</th>
      <th>License Certification</th>

                </tr>
            </tfoot>
        </table>
    </div>

    <div class="pt-4">
        {{ $licenses->appends(request()->query())->links() }}
    </div>
</div>
