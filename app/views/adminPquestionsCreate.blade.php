@extends('layout')

@section('content')

@include ('NavAdmin')


<h3>Write a new profile question</h3>

{{ Form::open(array('url'=>'/admin/questions/create/newq', 'class'=>'form-signin')) }}	

		@include ('adminPquestionsCreateEditForm')
		
	{{ Form::submit('Create New Question', array('class'=>'btn btn-large btn-primary btn-block'))}}
{{ Form::close() }}








@stop


