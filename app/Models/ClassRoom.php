<?php

namespace App\Models;

use App\Models\Base;
use App\Models\User;
use App\Models\Course;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ClassRoom extends Model
{
    use HasFactory;


    protected $table = "class";


    protected $fillable = [
        "name",
        "type",
        "color",
    ];

 


    // public function removeUser( User $user )
    // {
    //     if($user->type== "student")
    //         ClassRoom::students( $user->id )->delete();
    //     else
    //         ClassRoom::teachers( $user->id )->delete();
            
    //     $user->delete();
    // }

    
    

    public function users()
    {
        return $this->belongsToMany( User::class , "class_user" ,"class_id" ,"user_id");
    }   
    

    public function base()
    {
        return $this->belongsTo( Base::class );
    }  

    
    public function courses()
    {
        return $this->belongsToMany( Course::class ,'class_course_schedule' ,"class_id" )->distinct(); 
    }


    public function schedules()
    {
        return $this->belongsToMany( Schedule::class ,'class_course_schedule' , "class_id" )->withPivot("id");
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


    public function getDeputyNameAttribute()
    {
    
        $d =  $this->users()->deputies()->first();
    

        return empty($d) ? "" : $d->fullName;
    }


    public static function addCourse( $rows = [] )
    { 

        DB::table("class_course_schedule")->insertOrIgnore($rows);
    }
  
}
