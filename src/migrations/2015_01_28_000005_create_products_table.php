<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cms_products', function(Blueprint $table) {
            $table->increments('id');
            $table->string('name', 200);
            $table->longText('description');
            $table->integer('product_merchant_id');
            $table->integer('product_category_id');
            $table->decimal('marked_price');
            $table->decimal('selling_price');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('cms_product_categories', function(Blueprint $table) {
            $table->increments('id');
            $table->string('name', 200);
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('cms_product_merchants', function(Blueprint $table) {
            $table->increments('id');
            $table->string('name', 200);
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
        Schema::drop('cms_products');
        Schema::drop('cms_product_categories');
        Schema::drop('cms_product_merchants');
    }

}
