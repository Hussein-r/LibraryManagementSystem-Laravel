<<<<<<< HEAD
<form action="/managers/{{$manager->id}}" enctype="multipart/form-data" method="POST">
@method('PATCH')
<p> name: </p>
<div  class="input-group">
<input    type="text" name="name" value="{{old('name') ?? $manager->name}}"> 
<div>{{$errors->first('name')}}</div>
</div>
<p> email:</p>
<div  class="input-group">
<input    type="email" name="email"  value="{{old('email') ?? $manager->email}}"> 
<div>{{$errors->first('email')}}</div>
</div>
<p> username:</p>
<div  class="input-group">
<input    type="text" name="username"  value="{{old('username') ?? $manager->username}}"> 
<div>{{$errors->first('username')}}</div>
</div>
<p> password:</p>
<div  class="input-group">
<input    type="password" name="password"> 
<div>{{$errors->first('password')}}</div>
</div>
<div class="input-group mb-3">
   <div class="input-group-prepend">
     <span class="input-group-text">change avatar</span>
      </div>
       <div class="custom-file">
         <input type="file" class="custom-file-input" name="avatar" id="inputGroupFile01">
         <label class="custom-file-label" for="inputGroupFile01">Choose Image</label>
           </div>
           </div>
             <div><span class="text-white">{{$errors->first('avatar')}}</span>
                </div>

<button type="submit"> edit data </button>


@csrf


    
</form>

=======
@extends('layouts.layout')
@section('content')
<html>
    <head>
    </head>
    <body>  
        <div class="container mt-3">
            <div style="color:white;font-size:40px;text-align:center;">
                Edit Your Data
            </div>
            <div class="col-md-6" >
            <form action="/managers/{{$manager->id}}" method="POST" enctype='multipart/form-data'>
            @method('PATCH')
            <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">Name</span>
            </div>    
            <input type="text" class="form-control" name="name" value="{{old('name') ?? $manager->name}}" aria-label='Name', aria-describedby='basic-addon1'> 
            </div>
            <div><span class="text-white">{{$errors->first('name')}}</span></div>
            <div class="input-group mb-3 ">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon2">Email</span>
            </div>    
            <input type="text" class="form-control" name="email" value="{{old('email') ?? $manager->email}}" aria-label='Email', aria-describedby='basic-addon2'> 
            </div>
            <div><span class="text-white">{{$errors->first('email')}}</span></div>
            <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon3">UserName</span>
            </div>    
            <input type="text" class="form-control" name="username" value="{{old('username') ?? $manager->username}}" aria-label='UserName', aria-describedby='basic-addon3'> 
            </div>
            <div><span class="text-white">{{$errors->first('username')}}</span></div>
            <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon4">Password</span>
            </div>    
            <input type="text" class="form-control" name="password" aria-label='Password', aria-describedby='basic-addon4'> 
            </div>
            <div><span class="text-white">{{$errors->first('password')}}</span></div>
            <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text">Upload</span>
            </div>
            <div class="custom-file">
                <input type="file" class="form-control" class="custom-file-input" name="avatar" id="inputGroupFile01">
                <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
            </div>
            </div>
            <div><span class="text-white">{{$errors->first('avatar')}}</span></div>
            <button class="btn btn-primary" type="submit">Edit</button>
            @csrf
            </form>
            </div>
        </div>
    </body>
<html>
@endsection
>>>>>>> e688187950cd015c02a5f09924d392a30d431fa6

