@extends('layout')

@section('content')

@include ('NavManage')


<h3>Your active ads</h3>
<a href="ads/create" class="btn btn-default"> Create a new ad</a>
<br><br>

<?
$ads = DB::table('ads')->where('uid', '=', Auth::user()->id)->get();
?>



@foreach($ads as $ad)
	<?$photo=Photo::find($ad->photoid)?>
	<div class="panel panel-default">
	  	<div class="panel-heading">
			<h3 class="panel-title"></h3>
	  	</div>
	  	<div class="panel-body">
			<div style="width:200px;  height:200px;  border:1px solid gray; float:right;">
				
				<img src="../profileimages/{{$photo->filename}}" width=100% height=100%>
			</div>			

			<h3>{{$ad->headline}}</h3>
			<h4>{{$ad->blurb}}</h4>

			runs from {{$ad->start}} to {{$ad->end}}<br>
			<br>
			
			<div class="btn btn-default"  onclick="deleteConfirm({{$ad->id}})" >Delete this ad</div>
			<a href="ads/edit/{{$ad->id}}"  class="btn btn-default">Edit this ad</a>
 
	  	</div>
	</div>
@endforeach




<script>
	function deleteConfirm(adId){
		BootstrapDialog.show({
		        title: 'Delete Ad',
		        message: 'Are you sure you want to delete this ad?',
		        buttons: [{
		            label: 'Delete Ad',
		            action: function(dialog) {
		                dialog.setTitle(adId);
						location.href="ads/delete/"+adId;
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
