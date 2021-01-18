<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            
            $table->id();

            $table->enum("type",[ "dev" , "admin" , "teacher" , "student" , "deputy"]);
            
            $table->string("avatar")->nullable();

            $table->string("fname");

            $table->string("lname");

            $table->string("username")->unique();
            
            $table->string('mobile')->nullable();

            $table->string('password');

            $table->string('email')->nullable();
            
            $table->timestamp('email_verified_at')->nullable();

            $table->rememberToken();

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
        // Schema::dropIfExists('class_user');
        
        Schema::dropIfExists('users');
        
    }
}
