<?php

namespace App\Http\Controllers;

use App\Models\Time;
use App\Models\Schedule;
use App\Models\ClassRoom;
use Illuminate\Http\Request;

class WeekPlanController extends Controller
{
    
    public function save(Request $req)
    {
        $time =  Time::find($req->timePlan);

        $sid = Schedule::create([
            "start" => $time->start,
            "end" =>  $time->end,
            "type" => $req->turn,
            "day" => $req->day,
        ])->id;

        $c = explode("-",$req->classCourse);
        
        Schedule::addWeekTimes([

            "class_id" => $c[0],
            "course_id" => $c[1],
            "teacher_id" => $c[2],
            "schedule_id" => $sid,
        ]);

        return redirect()->back();

    }


    public function addTime(Request $req)
    {
        Time::create([
            "start" => date("H:i", strtotime($req->start)),
            "end" => date("H:i", strtotime($req->end))
        ]);

        return redirect()->back();
    }
}
