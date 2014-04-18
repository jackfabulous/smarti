@extends('layout')

@section('content')

{{--{{ Form::open(array('url'=>'user/create', 'class'=>'form-signup')) }}--}}



   <h3 class="form-signup-heading">Update Your Account Information</h3>
 
<? 
	var_dump(Auth::user()['attributes'] );
	//$userInfo=Auth::user()['attributes'];
?>


{{ Form::model(Auth::user()['attributes'], array('url'=>'user/makeUpdate')) }} 
   <ul>

      @foreach($errors->all() as $error)
         <li>{{ $error }}</li>
      @endforeach
   </ul>
 
   {{ Form::text('name', null, array('class'=>'input-block-level', 'placeholder'=>'Name')) }}
<br><br>
   {{ Form::text('username', null, array('class'=>'input-block-level', 'placeholder'=>'User Name')) }}
<br><br>
   {{ Form::text('email', null, array('class'=>'input-block-level', 'placeholder'=>'Email Address')) }}
<br><br>
   {{ Form::password('password', array('class'=>'input-block-level', 'placeholder'=>'Password')) }}
<br><br>
   {{ Form::password('password_confirmation', array('class'=>'input-block-level', 'placeholder'=>'Confirm Password')) }}
<br>
<br><br> 
   {{ Form::submit('Update', array('class'=>'btn btn-large btn-primary btn-block'))}}
{{ Form::close() }}



@stop


