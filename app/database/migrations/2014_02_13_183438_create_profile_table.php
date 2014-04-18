<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProfileTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('profile', function(Blueprint $table) {
			$table->integer	('id', true);
			$table->string	('entName');
			$table->enum	('gender', array('male', 'female')); 
			$table->string	('height');
			$table->string	('weight');
			$table->enum	('hair', array('blond', 'brunette', 'black', 'red')); 
			$table->string	('phone');
			$table->string	('email');
			$table->string	('website');
			$table->string	('facebook');
			$table->string	('twitter');
			$table->string	('tumblr');

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
		Schema::drop('profile');
	}

}
