<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDirectoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('directories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->string('twitter')->nullable();
            $table->string('facebook')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('image')->nullable();
            $table->timestamps();
        });

        Schema::create('directory_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('directory_id')->unsigned();
            $table->string('name')->nullable();
            $table->string('position')->nullable();
            $table->string('content')->text();
            $table->string('locale')->index();

            $table->unique(['locale', 'directory_id']);
            $table->foreign('directory_id')->references('id')->on('directories')->onDelete('cascade')->onUpdate('cascade');
        });

    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('directories');
    }
}
