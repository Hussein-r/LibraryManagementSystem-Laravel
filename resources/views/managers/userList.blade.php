@extends('layouts.layout')

@section('content')



<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">Name</th>
      <th scope="col">E-mail</th>
      <th scope="col">status</th>
      <th scope="col">Privilages</th>
      <th scope="col">Delete</th>
    </tr>
  </thead>
  <tbody>
  @foreach($users  as $user)
   <tr>
   <td>    {{$user->name}}     </td>
   <td>        {{$user->email}}          </td>

   <td>
   
   @if($user->is_active ==0)
         
            <form action="/userList/inactivate/{{$user->id}}" method="POST">
         @method('PATCH')
          @csrf       
       <button class="btn btn-dark" type="submit">Inactivate</button>
       </form>
         
         @else
            <form action="/userList/activate/{{$user->id}}" method="POST">
         @method('PATCH')
       @csrf       
       <button class="btn btn-success" type="submit">Activate</button>
       </form>
         @endif

   </td>
   <td>
   <form action="/userList/{{$user->id}}" method="POST">
   @method('PATCH')
       @csrf       
       <button class="btn btn-info" type="submit">promote</button>
       </form>
   </td>
   <td>
   <form action="/userList/{{$user->id}}" method="POST">
       @method('DELETE')
       @csrf       
       <button class="btn btn-danger" type="submit">Delete</button>
       </form>
   </td>
   </tr>
   @endforeach

  </tbody>
</table>
   
@endsection