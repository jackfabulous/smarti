@extends('layout')

@section('content')

@include ('NavManage')

	<h3>Edit Ad </h3>


	<?
		$ad = Ad::where('id', '=', $adId)->get();
	?>

	{{ Form::model($ad[0], array('url'=>'manage/ads/editExistingAd')) }} 				
				
		@include ('manageAdCreateEditForm')

		{{ Form::hidden('adId',$adId) }}
							 
		{{ Form::submit('Update Ad', array('class'=>'btn btn-large btn-primary btn-block'))}}
	{{ Form::close() }}

	@include('incPhotoPicker')



@stop
