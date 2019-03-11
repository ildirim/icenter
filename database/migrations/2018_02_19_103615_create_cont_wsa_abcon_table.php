<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContWsaAbconTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cont_wsa_ab_con', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->timestamps();
        });

        Schema::create('cont_wsa_ab_con_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('cont_wsa_ab_con_id')->unsigned();
            $table->string('title')->nullable();
            $table->string('content')->nullable();
            $table->string('locale')->index();

            $table->unique(['locale', 'cont_wsa_ab_con_id']);
            $table->foreign('cont_wsa_ab_con_id')->references('id')->on('cont_wsa_ab_con')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cont_wsa_abcon');
    }
}
