@extends('layout')

@section('content')

<? $profile=Profile::find($id);
$answers = DB::table('panswers')->where('uid', '=', $id)->get();
	
?>

<h2>{{ $profile->entName }}</h2>
<a href="../"> Browse More Profiles</a><br>

<div style="float:left; width:300px; border:2px solid gray;">

		
		Height: {{ $profile->height}}  				<br>
		Weight: {{ $profile->weight}}  				<br>
		Hair: {{ $profile->hair}}  				<br>
		<h4>Contact </h4>
		Phone: 		{{ $profile->phone}}  			<br>
		Email: 		{{ $profile->email}}  			<br>
		Website: 	{{ $profile->website}} 			<br>
		Facebook: 	{{ $profile->facebook}} 		<br>
		twittr: 	{{ $profile->twittr}} 			<br>
		tumblr: 	{{ $profile->tumblr}} 			<br>

</div>



<br><br>
@foreach($answers as $a)

	<?
	$photo = Photo::find($a->photoid);
	?>

	<div style="position:relative;  display:inline-block; width:33%;  height:400px;">
		<img src="../profileimages/{{$photo->filename}}" style="width:100%; height:100%; position:absolute;">	

		<div style="position:absolute; z-index:2; width:50%; ">
			<h2>
				{{$a->answer}}
			</h2>	
		</div>

		<div style="position:absolute; z-index:1; height:50%; width:50%; background-color:white;  opacity:0.5; ">
		</div>	
	</div>

@endforeach



@stop
