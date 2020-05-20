@extends('layouts.app')
<html>
    <head>
        <link rel="stylesheet" href="/css/newbook.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
        
    </head>
    <body>
      @section('content')
        <div class="container">
          <div class="row">
            <div class="col-sm-6 text-center">
              <form class="form-inline d-block" metod="POST" action="/search">
                <input class="form-control" name="search" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-primary" type="submit">Search</button>
              </form>
            </div>
            <div class="col-sm-6 text-center">
              <b>Order By</b>
              <a href="/rateSort" class="btn btn-light btn-outline-primary">Rate</a>
              <a href="/latestSort/created_at" class="btn btn-light btn-outline-primary">Latest</a>
            </div>
          </div>
          <div style="width:100%;">
            <div style="position:absolute;left:0px;" class=" list-group col-lg-2 mb-4 mt-3 ml-2" id="list-tab" role="tablist">
              <a class="list-group-item list-group-item-action active"  href="/home" id="list-category-list" aria-controls="category">All Books</a>
              @foreach ($categories as $category)
                <a class="list-group-item list-group-item-action"  href="/category/{{$category->id}}" id="list-profile-list" aria-controls="profile">{{$category->name}}</a>
              @endforeach
            </div>
            <div style="margin-left:110px;">
              @foreach($books as $book)
              
                    <div class=" col-md-6 mb-4 mt-3" style="display:inline-block;width:30%;" >
                        <div class="card h-100">
                            <img class="card-img-top" src="/images/{{$book->image}}" alt="">
                            <div class="card-body">
                                <h3 class="card-title">{{$book->title}}</h3>
                                <h5 class="card-text">{{$book->details}}</h5>
                                <b>{{ $book->copies }} copies available</b>
                            </div>
                    
                            <div class="card-footer">
                          
                            <button id="love"  onclick="updateFavorite({{$book->id}},this)">&#x2764;</button>
                            
                                <a href="/showprofile/{{$book->id}}" class="btn btn-primary">Find Out More!</a>
                            </div>
                        </div>
                    </div>
                    
              @endforeach
            </div>
          </div>
        </div>
        <div style="margin-left:550px;">
          {{$books->links()}}
        </div>
      @endsection
    </body>
</html>
<script src="{{ asset('js/book.js') }}" defer></script>

