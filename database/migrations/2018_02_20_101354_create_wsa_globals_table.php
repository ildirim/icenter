<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWsaGlobalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wsa_globals', function (Blueprint $table) {
            $table->increments('id');
            $table->string('image')->nullable();
            $table->timestamps();
        });

        Schema::create('wsa_global_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('wsa_global_id')->unsigned();
            $table->string('title')->nullable();
            $table->string('locale')->index();

            $table->unique(['locale', 'wsa_global_id']);
            $table->foreign('wsa_global_id')->references('id')->on('wsa_globals')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('wsa_globals');
    }
}
