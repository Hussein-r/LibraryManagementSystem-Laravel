@extends('layouts.app')

@section('content')

<section class="container">
        {!! Form::model($user, ['route'=> ['user.update',$user], 'method'=> 'PUT', 'enctype'=> "multipart/form-data"]) !!}

        {{ csrf_field() }}

        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}" style=" margin:10px auto;">
            <label for="name" class="col-md-4 control-label">Name</label>

            <div class="col-md-6">
                {!! Form::text('name', null, ['class'=> 'form-control', 'placeholder'=> 'your Name']) !!}

                @if ($errors->has('name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}" style=" margin:10px auto;">
            <label for="username" class="col-md-4 control-label">Username</label>

            <div class="col-md-6">
                {!! Form::text('username', null, ['class'=> 'form-control', 'placeholder'=> 'your username']) !!}

                @if ($errors->has('username'))
                    <span class="help-block">
                        <strong>{{ $errors->first('username') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}" style=" margin:10px auto;">
            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

            <div class="col-md-6">
                {!! Form::text('email', null, ['class'=> 'form-control', 'placeholder'=> 'your email']) !!}

                @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}" style=" margin:10px auto;">
            <label for="avatar" class="col-md-1 control-label">Profile picture</label>

            <div class="col-md-6 custom-file">
                {!! Form::file('avatar', null, ['class'=> 'form-control', 'placeholder'=> 'your Profile pictur']) !!}
                <label class="custom-file-label" for="inputGroupFile01" value="{{ old('avatar') }}" placeholder="Choose Image">Choose Image</label>

                @if ($errors->has('avatar'))
                    <span class="help-block">
                        <strong>{{ $errors->first('avatar') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <br/>
        <div class="form-group" >
            <div class="col-md-4 col-md-offset-7">
                {!! Form::submit('Update', ['class'=>'btn btn-primary']) !!} 

                {{-- <button type="submit" class="btn btn-primary" style=" margin:10px auto;">
                    Update
                </button> --}}
            </div>
        </div>
        {!! Form::close() !!}
    </section>

@endsection