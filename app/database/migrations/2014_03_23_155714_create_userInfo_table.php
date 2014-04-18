<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUserInfoTable extends Migration {

	public function up()
	{
		Schema::create('userInfo', function(Blueprint $table) {
			$table->integer	('id', true);
			$table->integer	('bankTotal');
			$table->timestamps();
			$table->softDeletes();
		});
	}


	public function down()
	{
		Schema::drop('userInfo');
	}

}
