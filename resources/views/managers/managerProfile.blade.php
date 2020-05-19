<form action="/managers/{{$manager->id}}" method="POST">
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

<button type="submit"> edit data </button>


@csrf


    
</form>


