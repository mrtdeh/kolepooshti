<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Schedule extends Model
{
    use HasFactory;

    protected $fillable = [
        "start",
        "end",
        "type",
        "day",
    ];

    
 
    
    public function getDaysAttribute($days)
    {
        return explode("," , $days);
    }

    public function courses()
    {
        return $this->belongsToMany( Course::class ,'class_course_schedule' ,"schedule_id" ); 
    }

    public static function addWeekTimes( $rows = [] , $clear = false )
    { 
        if (!empty($rows[0])){
            $class_id = $rows[0]["class_id"];
            $course_id = $rows[0]["course_id"];
        }
        else{
            $class_id = $rows["class_id"];
            $course_id = $rows["course_id"];
        }
            

        if ($clear)
            DB::table("class_course_schedule")
            ->where([
                ['class_id', '=', $class_id],
                ['course_id', '=', $course_id]])->delete();

                // foreach ($rows as $key => $row) {
            
                //     DB::table("class_course_schedule")->updateOrInsert(
        
                //         [
                //             'class_id' => $row["class_id"], 
                //             'course_id' => $row["course_id"],
                //             'teacher_id' => $row["teacher_id"]
                //         ],
        
                //         ['schedule_id' => $row["schedule_id"]]
                //     );
                // }
     
        DB::table("class_course_schedule")->insert($rows);


    }
    
}
