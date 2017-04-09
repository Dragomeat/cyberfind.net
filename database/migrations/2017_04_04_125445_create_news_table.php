<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')
                ->nullable()
                ->index();
            $table->string('title');
            $table->string('illustration');
            $table->string('slug')
                ->nullable()
                ->unique()
                ->index();
            $table->longText('content_source');
            $table->longText('content_rendered')
                ->nullable();
            $table->enum('status', [
                'draft',
                'review',
                'published',
            ])->default('draft');

            $table->timestamp('published_at');
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
        Schema::dropIfExists('news');
    }
}
