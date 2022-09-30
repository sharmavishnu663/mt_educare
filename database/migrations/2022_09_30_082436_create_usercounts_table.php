<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsercountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usercounts', function (Blueprint $table) {
            $table->id();
            $table->string('website_user')->nullable();
            $table->string('page_views')->nullable();
            $table->string('website_video')->nullable();
            $table->string('youtube_subscriber')->nullable();
            $table->string('youtube_video')->nullable();
            $table->string('social_followers')->nullable();
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
        Schema::dropIfExists('usercounts');
    }
}
