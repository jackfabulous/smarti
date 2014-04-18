@extends('layout')

@section('content')

@include ('NavManage')

<h3>Create a New Ad </h3>



{{ Form::open(array('url'=>'/manage/ads/createNewAd', 'class'=>'form-signin')) }}	

		@include ('manageAdCreateEditForm')
		
	{{ Form::submit('Create New Ad', array('class'=>'btn btn-large btn-primary btn-block'))}}
{{ Form::close() }}

@include('incPhotoPicker')



@stop
