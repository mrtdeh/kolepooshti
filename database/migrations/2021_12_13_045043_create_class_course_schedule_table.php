<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClassCourseScheduleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('class_course_schedule', function (Blueprint $table) {

            // $table->increments("id")->;

            $table->id();

            $table->unsignedBigInteger("class_id")->index();

            $table->foreign("class_id")->references('id')->on('class')->onDelete('cascade');

            $table->unsignedBigInteger("course_id")->index();

            $table->foreign("course_id")->references('id')->on('courses')->onDelete('cascade');

            $table->unsignedBigInteger("teacher_id")->index();
            
            $table->foreign("teacher_id")->references('id')->on('users');
            
            $table->unsignedBigInteger("schedule_id")->index()->nullable();

            $table->foreign("schedule_id")->references('id')->on('schedules')->onDelete('cascade');

            // $table->primary(["class_id" ,"course_id"]);

            
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
        Schema::dropIfExists('class_course');
    }
}
