<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meeting extends Model
{
    use HasFactory;

    protected $fillable = [

        "meeting_code" ,"ccs_id"
    ];

    public $timestamps = true;


    public function scopeLastMeetingBy($query , $ccs_id)
    {
        return $query->where("ccs_id","=",$ccs_id)
        ->orderBy('id', 'desc')
        ->first();
    }


    public function scopeAllMeetingBy($query , $ccs_id)
    {
        return $query->where("ccs_id","=",$ccs_id)->get();
    }

    public static function getMeetingsStatus( $class_id )
    {
        $schedules = ClassRoom::find($class_id)->schedules;
        $nowTime  = time();
        $status = [];
        foreach ($schedules as $key => $s) {
            // dd( $s->teacher());

            $a = strtotime($s->start);
            $b = strtotime($s->end);
            // $is_at_this_time = $is_at_the_past = $is_at_next_time =false;
            // Check if time is now
            $is_at_this_time = $nowTime >= $a && $nowTime < $b;

            $is_at_the_past = ($nowTime > $a && $nowTime > $b);

            $is_at_next_time = $nowTime < $a;
            // Check if today
            $dayNumber = jdate('today')->toArray()["dayOfWeek"];
            $is_at_this_day = $dayNumber  == $s->day;

            if($dayNumber  > $s->day || $is_at_the_past){
                $status["pasts"][] =(object)[
                    "sessionName" => $s->course()->name,
                    "start" => $s->start,
                    "end" => $s->end,
                    "meetings" => Meeting::allMeetingBy($s->pivot->id),
                ];
                 
                // $pasts[]["ccs_id"] = ;
            }else

            if($is_at_this_day && $is_at_this_time){
                $status["now"] = [
                    "start" => $s->start,
                    "end" => $s->end,
                    "ccs_id" => $s->pivot->id,
                    "date" =>  jdate(now())->format("y/m/d"),//Meeting::lastMeetingBy($s->pivot->id)->created_at,
                ];
                
            }else

            if(($is_at_next_time && !empty($next) && $next->start > $a) || empty($next)){
                $status["next"] = [
                    "start" => $s->start,
                    "end" => $s->end,
                    "date" => jdate(now())->format("y/m/d")
                ];

               
            }


        }
// dd($status);
        return $status;
    }

    // public $timestamps = false;
}
