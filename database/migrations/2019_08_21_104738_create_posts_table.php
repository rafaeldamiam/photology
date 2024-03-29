<?php

use Illuminate\Support\Facades\Schema;

use Illuminate\Database\Schema\Blueprint;

use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration

{

   /**

    * Run the migrations.

    *

    * @return void

    */

   public function up()

   {

       Schema::create('posts', function (Blueprint $table) {

           $table->bigIncrements('id');

           $table->integer('user_id');

           $table->string('image_path')->nullable();

           $table->string('filter')->nullable();

           $table->text('description')->nullable();

           $table->integer('like');

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

       Schema::dropIfExists('posts');

   }

}