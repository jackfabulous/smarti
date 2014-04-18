<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTestTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('test', function(Blueprint $table) {
			$table->integer('id', true);
			$table->string('name');
			$table->string('username')->unique();
			$table->string('email')->unique();
			$table->string('password');
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
		Schema::drop('test');
	}

}
