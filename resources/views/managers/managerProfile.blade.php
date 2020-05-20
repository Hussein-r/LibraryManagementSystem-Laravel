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


