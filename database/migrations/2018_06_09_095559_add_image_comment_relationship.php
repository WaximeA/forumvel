<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddImageCommentRelationship extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
//        // Comment relationship whith Image
//        Schema::table('comments', function (Blueprint $table){
//            $table->foreign('image_id')->references('id')->on('images');
//        });

//        // Images relationship whith Comments
//        Schema::table('images', function (Blueprint $table){
//            $table->foreign('comment_id')->references('id')->on('comments');
//        });
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
