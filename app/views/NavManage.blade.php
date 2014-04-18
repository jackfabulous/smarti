
<?
	$adCount = 		DB::table('ads')->where('uid', '=', Auth::user()->id)->count();
	$answerCount = 	DB::table('panswers')->where('uid', '=', Auth::user()->id)->count();	
	$questionCount= DB::table('pquestions')->where('uid', '=', Auth::user()->id)->count();	
	$photoCount = 	DB::table('photos')->where('uid', '=', Auth::user()->id)->count();
	$userInfo = 	UserInfo::find(Auth::user()->id);
?>			

<h2>	
	Profile Manager 
<a class="btn btn-default" href="/profile/{{Auth::user()->id}}">See My Profile ></a>
</h2>

<div style="display:inline-block; padding-right:40px;">
	<b>Your Profile :</b>
	<br>
	<div class=btn-group>
		<a class="btn btn-default" href='/manage/profile/info'>Basic Info</a>
		<a class="btn btn-default" href='/manage/profile/questions'>Profile Questions [{{$answerCount}} of {{$questionCount}} active]</a>
		<a class="btn btn-default" href='/manage/photos'>Profile Photos [{{$photoCount}}]</a>
	</div>
</div>	



<div style="display:inline-block; ">
	<b>Your Ads:</b>
	<br>
	<div class=btn-group>		
	   	<a class="btn btn-default"  href='/manage/ads'>Manage ads [{{$adCount}} active ads]</a> 
		<a class="btn btn-default" href='/manage/bank'>Bank [{{$userInfo->bankTotal}} credits] </a>
	</div>
</div>

<br><br>	

@if (Session::get('message')!='')
	<ul class="list-group">
	  <li class="list-group-item list-group-item-danger">{{Session::get('message');}}</li>
	</ul>

@endif

  <ul>
      @foreach($errors->all() as $error)
         <li>{{ $error }}</li>
      @endforeach
   </ul>



