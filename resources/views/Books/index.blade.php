@extends('layouts.app')
@section('content')
<html>
    <head>
        <link rel="stylesheet" href="/css/newbook.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    </head>
    <body>
        @if ($books->count())
        <div class="row text-center" >
            @foreach($books as $book)
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
        @endif
        <footer style="text-align:center;"><div style="display:block;" class="mt-2 mr-2 "><a href="{{route('book.create')}}" class="btn btn-primary btn-lg">Add A Book</a></div><footer>
    </body>
</html>
@endsection