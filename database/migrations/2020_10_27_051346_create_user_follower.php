<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserFollower extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_follower', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('following_id');
            $table->unsignedBigInteger('follower_id');
            $table->timestamp('accepted_at')->nullable()->index();
            $table->timestamps();

            $table->foreign('following_id')->references('id')->on('users')->cascadeOnDelete();
            $table->foreign('follower_id')->references('id')->on('users')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_follower');
    }
}
