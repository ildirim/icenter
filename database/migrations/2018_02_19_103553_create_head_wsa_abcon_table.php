<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHeadWsaAbconTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('head_wsa_ab_con', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->string('image')->nullable();
            $table->timestamps();
        });

        Schema::create('head_wsa_ab_con_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('head_wsa_ab_con_id')->unsigned();
            $table->text('content')->nullable();
            $table->string('locale')->index();

            $table->unique(['locale', 'head_wsa_ab_con_id']);
            $table->foreign('head_wsa_ab_con_id')->references('id')->on('head_wsa_ab_con')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('head_wsa_ab_con');
    }
}
