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
            $table->string('login')
                ->index();
            $table->string('email')
                ->index()
                ->unique();
            $table->string('password');
           // $table->string('avatar')->nullable();
           // $table->boolean('avatar_rendered')->default(false);

            $table->json('personal')
                ->nullable();
            $table->json('contacts')
                ->nullable();
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
