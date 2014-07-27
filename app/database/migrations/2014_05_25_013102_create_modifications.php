<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateModifications extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('modifications', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('teacher_id')->unsigned();
			$table->foreign('teacher_id')->references('id')->on('teachers')->onDelete('cascade');
			$table->text('content');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('modifications');
	}

}
