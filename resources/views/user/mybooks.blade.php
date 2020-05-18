{{-- @extends('layouts.app')

@section('content')
<section class="container">
    my booooks
</section>

@endsection --}}

@extends('layouts.app')
@section('content')
<html>
    <head>
        <link rel="stylesheet" href="/css/newbook.css">
    </head>
    <body>
        @if ($books->count())
        <div class="row text-center" >
            mmmmnmn,
            @foreach($books as $book)
            mmm
                <div class="col-lg-3 col-md-6 mb-4 mt-3 ml-5" style="display:inline-block;" >
                    <div class="card h-100">
                        <img class="card-img-top" src="/images/{{$book->image}}" alt="">
                        <div class="card-body">
                            <h4 class="card-title">{{$book->title}}</h4>
                            <p class="card-text">{{$book->details}}</p>
                        </div>
                        <div class="card-footer">
                            <a href="{{route('book.show',$book->id)}}" class="btn btn-primary">Find Out More!</a>
                        </div>
                    </div>
                </div>
            @endforeach   
        </div>
        {{-- @else
        <div class="alert" style="text-align: center">
            <h4>You haven't get any book yet..</h4>
        </div> --}}
        @endif
    </body>
</html>
@endsection