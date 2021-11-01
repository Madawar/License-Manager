<div>
    {{-- If you look to others for fulfillment, you will never truly be fulfilled. --}}
    <div class="w-auto m-8 text-gray-800 bg-white divide-y divide-gray-300 rounded-lg shadow-md sm:m-4">
        <div class="flex items-start px-6 py-5">
            <h2 class="mr-auto">
                <span class="block font-sans text-2xl font-semibold text-gray-900 ">Departments</span>
                <span class="block font-light text-gray-800">Enter Department Details<span>
            </h2>
        </div>

        <div class="flex flex-col md:flex-row p-2 md:space-x-1 md:space-y-0 space-y-1 w-full">
            <div class="flex-auto">
                <x-forms.input label="Department Name" placeholder="Department Name" name="department.name"
                    wire:model="department.name" />
            </div>
            <div class="flex-auto">
                <x-forms.input label="Department Email" placeholder="Department Email" name="department.email"
                    wire:model="department.email" />
            </div>
        </div>

        <div class="flex flex-col md:flex-row p-2 md:space-x-1 md:space-y-0 space-y-1 w-full">
            <div class="flex-auto">
                <button class="btn btn-block" wire:click='saveDepartment'>Save Department</button>
            </div>
        </div>

    </div>
</div>
