@extends('layouts.layout')

@section('content')

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Laravel Chart</title>
    </head>
    <body>
        <div style="width: 80%;margin: 0 auto;">
            {!! $chart->container() !!}
        </div>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script>
        {!! $chart->script() !!}
    </body>
</html>
</pre>

@endsection

