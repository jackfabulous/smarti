<?
	$photos = DB::table('photos')->where('uid', '=', Auth::user()->id)->get();
?>

<div style="display:none" id="pPickerContent">
	
	{{ Form::open(array('url'=>'/manage/photos/upload', 'class'=>'form-signin',  'files' => true)) }}	

		{{ Form::file('image') }}
		{{ Form::submit('Choose  files', array('class'=>'btn btn-large btn-primary btn-block'))}}
	{{ Form::close() }}

	<hr>Or Choose from your photo library<hr>

	<h4>Choose  photo</h4>
	@foreach($photos as $photo)
		<img onclick='selectPhoto(_inputEl,_thumbHolderEl,_thumbEl,"{{$photo->id}}","../../../profileimages/{{$photo->filename}}")' style="width:100px; height:100px;  border:2px solid gray;" src="../../../profileimages/{{$photo->filename}}"> ({{$photo->id}}) 
	@endforeach

</div>

<script>


	function selectPhoto(inputEl,thumbHolderEl,thumbEl,photoId,photoURL){  // update after photo is picked		
		$(inputEl).val(photoId);
		BootstrapDialog.closeAll();
		$(thumbHolderEl)[0].style.display="block";
		$(thumbEl)[0].src=photoURL 
	}


	function pickPhoto(inputEl,thumbHolderEl,thumbEl){	// summon the photo picker!
	
		_inputEl=inputEl;
		_thumbHolderEl=thumbHolderEl;
		_thumbEl=thumbEl;
		
		dialogContent=$("#pPickerContent")[0].innerHTML;
		BootstrapDialog.show({
		        title: 'Select a photo for this section',
		        message: dialogContent,
		        buttons: [{
		            label: 'Cancel',
		            action: function(dialog) {
						dialog.close();
					}
		        }]
		 });	
	}


</script>

