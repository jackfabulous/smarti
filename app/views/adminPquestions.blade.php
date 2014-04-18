@extends('layout')

@section('content')

@include ('NavAdmin')



<a href="/admin/questions/create" class="btn btn-default" > Add a new question</a>

<?
$questions=Pquestion::all();
?>

	<h3>Admin Profile Questions</h3>
	<ul>
	@foreach($questions as $q)
		<li>
			Question: 	{{ $q->question }}<br>
			Prompt: 	{{ $q->prompt }}

			<a href="/admin/questions/edit/{{$q->id}}" class="btn btn-default" > Edit this question</a>
		</li>
	@endforeach
	</ul>


@stop


