<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;


class CreatePanswersTable extends Migration {


	public function up()
	{

		Schema::create('panswers', function(Blueprint $table) {
				$table->integer			('uid');		// user who answered this q
				$table->integer			('qid');		// id of the source q, null if original
				$table->bigIncrements	('id',true);	

				$table->string			('question');
				$table->string			('answer');
				$table->string			('prompt'); 
				$table->string			('photoid'); 

				$table->boolean			('active'); 
				$table->enum			('source',array('provided', 'modified', 'custom')); 

				$table->integer			('order');		// position in lists			
				$table->integer			('weight');		// randomized position in lists			

				$table->timestamps();
				$table->softDeletes();	
			});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('panswers');
	}

}
