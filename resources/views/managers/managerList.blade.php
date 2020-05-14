
@extends('layouts.layout')

@section('content')
<p>manager listttt</p>

  @foreach($users  as $user){
    <ul>
      <li> {{$user->name}}</li>
      <li>{{$user->email}}</li><br>
       <form action="/managers/{{$user->id}}" method="POST">
        <input type="text" value="{{$user->id}}" hidden name="delete"/>
       
       <a class="btn btn-danger" type="submit">DELETE</a>

       </form>
    </ul>
    }
    @endforeach
@endsection