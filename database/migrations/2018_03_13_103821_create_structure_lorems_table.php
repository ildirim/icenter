<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStructureLoremsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('structure_lorems', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
        });

        Schema::create('structure_lorem_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('structure_lorem_id')->unsigned();
            $table->string('title1')->nullable();
            $table->string('title2')->nullable();
            $table->text('content')->nullable();
            $table->string('locale')->index();

            $table->unique(['locale', 'structure_lorem_id']);
            $table->foreign('structure_lorem_id')->references('id')->on('structure_lorems')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('structure_lorems');
    }
}
