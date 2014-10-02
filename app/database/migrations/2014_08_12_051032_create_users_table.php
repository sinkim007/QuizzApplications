<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('question', function(Blueprint $table) {
			$table->increments('id');
			$table->string('topic', 1000);
			$table->smallInteger('correct_answer');
			$table->timestamps();
		});

		Schema::create('answer', function(Blueprint $table) {
			$table->increments('id');
			$table->string('answer_title', 255);

			$table->unsignedInteger('question_id');
	       	$table->foreign('question_id')->references('id')->on('question')->onDelete('cascade')->onUpdate('cascade');
	       	$table->dropForeign('answer_question_id_foreign');

			$table->timestamps();
		});

		Schema::create('users_role', function(Blueprint $table) {
			$table->increments('id');
			$table->string('name', 50)->unique();
			$table->timestamps();
		});
		 	
		Schema::create('users', function(Blueprint $table) {
			$table->increments('id');
			$table->string('username', 30)->unique();
			$table->string('email', 50);
			$table->string('picture', 255)->default('uploads/users/facepic.png');
			$table->string('firstname', 30);
			$table->string('lastname', 30);
			$table->string('password', 80);
			$table->string('address', 255);

			$table->unsignedInteger('user_role_id');
	       	$table->foreign('user_role_id')->references('id')->on('users_role')->onDelete('cascade')->onUpdate('cascade');
	       	$table->dropForeign('users_user_role_id_foreign');

			$table->string('city', 50);
			$table->string('country', 50);
			$table->string('phone', 50);
			$table->smallInteger('sex');
			$table->smallInteger('age');
			$table->date('date_birth');
			$table->string('about', 500);
			
			//Website
			$table->text('facebook');
			$table->text('link_in');
			$table->text('skype');
			$table->text('google_plus');
			$table->boolean('active')->default(0);
			$table->string('remember_token', 255);
			$table->timestamps();
		});

		Schema::create('results', function(Blueprint $table) {
			$table->increments('id');

			$table->unsignedInteger('user_id');
	       	$table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
	       	$table->dropForeign('results_user_id_foreign');
			
			$table->string('score', 11);
			$table->longText('question_quizzler_answer');
			$table->boolean('active')->default(0);
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
		Schema::drop('question');
		Schema::drop('answer');
		Schema::drop('users_role');
		Schema::drop('users');
		Schema::drop('results');
	}

}
