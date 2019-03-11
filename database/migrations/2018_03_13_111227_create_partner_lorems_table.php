<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePartnerLoremsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('partner_lorems', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
        });

        Schema::create('partner_lorem_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('partner_lorem_id')->unsigned();
            $table->string('title1')->nullable();
            $table->string('title2')->nullable();
            $table->text('content')->nullable();
            $table->string('locale')->index();

            $table->unique(['locale', 'partner_lorem_id']);
            $table->foreign('partner_lorem_id')->references('id')->on('partner_lorems')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('partner_lorems');
    }
}
