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
            $table->string('organizer');
            $table->string('link');
            $table->mediumText('description');

            $table->enum('type', [
                'pro',
                'amateur',
            ])->default('pro');

            /*
             * Money
             */
            $table->string('prize_fund');
            $table->string('entrance_fee');
            $table->string('logotype')->nullable();
            $table->string('logotype_rendered')->default(false);

            $table->float('rating')
                ->default(0);

            $table->timestamp('holding_at');
            $table->timestamp('qualification_at');
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
