<html>
	<style>
		.photoThumb{
			padding:10px;
			width:100px;
			height:150px;
			display:inline-block;
		}
		.photoThumb img{
			border:1px solid gray;
			width:90px;
			height:90px;
		}

		.anAdFrame{
			padding:10px;
			margin:10px;
			border:1px solid gray;
			width:100%;
		}

		#userBox{
			padding:20px;			
			float:right;
			width:500px;
			text-align:right;
		}


	</style>
<script>
	var readyFns = [];
</script>	
<link rel="stylesheet" href="../../../css/bootstrap.css">

<!-- Optional theme -->
<link rel="stylesheet" href="../../../css/bootstrap-theme.min.css">
<link rel="stylesheet" href="../../../css/style.css">
<link rel="stylesheet" href="../../../css/bootstrap-dialog.min.css"></script>
<link rel="stylesheet" href="../../../css/datepicker3.css"></script>


<body>

<div id=userBox>
		
		@if(!Auth::check())              	
			{{ HTML::link('user/register', 'Register') }}
			|               	
			{{ HTML::link('login', 'Log In') }}
        @else
			{{ HTML::link('manage/account', 'Your Profile & Ads') }}
			|
			{{ HTML::link('user/update', 'Account Settings') }}
			|
			{{ HTML::link('user/logout', 'Log Out') }}
			 
			{{--ucfirst(strtolower(Auth::user()->name))--}}         
	    @endif
</div>


<div class=container>
	        


	<h1><a href="../">Roundheels</a></h1>      


	@yield('content')

</div>
</body>
</html>


<script src="../../../js/jq.js"></script>
<script src="../../../js/bootstrap.js"></script>
<script src="../../../js/bootstrap-dialog.min.js"></script>
<script src="../../../js/bootstrap-datepicker.js"></script>
<script>
	<?/* use:    readyFns.push(function(){alert('like so')})*/?>
    for (var i = 0; i < readyFns.length; i++) {readyFns[i]();}
</script>
