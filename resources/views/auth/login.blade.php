@extends('layouts.app')

@section('content')
 <div class="row justify-content-md-center">
  <div class="card text-center" style="width: 20rem;">
   <div class="card-body">
    <h5 class="card-title">Please Log in</h5>
      {!! Form::open(['route' => 'login.post']) !!}
         <div class="form-group">
            {!! form::label('email', 'email adress') !!}
            {!! form::email('email', old('email'), ['class' => 'form-control']) !!}
         </div>
         <div class="form-group">
            {!! form::label('password', 'password') !!}
            {!! form::password('password', ['class' => 'form-control']) !!}
         </div>
         <div class="text-group">
            {!! form::submit('Log in', ['class' => 'btn btn-success']) !!}
         </div>
     {!! form::close() !!}
   </div>
  </div>
 </div>
@endsection