@extends('layouts.layout')
@section('content')
<html>
    <head>
        <link rel="stylesheet" href="/css/newbook.css">
        
    </head>
    <body>
        <div class="myform">
            {!! Form::open(['route' => 'category.store']) !!}
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">Category</span>
                    </div>    
                    {!! Form::text('name',null,['class'=>'form-control','aria-label'=>'name', 'aria-describedby'=>'basic-addon1','placeholder'=>'Category Name'])  !!}
                </div>
                <div><span class="text-white">{{$errors->first('name')}}</span></div>
                {!! Form::submit('Add A Category',['class'=>'btn btn-primary'])  !!}

            {!! Form::close() !!}
            <h2 style="color:white;">Categories You Added So Far</h1>
            @if ($categories->count())
            <table>
                @foreach($categories as $category)
                    <tr>
                    <td><h3 style="color:white;">{{ $category->name }}</h3></td>
                    <td>
                        {!! Form::open(['route' => ['category.destroy', $category ] ,'method' => 'delete' ]) !!}
                            {!! Form::submit('Delete',['class'=>'btn btn-danger ml-3'])  !!}
                        {!! Form::close() !!}
                    </td>
                    </tr>
                @endforeach   
            </table>
            @endif
            <a href="{{route('book.create')}}" class="btn btn-primary">Return To Adding Your Book</a>
        </div>
        <div class=" banner-right">
            <img class="img-fluid" src="/img/header-img.png" alt="">
        </div>
    </body>
</html>
@endsection
