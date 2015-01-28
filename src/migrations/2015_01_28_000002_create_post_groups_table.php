<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostGroupsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cms_post_groups', function(Blueprint $table) {
            $table->increments('id');
            $table->string('name', 100);
            $table->integer('post_group_type_id');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('cms_post_group_types', function(Blueprint $table) {
            $table->increments('id');
            $table->string('name', 100);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('cms_post_groups');
        Schema::drop('cms_post_group_types');
    }

}
