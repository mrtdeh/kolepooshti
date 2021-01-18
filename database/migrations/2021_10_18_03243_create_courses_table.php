<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {

            $table->id();

            $table->char("name",32);

            $table->string("image")->nullable();

            $table->text("description")->nullable();

            $table->char("color",32)->nullable();

            $table->char("icon",32)->nullable();

            $table->timestamps();
        });


        


        Schema::create('course_teacher', function (Blueprint $table) {

            $table->unsignedBigInteger("course_id");

            $table->foreign("course_id")->references('id')->on('courses');

            $table->unsignedBigInteger("teacher_id");

            $table->foreign("teacher_id")->references('id')->on('users');

            $table->primary(["course_id" , "teacher_id"]);

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

        // Schema::dropIfExists('course_teacher');
        
        Schema::dropIfExists('courses');
    }
}
