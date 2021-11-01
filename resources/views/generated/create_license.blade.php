@extends('layouts.master_layout')

@section('main-heading')
<h1
    class="p-4  text-center text-lg font-semibold tracking-widest text-gray-900 uppercase rounded-lg dark-mode:text-white focus:outline-none focus:shadow-outline">
    Create License
</h1>
@endsection
@section('secondary-heading')
<h1
    class="p-4 text-center text-lg font-semibold tracking-widest text-gray-900 uppercase rounded-lg dark-mode:text-white focus:outline-none focus:shadow-outline">
    Overview </h1>
@endsection


@section('pre_jquery')
<script>


</script>
@endsection

@section('content')

@if($license)
    <form
        action="{{ route('license.update', ['license' => $license->id]) }}"
        method="POST" id="appx">
        @method('PATCH')
    @else
        <form action="{{ route('license.store') }}" method="post" id="appx">
@endif

@csrf

<div class="flex flex-col md:flex-row p-2 md:space-x-3 w-full">

    <div class="flex-auto">



    </div>
    <div class="flex-auto">

    </div>

</div>
<div class="flex flex-col md:flex-row p-2 md:space-x-3 w-full">

    <div class="flex-auto">


    </div>
    <div class="flex-auto">


    </div>

</div>
<div class="flex flex-col md:flex-row p-2 md:space-x-3 w-full">



    <div class="flex-auto">


    </div>

</div>

<div class="flex flex-col md:flex-row p-2 md:space-x-3 w-full">
    <div class="flex-auto">


    </div>
</div>
<!-- Move this to Layout -->
  <x-forms.input label="License Certification Or Warranty" placeholder="License Certification" name="license_certification" wire:model="license_certification" model="{!! $license ?? null !!}" />
  <x-forms.input label="License Certification Or Warranty" placeholder="License Certification" name="license_certification" wire:model="license_certification"  />
 <x-forms.select label="License Type" placeholder="License Type" name="license_type" :options="$license" model="{!! $license ?? null !!}"/>
>
 <x-forms.select label="First Acquired Date" placeholder="First Acquired Date" name="first_acquired" :options="$license" model="{!! $license ?? null !!}"/>

  <x-forms.input label="Expiry Date" placeholder="Expiry Date" name="expiry" wire:model="expiry" model="{!! $license ?? null !!}" />
  <x-forms.input label="Expiry Date" placeholder="Expiry Date" name="expiry" wire:model="expiry"  />
  <x-forms.textarea label="Notes" placeholder="Notes" name="notes" model="{!! $license ?? null !!}"   />
  <x-forms.textarea label="Notes" placeholder="Notes" name="notes"    />
  <x-forms.input label="License Key" placeholder="License Key" name="license_key" wire:model="license_key" model="{!! $license ?? null !!}" />
  <x-forms.input label="License Key" placeholder="License Key" name="license_key" wire:model="license_key"  />
  <x-forms.input label="Notify Emails" placeholder="Notify Emails" name="notify" wire:model="notify" model="{!! $license ?? null !!}" />
  <x-forms.input label="Notify Emails" placeholder="Notify Emails" name="notify" wire:model="notify"  />
  <x-forms.input label="Certificates" placeholder="Certificates" name="certificates" wire:model="certificates" model="{!! $license ?? null !!}" />
  <x-forms.input label="Certificates" placeholder="Certificates" name="certificates" wire:model="certificates"  />
  <x-forms.input label="Supplier Name" placeholder="Supplier Name" name="supplier" wire:model="supplier" model="{!! $license ?? null !!}" />
  <x-forms.input label="Supplier Name" placeholder="Supplier Name" name="supplier" wire:model="supplier"  />
  <x-forms.password label="Password" placeholder="Password" name="password"  />
 <x-forms.select label="Department" placeholder="Department" name="department_id" :options="$license" model="{!! $license ?? null !!}"/>
 <x-forms.select label="Department" placeholder="Department" name="department_id" :options="$license" />

<div class="flex-col p-2 w-full">
    <div class="grid justify-items-stretch">
        <button class="btn btn-primary">Save License</button>
    </div>
</div>
</form>
@endsection

@section('secondary-content')


@endsection
@section('jquery')
<script>
    var app2 = new Vue({
        el: '#appx',
        mounted() {

        },
        data: {

        },
        methods: {

        },
        watch: {


        }
    })

</script>
@endsection
