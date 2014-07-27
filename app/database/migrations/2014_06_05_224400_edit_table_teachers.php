<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EditTableTeachers extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('teachers', function($table)
        {
        	$table->dropColumn('content');
            $table->text('nickname');
            $table->text('methodology');
            $table->text('phrases');
            $table->text('freak');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('teachers', function($table)
        {
            $table->dropColumn('nickname');
            $table->dropColumn('methodology');
            $table->dropColumn('phrases');
            $table->dropColumn('freak');
            $table->text('content');
        });
	}

}
