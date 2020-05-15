
@extends('layouts.layout')

@section('content')



<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">Name</th>
      <th scope="col">E-mail</th>
      <th scope="col">Unpromote</th>
      <th scope="col">Delete</th>
    </tr>
  </thead>
  <tbody>
  @foreach($users  as $user)
   <tr>
   <td>    {{$user->name}}     </td>
   <td>        {{$user->email}}          </td>
   <td>
   
   <form action="/managers/{{$user->id}}" method="POST">
   @method('PATCH')
       @csrf       
       <button class="btn btn-warning" type="submit">Unpromote</button>
       </form>
   </td>
   <td>
   <form action="/managers/{{$user->id}}" method="POST">
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