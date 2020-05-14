<form action="/managers/{{$manager->id}}" method="POST">
@method('PATCH')
<p> name: </p>
<div  class="input-group">
<input    type="text" name="name" value="{{old('name') ?? $manager->name}}"> 
<div>{{$errors->first('name')}}</div>
</div>
<p> email:</p>
<div  class="input-group">
<input    type="text" name="email"  value="{{old('email') ?? $manager->email}}"> 
<div>{{$errors->first('email')}}</div>
</div>
<p> password:</p>
<div  class="input-group">
<input    type="text" name="password"> 
<div>{{$errors->first('password')}}</div>
</div>

<button type="submit"> edit data </button>


@csrf


    
</form>