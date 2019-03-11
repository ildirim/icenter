<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePriPartTarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pri_part_tars', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->string('image')->nullable();
            $table->timestamps();
        });

        Schema::create('pri_part_tar_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('pri_part_tar_id')->unsigned();
            $table->string('title')->nullable();
            $table->text('content')->nullable();
            $table->string('locale')->index();

            $table->unique(['locale', 'pri_part_tar_id']);
            $table->foreign('pri_part_tar_id')->references('id')->on('pri_part_tars')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pri_part_tars');
    }
}
