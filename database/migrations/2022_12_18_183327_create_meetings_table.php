<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMeetingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('meetings', function (Blueprint $table) {

            $table->id();

            $table->unsignedBigInteger("ccs_id")->index();

            $table->foreign("ccs_id")->references('id')->on('class_course_schedule');

            $table->string("meeting_code");

            $table->string("record_code");
            
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
        Schema::dropIfExists('meetings');
    }
}
