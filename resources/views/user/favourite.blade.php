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
                            <div style="text-align: left">
                            <h5 class="card-title" >Auther: {{$favourite->book->auther}}</h5>
                            <h6>{{$favourite->book->details}}</h6>
                            <h6>You liked it at: {{$favourite->created_at->format('Y-m-d')}}</h6>
                            @if($favourite->book->lease->where('user_id',Auth::id())->where('book_id',$favourite->book->id)->first())
                            {
                                <h6>Price: {{($favourite->book->price)* ($favourite->book->lease->where('user_id',Auth::id())->where('book_id',$favourite->book->id)->first()->days)}} for 
                                    {{$favourite->book->lease->where('user_id',Auth::id())->where('book_id',$favourite->book->id)->first()->days}} days</h6>
                                    
                            }
                            @endif
                            @if($favourite->book->rate->where('user_id',Auth::id())->where('book_id',$favourite->book->id)->first())
                            {
                                <h6>Your rate:{{$favourite->book->rate->where('user_id',Auth::id())->where('book_id',$favourite->book->id)->first()->rating}} </h6>
                            
                            }
                            @endif
                            </div>
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