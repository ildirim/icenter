<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHeadServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('head_services', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->string('image')->nullable();
            $table->timestamps();
        });

        Schema::create('head_service_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('head_service_id')->unsigned();
            $table->string('title1')->nullable();
            $table->string('title2')->nullable();
            $table->text('content')->nullable();
            $table->string('locale')->index();

            $table->unique(['locale', 'head_service_id']);
            $table->foreign('head_service_id')->references('id')->on('head_services')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('head_services');
    }
}
