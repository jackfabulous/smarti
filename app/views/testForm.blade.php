@extends('layout')

@section('content')

<h3> Add an entry to the test table </h3>



{{ Form::open(array('url' => 'user/create')) }}
<h4>I am form</h4>

   <ul>
      @foreach($errors->all() as $error)
         <li>{{ $error }}</li>
      @endforeach
   </ul>

{{Form::text('username');}}
<br>
{{Form::submit('Submit');}}



{{ Form::close() }}




@stop
