<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('contacts', function (Blueprint $table) {
			$table->increments('id');
			$table->integer('church_id');
			$table->string('name', 150);
			$table->string('role', 150);
			$table->string('email', 150)->nullable();
			$table->string('phone', 150)->nullable();
			$table->string('vk', 150)->nullable();
			$table->string('facebook', 150)->nullable();
			$table->string('image', 150)->nullable();
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
		Schema::dropIfExists('contacts');
	}
}
