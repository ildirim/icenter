<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEasySponsorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('easy_sponsors', function (Blueprint $table) {
            $table->increments('id');
            $table->string('image')->nullable();
            $table->timestamps();
        });

        Schema::create('easy_sponsor_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('easy_sponsor_id')->unsigned();
            $table->string('title')->nullable();
            $table->string('locale')->index();

            $table->unique(['locale', 'easy_sponsor_id']);
            $table->foreign('easy_sponsor_id')->references('id')->on('easy_sponsors')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('easy_sponsors');
    }
}
