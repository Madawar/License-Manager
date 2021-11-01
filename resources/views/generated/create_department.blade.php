@extends('layouts.master_layout')

@section('main-heading')
    <h1
        class="p-4  text-center text-lg font-semibold tracking-widest text-gray-900 uppercase rounded-lg dark-mode:text-white focus:outline-none focus:shadow-outline">
        Create Department
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

    @if ($department)
        <form action="{{ route('department.update', ['department' => $department->id]) }}" method="POST" id="appx">
            @method('PATCH')
        @else
            <form action="{{ route('department.store') }}" method="post" id="appx">
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
	
    <div class="flex-col p-2 w-full">
        <div class="grid justify-items-stretch">
            <button class="btn btn-primary">Save Department</button>
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
                flatpickr(".date", {
                    defaultDate: "{{ Carbon\Carbon::today()->format('Y-m-d') }}"
                });
            },
            data: {

            },
			methods:{

			},
            watch: {


            }
        })

    </script>
@endsection
