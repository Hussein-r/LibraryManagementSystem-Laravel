@extends('layouts.app')

@section('content')

<section class="container">
        {!! Form::model($user, ['route'=> ['user.update',$user], 'method'=> 'PUT']) !!}

        {{ csrf_field() }}

        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}" style=" margin:10px auto;">
            <label for="name" class="col-md-4 control-label">Name</label>

            <div class="col-md-6">
                {!! Form::text('name', null, ['class'=> 'form-control', 'placeholder'=> 'your address']) !!}

                @if ($errors->has('name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}" style=" margin:10px auto;">
            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

            <div class="col-md-6">
                {!! Form::text('email', null, ['class'=> 'form-control', 'placeholder'=> 'your address']) !!}

                @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>
        </div>
<br/>
        <div class="form-group" >
            <div class="col-md-6 col-md-offset-4">
                {!! Form::submit('Update', ['class'=>'btn btn-primary']) !!} 

                {{-- <button type="submit" class="btn btn-primary" style=" margin:10px auto;">
                    Update
                </button> --}}
            </div>
        </div>
        {!! Form::close() !!}
    </section>

@endsection