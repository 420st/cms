<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAttachmentsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attachments', function(Blueprint $table) {
            $table->increments('id');
            $table->string('path', 200);
            $table->string('name', 200);
            $table->string('title', 200);
            $table->integer('size');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('attachables', function(Blueprint $table) {
            $table->integer('attachment_id');
            $table->integer('attachable_id');
            $table->string('attachable_type', 100);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('attachments');
        Schema::drop('attachables');
    }

}
