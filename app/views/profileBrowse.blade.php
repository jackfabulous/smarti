@extends('layout')

@section('content')

<?
$ads = DB::table('ads')->get();
?>

<div></div>


@foreach($ads as $ad)
			<a href="/profile/{{$ad->uid}}" style="width:200px;  height:200px;  border:1px solid gray; float:left;">
				<h3>{{$ad->headline}}</h3>
				<h4>{{$ad->blurb}}</h4>
				<? $photo=Photo::find($ad->photoid);?>
				<img src="../../profileimages/{{$photo->filename}}" style="height:100%;  width:100%;" >

			
			</a>			
@endforeach

@stop
