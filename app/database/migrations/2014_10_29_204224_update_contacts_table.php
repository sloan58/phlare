<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class UpdateContactsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('contacts', function(Blueprint $table)
		{
            $table->string('dial_profile')->after('user_id');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('contacts', function(Blueprint $table)
		{
            $table->dropColumn('dial_profile');
            
		});
	}

}
