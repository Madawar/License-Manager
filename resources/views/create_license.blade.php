@extends('layouts.app')






@section('content')
    <div class="myDiv" id="myDiv"></div>

@endsection

@section('secondary-content')


@endsection

@section('pre_jquery')
    <script>


    </script>
@endsection

@section('jquery')
    <script>
        var data = [

            {

                x: {!! json_encode($licenses->pluck('license_certification')->toArray()) !!},

                y: {!! json_encode($licenses->pluck('next_renewal')->toArray()) !!},

                type: 'bar'

            }

        ];


        Plotly.newPlot('myDiv', data);
    </script>
@endsection
