<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommonLoremsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('common_lorems', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
        });

        Schema::create('common_lorem_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('common_lorem_id')->unsigned();
            $table->string('title11')->nullable();
            $table->string('title12')->nullable();
            $table->text('content1')->nullable();
            $table->string('title2')->nullable();
            $table->text('content2')->nullable();
            $table->string('title3')->nullable();
            $table->string('title4')->nullable();
            $table->text('content4')->nullable();
            $table->string('locale')->index();

            $table->unique(['locale', 'common_lorem_id']);
            $table->foreign('common_lorem_id')->references('id')->on('common_lorems')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('common_lorems');
    }
}
