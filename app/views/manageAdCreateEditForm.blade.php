


	  <div class="form-group">
		<h4>Ad Headline</h4>
	  	{{ Form::text('headline', null, array('class'=>'input-block-level', 'placeholder'=>'Ad Headline')) }}
		<h4>Blurb</h4>
	 	{{ Form::text('blurb', null, array('class'=>'input-block-level', 'placeholder'=>'Blurb')) }}
		<h4>Size</h4>
		{{ Form::select('size', array('mini' => 'mini', 'standard' => 'standard', 'large' => 'large', 'mega' => 'mega')) }}
		<br>
		<div onclick="pickPhoto('.photoid','#photoThumb','#photoImage')" class="btn btn-default">
			Select photo
		</div>
		{{Form::hidden("photoid", null, array('class'=>'form-control photoid','name'=>'photoid'));}}
	
		@if (isset($ad) )
			<div style="width:150px;  height:150px; border:2px solid gray; float:right" id=photoThumb>						
					<?
						var_dump ($ad);
					
					$thePhoto = 		$photo=Photo::find($ad[0]->photoid);?>
					<img id="photoImage" src="../../profileimages/{{$photo->filename}}" style="height:100%;  width:100%;" >
			</div>
		@else
			<div style="width:100px;  height:100px; border:2px solid gray; display:none;" id=photoThumb>
					<img id="photoImage" src="" style="height:100%;  width:100%;" >		
			</div>
		@endif

		<br>
		<br>		

		<h4>Select Date Range</h4>			
		
		<div class="input-daterange input-group" id="datepicker">
			  	{{ Form::text('start', null, array('class'=>'input-sm form-control', 'placeholder'=>'start date')) }}
			<span class="input-group-addon">to</span>
			  	{{ Form::text('end', null, array('class'=>'input-sm form-control', 'placeholder'=>'end Date')) }}
		</div>
	</div>


	<script>
	
	readyFns.push(function(){
		$('.input-daterange').datepicker({
			todayHighlight: true,
			format: "yyyy/mm/dd"
		});
	});
	
	readyFns.push(function(){
		$('#testCal').datepicker({});
	});

	readyFns.push(function(){
		//$('#datePicker input').val(($(this).val().split('-').join('/')))
$( "#datePicker input" ).each(function() {
  $( this ).val($(this).val().split('-').join('/'));
});
	})

	</script>



<?/*

<br><br><br><br><br><br><br><br>
Pretty, but not working form below:


<div class="panel panel-default">
	<div class="panel-body">

		<form role="form" action="../ads">
		  <div class="form-group">
			<label for="exampleInputEmail1">Name your ad</label>
			<input type="email" class="form-control" id="exampleInputEmail1" placeholder="Ad #1">
		  </div>
		  <div class="form-group">
			<label for="exampleInputPassword1">Ad Start Date</label>
			<select class="form-control">
			  <option>1/31/78</option>
			  <option>this</option>
			  <option>will</option>
			  <option>actually</option>
			  <option>be the jquery</option>
			  <option>date picker</option>
			</select>
		  </div>

		  <div class="form-group">
			<label for="exampleInputPassword1">Ad Start Date</label>
			<select class="form-control">
			  <option>1/31/78</option>
			  <option>this</option>
			  <option>will</option>
			  <option>actually</option>
			  <option>be the jquery</option>
			  <option>date picker</option>
			</select>
		  </div>


		<div class="panel panel-default">
			<div class="panel-body">

				<label for="exampleInputPassword1">Turn this ad <b>on</b> or <b>off</b></label>
				<div class="radio">
				  <label>
			
					<input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
					Ad is inactive
				  </label>
				</div>
				<div class="radio">
				  <label>
					<input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
					Active	
				  </label>
				</div>
			</div>
		</div>
 I don't actually know what will be in this form<br> <br>
		  <button type="submit" class="btn btn-default">Submit</button>
		  <button type="submit" class="btn btn-default">Cancel</button>

		 
		</form>
	</div>
</div>
*/?>
