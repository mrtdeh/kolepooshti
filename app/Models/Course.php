<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Course extends Model
{
    use HasFactory;


    protected $fillable = [
        'name','color','icon','image','description'
        
    ];


    protected $appends = [
        "teacherName" ,"teacherId"
    ];
    

    public function schedules()
    {
        return $this->belongsToMany( Schedule::class ,'class_course_schedule');
 
    }


    public function teachers()
    {

        return $this->belongsToMany( User::class ,'class_course_schedule', "course_id", "teacher_id");
    }



    public function room()
    {
      
        $rooms =  $this->belongsToMany( ClassRoom::class ,'class_course_schedule', "course_id", "class_id")
        ->withPivot("class_id");

        return $rooms;//->where("course_id","=",$this->id)->first();
    }



    public function getTeacherNameAttribute()
    {

        return $this->teachers()->first()->fullName;
    }


    public function getTeacherIdAttribute()
    {

        return $this->teachers()->first()->id;
    }



}
