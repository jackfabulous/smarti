@extends('layout')

@section('content')



{{ Form::open(array('url'=>'user/authenticate', 'class'=>'form-signin')) }}
   <h2 class="form-signin-heading">Please Login</h2>
 
    {{ Form::text('email', null, array('class'=>'input-block-level', 'placeholder'=>'Email Address')) }}
	<br><br>
    {{ Form::password('password', array('class'=>'input-block-level', 'placeholder'=>'Password')) }}
    <br><br>
    {{ Form::submit('Login', array('class'=>'btn btn-large btn-primary btn-block'))}}
{{ Form::close() }}


@stop
