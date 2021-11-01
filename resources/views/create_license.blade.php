@extends('layouts.app')

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

    x: {!!json_encode($licenses->pluck('license_certification')->toArray())!!},

    y: {!!json_encode($licenses->pluck('next_renewal')->toArray())!!},

    type: 'bar'

  }

];


Plotly.newPlot('myDiv', data);
</script>
@endsection
