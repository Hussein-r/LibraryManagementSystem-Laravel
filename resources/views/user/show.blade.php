@extends('layouts.app')

@section('content')

<section class="container">

<table class="table table-striped table-inverse">

        <tbody>
            <tr>
                <th scope="col">Name</th>
                <td>{{Auth::user()->name}}</td>
            </tr>
            <tr>
                <th scope="col">User Name</th>
                <td>{{Auth::user()->username}}</td>
            </tr>
            <tr>
                <th scope="col">E-Mail</th>
                <td>{{Auth::user()->email}}</td>
            </tr>
            {{-- <tr>
                <th scope="row">Password</th>
                <td>{{Auth::user()->password}}</td>
            </tr> --}}
        </tbody>
</table>
<br/>
<a class="btn btn-info" style="margin: 20px auto; text-align:center; " href="{{ route('user.edit',['user'=> Auth::id()]) }}" role="button">Update your data..?</a>
<h6>Not Happy :(</h6>
{!! Form::open(['route' => ['user.destroy', Auth::id() ] ,'method' => 'delete' ]) !!}
    {!! Form::submit('Delete your acount',['class'=>'btn btn-danger mt-3'])  !!}
{!! Form::close() !!}
</section>

@endsection