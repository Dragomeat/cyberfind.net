<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('login');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('avatar')->nullable();
            $table->boolean('avatar_rendered')->default(false);

            $table->integer('age')->nullable();
            $table->enum('gender', [
                'female',
                'male',
            ])->nullable();
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('middle_name')->nullable();
            $table->enum('country', [
                'ru',
                'ua',
                'us',
                'cn',
            ])->nullable();
            $table->string('city')->nullable();
            $table->mediumText('about')->nullable();
            $table->string('skype')->nullable();
            $table->string('telephone')->nullable();

            $table->boolean('show_email')->default(false);
            $table->boolean('is_confirmed')->default(false);
            $table->enum('role', [
                'user',
                'moderator',
                'administrator',
                'chief',
            ])->default('user');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
