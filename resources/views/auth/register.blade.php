@extends('layouts.app')

@section('content')
<div class="row justify-content-md-center">
  <div class="card text-center" style="width: 20rem;">
   <div class="card-body">
    <h5 class="card-title">Please Sign up</h5>
        {!! Form::open(['route' => 'signup.post']) !!}
            <div class="form-group">
                {!! Form::label('name', 'name') !!}
                {!! Form::text('name', old('name'), ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('email', 'email adress') !!}
                {!! Form::email('email', old('email'), ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('password', 'password') !!}
                {!! Form::password('password', ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('password_confirmation', 'password（confirmation）') !!}
                {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
            </div>
            <div class="text-group">
                {!! Form::submit('Sign up', ['class' => 'btn btn-success']) !!}
            </div>
        {!! Form::close() !!}
    </div>
  </div>
</div>
@endsection