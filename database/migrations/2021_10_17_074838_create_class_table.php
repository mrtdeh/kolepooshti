<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClassTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('class', function (Blueprint $table) {
            
            $table->id();

            $table->char("name",32)->nullable();

            $table->char("color",32)->nullable();

            $table->unsignedBigInteger("base_id")->nullable();

            $table->foreign("base_id")->references('id')->on('bases');

            $table->enum("type",[ "classic" , "compensation" , "merger" , "consulting" , "other"]);

            $table->timestamps();
        });


       

        Schema::create('class_user', function (Blueprint $table) {

            $table->unsignedBigInteger("class_id");

            $table->foreign("class_id")->references('id')->on('class')->onDelete('cascade');

            $table->unsignedBigInteger("user_id");

            $table->foreign("user_id")->references('id')->on('users')->onDelete('cascade');

            $table->primary(["class_id" , "user_id"]);
            
            $table->timestamps();
        });




        Schema::create('class_student', function (Blueprint $table) {

            $table->unsignedBigInteger("class_id");

            $table->foreign("class_id")->references('id')->on('class')->onDelete('cascade');

            $table->unsignedBigInteger("student_id");

            $table->foreign("student_id")->references('id')->on('users')->onDelete('cascade');

            $table->primary(["class_id" , "student_id"]);
            
            $table->timestamps();
        });




        Schema::create('class_deputy', function (Blueprint $table) {

            $table->unsignedBigInteger("class_id");

            $table->foreign("class_id")->references('id')->on('class')->onDelete('cascade');

            $table->unsignedBigInteger("deputy_id");

            $table->foreign("deputy_id")->references('id')->on('users')->onDelete('cascade');

            $table->primary(["class_id" , "deputy_id"]);
            
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
        Schema::dropIfExists('class_student');
        
        Schema::dropIfExists('class');
    }
}
