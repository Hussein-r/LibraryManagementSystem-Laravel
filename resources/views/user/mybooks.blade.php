@extends('layouts.app')
@section('content')
<html>
    <head>
        <link rel="stylesheet" href="/css/newbook.css">
    </head>
    <body>
        <div class="row text-center" >
            @forelse($leases as $lease)
                <div class="col-lg-3 col-md-6 mb-4 mt-3 ml-5" style="display:inline-block;" >
                    <div class="card h-100">
                        <img class="card-img-top" src="/images/{{$lease->book->image}}" alt="">
                        <div class="card-body">
                            <h3 class="card-title">{{$lease->book->title}}</h3>
                            <div style="text-align: left">
                            <h5 class="card-title">Auther: {{$lease->book->auther}}</h5>
                            <h6>{{$lease->book->details}}</h6>
                            <h6>You leased it at {{$lease->created_at->format('Y-m-d')}} for {{$lease->days}} days</h6>
                            <h6>Price: {{$lease->book->price* $lease->days}}</h6>
                        </div>
                        </div>
                        <div class="card-text">
                        </div>
                    </div>
                </div>
            @empty
                <div class="alert alert-info" style="margin:40px auto;">
                    You haven't get any book yet..
                </div>
            @endforelse  
        </div>
    </body>
</html>
@endsection