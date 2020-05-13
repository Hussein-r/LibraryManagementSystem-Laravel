@extends('layouts.app')
@section('content')
<html>
    <head>
        <link rel="stylesheet" href="/css/newbook.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
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
