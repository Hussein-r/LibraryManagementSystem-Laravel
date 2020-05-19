@extends('layouts.layout')

@section('content')


<div>
<table class="table table-striped">
<tbody>
    <tr>
      <td scope="col">Name</td>
      <td>  {{$manager->name}}  </td>
    </tr>
    <tr>
      <td scope="col">E-mail</td>
      <td>  {{$manager->email}}  </td>
    </tr>
    <tr>
      <td scope="col">User name</td>
      <td>  {{$manager->username}}  </td>
    </tr>
    <tr>
      <td scope="col">Avatar</td>
      <td> 
      <img style="height:200px ; width:150px;" class="img-thumbnail" src="/images/{{$manager->avatar}}" />
       </td>
    </tr>
    <tr>
      <td scope="col"></td>
      <td> 
      <a class="btn btn-warning" href="/managers/{{$manager->id}}/edit">Edit your data ..</a>
       </td>
    </tr>
</tbody>

</table>
</div>
   
@endsection
    