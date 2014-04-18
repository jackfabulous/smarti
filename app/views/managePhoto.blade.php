@extends('layout')

@section('content')

@include ('NavManage')

<h3>Your Photos</h3>

{{--<a href="/manage/photos/upload" class="btn btn-default" > Upload Photo(s)</a>--}}


{{ Form::open(array('url'=>'/manage/photos/upload', 'class'=>'form-signin',  'files' => true)) }}	
	{{ Form::file('image') }}
	{{ Form::submit('Upload Photos', array('class'=>'btn btn-large btn-primary btn-block'))}}
{{ Form::close() }}




<br><br>

<?
$photos = DB::table('photos')->where('uid', '=', Auth::user()->id)->get();
?>


<h4>Active Photos</h4>
@foreach($photos as $photo)
	<? /*if ($photo->active==true){*/?>	
	<div class='photoThumb'>
		<img src="../../profileimages/{{$photo->filename}}"> 
		<div class=btn-group>
		
		<?/*	<a href="photos/deactivate/{{$photo->id}}"" class="btn btn-default btn-xs"  >Deactivate</a>*/?>
			<div class="btn btn-default btn-xs" data-toggle="modal" data-target="#editPhoto" >Edit</div>
			<div class="btn btn-default btn-xs" onclick="deleteConfirm({{$photo->id}})">Delete</div>

		</div>	
	</div>		
	<?/*}*/?>
@endforeach
<br><br>



<br><br><br>
<script>
	function deleteConfirm(photoId){
		BootstrapDialog.show({
		        title: 'Delete Photo',
		        message: 'Are you sure you want to delete this photo? [photo #'+photoId+']',
		        buttons: [{
		            label: 'Delete Photo',
		            action: function(dialog) {
						location.href="photos/delete/"+photoId;
		            }
		        }, {
		            label: 'Cancel',
		            action: function(dialog) {
		                dialog.close();
		            }
		        }]
		 });	
	}

/*	function activate(photoId, activateIt){
		BootstrapDialog.show({
		        title: 'Acivate Photo',
		        message: '	<label for="exampleInputPassword1">	Show this photo in your profile?</label><div class="radio"><label><input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>	<b>Show</b> this photo in my profile </label>	</div><div class="radio"><label><input type="radio" name="optionsRadios" id="optionsRadios2" value="option2"><b>Hide</b> this photo in my profile</b>	</label></div> [photo #'+photoId+']',
		        buttons: [{
		            label: 'Update',
		            action: function(dialog) {
						
						if(	$('#optionsRadios1').is(':checked')  ){
							location.href="photos/activate/"+photoId;
						}
						if (	$('#optionsRadios2').is(':checked'))  {
							location.href="photos/deactivate/"+photoId;
						}
						//dialog.close();		            
					}
		        }, {
		            label: 'Cancel',
		            action: function(dialog) {
		                dialog.close();
		            }
		        }]
		 });	
	}*/

</script>




<?/*
			    <label for="exampleInputPassword1">	Show this photo in your profile?</label>
				<div class="radio">
				  <label>
			
					<input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
					<b>Show</b> this photo in my profile
				  </label>
				</div>
				<div class="radio">
				  <label>
					<input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
					<b>Hide</b> this photo in my profile</b>	
				  </label>
*/?>


<!-- Modal -->
<div class="modal fade" id="editPhoto" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Edit Photo</h4>
      </div>
      <div class="modal-body">
        This will be the amazing blur tool<br>
		Will it also include a cropping do-dad?  If so, should play well with the auto-layout stuff?<br>
		Perhaps this is also where you add a watermark?  possibly that is an account-level option.
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Done</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->




@stop
