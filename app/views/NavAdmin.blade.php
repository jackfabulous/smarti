<h2>
	Admin Dashboard 
</h2>

	<div class=btn-group>
		<a class="btn btn-default" href='/admin/users'>List Users</a>
		<a class="btn btn-default" href='/admin/questions'>Manage Profile Questions</a>
		<a class="btn btn-default" href='/admin/locations'>Manage Locations</a>
	</div>	

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



<br><br>	
