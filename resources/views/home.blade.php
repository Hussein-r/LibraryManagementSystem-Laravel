@extends('layouts.app')
<head>
        <link rel="stylesheet" href="/css/newbook.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    </head>
 @section('content')
    
    <body>
    <div class="container">
  <div class="row">
    <div class="col-sm-6 text-center">
      <form class="form-inline d-block">
       
        {!! Form::text('search',null,['action'=>'/search','class'=>'form-control','metod'=>'POST','aria-label'=>'search', 'aria-describedby'=>'basic-addon1','placeholder'=>'search', 'name'=>'result'])  !!}
        <button class="btn btn primary" type="submit">Search</button>
      </form>
    </div>
    <div class="col-sm-6 text-center">
    <b>Order By</b> <div class="btn-group" role="group" aria-label="Basic example">
       <a class="btn btn-light btn-outline-primary">Rate</a>
        <a href="/sort/created_at" class="btn btn-light btn-outline-primary">Latest</a>
      </div>
    </div>
    </div>
    <div class="row">
    <div class="list-group" id="list-tab" role="tablist">
      <a class="list-group-item list-group-item-action active" id="list-home-list" data-toggle="list" href="#list-home" role="tab" aria-controls="home">Categories</a>
      @foreach ($errors as $category)
      <a class="list-group-item list-group-item-action" id="list-profile-list" data-toggle="list" href="/category/{{$category->id}}" role="tab" aria-controls="profile">{{$category->name}}</a>
      @endforeach
 
    </div>

         @foreach($books as $book)
         <div class="col-md-4">
            <div class="card">
              <img src="/images/{{$book->image}}" class="card-img-top" alt="{{$book->title}}">
        <div class="card-body">
          <h2 class="card-title">
            {{$book->title}}
          </h2>
          <span class="text-muted float-right fav-add"  onclick="addFav({{$book->id}},{{Auth::user()->id}})"> 
                <i class="fa fa-heart fa-2x ml-1"></i>
          </span>
          <span  class="text-danger float-right fav-remove" onclick="removeFav({{$book->id}},{{Auth::user()->id}})">
               <i class="fa fa-heart fa-2x ml-1"></i>
          </span>
          
          
            <!-- <p class="card-text">
                {{$book->details }}
                
            </p> -->
            <h5 class="card-title">
           BY {{$book->auther}}
            </h5>
            <div class="card-title">
                {{ $book->copies }} copies available
            </div>
            <div class="card-footer">
            <a href="/showprofile/{{$book->id}}" class="btn btn-primary">Find Out More!</a>
            </div>
        </div>
        </div>
        
         @endforeach
         
         </div>
         <div class="text-center">
         {{ $books->links() }}
         </div>
    </body>
@endsection

