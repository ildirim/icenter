<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommonInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('common_infos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('image')->nullable();
            $table->timestamps();
        });

        Schema::create('common_info_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('common_info_id')->unsigned();
            $table->string('title1')->nullable();
            $table->string('title2')->nullable();
            $table->string('content')->nullable();
            $table->string('locale')->index();

            $table->unique(['locale', 'common_info_id']);
            $table->foreign('common_info_id')->references('id')->on('common_infos')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('common_infos');
    }
}
