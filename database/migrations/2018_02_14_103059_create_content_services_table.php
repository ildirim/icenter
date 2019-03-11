<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContentServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('content_services', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->timestamps();
        });

        Schema::create('content_service_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('content_service_id')->unsigned();
            $table->string('title')->nullable();
            $table->string('content')->nullable();
            $table->string('locale')->index();

            $table->unique(['locale', 'content_service_id']);
            $table->foreign('content_service_id')->references('id')->on('content_services')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('content_services');
    }
}
