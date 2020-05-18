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
                            <h4 class="card-title">{{$lease->book->title}}</h4>
                            <p class="card-text">{{$lease->book->details}}</p>
                            <h6 class="card-text">You leased this book at {{$lease->created_at}}</h6>
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