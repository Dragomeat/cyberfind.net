<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teams', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('age_min')
                ->default(18);
            $table->integer('age_max')
                ->nullable();
            $table->string('city');
            $table->string('goal');
            $table->mediumText('goal_text');
            $table->mediumText('join_additional')
                ->nullable();
            $table->integer('command_limit')
                ->nullable();
            $table->json('contacts')
                ->nullable();
            $table->timestamps();
        });

        Schema::create('team_map', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('team_id')
                ->unsigned();
            $table->enum('map', [
                'mirage',
                'nuke',
                'train',
                'dust2',
                'cobble',
                'overpass',
                'cache',
                'inferno',
            ]);
        });

        Schema::create('team_user', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('team_id')
                ->unsigned();
            $table->integer('user_id')
                ->unsigned();
            $table->enum('role', [
                'commander',
                'main_part',
                'additional_part',
                'manager',
            ]);
            $table->enum('status', [
                'pending',
                'accepted',
                'rejected',
            ])->default('pending');

            $table->string('role_text')
                ->nullable();
        });

        Schema::create('team_tournament', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('team_id')
                ->unsigned();
            $table->integer('tournament_id')
                ->unsigned();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('teams');
        Schema::dropIfExists('team_map');
        Schema::dropIfExists('team_user');
        Schema::dropIfExists('team_tournament');
    }
}
