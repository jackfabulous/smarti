<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAdsTable extends Migration {

	public function up()
	{
		Schema::create('ads', function(Blueprint $table) {
			$table->integer			('uid');
			$table->bigIncrements	('id',true);
			$table->string			('headline'); 
			$table->string			('blurb'); 
			$table->integer			('photoid'); 
			$table->date			('start');
			$table->date			('end');
			$table->enum			('size', array('mini', 'standard', 'large', 'mega')); 
			$table->integer			('visibility');			
			$table->timestamps();
			$table->softDeletes();	
		});
	}


	public function down()
	{
		Schema::drop('ads');
	}

}
