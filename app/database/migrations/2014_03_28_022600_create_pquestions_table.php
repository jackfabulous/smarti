<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;


class CreatePquestionsTable extends Migration {

	public function up()
	{
		Schema::create('pquestions', function(Blueprint $table) {
			$table->integer			('uid');		// user who created thi q?
			$table->bigIncrements	('id',true);
			$table->string			('question'); 
			$table->string			('prompt'); 
			$table->boolean			('active'); 
	
			$table->integer			('order');		// position in lists			
			$table->integer			('weight');		// randomized position in lists			

			$table->timestamps();
			$table->softDeletes();	
		});
	}

	public function down()
	{
		Schema::drop('pquestions');
	}

}
