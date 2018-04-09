<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableCategoriesTopicsComments extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table){
            $table->increments('id');
            $table->string('title');
            $table->string('description');
            $table->unsignedInteger('creator_id');
            $table->unsignedInteger('parent_id')->nullable();
            $table->timestamps();
        });

        Schema::create('topics', function (Blueprint $table){
            $table->increments('id');
            $table->string('title');
            $table->string('content');
            $table->unsignedInteger('author_id');
            $table->unsignedInteger('category_id')->nullable();
            $table->timestamps();
        });

        Schema::create('comments', function (Blueprint $table){
            $table->increments('id');
            $table->string('content');
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('topic_id');
            $table->unsignedInteger('parent_id')->nullable();
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
        //
    }
}
