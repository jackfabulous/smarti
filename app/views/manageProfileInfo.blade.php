@extends('layout')

@section('content')

@include ('NavManage')

<? $profile=Profile::find(Auth::user()->id);?>

<h4>Profile Info</h3>

		Entertainer Name: {{ $profile->entName }}	<br>
		Height: {{ $profile->height}}  				<br>
		Weight: {{ $profile->weight}}  				<br>
		Gender: {{ $profile->hair}}  				<br><br>
		<h4>Contact </h4>
		Phone: 		{{ $profile->phone}}  				<br>
		Email: 		{{ $profile->email}}  				<br>
		Website: 	{{ $profile->website}} 				<br>
		Facebook: 	{{ $profile->facebook}} 			<br>
		twittr: 	{{ $profile->twittr}} 			<br>
		tumblr: 	{{ $profile->tumblr}} 			<br>

		<br><br>
		{{ Form::model($profile, array('url'=>'manage/profileUpdate')) }} 				

		  <div class="form-group">
			<h4>Entertainer Name (as shown in your ads)</h4>
			  	{{ Form::text('entName', null, array('class'=>'input-block-level', 'placeholder'=>'Entertainer Name')) }}
			<h4>Gender</h4>
				{{Form::select('gender', array('male' => 'male', 'female' => 'female'))}}
<?/*			
			$table->string	('entName');
			$table->enum	('gender', array('male', 'female')); 
			$table->string	('height');
			$table->string	('weight');
			$table->enum	('hair', array('blond', 'brunette', 'black', 'red')); 
			$table->string	('phone');
			$table->string	('email');
			$table->string	('website');
			$table->string	('facebook');
			$table->string	('twitter');
			$table->string	('tumblr');
*/?>

			<h4>Measurements</h4>			
				Height, Weight, Bust, Waist, Hips(?)<br>
				{{ Form::text('height', null, array('class'=>'input-block-level', 'placeholder'=>'Height')) }} <br>
				{{ Form::text('weight', null, array('class'=>'input-block-level', 'placeholder'=>'Weight')) }} <br>
				hair<br>
				{{ Form::select('hair', array('blond' => 'blond', 'brunette' => 'brunette', 'brunette' => 'brunette', 'black' => 'black', 'red' => 'red')) }}<br>
			<h4>Getting in Touch (this is how customers will contact you)</h4>
				Phone<br>		
				{{ Form::text('phone', null, array('class'=>'input-block-level', 'placeholder'=>'Phone #')) }}
				<br>
				Email	<br>			
				{{ Form::text('email', null, array('class'=>'input-block-level', 'placeholder'=>'email')) }}
			

			<h4>Links</h4>
				Website<br>				
				{{ Form::text('website', null, array('class'=>'input-block-level', 'placeholder'=>'Website URL')) }}	<br>		
				Facebook<br>
				{{ Form::text('facebook', null, array('class'=>'input-block-level', 'placeholder'=>'facebook')) }}	<br>
				Twitter <br>
				{{ Form::text('twitter', null, array('class'=>'input-block-level', 'placeholder'=>'twitter')) }}	<br>
				Tumblr <br>
				{{ Form::text('tumblr', null, array('class'=>'input-block-level', 'placeholder'=>'tumblr')) }}	<br>
				
				
				
				<div id='otherLink' style="display:none">
					does nothing
					Other Link (Text that people will see):<br>
					{{ Form::text('Height', null, array('class'=>'input-block-level', 'placeholder'=>'Waish')) }}<br>
					Other Link (Address of new link):<br>
					{{ Form::text('Height', null, array('class'=>'input-block-level', 'placeholder'=>'Waish')) }}<br>
					<br>
				</div>
			
				<br>
				<a class="btn btn-default" href='#' onclick="$('#otherLink').slideDown(); return false;">Add Another Link</a>
				<br><br>
				 
				{{ Form::submit('Update Profile Info', array('class'=>'btn btn-large btn-primary btn-block'))}}
			{{ Form::close() }}

		  </div>
		</form>






@stop
