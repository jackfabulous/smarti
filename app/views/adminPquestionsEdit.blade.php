@extends('layout')

@section('content')

@include ('NavAdmin')


<h3>Edit profile question</h3>


<?
$theQ=Pquestion::find($id)
?>
{{$id}}

	{{ Form::model($theQ, array('url'=>'/admin/questions/doedit/'.$id)) }} 				


		@include ('adminPquestionsCreateEditForm')
		
	{{ Form::submit('Update Question', array('class'=>'btn btn-large btn-primary btn-block'))}}
{{ Form::close() }}








@stop


