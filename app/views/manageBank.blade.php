@extends('layout')

@section('content')

@include ('NavManage')

<?$userInfo = UserInfo::find(Auth::user()->id);?>


<h3>Your Bank</h3>
You have {{$userInfo->bankTotal}} credits

<h4> Add Credits </h4>
<div class="btn btn-default" onclick="addCredits()">Add credits via Credit Card</div>
<br><br>
<div class="btn btn-default" onclick="addCredits()">Add credits via Bank Deposit</div>
<br><br>
<div class="btn btn-default" onclick="addCredits()">Add credits via Pay Pal</div>
<br><br>
<div class="btn btn-default" onclick="addCredits()">Add credits via [Bit Coin]</div>


<script>
	function addCredits(){
		BootstrapDialog.show({
		        title: 'Buy Credits',
		        message: 'This is a placeholder for the purchase gateway.  <br><br> Type an amount to add it to your account <input id=addAmount type=text>',
		        buttons: [{
		            label: 'Add Credits',
		            action: function(dialog) {
						amt=$('#addAmount').val()
		                location.href='../../manage/bank/add/'+amt;
		            }
		        }, {
		            label: 'Cancel',
		            action: function(dialog) {
		                dialog.close();
		            }
		        }]
		 });	
	}
</script>



@stop
