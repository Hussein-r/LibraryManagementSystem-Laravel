@extends('layouts.app')

@section('content')

<section class="container">

<table class="table table-striped table-inverse table-responsive">
    <thead class="thead-inverse">
        
        </thead>
        <tbody>
            <tr>
                <th>Name</th>
                <td>{{Auth::user()->name}}</td>
            </tr>
            <tr>
                <th scope="row">User Name</th>
                <td>{{Auth::user()->username}}</td>
            </tr>
            <tr>
                <th scope="row">E-Mail</th>
                <td>{{Auth::user()->email}}</td>
            </tr>
            {{-- <tr>
                <th scope="row">Password</th>
                <td>{{Auth::user()->password}}</td>
            </tr> --}}
        </tbody>
</table>
<br/>
<a class="btn btn-info" style="margin: 20px;" href="{{ route('user.edit',['user'=> Auth::id()]) }}" role="button">Update your data..?</a>

</section>

@endsection