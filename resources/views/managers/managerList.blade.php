
@extends('layouts.layout')

@section('content')
<p>manager listttt</p>

  @foreach($users  as $user){
    <ul>
      <li> {{$user->name}}</li>
      <li>{{$user->email}}</li><br>
      {!! Form::open(['route' => ['manager.destroy', $user ] ,'method' => 'delete' ]) !!}
        {!! Form::submit('Delete',['class'=>'btn btn-danger mt-3'])  !!}
      {!! Form::close() !!}
    </ul>
    }
    @endforeach
@endsection