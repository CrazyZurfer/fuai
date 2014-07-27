<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTeachersCoursesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('teachers_courses', function(Blueprint $table) {
			$table->integer('teacher_id')->unsigned();
			$table->foreign('teacher_id')->references('id')->on('teachers')->onDelete('cascade');
			$table->integer('course_id')->unsigned();
			$table->foreign('course_id')->references('id')->on('courses')->onDelete('cascade');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('teachers_courses');
	}

}
