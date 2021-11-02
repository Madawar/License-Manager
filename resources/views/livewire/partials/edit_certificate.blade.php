<div class="w-auto m-8 text-gray-800 bg-white divide-y divide-gray-300 rounded-lg shadow-md sm:m-4">
    <div class="flex items-start px-6 py-5">
        <h2 class="mr-auto">
            <span class="block font-sans text-2xl font-semibold text-gray-900 ">License, Certification or Warranty
                Details</span>
            <span class="block font-light text-gray-800">Please Enter the type of document you want to record<span>
        </h2>
    </div>
    <div class="flex flex-col md:flex-row p-2 md:space-x-1 md:space-y-0 space-y-1 w-full">
        <div class="flex-auto">
            <x-forms.select label="License Type" placeholder="License Type" name="license.license_type"
                :options="$licenses" wire:model="license.license_type" wire:change="$emit('datep')" />
        </div>
        <div class="flex-auto">
            <x-forms.select label="Department" placeholder="Department" name="license.department_id"
                :options="$departments" wire:model="license.department_id" />
        </div>
    </div>
</div>
@if ($license->license_type != '')


    <div class="w-auto m-8 text-gray-800 bg-white p-5 rounded-lg shadow-md sm:m-4">

        <div class="flex flex-col md:flex-row p-2 md:space-x-1 md:space-y-0 space-y-1 w-full">
            <div class="flex-auto">
                <x-forms.input label="{{ Str::upper($license->license_type) }} Name"
                    placeholder="{{ Str::ucfirst($license->license_type) }} Name" name="license.license_certification"
                    wire:model="license.license_certification" />
            </div>

        </div>
        <div class="flex flex-col md:flex-row p-2 md:space-x-1 md:space-y-0 space-y-1 w-full">
            <div class="flex-auto">
                <x-forms.date label="Last Acquired Date" placeholder="Last Acquired Date" class="date"
                    name="license.last_acquired" wire:model="license.last_acquired" :options=[] />
            </div>
            <div class="flex-none">
                <x-forms.input label="{{ Str::upper($license->license_type) }} Renewal Period"
                    placeholder="{{ Str::ucfirst($license->license_type) }} Renewal Period" name="license.renewal"
                    wire:model="license.renewal" />
            </div>
            <div class="flex-none">
                <x-forms.select label="{{ Str::upper($license->license_type) }} Renewal Measure" placeholder="Period"
                    name="license.license_period" :options="array('years'=>'years','months'=>'months')"
                    wire:model="license.license_period" />
            </div>
        </div>
        <div class="flex flex-col md:flex-row p-2 md:space-x-1 md:space-y-0 space-y-1 w-full">
            <div class="flex-auto">

                <x-forms.input label="License Key" placeholder="License Key" name="license.license_key"
                    wire:model="license.license_key" />
            </div>
        </div>
        <div class="flex flex-col md:flex-row p-2 md:space-x-1 md:space-y-0 space-y-1 w-full">
            <div class="flex-auto">

                <x-forms.input label="Item Brand Name" placeholder="Brand Name" name="license.brandName"
                    wire:model="license.brandName" />
            </div>
            <div class="flex-auto">

                <x-forms.input label="Item Model" placeholder="Model Name" name="license.modelName"
                    wire:model="license.modelName" />
            </div>
        </div>
        <div class="flex flex-col md:flex-row p-2 md:space-x-1 md:space-y-0 space-y-1 w-full">
            <div class="flex-auto">

                <x-forms.input label="Asset Tag" placeholder="Asset Tag" name="license.assetTag"
                    wire:model="license.assetTag" />
            </div>
            <div class="flex-auto">

                <x-forms.input label="Asset Serial" placeholder="Asset Serial" name="license.asset_serial"
                    wire:model="license.asset_serial" />
            </div>
        </div>
        <div class="flex flex-col md:flex-row p-2 md:space-x-1 md:space-y-0 space-y-1 w-full">
            <div class="flex-auto">
                <x-forms.textarea label="Notes" placeholder="Notes" name="license.notes" wire:model='license.notes' />
            </div>
        </div>
    </div>

    <div class="w-auto m-8 text-gray-800 bg-white p-5 rounded-lg shadow-md sm:m-4">
        <div class="flex flex-col md:flex-row p-2 md:space-x-1 md:space-y-0 space-y-1 w-full">
            <div class="flex-auto">
                <x-forms.input label="Notify Emails" placeholder="Notify Emails" name="license.notify"
                    wire:model="license.notify" />
            </div>
            <div class="flex-none">
                <x-forms.input label="{{ Str::upper($license->license_type) }} Reminder Period Before Renewal"
                    placeholder="{{ Str::ucfirst($license->license_type) }} Reminder Period Before Renewal"
                    name="license.reminder" wire:model="license.reminder" />
            </div>
            <div class="flex-none">
                <x-forms.select label="{{ Str::upper($license->license_type) }} Reminder Period Before Renewal"
                    placeholder="Period" name="license.license_reminder_period"
                    :options="array('years'=>'years','months'=>'months')"
                    wire:model="license.license_reminder_period" />
            </div>
        </div>
    </div>
@endif
<div class="flex flex-col md:flex-row p-2 md:space-x-1 md:space-y-0 space-y-1 w-full">
    <button class="btn btn-block" wire:click='saveLicense'>Save
        {{ Str::upper($license->license_type) }}</button>
</div>
