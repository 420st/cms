<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cms_posts', function(Blueprint $table) {
            $table->increments('id');
            $table->string('title', 100);
            $table->string('url', 200);
            $table->longText('content');
            $table->string('image', 200);
            $table->date('date');
            $table->integer('post_group_id');
            $table->integer('post_category_id');
            $table->boolean('active');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('cms_posts');
    }

}
