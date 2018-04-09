<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddRelationship extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Categories relationship whith Users
        Schema::table('categories', function (Blueprint $table){
            $table->foreign('creator_id')->references('id')->on('users');
        });

        // Topics relationship whith Users and Catgories
        Schema::table('topics', function (Blueprint $table){
            $table->foreign('author_id')->references('id')->on('users');
            $table->foreign('category_id')->references('id')->on('categories');
        });

        // Comments relationship whith Users and Topics
        Schema::table('comments', function (Blueprint $table){
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('topic_id')->references('id')->on('topics');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
