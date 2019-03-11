<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMediaProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('media_products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->string('image')->nullable();
            $table->string('video')->nullable();
            $table->timestamps();
        });

        Schema::create('media_product_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('media_product_id')->unsigned();
            $table->text('image_content')->nullable();
            $table->string('lorem_title')->nullable();
            $table->text('lorem_content')->nullable();
            $table->string('video_title')->nullable();
            $table->text('video_content')->nullable();
            $table->string('locale')->index();

            $table->unique(['locale', 'media_product_id']);
            $table->foreign('media_product_id')->references('id')->on('media_products')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('media_products');
    }
}
