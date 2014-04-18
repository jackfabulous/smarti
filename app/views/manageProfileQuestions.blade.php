@extends('layout')

@section('content')

@include ('NavManage')

<h3>Profile Questions</h3>



<?
$questions=Pquestion::all();
?>

<div class="panel-group" id="accordion">


@foreach($questions as $q)
	<div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapse{{$q->id}}">
  		 {{ $q->question }}<br>
			<small>{{ $q->prompt }}</small>
		
		</a>
	  </h4>
	</div>
    <div id="collapse{{$q->id}}" class="panel-collapse collapse  ">
      <div class="panel-body">
		

	<?

	$theA = DB::table('panswers')->where('uid', '=', Auth::user()->id)->where('qid','=',$q->id)->first();

	?>

	

			{{ Form::model($theA, array('url'=>'/manage/profile/questions/answer/'.$q->id)) }} 				
			{{-- Form::open(array('url'=>'/manage/profile/questions/answer/'.$q->id, 'class'=>'form-signin')) --}}	

				{{ Form::textarea("answer", null, array('class'=>'form-control','name'=>'answer')); }}
				<br>


				<?$thePhoto = 		$photo=Photo::find($theA->photoid);?>
				
				<div onclick="pickPhoto('.photo{{$q->id}}','#photoThumbHolder{{$q->id}}','#photoThumb{{$q->id}}','{{$q->id}}','../../profileimages/{{$thePhoto->filename}}')" class="btn btn-default">Select a photo to go with this section</div>
				{{Form::hidden("photoid", null, array('class'=>'form-control photo'.$q->id,'name'=>'photoid'));}}
				
					
					@if ($theA!=NULL )
						<div style="width:150px;  height:100px; border:2px solid gray; float:right" id=photoThumbHolder{{$q->id}}>
								
								<img src="../../profileimages/{{$photo->filename}}" style="height:100%;  width:100%;" id=photoThumb{{$q->id}} >
						</div>
					@else
						<div style="width:100px;  height:100px; border:2px solid gray; display:none;" id=photoThumb{{$q->id}}>
						</div>
					@endif

				<div class="radio ">
				  	<label>
						<input type="radio"   name="optionsRadios" id="optionsRadios1" value="option1" checked >
						Show this Question
				  	</label>
				</div>
				<div class="radio">
				  	<label>
					<input type="radio" name="optionsRadios" checked  id="optionsRadios2" value="option2">
						Hide this Question	
				  	</label>
				</div>

				{{ Form::submit('Save', array('class'=>'btn btn-default'))}}
			{{ Form::close() }}		
      </div>
    </div>
</div>

	@endforeach

	





</div>
<br><br><br><br>



@include ('incPhotoPicker')




{{--


<div style="display:none" id="pPickerContent">
	<?
		$photos = DB::table('photos')->where('uid', '=', Auth::user()->id)->get();
	?>
	<h4>Choose a photo</h4>
	@foreach($photos as $photo)
		
		<? if ($photo->active==true){?>			
			<img onclick='selectPhotoId(theAid,{{$photo->id}})' style="width:100px; height:100px;  border:2px solid gray;" src="../../profileimages/{{$photo->filename}}"> ({{$photo->id}}) 
	
		<?}?>
	@endforeach

</div>

<script>
	function selectPhotoId(aid,photoId){
		$('.photo'+aid).val(photoId);
		BootstrapDialog.closeAll();
		$('#photoThumb'+aid)[0].style.display="block";
		$('#photoThumb'+aid)[0].innerHTML=photoId 
	}

	function selectPhoto(aid){
		theAid=aid;
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
--}}

@stop
