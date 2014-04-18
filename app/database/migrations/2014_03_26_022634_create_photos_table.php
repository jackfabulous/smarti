<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;


class CreatePhotosTable extends Migration {

	public function up()
	{
		Schema::create('photos', function(Blueprint $table) {
			$table->bigIncrements	('id',true);
			$table->integer			('uid');
			$table->string			('filename'); 
			
			$table->integer			('width');
			$table->integer			('height');

			$table->boolean			('active'); 
			$table->timestamps();
			$table->softDeletes();	
		});
	}

	public function down()
	{
		Schema::drop('photos');
	}

}
