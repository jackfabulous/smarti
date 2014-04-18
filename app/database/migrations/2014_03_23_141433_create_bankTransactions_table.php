<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBankTransactionsTable extends Migration {

	public function up()
	{
		Schema::create('bankTransactions', function(Blueprint $table) {
			$table->integer	('id', true);
			$table->integer	('uid');
			$table->enum	('type', array('withdrawl', 'deposit')); 
			$table->integer	('amount');
			$table->enum	('depSource', array('none','cc', 'bank', 'paypal', 'btc', 'other')); 
			$table->timestamps();
			$table->softDeletes();	
		});

	}


	public function down()
	{
		Schema::drop('bankTransactions');
	}

}
