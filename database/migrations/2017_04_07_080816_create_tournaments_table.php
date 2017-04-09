<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTournamentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tournaments', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title')
                ->index();
            $table->mediumText('description');
            $table->json('map')->nullable();
            $table->integer('max_teams')
                ->default(256);
            /*
             * 'mirage',
             * 'nuke',
             * 'train',
             * 'dust2',
             * 'cobble',
             * 'overpass',
             * 'cache',
             * 'inferno'
             */
            $table->timestamp('holding_at');
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
        Schema::dropIfExists('tournaments');
    }
}
