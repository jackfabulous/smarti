@extends('layout')

@section('content')

@include ('NavAdmin')

	<h3>Users</h3>
	<ul>
	@foreach($users as $user)
		<li>
			real name: {{ $user->name }}<br>
			user name: {{ $user->username}}
			[id:<b>{{ $user->id }}</b>]
			<br>
			{{ $user->email }}		<br><br>
		</li>
	@endforeach
	</ul>


@stop


