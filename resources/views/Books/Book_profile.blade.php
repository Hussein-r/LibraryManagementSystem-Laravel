@extends('layouts.app')
@section('content')
<html>
    <head>
        <link rel="stylesheet" href="/css/newbook.css">
    </head>
    <body>
        <div style="display:inline-block;">
            <div class="h-100 col-lg-3 col-md-6 mt-3 " style="display:inline-block;position:absolute">
                <img style="height:600px;" class="card-img-top" src="/images/{{$book->image}}" alt=""> 
            </div>
            <div class="h-100 col-lg-4 col-md-6" style="display:inline-block;margin-left:300px;">
                <div class="card-body">
                    <p class="card-title">Book Title: {{$book->title}}</p>
                    @foreach($category as $subcategory)
                        <p class="card-text">Category: {{$subcategory->name}}</p>
                    @endforeach
                    <p class="card-text">Book-Details: {{$book->details}}</p>
                    <p class="card-text">Written By: {{$book->auther}}</p>
                    <p class="card-text">There are {{$book->copies}} Copies Available</p>
                    <p class="card-text">Overall Rating: {{$rate}}</p>
                    <p class="card-text">Price: {{$book->price}}</p>
                    <a href="#" class="btn btn-info" onclick="myFunction()">Lease</a>
                    <div id="myDIV" style="display:none">
                        {!! Form::open(['route' => 'lease.store']) !!}
                            <div class="input-group mb-3 mt-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon4">Days</span>
                            </div>    
                            <input type="number" name="days" class="form-control" aria-label='Days' aria-describedby='basic-addon4' placeholder="For how long you'll need the book" aria-label="Price" id='myTextBox' onKeyUp='checkInput({{$book->price}})'>
                            </div>
                            <div><span class="text-white">{{$errors->first('price')}}</span></div>
                            <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon5">Price</span>
                            </div>
                            <div>
                            <input type="text" value="" class="form-control myprice" placeholder="Price For Days Specified" aria-label="Price" aria-describedby="basic-addon5" disabled>
                            </div>
                            <input type="text" Hidden class="form-control" id="mybook" value="{{$book->id}}" name="book_id">
                            <input type="text"  class="form-control myprice" name="price"  placeholder="Price For Days Specified" aria-label="Price" aria-describedby="basic-addon5" hidden> 
                            {!! Form::submit('Confirm Lease',['class'=>'btn btn-primary'])  !!}
                        {!! Form::close() !!}                    
                    </div>
                </div>
                <div>
                    {!! Form::open(['route' => 'rate.store']) !!}
                    <input type="text" Hidden class="form-control" id="mybook" value="{{$book->id}}" name="book_id">
                    <div class="input-group mb-3 mt-3">
                        <div class="input-group-prepend">
                            <label class="input-group-text" for="inputGroupSelect01">Book Rate</label>
                        </div>
                        <select class="custom-select" name="rate" id="inputGroupSelect01">
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                            <option value="4">Four</option>
                            <option value="5">Five</option>
                            <option value="6">Six</option>
                            <option value="7">Seven</option>
                            <option value="8">Eight</option>
                            <option value="9">Nine</option>
                            <option value="10">Ten</option>
                        </select>
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="submit">Rate</button>
                        </div>
                    </div>
                    {!! Form::close() !!} 
                </div>
                <div>
                    @if($errors->any())
                        <h4 style="color:white;">{{$errors->first()}}</h4>
                    @endif
                </div>
                <div>
                    {!! Form::open(['route' => 'comment.store']) !!}
                    <div class="input-group mb-3 mt-3">
                        <input type="text" class="form-control" placeholder="Add A Comment" name="comment" aria-describedby="basic-addon2">
                        <input type="text" Hidden class="form-control" id="mybook" value="{{$book->id}}" name="book_id">
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="submit">Comment</button>
                        </div>
                    </div>
                    {!! Form::close() !!} 
                </div>
                @foreach($comments as $comment)
                <div style="background-color:#428bca;margin-top:5px;border-radius:10px;">
                    <p class="card-text h3">{{$comment->user->name}}: {{$comment->comment}}</p>
                </div>
                @endforeach
            </div>
        </div>
        <div class="banner-right" style="float:right;">
            <img class="img-fluid" src="/img/header-img.png" alt="">
        </div>
    </body>
    <script type="text/javascript" src="/js/showlease.js"></script>
</html>
@endsection
