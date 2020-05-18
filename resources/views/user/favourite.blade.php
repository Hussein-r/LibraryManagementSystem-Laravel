@extends('layouts.app')
@section('content')
<html>
    <head>
        <link rel="stylesheet" href="/css/newbook.css">
    </head>
    <body>
        <div class="row text-center" >
            @forelse($favourites as $favourite)
                <div class="col-lg-3 col-md-6 mb-4 mt-3 ml-5" style="display:inline-block;" >
                    <div class="card h-100">
                        <img class="card-img-top" src="/images/{{$favourite->book->image}}" alt="">
                        <div class="card-body">
                            <h3 class="card-title">{{$favourite->book->title}}</h3>
                            <h5 class="card-title">Auther: {{$favourite->book->auther}}</h5>
                            <p >{{$favourite->book->details}}</p>
                            <h6>You added this book to favorite at {{$favourite->created_at}}</h6>
                        
                        </div>
                        <div class="card-text">
                        </div>
                    </div>
                </div>
            @empty
                <div class="alert alert-info" style="margin:40px auto;">
                    Your favorite books list is empty!
                </div>
            @endforelse  
        </div>
    </body>
</html>
@endsection