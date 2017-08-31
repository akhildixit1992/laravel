<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Test extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('Articles', function($table)
          {
               $table->increments('id');
               $table->string('Name', 128);
               $table->string('Description', 128);
               $table->string('URL', 128);
               $table->string('Img_Path', 128);
               $table->string('Status', 128);
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
		 Schema::drop('Articles');
	}

}
