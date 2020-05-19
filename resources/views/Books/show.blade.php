@extends('layouts.layout')
@section('content')
<html>
    <head>
        <link rel="stylesheet" href="/css/newbook.css">
        <script type="text/javascript" src="/js/showlease.js"></script>
    </head>
    <body>
        <div style="display:inline-block;">
            <div class="h-100 col-lg-3 col-md-6 mt-3 " style="display:inline-block;position:absolute">
                <img style="height:600px;" class="card-img-top" src="/images/{{$book->image}}" alt=""> 
            </div>
            <div class="h-100 col-lg-4 col-md-6" style="display:inline-block;margin-left:300px;">
                <div class="card-body">
                    <h6 class="card-title">Book Title: {{$book->title}}</h6>
                    @foreach($category as $subcategory)
                        <p class="card-text">Category: {{$subcategory->name}}</p>
                    @endforeach
                    <p class="card-text">Book-Details: {{$book->details}}</p>
                    <p class="card-text">Written By: {{$book->auther}}</p>
                    <p class="card-text">There are {{$book->copies}} Copies Available</p>
                    <p class="card-text">Price: {{$book->price}}</p>
                    <a href="{{route('book.edit',$book->id)}}" class="btn btn-info">Edit</a>
                    {!! Form::open(['route' => ['book.destroy', $book ] ,'method' => 'delete' ]) !!}
                        {!! Form::submit('Delete',['class'=>'btn btn-danger mt-3'])  !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
        <div class=" banner-right">
            <img class="img-fluid" src="/img/header-img.png" alt="">
        </div>
    </body>
</html>
@endsection
