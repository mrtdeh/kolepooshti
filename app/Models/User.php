<?php

namespace App\Models;

use App\Models\Course;
use Illuminate\Support\Facades\DB;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'type',
        'fname',
        'lname',
        'username',
        'mobile',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];
    
    

      
    public function rooms()
    {
        $id = $this->attributes["id"];
        if ($this->attributes["type"] == "teacher")

            return $this->belongsToMany( ClassRoom::class , "class_course_schedule" , "teacher_id", "class_id");
            // return DB::table("class_course_schedule")->where("teacher_id","=",$id);

        // return $this->belongsToMany( ClassRoom::class , "class_user" , "user_id" ,"class_id");
    }


    public function scopeTeachers( $query )
    {
        return $query->where( "type" ,"teacher" );
    }


    public function scopeDeputies( $query )
    {
        return $query->where( "type" ,"deputy" );
    }



    public function scopeStudents( $query )
    {
        return $query->where( "type" ,"student" );
    }


    public function getFullNameAttribute( $attrs )
    {
        return $this->attributes["fname"] . " " . $this->attributes["lname"];
    }

    
}
