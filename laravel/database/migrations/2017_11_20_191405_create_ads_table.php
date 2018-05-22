<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ads', function (Blueprint $table) {
            $table->increments('id');
            $table->string('post_title');
            $table->longText('post_body');
            $table->string('company_email');
            $table->string('company_name');
            $table->string('company_website');
            $table->string('company_facebook');
            $table->string('company_logo');
            $table->string('company_location');
            $table->string('expiration_date');
            $table->string('apply_website');
            $table->string('apply_email');
            $table->boolean('deleted');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ads');
    }
}
